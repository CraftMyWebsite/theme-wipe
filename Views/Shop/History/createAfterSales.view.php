<?php

use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Shop\HistoryOrders\ShopHistoryOrdersEntity $historyOrder */
/* @var \CMW\Model\Shop\Image\ShopImagesModel $defaultImage */

Website::setTitle("Boutique - Serve après ventes");
Website::setDescription('Déclarer un incident sur la commande ' . $historyOrder->getOrderNumber());

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
    <h4 class="font-medium text-center">Déclarer un incident sur la commande N°<?=$historyOrder->getOrderNumber()?></h4>
    <div class="lg:grid grid-cols-2 mt-2 gap-6">
        <div class="py-2 container mx-auto rounded-md shadow-lg p-8 mb-4 h-fit">
            <div class="flex flex-wrap justify-between items-center mb-2">
                <div >
                    <p>Commandé le : <span style="color: #5a8cde"><?= $historyOrder->getCreated() ?></span></p>
                    <p>Statut : <b><?= $historyOrder->getPublicStatus() ?></b></p>
                    <?php if ($historyOrder->getShippingMethod()): ?>
                        <p>Éxpédition : <?= $historyOrder->getShippingMethod()->getName() ?> (<?= $historyOrder->getShippingMethod()->getPriceFormatted() ?>)</p>
                    <?php endif; ?>
                    <p>Total : <b><?= $historyOrder->getOrderTotalFormatted() ?></b> payé avec <?= $historyOrder->getPaymentMethod()->getName() ?> (<?= $historyOrder->getPaymentMethod()->getFeeFormatted() ?>)</p>
                    <?php if ($historyOrder->getAppliedCartDiscount()): ?>
                        <p>Réduction appliquée : <b>-<?= $historyOrder->getAppliedCartDiscountTotalPriceFormatted() ?></b></p>
                    <?php endif; ?>
                </div>
            </div>
            <h4 class="py-2 border-t">Vos articles :</h4>
            <div>
                <?php foreach ($historyOrder->getOrderedItems() as $orderItem): ?>
                    <div class="flex flex-wrap border p-4 gap-4">
                        <div style="width: 20%">
                            <?php if ($orderItem->getFirstImg() !== '/Public/Uploads/Shop/0'): ?>
                                <img class="mx-auto" style="width: 8rem; height: 8rem; object-fit: cover" src="<?= $orderItem->getFirstImg() ?>" alt="Image de l'article">
                            <?php else: ?>
                                <img class="mx-auto" style="width: 8rem; height: 8rem; object-fit: cover" src="<?= $defaultImage ?>" alt="Image de l'article">
                            <?php endif; ?>
                        </div>

                        <div style="width: 76%;">
                            <div class="flex flex-wrap justify-between items-center">
                                <p class="font-bold"><?= $orderItem->getName() ?></p>
                            </div>
                            <br>
                            <?php foreach ($historyOrder->getOrderedItemsVariantes($orderItem->getId()) as $variant): ?>
                                <p><?= $variant->getName() ?> : <?= $variant->getValue() ?></p>
                            <?php endforeach; ?>
                            <?php if ($orderItem->getDiscountName()): ?>
                                <p>Réduction appliquée : <b><?= $orderItem->getDiscountName() ?></b> (-<?= $orderItem->getPriceDiscountImpactFormatted() ?>)</p>
                                <p>Prix : <s><?= $orderItem->getTotalPriceBeforeDiscountFormatted() ?></s> <b><?= $orderItem->getTotalPriceAfterDiscountFormatted() ?></b> | Quantité : <?= $orderItem->getQuantity() ?></p>
                            <?php else: ?>
                                <p>Prix : <b> <?= $orderItem->getTotalPriceBeforeDiscountFormatted() ?></b> | Quantité : <?= $orderItem->getQuantity() ?></p>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="py-2 container mx-auto rounded-md shadow-lg p-8 mb-4 h-fit">
            <form method="post" action="<?=$historyOrder->getOrderNumber()?>/create">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raison de la demande<span class="text-red-500">*</span> :</label>
                <select name="reason" id="reason" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="0">Modification de commande</option>
                    <option value="1">Erreur de commande</option>
                    <option value="2">Produit défectueux</option>
                    <option value="3">Produit endommagé</option>
                    <option value="4">Produit manquant</option>
                    <option value="5">Retard de livraison</option>
                    <option value="6">Non-réception de la commande</option>
                    <option value="7">Problème de taille ou de spécifications</option>
                    <option value="8">Autres</option>
                </select>
                <div class="mt-4">
                    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Demande<span class="text-red-500">*</span> :</label>
                    <textarea name="content" id="content" required minlength="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                </div>
                <div class="flex justify-center mt-4">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Soumettre <i class="fa-solid fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
    </div>
</section>