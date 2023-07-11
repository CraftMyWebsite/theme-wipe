<?php
use CMW\Model\Contact\ContactModel;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/*TITRE ET DESCRIPTION*/
$title = Website::getWebsiteName();
$description = ThemeModel::fetchConfigValue('faq_description');
?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl"><?= ThemeModel::fetchConfigValue('footer_desc_condition_sale') ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="bg-white rounded-lg shadow mt-8 mx-2 lg:mx-72">
    <div class="container p-4">
        <?= $cgv->getContent() ?>
    </div>
</section>

<div class="mb-8 mt-2 lg:mx-72">
    <p>Écrit par <b><?= $cgv->getLastEditor()->getPseudo() ?></b>, mis à jour le <?= $cgv->getUpdate() ?></p>
</div>
