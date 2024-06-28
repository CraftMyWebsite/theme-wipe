<?php

/* @var \CMW\Entity\Users\UserEntity $user */

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle("Double facteur obligatoire");
Website::setDescription("Merci d'activer le 2fa !");
?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::getInstance()->fetchImageLink("hero_img_bg") ?>"
         class="absolute h-full inset-0 object-center object-cover w-full"
         alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Double facteur obligatoire</h1>
            </div>
        </div>
    </div>
</section>

<div class="bg-white rounded-lg shadow mx-auto relative p-4 w-full h-full md:h-auto mb-6 mt-6" style="max-width: 35rem">
    <div>
        <p class="mb-4 text-center"><b>Veuillez activer le double facteur pour pouvoir vous connecter</b></p>
        <div class="text-center">
            <img class="mx-auto" width="50%" src='<?= $user->get2Fa()->getQrCode(250) ?>'
                 alt="QR Code double authentification">
            <span><?= $user->get2Fa()->get2FaSecretDecoded() ?></span>
        </div>
        <form
            action="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>profile/2fa/toggle"
            method="post">
            <?php (new SecurityManager())->insertHiddenToken() ?>
            <input type="text" hidden="" name="enforce_mail" value="<?= $user->getMail() ?>">
            <div class="mt-2">
                <label for="secret" class="block mb-2 text-sm font-medium text-gray-900">Code d'authentification</label>
                <input type="text" name="secret" id="secret" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            <div class="text-center mt-2">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Activer</button>
            </div>
        </form>
    </div>
</div>