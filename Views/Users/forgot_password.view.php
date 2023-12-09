<?php

use CMW\Controller\Core\SecurityController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Lang\LangManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/*TITRE ET DESCRIPTION*/
Website::setTitle("Mot de passe oublié");
Website::setDescription("C'est pas très bien d'oublié son mot de passe ...");
?>

<section class="bg-gray-800 relative text-white">
    <!--PROD DEFINIR LA SOURCE-->
    <img src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Mot de passe oublié</h1>
            </div>
        </div>
    </div>
</section>

<div class="mx-auto relative p-4 w-full max-w-md h-full md:h-auto mb-6 mt-6">
    <div class="relative bg-white rounded-lg shadow">
        <div class="py-6 px-6 lg:px-8">
            <form class="space-y-6" action="" method="post">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mail</label>
                    <input name="mail" id="email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="mail@craftmywebsite.fr" required>
                </div>
                <div class="flex justify-between">
                    <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>register" class="text-sm text-blue-700 hover:underline dark:text-blue-500">S'inscrire</a>
                    <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>login" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Connexion</a>
                </div>
                <?php SecurityController::getPublicData(); ?>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Envoyer</button>
            </form>
        </div>
    </div>
</div>