<?php

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Shop\ShopOrdersEntity[] $historyOrders */
/* @var CMW\Model\Shop\ShopOrdersItemsModel $OrderItemsModel */
/* @var CMW\Model\Shop\ShopOrdersItemsVariantesModel $variantItemsModel */

Website::setTitle("Boutique - Historique d'achat");
Website::setDescription("Consultation de vos achats");

?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
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
                <h2 class="font-semibold text-2xl uppercase">Historique d'achat</h2>
            </div>
            <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        </div>

        <?php foreach ($historyOrders as $order) : ?>
        <div class="container mx-auto rounded-md shadow-lg p-8 mb-4">
                <div class="py-2">
                    <div class="flex flex-wrap justify-between mb-4">
                        <h4 class="font-medium">N°<?= $order->getNumber() ?></h4>
                        <div class="font-medium">Commandé le : <span style="color: #5a8cde"><?= $order->getOrderCreated() ?></span></div>
                    </div>
                    <div class="flex flex-wrap justify-between items-center mb-2">
                        <div >Statut : <b><?= $order->getPublicStatus() ?></b></div>
                        <!-- TODO : Si il est en cours de livraison affiché bouton suivie de colis -->
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5">Suivre le colis</a>
                    </div>
                    <h4 class="py-2 border-t">Vos articles :</h4>
                    <div>
                        <?php foreach ($OrderItemsModel->getOrdersItemsByOrderId($order->getOrderId()) as $orderItem): ?>
                        <div class="flex flex-wrap border p-4 gap-4">

                                <div style="width: 20%">
                                    <?php if ($orderItem->getFirstImageItemUrl() !== "/Public/Uploads/Shop/0"): ?>
                                        <img class="mx-auto" style="width: 8rem; height: 8rem; object-fit: cover" src="<?= $orderItem->getFirstImageItemUrl() ?>" alt="Image de l'article">
                                    <?php else: ?>
                                    <p>😫 Nous n'avons pas trouvé d'image pour cet article !</p>
                                    <?php endif; ?>
                                </div>

                            <div style="width: 78%;">
                                <div class="flex flex-wrap justify-between items-center">
                                    <p class="font-bold"><?= $orderItem->getItem()->getName() ?></p>
                                    <div><a href="<?= $orderItem->getItem()->getItemLink() ?>" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-2 py-1 ">Acheter à nouveau</a></div>
                                </div>

                                <br>
                                <?php foreach ($variantItemsModel->getShopItemVariantValueByOrderItemId($orderItem->getOrderItemId()) as $variant): ?>
                                    <p><?= $variant->getVariantValue()->getVariant()->getName() ?> : <?= $variant->getVariantValue()->getValue() ?></p>
                                <?php endforeach; ?>
                                <p>Prix : <b><?= $orderItem->getOrderItemPrice() ?>€</b> | Quantité : <?= $orderItem->getOrderItemQuantity() ?></p>

                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

        </div>
        <?php endforeach; ?>

    </div>
</section>