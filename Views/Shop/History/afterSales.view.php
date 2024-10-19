<?php

use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Shop\HistoryOrders\ShopHistoryOrdersEntity $historyOrder */
/* @var CMW\Entity\Shop\HistoryOrders\ShopHistoryOrdersAfterSalesEntity $afterSales */
/* @var CMW\Entity\Shop\HistoryOrders\ShopHistoryOrdersAfterSalesMessagesEntity[] $afterSalesMessages */
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

        <div class="container mx-auto mb-4">
            <div class="flex justify-between">
                <h4 class="font-medium text-center">Incident sur la commande N°<?=$historyOrder->getOrderNumber()?></h4>
                <?php if ($afterSales->getStatus() !== 2): ?>
                    <a href="<?= $historyOrder->getOrderNumber() ?>/close"
                       class="text-white bg-yellow-400 h-fit focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center">Cloturer</a>
                <?php endif; ?>
            </div>

            <div class="mt-2">
                <div class="py-2 container mx-auto rounded-md shadow-lg p-8 mb-4 h-fit flex justify-between">
                    <p><?= $afterSales->getFormattedStatus() ?></p>
                    <p class="font-bold"><?= $afterSales->getFormattedReason() ?></p>
                    <p><?= $afterSales->getCreated() ?></p>
                </div>
            </div>
            <div class="py-2 container mx-auto rounded-md shadow-lg px-4 py-8 mb-4 h-fit space-y-4">
                <?php foreach ($afterSalesMessages as $message): ?>
                    <?php if ($afterSales->getAuthor()->getId() === $message->getAuthor()->getId()): ?>
                        <div class="flex">
                            <div class="max-w-2xl flex gap-2">
                                <img alt="user picture" class="w-10 w-fit h-fit rounded-full" src="<?= $message->getAuthor()->getUserPicture()->getImage() ?>"/>
                                <div class="ml-2 p-2 rounded-lg border">
                                    <div class="flex justify-between">
                                        <p><span class="font-bold"><?= $message->getAuthor()->getPseudo() ?></span> <small><?= $message->getCreated() ?></small></p>
                                        <small class="rounded-lg bg-blue-600 text-white px-2 py-1 ml-4">Vous</small>
                                    </div>
                                    <p><?= $message->getMessage() ?></p>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="flex justify-end">
                            <div class="max-w-2xl flex gap-2">
                                <div class="mr-4 p-2 rounded-lg border">
                                    <div class="flex justify-between">
                                        <small class="rounded-lg bg-green-400 text-white px-2 py-1" style="margin-right: 1rem">S.A.V</small>
                                        <p><small><?= $message->getCreated() ?></small> <span class="font-bold"><?= $message->getAuthor()->getPseudo() ?></span></p>
                                    </div>
                                    <p><?= $message->getMessage() ?></p>
                                </div>
                                <img alt="sav picture" class="w-10 w-fit h-fit rounded-full" src="<?= $message->getAuthor()->getUserPicture()->getImage() ?>"/>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php if ($afterSales->getStatus() !== 2): ?>
            <div class="py-2 container mx-auto rounded-md shadow-lg p-8 mb-4 h-fit">
                <form method="post" action="">
                    <?php (new SecurityManager())->insertHiddenToken() ?>
                    <div class="mt-4">
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Réponse<span class="text-red-500">*</span> :</label>
                        <textarea name="content" id="content" required minlength="20" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                    </div>
                    <div class="flex justify-center mt-4">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Soumettre <i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>