<?php

/* @var \CMW\Entity\SimpleCookies\SimpleCookiesSettingsEntity $content */

use CMW\Utils\Website;

Website::setTitle('Cookies');
Website::setDescription('Découvrez pourquoi on à besoin de cookies !');
?>

<section class="bg-gray-800 relative text-white">
    <img data-cmw-attr="src:home-hero:hero_img_bg" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Cookies</h1>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="px-2 md:px-24 xl:px-48 2xl:px-72 mt-4 mb-4">
        <div class="container mx-auto rounded-md shadow-lg p-8">
            <?= $content ?>
        </div>
    </div>
</section>