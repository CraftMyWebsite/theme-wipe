<?php

use CMW\Controller\Core\SecurityController;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Support\SupportSettingsModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Support\SupportEntity $support */
/* @var CMW\Entity\Support\SupportResponseEntity[] $responses */

$title = Website::getWebsiteName() . ' - Support';
$description = 'Parfait pour vos demande de support';
?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>"
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
<p>
    <?= $support->getIsPublicFormatted() ?><br>
    <?= $support->getStatusFormatted() ?><br>
    <?= $support->getUser()->getPseudo() ?><br>
    <?= $support->getCreated() ?><br>
    <?= $support->getQuestion() ?>
</p>
<a href="<?= $support->getCloseUrl() ?>">Cloturer</a>
<div>
    <?php foreach ($responses as $response): ?>
        <p><?= $response->getUser()->getPseudo() ?> <small><?= $response->getIsStaffFormatted() ?></small> : <?= $response->getResponse() ?><br></p>
    <?php endforeach; ?>
</div>

<div>
    <form class="space-y-6" action="" method="post">
        <?php (new SecurityManager())->insertHiddenToken() ?>
        <label for="support_response_content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Réponse</label>
        <textarea id="support_response_content" name="support_response_content"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
        <?php if(SupportSettingsModel::getInstance()->getConfig()->getCaptcha()):?>
            <?php SecurityController::getPublicData(); ?>
        <?php endif; ?>
        <button type="submit"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Soumettre
        </button>
    </form>
</div>