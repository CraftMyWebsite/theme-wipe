<?php

use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Support\SupportResponsesModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Support\SupportEntity[] $privateSupport */

Website::setTitle('Support');
Website::setDescription('Consultez les réponses de nos experts.');
?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::getInstance()->fetchImageLink('hero_img_bg') ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
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
        <a href="<?= Website::getProtocol() . '://' . $_SERVER['SERVER_NAME'] . EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'support' ?>"
           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center">Retourner
            au support</a>
    </div>
    <div class="">
        <div class="">
            <div class="container mx-auto rounded-md shadow-lg p-8 h-fit">
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase">Mes demandes</h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                <div class="lg:grid grid-cols-3 gap-4">
                <?php foreach ($privateSupport as $support): ?>
                    <div class="shadow-lg p-2 rounded-lg">
                        <a href="<?= $support->getUrl() ?>" class="text-lg font-medium text-blue-700 hover:text-blue-500"><?= $support->getQuestion() ?></a>
                        <div class="border-t">
                            <p>Confidentialité : <?= $support->getIsPublicFormatted() ?></p>
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