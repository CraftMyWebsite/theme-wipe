<?php

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Shop\HistoryOrders\ShopHistoryOrdersEntity $historyOrder */
/* @var \CMW\Model\Shop\Image\ShopImagesModel $defaultImage */

Website::setTitle("Boutique - Serve après ventes");
Website::setDescription('Déclarer un incident sur l\'article ' . $historyOrder->getOrderNumber());

?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::getInstance()->fetchImageLink('hero_img_bg') ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Boutique</h1>
            </div>
        </div>
    </div>
</section>

<section class="px-2 md:px-24 xl:px-48 2xl:px-72 py-6">
    <div class="col-span-2 2xl:px-48">
        <div class="flex flex-no-wrap justify-center items-center py-4">
            <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
            <div class="px-10 w-auto">
                <h2 class="font-semibold text-2xl uppercase">Service après-vente</h2>
            </div>
            <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        </div>
    </div>
</section>