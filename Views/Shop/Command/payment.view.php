<?php

use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Shop\Setting\ShopSettingsModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Shop\Carts\ShopCartItemEntity[] $cartContent */
/* @var CMW\Entity\Shop\Deliveries\ShopDeliveryUserAddressEntity $selectedAddress */
/* @var CMW\Entity\Shop\Shippings\ShopShippingEntity $shippingMethod */
/* @var \CMW\Interface\Shop\IPaymentMethod[] $paymentMethods */
/* @var \CMW\Model\Shop\Image\ShopImagesModel $defaultImage */
/* @var \CMW\Entity\Shop\Discounts\ShopDiscountEntity [] $appliedCartDiscounts*/

Website::setTitle("Boutique - Tunnel de commande");
Website::setDescription("Méthode de paiement");

?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::getInstance()->fetchImageLink("hero_img_bg") ?>"
         class="absolute h-full inset-0 object-center object-cover w-full"
         alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
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
                            <h2 class="font-semibold text-2xl uppercase">Adresse de livraison / facturation</h2>
                        </div>
                        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    </div>
                    <div class="flex flex-wrap justify-center">
                        <div class="shadow p-2 w-1/2 text-center">
                            <?= $selectedAddress->getLabel() ?><br>
                            <b><?= $selectedAddress->getFirstName() . " " . $selectedAddress->getLastName() ?></b> <?= $selectedAddress->getPhone() ?>
                            <br>
                            <?= $selectedAddress->getLine1() ?><br>
                            <?= $selectedAddress->getLine2() ?>
                            <?= $selectedAddress->getPostalCode() . " " . $selectedAddress->getCity() ?><br>
                            <?= $selectedAddress->getFormattedCountry() ?>
                        </div>
                    </div>
                </div>
                <form id="payment" action="command/finalize" method="post">
                    <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                    <div class="container mx-auto rounded-md shadow-lg p-4 h-fit mt-4">
                        <div class="flex flex-no-wrap justify-center items-center py-4">
                            <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                            <div class="px-10 w-auto">
                                <h2 class="font-semibold text-2xl uppercase">Méthode de paiement</h2>
                            </div>
                            <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                        </div>
                        <?php if (!empty($paymentMethods)): ?>
                        <?php foreach ($paymentMethods as $paymentMethod): ?>
                            <div class="bg-gray-100 rounded-lg p-3 mb-2">
                                <div class="flex flex-wrap justify-between">
                                    <div>
                                        <label>
                                            <input name="paymentName" id="paymentName" type="radio"
                                                   value="<?= $paymentMethod->varName() ?>" required>
                                            <?= $paymentMethod->faIcon("fa-xl text-blue-600") ?> <?= $paymentMethod->name() ?>
                                        </label>
                                    </div>
                                    <div>
                                        <b>Frais <span id="fee_<?= $paymentMethod->varName() ?>"><?= $paymentMethod->getFeesFormatted() ?></span></b>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p>Aucun moyen de paiement actif ou compatible !</p>
                        <?php endif; ?>
                    </div>
                </form>
                <div class="flex justify-between mt-4">
                    <form action="command/toShipping" method="post">
                        <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                        <button type="submit"  class="inline-flex items-center py-2 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Précedent</button>
                    </form>

                    <button id="payment-button" form="payment" type="submit"
                            class="inline-flex items-center py-2 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Payer
                    </button>
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

                <?php if (!is_null($shippingMethod)): ?>
                <h4 class="text-center mt-4">Livraison</h4>
                <div class="flex flex-wrap justify-between">
                    <span><?= $shippingMethod->getName() ?></span>
                    <span><b><?= $shippingMethod->getPriceFormatted() ?></b></span>
                </div>
                <?php endif; ?>
                <h4 class="text-center mt-4">Total</h4>
                <h4 class="text-center font-bold" id="total"><?= $cart->getTotalPriceCompleteFormatted() ?></h4>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById("payment").addEventListener("submit", function(event) {
        const button = document.getElementById("payment-button");
        button.disabled = true;
        button.innerHTML = `
        <i style="margin-right: 10px" class="fa-solid fa-sack-dollar fa-bounce"></i> Paiement en cours...
    `;
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentMethods = document.querySelectorAll('input[name="paymentName"]');
        const totalElement = document.getElementById('total');
        const originalTotal = parseFloat("<?= str_replace(',', '.', $cart->getTotalPriceCompleteFormatted()) ?>");

        const currencySymbol = "<?= ShopSettingsModel::getInstance()->getSettingValue('symbol') ?>";
        const symbolIsAfter = <?= ShopSettingsModel::getInstance()->getSettingValue('after') ? 'true' : 'false' ?>;

        function formatPrice(price) {
            if (symbolIsAfter) {
                return price.toFixed(2) + currencySymbol;
            } else {
                return currencySymbol  + price.toFixed(2);
            }
        }

        function updateTotal() {
            let selectedPaymentMethod = document.querySelector('input[name="paymentName"]:checked');
            if (selectedPaymentMethod) {
                const methodId = selectedPaymentMethod.value;
                const feeElement = document.getElementById(`fee_${methodId}`);
                if (feeElement) {
                    const fee = parseFloat(feeElement.textContent.replace(/[^\d.]/g, ''));
                    const newTotal = originalTotal + (fee || 0);
                    totalElement.textContent = formatPrice(newTotal);
                }
            }
        }

        paymentMethods.forEach(method => {
            method.addEventListener('change', updateTotal);
        });
    });
</script>