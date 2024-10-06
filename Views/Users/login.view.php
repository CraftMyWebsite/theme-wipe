<?php

use CMW\Controller\Core\SecurityController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle('Connexion');
Website::setDescription('Connectez-vous sur ' . Website::getWebsiteName());

/* @var \CMW\Interface\Users\IUsersOAuth[] $oAuths */

?>

<section class="bg-gray-800 relative text-white">
    <!--PROD DEFINIR LA SOURCE-->
    <img src="<?= ThemeModel::getInstance()->fetchImageLink('hero_img_bg') ?>"
         class="absolute h-full inset-0 object-center object-cover w-full"
         alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Connexion</h1>
            </div>
        </div>
    </div>
</section>


<div class="mx-auto relative p-4 w-full max-w-md h-full md:h-auto mb-6 mt-6">
    <div class="relative bg-white rounded-lg shadow">
        <div class="py-6 px-6 lg:px-8">
            <form class="space-y-6" action="" method="post">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <input hidden name="previousRoute" type="text" value="<?= $_SERVER['HTTP_REFERER'] ?>">
                <div>
                    <label for="email"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mail</label>
                    <input name="login_email" type="email"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                           placeholder="mail@craftmywebsite.fr" required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mot de
                        passe</label>
                    <div class="flex">
                        <input type="password" name="login_password" id="passwordInput" placeholder="••••••••"
                               class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg block w-full p-2.5"
                               required>
                        <div onclick="showPassword()"
                             class="cursor-pointer p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                    </div>

                </div>
                <div class="flex justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="login_keep_connect" name="login_keep_connect" type="checkbox" value=""
                                   class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                        </div>
                        <label for="login_keep_connect"
                               class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Se souvenir de
                            moi</label>
                    </div>
                    <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>login/forgot"
                       class="text-sm text-blue-700 hover:underline dark:text-blue-500">Mot de passe oublié ?</a>
                </div>
                <?php SecurityController::getPublicData(); ?>
                <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Connexion
                </button>
            </form>
            <div class="flex flex-no-wrap justify-center items-center py-4">
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                <div class="px-10 w-auto">
                    <p class="font-medium">Se connecter avec</p>
                </div>
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
            </div>
            <div class="px-4 py-2 justify-center text-center w-full sm:w-auto">
                <div class="flex-wrap inline-flex space-x-3">
                    <?php foreach ($oAuths as $oAuth): ?>
                        <a href="oauth/<?= $oAuth->methodIdentifier() ?>" class="hover:text-blue-600"
                           aria-label="<?= $oAuth->methodeName() ?>">
                            <img src="<?= $oAuth->methodeIconLink() ?>"
                                 alt="<?= $oAuth->methodeName() ?>" width="32" height="32"/>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <label class="block text-sm text-gray-900 mt-4">Pas encore de comtpe, <a
                    href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>register" class="text-blue-500">s'enregistrer</a></label>
        </div>
    </div>
</div>


<script>
    function showPassword() {
        var x = document.getElementById("passwordInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>