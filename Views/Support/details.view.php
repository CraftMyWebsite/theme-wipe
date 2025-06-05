<?php

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Utils\Website;

/* @var CMW\Entity\Support\SupportEntity $support */
/* @var CMW\Entity\Support\SupportResponseEntity[] $responses */

Website::setTitle('Support');
Website::setDescription('Consultez les réponses de nos experts.');
?>

<section class="bg-gray-800 relative text-white">
    <img data-cmw-attr="src:home-hero:hero_img_bg"
         class="absolute h-full inset-0 object-center object-cover w-full"
         alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Support</h1>
            </div>
        </div>
    </div>
</section>

<section class="bg-white rounded-lg shadow my-8 mx-2 2xl:mx-96 mt-8 mb-8">
    <div class="container p-4">
        <div class="flex flex-wrap justify-between">
            <a href="<?= Website::getProtocol() . '://' . $_SERVER['SERVER_NAME'] . EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'support' ?>"
               class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center">Retourner
                au support</a>
            <?php if ($support->getStatus() !== '2'): ?>
            <a href="<?= $support->getCloseUrl() ?>"
               class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center">Cloturer</a>
            <?php endif; ?>
        </div>
        <div class="flex flex-wrap justify-between">
            <p>Auteur : <?= $support->getUser()->getPseudo() ?></p>
            <p>État : <?= $support->getStatusFormatted() ?></p>
            <p>Visibilité : <?= $support->getIsPublicFormatted() ?></p>
            <p>Date : <?= $support->getCreated() ?></p>
        </div>
        <h4>Demande :</h4>
        <div class="shadow-lg rounded-xl p-4 bg-gray-100 mb-4">
            <?= $support->getQuestion() ?>
        </div>
        <div class="border-t"></div>
        <h4>Réponses :</h4>
        <?php foreach ($responses as $response): ?>
            <div class="shadow-lg rounded-xl p-4 bg-gray-100 mb-4">
                <div class="flex-wrap flex justify-between">
                    <b><?= $response->getUser()->getPseudo() ?> : </b>
                    <?php if ($response->getIsStaff()): ?><small class="rounded-lg bg-green-400 px-2 py-1"><?= $response->getIsStaffFormatted() ?></small><?php endif; ?>
                </div>
                <p><?= $response->getResponse() ?></p>
                <p><?= $response->getCreated() ?></p>
            </div>
        <?php endforeach; ?>
        <?php if ($support->getStatus() !== '2'): ?>
        <form class="space-y-6" action="" method="post">
            <?php SecurityManager::getInstance()->insertHiddenToken() ?>
            <div class="mb-4">
                <label for="support_response_content" class="block mb-2 text-sm font-medium text-gray-900">Votre réponse :</label>
                <textarea minlength="20" id="support_response_content" name="support_response_content" rows="4"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Vous pouvez ..."></textarea>
            </div>
            <div class="text-center">
                <button type="submit"
                        class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Envoyé
                </button>
            </div>
        </form>
        <?php endif; ?>
    </div>
</section>