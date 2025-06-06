<?php

use CMW\Controller\Core\SecurityController;
use CMW\Manager\Lang\LangManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle('Inscription');
Website::setDescription('Inscrivez-vous');

/* @var \CMW\Interface\Users\IUsersOAuth[] $oAuths */
?>

<section class="bg-gray-800 relative text-white">
    <!--PROD DEFINIR LA SOURCE-->
    <img data-cmw-attr="src:home-hero:hero_img_bg"
         class="absolute h-full inset-0 object-center object-cover w-full"
         alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Inscription</h1>
            </div>
        </div>
    </div>
</section>

<?php if (ThemeModel::getInstance()->fetchConfigValue('global', 'header_allow_register_button')): ?>
    <div class="mx-auto relative p-4 w-full max-w-md h-full md:h-auto mb-6 mt-6">
        <div class="relative bg-white rounded-lg shadow">
            <div class="py-6 px-6 lg:px-8">
                <form class="space-y-6" action="" method="post">
                    <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Mail</label>
                        <input name="register_email" type="email"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder="<?= LangManager::translate('users.users.mail') ?>" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Pseudo / Nom
                            d'affichage</label>
                        <input name="register_pseudo" type="text"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder="<?= LangManager::translate('users.users.pseudo') ?>" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Mot de passe</label>
                        <div class="flex">
                            <input id="passwordInput" type="password" name="register_password"
                                   placeholder="<?= LangManager::translate('users.users.pass') ?>"
                                   class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg block w-full p-2.5"
                                   required>
                            <div onclick="showPassword()"
                                 class="cursor-pointer p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800">
                                <i class="fa fa-eye-slash"></i></div>
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Confirmation</label>
                        <div class="flex">
                            <input id="passwordInputV" type="password" name="register_password_verify"
                                   placeholder="<?= LangManager::translate('users.users.pass') ?>"
                                   class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg block w-full p-2.5"
                                   required>
                            <div onclick="showPasswordV()"
                                 class="cursor-pointer p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800">
                                <i class="fa fa-eye-slash"></i></div>
                        </div>
                    </div>

                    <?php SecurityController::getPublicData(); ?>

                    <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><?= LangManager::translate('users.login.register') ?></button>
                </form>
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <p class="font-medium">S'inscrire avec</p>
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
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="mx-auto relative p-4 w-full max-w-md h-full md:h-auto mb-6 mt-6">
        <div class="relative bg-white rounded-lg shadow">
            <div class="py-6 px-6 lg:px-8" data-cmw="global:global_no_register_message"></div>
        </div>
    </div>
<?php endif; ?>
<script>
    function showPassword() {
        var x = document.getElementById("passwordInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showPasswordV() {
        var x = document.getElementById("passwordInputV");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>