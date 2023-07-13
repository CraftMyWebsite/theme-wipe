<?php

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Shop\ShopCartEntity[] $cartContent */

$title = Website::getWebsiteName() . ' - Panier';
$description = 'Visitez notre shop ';

?>

    <section class="bg-gray-800 relative text-white">
        <img src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
        <div class="container mx-auto px-4 py-12 relative">
            <div class="flex flex-wrap -mx-4">
                <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                    <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Panier</h1>
                </div>
            </div>
        </div>
    </section>


<section class="bg-white rounded-lg shadow my-8 sm:mx-12 lg:mx-72">
    <div class="container p-4">

        <div class="xl:grid grid-cols-4 gap-6">

            <div class="col-span-3">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg h-fit">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="font-medium text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="py-3 px-6">
                            </th>
                            <th class="text-center py-3 px-6">
                                Produit
                            </th>
                            <th class="text-center py-3 px-6">
                                Quantité
                            </th>
                            <th class="text-center py-3 px-6">
                                Prix
                            </th>
                            <th class="text-center py-3 px-6">
                                Sous total
                            </th>
                            <th class="py-3 px-6">

                            </th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php foreach ($cartContent as $cart): ?>
                        <tr class="bg-white border-b text-center">
                            <td class="py-2">
                                <?php if ($cart->getFirstImageItemUrl() !== "/Public/Uploads/Shop/0"): ?>
                                <img class="mx-auto" style="width: 3rem; height: 3rem; object-fit: cover" src="<?= $cart->getFirstImageItemUrl() ?>" alt="Panier">
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-6 font-semibold text-gray-900">
                                <?= $cart->getItem()->getName() ?>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex justify-center">
                                    <a href="<?= $cart->getDecreaseQuantityLink() ?>"><i class="fa-solid fa-minus mr-1"></i> </a> <b><?= $cart->getQuantity() ?></b> <a href="<?= $cart->getIncreaseQuantityLink() ?>"><i class="ml-1 fa-solid fa-plus"></i></a>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-gray-900">
                                <?= $cart->getItem()->getPrice() ?>€
                            </td>
                            <td class="font-semibold text-black py-4 px-6">
                                <?= $cart->getTotalPrice() ?>€
                            </td>
                            <td>
                                <a href="<?= $cart->getRemoveLink() ?>" class="font-medium text-red-600"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="flex flex-wrap justify-between mt-4">
                    <div>
                        <div class="flex">
                            <div class="relative w-full">
                                <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Code promo">
                                <button class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Appliquer</button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 ">
                            Mettre à jour le panier
                        </button>
                    </div>
                </div>
            </div>


            <div class="h-fit rounded-lg shadow-md mt-4 lg:mt-0">
                <div class="font-medium text-sm rounded-t-lg bg-gray-50 py-3 px-2">
                    <h5 class="text-black">Total panier</h5>
                </div>
                <div class="grid grid-cols-2 bg-white">
                    <div class="font-medium text-center">
                        <p class="py-2 border-b">Sous total</p>
                        <p class="py-2 border-b">Réduction</p>
                        <p class="py-2 ">Total</p>
                    </div>
                    <div class="text-center">
                        <p class="py-2 border-b"><?php if ($cart): ?><?= $cart->getTotalCartPrice() ?><?php endif; ?>€</p>
                        <p class="py-2 border-b">0%</p>
                        <p class="py-2 font-medium"><?php if ($cart): ?><?= $cart->getTotalCartPriceAfterDiscount() ?><?php endif; ?>€</p>
                    </div>

                </div>
                <a href="#">
                    <div class="bg-blue-700 rounded-b-lg text-white hover:bg-blue-800 font-medium text-sm px-2 py-3 text-center">
                        Valider le panier
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
