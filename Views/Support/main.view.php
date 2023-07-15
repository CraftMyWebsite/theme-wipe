<?php

use CMW\Controller\Core\SecurityController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Support\SupportResponsesModel;
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

<section class="mx-2 lg:mx-40 mt-8 mb-8">
    <div class="text-center">
        <a href="<?= Website::getProtocol() . "://" . $_SERVER["SERVER_NAME"] . EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ."support/private" ?>"
           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center">Voir
            mes demandes</a>
    </div>
    <div class="lg:grid grid-cols-3 gap-4">
        <div class="container mx-auto rounded-md shadow-lg p-8 h-fit">
            <div class="flex flex-no-wrap justify-center items-center py-4">
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                <div class="px-10 w-auto">
                    <h2 class="font-semibold text-2xl uppercase">Nouveau support</h2>
                </div>
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
            </div>
            <form class="space-y-6" action="" method="post">
                <?php (new SecurityManager())->insertHiddenToken() ?>
            <div class="mb-2">
                <label for="support_question" class="block mb-2 text-sm font-medium text-gray-900">Votre demande :</label>
                <textarea id="support_question" rows="4" name="support_question"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Impossible de ..."></textarea>
            </div>
                <?php if(SupportSettingsModel::getInstance()->getConfig()->getCaptcha()):?>
                    <?php SecurityController::getPublicData(); ?>
                <?php endif; ?>
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="support_is_public" name="support_is_public" checked type="checkbox" value=""
                               class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                    </div>
                    <label for="support_is_public" class="ml-2 text-sm font-medium text-gray-900">Question publique</label>
                </div>
                <div>
                    <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Soumettre
                    </button>
                </div>
            </div>
            </form>
        </div>
        <div class="col-span-2">
            <div class="container mx-auto rounded-md shadow-lg p-8 h-fit">
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase">Support publique</h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                <div class="lg:grid grid-cols-3 gap-4">
                    <?php foreach ($publicSupport as $support): ?>
                    <div class="shadow-lg p-2 rounded-lg">
                        <a href="<?= $support->getUrl() ?>" class="text-lg font-medium text-blue-700 hover:text-blue-500"><?= $support->getQuestion() ?></a>
                        <div class="border-t">
                            <p>Statut : <?= $support->getStatusFormatted() ?></p>
                            <p>Date : <?= $support->getCreated() ?></p>
                            <p>Réponses : <?= SupportResponsesModel::getInstance()->countResponses($support->getId()) ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>