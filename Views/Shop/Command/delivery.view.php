<?php

use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Shop\ShopCartEntity[] $cartContent */
/* @var CMW\Entity\Shop\ShopDeliveryUserAddressEntity $selectedAddress */
/* @var CMW\Entity\Shop\ShopShippingEntity[] $shippings */

Website::setTitle("Boutique - Tunnel de commande");
Website::setDescription("Méthode de livraison");

?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Commander</h1>
            </div>
        </div>
    </div>
</section>

<section class="px-2 md:px-24 xl:px-48 2xl:px-72 py-6">
    <div class="lg:grid lg:grid-cols-3 gap-6">
        <div class="col-span-2 mt-4 lg:mt-0">
                <div class="container mx-auto rounded-md shadow-lg p-4 h-fit">
                    <div class="flex flex-no-wrap justify-center items-center py-4">
                        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                        <div class="px-10 w-auto">
                            <h2 class="font-semibold text-2xl uppercase">Adresse de livraison</h2>
                        </div>
                        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    </div>
                    <div class="flex flex-wrap justify-center">
                            <div class="shadow p-2 w-1/2 text-center">
                                <?= $selectedAddress->getLabel() ?><br>
                                <b><?= $selectedAddress->getFirstName() . " " . $selectedAddress->getLastName() ?></b> <?= $selectedAddress->getPhone() ?><br>
                                <?= $selectedAddress->getLine1() ?><br>
                                <?= $selectedAddress->getLine2() ?>
                                <?= $selectedAddress->getPostalCode() . " " . $selectedAddress->getCity() ?><br>
                                <?= $selectedAddress->getCountry() ?>
                            </div>
                    </div>
                </div>
            <div class="container mx-auto rounded-md shadow-lg p-4 h-fit mt-4">
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase">Expédition</h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                <form id="toPayment" action="command/toPayment" method="post">
                    <?php (new SecurityManager())->insertHiddenToken() ?>
                    <?php foreach ($shippings as $shipping): ?>
                        <div class="bg-gray-100 rounded-lg p-3 mb-2">
                            <div class="flex flex-wrap justify-between">
                                <div>
                                    <label>
                                    <input name="shippingId" type="checkbox" value="<?= $shipping->getId() ?>"> <?= $shipping->getName() ?>
                                    </label>
                                </div>
                                <div>
                                    <b><?= $shipping->getPrice() ?> €</b>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
            <div class="flex justify-between mt-4">
                <form action="command/toAddress" method="post">
                    <?php (new SecurityManager())->insertHiddenToken() ?>
                    <button type="submit"  class="inline-flex items-center py-2 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Précedent</button>
                </form>
                <button form="toPayment" type="submit" class="inline-flex items-center py-2 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Suivant</button>
            </div>
        </div>

        <div>
            <div class="container mx-auto rounded-md shadow-lg p-4 h-fit">
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase">Vos articles</h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                <?php foreach ($cartContent as $cart): ?>
                    <table>
                        <td class="py-2">
                            <?php if ($cart->getFirstImageItemUrl() !== "/Public/Uploads/Shop/0"): ?>
                                <img class="mx-auto" style="width: 3rem; height: 3rem; object-fit: cover"
                                     src="<?= $cart->getFirstImageItemUrl() ?>" alt="Panier">
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-6 font-semibold text-gray-900">
                            <?= $cart->getItem()->getName() ?>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex justify-center">
                                <b><?= $cart->getQuantity() ?></b>
                            </div>
                        </td>
                        <td class="font-semibold text-black py-4 px-6">
                            <?= $cart->getTotalPrice() ?>€
                        </td>
                    </table>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>