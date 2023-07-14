<?php

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Support\SupportEntity[] $privateSupport */

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


<?php foreach ($privateSupport as $support): ?>
    <p>Confidentialité : <?= $support->getIsPublicFormatted() ?></p>
    <p>Statut : <?= $support->getStatusFormatted() ?></p>
    <?= $support->getQuestion() ?>
    <a href="<?= $support->getUrl() ?>">Allez voir ça</a>
    <br><br>
<?php endforeach; ?>
