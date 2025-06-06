<?php

use CMW\Manager\Security\SecurityManager;
use CMW\Utils\Website;

/* @var CMW\Entity\Shop\Carts\ShopCartItemEntity[] $cartContent */
/* @var CMW\Entity\Shop\Deliveries\ShopDeliveryUserAddressEntity $selectedAddress */
/* @var CMW\Entity\Shop\Shippings\ShopShippingEntity[] $shippings */
/* @var CMW\Entity\Shop\Shippings\ShopShippingEntity[] $withdrawPoints */
/* @var \CMW\Model\Shop\Image\ShopImagesModel $defaultImage */
/* @var \CMW\Entity\Shop\Discounts\ShopDiscountEntity [] $appliedCartDiscounts*/
/* @var bool $useInteractiveMap */

Website::setTitle("Boutique - Tunnel de commande");
Website::setDescription("Méthode de livraison");

?>

<section class="bg-gray-800 relative text-white">
    <img data-cmw-attr="src:home-hero:hero_img_bg" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
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
                                <?= $selectedAddress->getFormattedCountry() ?>
                            </div>
                    </div>
                </div>
            <div class="container mx-auto rounded-md shadow-lg p-4 h-fit mt-4">
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase">Expédition / Point de retrait</h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                <form id="toPayment" action="command/toPayment" method="post">
                    <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                    <?php if (!empty($shippings)): ?>
                    <h4>Expédition</h4>
                    <small>Recevez vos colis directement chez vous</small>
                    <?php foreach ($shippings as $shipping): ?>
                        <div class="bg-gray-100 rounded-lg p-3 mb-2">
                            <div class="flex flex-wrap justify-between">
                                <div>
                                    <label>
                                    <input name="shippingId" type="radio" value="<?= $shipping->getId() ?>"> <?= $shipping->getName() ?>
                                    </label>
                                </div>
                                <div>
                                    <b><?= $shipping->getPriceFormatted() ?></b>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <hr>
                    <?php endif; ?>
                    <?php if (!empty($withdrawPoints)): ?>
                        <h4>Point de retrait</h4>
                        <small>Venez chercher votre colis dans nos points de distribution</small>
                    <div class="<?= $useInteractiveMap ? 'lg:grid grid-cols-3 gap-4' : '' ?>">
                        <div>
                            <?php foreach ($withdrawPoints as $withdrawPoint): ?>
                                <div class="bg-gray-100 rounded-lg p-3 mb-2">
                                    <div class="flex flex-wrap justify-between">
                                        <div>
                                            <label>
                                                <input name="shippingId" type="radio" value="<?= $withdrawPoint->getId() ?>" data-id="<?= $withdrawPoint->getId() ?>" class="withdraw-radio"> <?= $withdrawPoint->getName() ?>
                                            </label>
                                        </div>
                                        <div>
                                            <b><?= $withdrawPoint->getPriceFormatted() ?></b>
                                        </div>
                                    </div>
                                    Distance du point : <b><?= $withdrawPoint->getDistance($selectedAddress->getLatitude(), $selectedAddress->getLongitude()) ?> km</b>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if ($useInteractiveMap): ?>
                        <div class="col-span-2">
                            <div id="map" style="height: 400px; border: 1px solid #cdc9c9; border-radius: 12px"></div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </form>
            </div>
            <div class="flex justify-between mt-4">
                <form action="command/toAddress" method="post">
                    <?php SecurityManager::getInstance()->insertHiddenToken() ?>
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
                    <div class="flex flex-wrap justify-between items-center">
                        <div>
                            <table>
                                <td class="py-2">
                                    <?php if ($cart->getFirstImageItemUrl() !== "/Public/Uploads/Shop/0"): ?>
                                        <img class="mx-auto" style="width: 3rem; height: 3rem; object-fit: cover"
                                             src="<?= $cart->getFirstImageItemUrl() ?>" alt="Panier">
                                    <?php else: ?>
                                        <img class="mx-auto" style="width: 3rem; height: 3rem; object-fit: cover"
                                             src="<?= $defaultImage ?>" alt="Panier">
                                    <?php endif; ?>
                                </td>
                                <td class="py-4 px-6 font-semibold text-gray-900">
                                    <?= $cart->getQuantity() ?> <?= $cart->getItem()->getName() ?>
                                </td>
                            </table>
                        </div>
                        <div>
                            <?php if ($cart->getDiscount()): ?>
                                <s><?= $cart->getItemTotalPriceFormatted() ?></s> <span class="font-semibold"><?= $cart->getItemTotalPriceAfterDiscountFormatted() ?></span>
                            <?php else: ?>
                                <span class="font-semibold"><?= $cart->getItemTotalPriceFormatted() ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if (!empty($appliedCartDiscounts)): ?>
                    <h4 class="text-center mt-4">Réduction :</h4>
                    <?php foreach ($appliedCartDiscounts as $appliedCartDiscount): ?>
                        <div class="flex flex-wrap justify-between">
                            <span><?= $appliedCartDiscount->getCode() ?></span>
                            <span><b>-<?= $appliedCartDiscount->getPriceFormatted() ?></b></span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <h4 class="text-center mt-4">Total</h4>
                <h4 class="text-center font-bold"><?= $cart->getTotalCartPriceAfterDiscountFormatted() ?></h4>
            </div>
        </div>
    </div>
</section>