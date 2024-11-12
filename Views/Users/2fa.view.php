<?php

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle('Double facteur');
Website::setDescription('Activer le double facteur');

?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::getInstance()->fetchImageLink('hero_img_bg') ?>"
         class="absolute h-full inset-0 object-center object-cover w-full"
         alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Double facteur</h1>
            </div>
        </div>
    </div>
</section>


<div class="mx-auto w-1/4">
    <div>
        <form class="space-y-6"
              action="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'login/validate/tfa' ?>"
              method="post">
            <?php SecurityManager::getInstance()->insertHiddenToken() ?>
            <div>
                <label for="code" class="block mb-2 text-sm font-medium text-gray-900">Code d'authentification</label>
                <input type="text" name="code" id="email"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5""
                required>
            </div>

            <div class="text-center mt-4">
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Connexion
                </button>
            </div>
        </form>
    </div>
</div>