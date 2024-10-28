<?php

/* @var \CMW\Entity\Users\UserEntity $user */

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle('Votre profil');
Website::setDescription('Éditez votre profil');
?>

<section class="bg-gray-800 relative text-white">
    <!--PROD DEFINIR LA SOURCE-->
    <img src="<?= ThemeModel::getInstance()->fetchImageLink('hero_img_bg') ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Votre profil</h1>
            </div>
        </div>
    </div>
</section>

<div class="bg-white rounded-lg shadow my-8 mx-2 xl:mx-72">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase"><?= $user->getPseudo() ?></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
<div class="p-4">
    <div class="md:grid md:grid-cols-2 md:gap-16">
        <div>
            <p class="text-center uppercase font-bold">Informations personnelles</p>
            <form class="space-y-6" action="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'profile/update' ?>" method="post">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <div class="md:grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Votre mail</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= $user->getMail() ?>" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Pseudo / Nom d'affichage</label>
                        <input type="text" name="pseudo" id="pseudo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= $user->getPseudo() ?>" required>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="********" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Confirmation</label>
                        <input type="password" name="passwordVerif" id="passwordVerif" placeholder="********" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                </div>

                <div class="px-16">
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Appliquer les modifications</button>
                </div>
            </form>

            <div class="mt-4 border"></div>
            <p class="text-center uppercase font-bold mt-2">
                <?php if ($user->get2Fa()->isEnabled()): ?>
                    <span style="color: #188c1a;">Sécurité <i class="fa-solid fa-check"></i></span>
                <?php else: ?>
                    <span style="color: #bc2015;">Sécurité <i class="fa-solid fa-triangle-exclamation"></i></span>
                <?php endif; ?>
            </p>
            <?php if (!$user->get2Fa()->isEnabled()): ?>
            <p class="block mb-2 text-sm font-medium text-gray-900">Pour activer l'authentification à double facteur scannez le QR code dans une application
                d'authentification (GoogleAuthenticator, Aegis ...)</p>
            <?php endif; ?>
            <div class="md:grid md:grid-cols-2 gap-4">
                <div class="text-center">
                    <img class="mx-auto" height="50%" width="50%" src='<?= $user->get2Fa()->getQrCode(250) ?>'
                         alt="QR Code double authentification">
                    <span><?= $user->get2Fa()->get2FaSecretDecoded() ?></span>
                </div>
                <form
                      action="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>profile/2fa/toggle"
                      method="post">
                    <?php (new SecurityManager())->insertHiddenToken() ?>
                    <div class="mt-2">
                        <label for="secret" class="block mb-2 text-sm font-medium text-gray-900">Code d'authentification</label>
                        <input type="text" name="secret" id="secret" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <div class="text-center mt-2">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><?= $user->get2Fa()->isEnabled() ? 'Désactiver' : 'Activer' ?></button>
                    </div>
                </form>
            </div>
        </div>
<div class="md:hidden mt-4 border"></div>
        <div>
            <div class="mb-4">
                <p class="text-center uppercase font-bold mb-2">Identité visuelle</p>
                <?php if (!is_null($user->getUserPicture()?->getImage())): ?>
                <!--RECUPERER L'iMAGE-->
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Votre image :</label>
                <img class="mx-auto rounded-lg border border-gray-300 shadow-xl" src="<?= $user->getUserPicture()->getImage() ?>" height="50%" width="50%" alt="Image de profil de <?= $user->getPseudo() ?>">
                <?php endif; ?>
            </div>

            <div>
                <form action="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>profile/update/picture" method="post" enctype="multipart/form-data">
                    <?php (new SecurityManager())->insertHiddenToken() ?>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Changer votre image :</label>
                    <div class="flex">
                        <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-l-lg border border-gray-300 cursor-pointer focus:outline-none" type="file" id="pictureProfile" name="pictureProfile" accept=".png, .jpg, .jpeg, .webp, .gif" required>
                        <button class="inline text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-r-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2" type="submit">Sauvegarder</button>
                    </div>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG, JPEG, WEBP, GIF (MAX. 400px400px).</p>
                </form>
            </div>
        </div>
    </div>

</div>
    <div class="flex flex-no-wrap justify-center items-center pt-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase">Vous nous quittez ?</h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="pt-2 pb-6 text-center">
        <p class="mb-2">Nous sommes triste de vous voir partir !</p>
        <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>profile/delete/<?= $user->getId() ?>" class="mb-4 text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Supprimer mon compte</a>
    </div>
</div>

