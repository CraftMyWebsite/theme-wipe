<?php

use CMW\Controller\Core\SecurityController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Support\SupportSettingsModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Support\SupportEntity[] $publicSupport */

$title = Website::getWebsiteName() . ' - Support';
$description = 'Parfait pour vos demande de support';
?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Support</h1>
            </div>
        </div>
    </div>
</section>

<div class="mx-auto relative p-4 w-full 2xl:px-72 h-full md:h-auto mb-6 mt-6">
    <div class="relative bg-white rounded-lg shadow">
        <div class="py-6 px-6 lg:px-8">
            <form class="space-y-6" action="" method="post">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <div>
                    <div class="flex items-center h-5">
                        <input name="support_is_public" value="1" id="support_is_public" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50" >
                    </div>
                    <label for="support_is_public" class="ml-2 text-sm font-medium text-gray-900">Demande publique</label>
                </div>
                <div>
                    <label for="support_question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Question :</label>
                    <input id="support_question" name="support_question" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="mail@craftmywebsite.fr" required>
                </div>
                <?php if(SupportSettingsModel::getInstance()->getConfig()->getCaptcha()):?>
                    <?php SecurityController::getPublicData(); ?>
                <?php endif; ?>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Soumettre</button>
            </form>
        </div>
    </div>
</div>
<a href="<?= Website::getProtocol() . "://" . $_SERVER["SERVER_NAME"] . EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ."support/private" ?>">Voir mes demandes</a>
<?php foreach ($publicSupport as $support): ?>
<p>Statut : <?= $support->getStatusFormatted() ?></p>
<?= $support->getQuestion() ?>
<a href="<?= $support->getUrl() ?>">Allez voir ça</a>
<?php endforeach; ?>
