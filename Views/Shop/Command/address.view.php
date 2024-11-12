<?php

use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Shop\Carts\ShopCartItemEntity[] $cartContent */
/* @var CMW\Entity\Shop\Country\ShopCountryEntity[] $country */
/* @var CMW\Entity\Shop\Deliveries\ShopDeliveryUserAddressEntity[] $userAddresses */
/* @var \CMW\Model\Shop\Image\ShopImagesModel $defaultImage */
/* @var \CMW\Entity\Shop\Discounts\ShopDiscountEntity [] $appliedCartDiscounts*/

Website::setTitle("Boutique - Tunnel de commande");
Website::setDescription("Adresse de facturation et livraison");

?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::getInstance()->fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
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
            <form action="command/toDelivery" method="post">
                <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                <div class="container mx-auto rounded-md shadow-lg p-4 h-fit">
                    <div class="flex flex-no-wrap justify-center items-center py-4">
                        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                        <div class="px-10 w-auto">
                            <h2 class="font-semibold text-2xl uppercase">Mes Adresses</h2>
                        </div>
                        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    </div>
                        <div class="lg:grid lg:grid-cols-3 gap-6">
                                <?php foreach ($userAddresses as $userAddress): ?>
                                <div class="shadow p-2">
                                    <input value="<?= $userAddress->getId() ?>" name="addressId" type="radio" <?php if ($userAddress->getIsFav()) {echo "checked";} ?>>
                                    <?= $userAddress->getLabel() ?><br>
                                    <b><?= $userAddress->getFirstName() . " " . $userAddress->getLastName() ?></b><br>
                                    <?= $userAddress->getPhone() ?><br>
                                    <?= $userAddress->getLine1() ?><br>
                                    <?= $userAddress->getLine2() ?>
                                    <?= $userAddress->getPostalCode() . " " . $userAddress->getCity() ?><br>
                                    <?= $userAddress->getFormattedCountry() ?>
                                </div>
                                <?php endforeach; ?>
                        </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit"  class="inline-flex items-center py-2 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Suivant</button>
                </div>
            </form>
            <div class="container mx-auto rounded-md shadow-lg p-4 h-fit mt-4">
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase">Nouvelle adresse</h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                    <form action="command/addAddress" method="post">
                        <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                        <div class="bg-gray-100 rounded-lg p-3">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input name="fav" value="1" id="fav" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50" >
                                </div>
                                <label for="fav" class="ml-2 text-sm font-medium text-gray-900">Définir comme favoris</label>
                            </div>
                            <div>
                                <label for="address_label" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de l'adresse <small>(Optionnel)</small> :</label>
                                <input name="address_label" id="address_label" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Domicile">
                            </div>
                            <div class="grid gap-6 mb-4 md:grid-cols-3 mt-4">
                                <div>
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom<span class="text-red-500">*</span> :</label>
                                    <input name="first_name" id="first_name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Jean" required>
                                </div>
                                <div>
                                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom<span class="text-red-500">*</span> :</label>
                                    <input name="last_name" type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Dupont">
                                </div>
                                <div>
                                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone<span class="text-red-500">*</span> :</label>
                                    <input name="phone" type="text" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="+33 601020304">
                                </div>
                            </div>
                            <div>
                                <label for="line_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse<span class="text-red-500">*</span> :</label>
                                <input name="line_1" id="line_1" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="12 avenue du paradis" required>
                            </div>
                            <div class="mt-2">
                                <label for="line_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Complément d'adresse <small>(Optionnel)</small> :</label>
                                <input name="line_2" id="line_2" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Bâtiment D" >
                            </div>
                            <div class="grid gap-6 mb-4 md:grid-cols-3 mt-4">
                                <div>
                                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ville<span class="text-red-500">*</span> :</label>
                                    <input name="city" id="city" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Paradis" required>
                                </div>
                                <div>
                                    <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code postale<span class="text-red-500">*</span> :</label>
                                    <input name="postal_code" type="text" id="postal_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="00001">
                                </div>
                                <div>
                                    <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pays<span class="text-red-500">*</span> :</label>
                                    <select name="country" id="country"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <?php foreach ($country as $countryEntity) : ?>
                                            <option value="<?= $countryEntity->getCode() ?>">
                                                <?= $countryEntity->getName() ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center mt-4">
                            <button type="submit"  class="inline-flex items-center py-2 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Ajouter</button>
                        </div>
                    </form>
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

