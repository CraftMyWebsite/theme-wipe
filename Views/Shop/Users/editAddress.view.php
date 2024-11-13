<?php

use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Shop\Deliveries\ShopDeliveryUserAddressEntity $userAddress */
/* @var CMW\Entity\Shop\Country\ShopCountryEntity[] $country */

Website::setTitle('Boutique - Paramètres');
Website::setDescription('Gérer vos paramètres de boutique');

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
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase">Édition de <?= $userAddress->getLabel() ?></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="container mx-auto rounded-md shadow-lg p-4 h-fit mt-4">
        <form action="" method="post">
            <?php SecurityManager::getInstance()->insertHiddenToken() ?>
            <div class="bg-gray-100 rounded-lg p-3">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input <?= $userAddress->getIsFav() ? 'checked' : '' ?> name="fav" value="1" id="fav" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50" >
                    </div>
                    <label for="fav" class="ml-2 text-sm font-medium text-gray-900">Définir comme favoris</label>
                </div>
                <div>
                    <label for="address_label" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de l'adresse <small>(Optionnel)</small> :</label>
                    <input value="<?= $userAddress->getLabel() ?>" name="address_label" id="address_label" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Domicile">
                </div>
                <div class="grid gap-6 mb-4 md:grid-cols-3 mt-4">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom<span class="text-red-500">*</span> :</label>
                        <input value="<?= $userAddress->getFirstName() ?>" name="first_name" id="first_name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Jean" required>
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom<span class="text-red-500">*</span> :</label>
                        <input value="<?= $userAddress->getLastName() ?>" name="last_name" type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Dupont">
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone<span class="text-red-500">*</span> :</label>
                        <input value="<?= $userAddress->getPhone() ?>" name="phone" type="text" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="+33 601020304">
                    </div>
                </div>
                <div>
                    <label for="line_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse<span class="text-red-500">*</span> :</label>
                    <input value="<?= $userAddress->getLine1() ?>" name="line_1" id="line_1" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="12 avenue du paradis" required>
                </div>
                <div class="mt-2">
                    <label for="line_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Complément d'adresse <small>(Optionnel)</small> :</label>
                    <input value="<?= $userAddress->getLine2() ?>" name="line_2" id="line_2" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Bâtiment D" >
                </div>
                <div class="grid gap-6 mb-4 md:grid-cols-3 mt-4">
                    <div>
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ville<span class="text-red-500">*</span> :</label>
                        <input value="<?= $userAddress->getCity() ?>" name="city" id="city" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Paradis" required>
                    </div>
                    <div>
                        <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code postale<span class="text-red-500">*</span> :</label>
                        <input value="<?= $userAddress->getPostalCode() ?>" name="postal_code" type="text" id="postal_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="00001">
                    </div>
                    <div>
                        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pays<span class="text-red-500">*</span> :</label>
                        <select name="country" id="country"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <?php foreach ($country as $countryEntity) : ?>
                                <option <?= $userAddress->getCountry() === $countryEntity->getCode() ? 'selected' : '' ?> value="<?= $countryEntity->getCode() ?>">
                                    <?= $countryEntity->getName() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-4">
                <button type="submit"  class="inline-flex items-center py-2 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Modifier</button>
            </div>
        </form>
    </div>
</section>