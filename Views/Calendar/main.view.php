<?php

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle("Calendrier");
Website::setDescription("Découvrez nos futur événements");
?>

<section class="bg-gray-800 relative text-white">
    <!--PROD DEFINIR LA SOURCE-->
    <img src="<?= ThemeModel::getInstance()->fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Calendrier</h1>
            </div>
        </div>
    </div>
</section>

<div class="mx-auto relative p-4 w-full 2xl:px-72 h-full md:h-auto mb-6 mt-6">
    <div class="relative bg-white rounded-lg shadow">
        <div class="py-6 px-6 lg:px-8">
            <div id='calendar'></div>
        </div>
    </div>
</div>