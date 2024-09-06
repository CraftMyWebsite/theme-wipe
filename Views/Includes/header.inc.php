<?php

use CMW\Controller\Core\PackageController;
use CMW\Controller\Shop\Admin\Item\ShopItemsController;
use CMW\Controller\Shop\Admin\Payment\ShopPaymentsController;
use CMW\Controller\Users\UsersController;
use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\MenusModel;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Shop\Cart\ShopCartItemModel;
use CMW\Model\Shop\Cart\ShopCartModel;
use CMW\Model\Users\UsersModel;
use CMW\Utils\Website;

if (PackageController::isInstalled('Shop')) {
    $itemInCart = ShopCartItemModel::getInstance()->countItemsByUserId(UsersModel::getCurrentUser()?->getId(), session_id());
}

$menus = MenusModel::getInstance();
?>
<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>" class="flex items-center">
            <?php if (ThemeModel::getInstance()->fetchConfigValue('header_active_logo')): ?>
                <img src="<?= ThemeModel::getInstance()->fetchImageLink('header_img_logo') ?>" class="mr-3 h-6 sm:h-9"
                     alt="Vous devez upload logo.webp depuis votre panel !">
            <?php endif; ?>
            <?php if (ThemeModel::getInstance()->fetchConfigValue('header_active_title')): ?>
                <span class="self-center md:text-xl font-semibold whitespace-nowrap"><?= Website::getWebsiteName() ?></span>
            <?php endif; ?>
        </a>
        <div class="flex md:order-2">
            <?php if (UsersController::isUserLogged()): ?>
                <ul class="flex flex-col bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white">
                    <li id="multiLevelDropdownButton" data-dropdown-toggle="dropdown1"
                        class="cursor-pointer md:text-gray-700 hover:bg-gray-50 font-medium rounded-lg text-sm px-5 py-2.5">
                        <i class="mr-2 fa-solid fa-user"></i><?= UsersModel::getCurrentUser()->getPseudo() ?></li>
                    <div id="dropdown1" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="multiLevelDropdownButton">
                            <?php if (UsersController::isAdminLogged()): ?>
                                <li>
                                    <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>cmw-admin"
                                       target="_blank" class="block py-2 px-4 hover:bg-gray-100"><i
                                            class="fa-solid fa-screwdriver-wrench"></i> Administration</a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>profile"
                                   class="block py-2 px-4 hover:bg-gray-100"><i class="fa-regular fa-address-card"></i>
                                    Profil</a>
                            </li>
                            <?php if (PackageController::isInstalled('Shop')): ?>
                                <li>
                                    <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>shop/settings"
                                       class="block py-2 px-4 hover:bg-gray-100"><i class="fa-solid fa-gear"></i>
                                        Paramètres</a>
                                </li>
                                <li>
                                    <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>shop/history"
                                       class="block py-2 px-4 hover:bg-gray-100"><i class="fa-solid fa-clipboard-list"></i>
                                        Commandes</a>
                                </li>
                                <?php if (PackageController::isInstalled('Shopextendedtoken')): ?>
                                    <li>
                                        <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>shop/tokens"
                                           class="block py-2 px-4 hover:bg-gray-100"><?= ShopPaymentsController::getInstance()->getPaymentByVarName('extendedToken')->faIcon() ?>
                                            <?= ShopItemsController::getInstance()->getPriceTypeMethodsByVarName('extendedToken')->name() ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                        <div class="py-1">
                            <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>logout"
                               class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100"><i
                                    class="fa-solid fa-right-from-bracket"></i> Déconnexion</a>
                        </div>
                    </div>
                </ul>
            <?php else: ?>
                <?php if (ThemeModel::getInstance()->fetchConfigValue('header_allow_login_button')): ?>
                    <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>login"
                       class="md:bg-white bg-blue-700 md:hover:bg-gray-200 hover:bg-blue-800 text-white md:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2">Connexion</a>
                <?php endif; ?>
                <?php if (ThemeModel::getInstance()->fetchConfigValue('header_allow_register_button')): ?>
                    <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>register"
                       class="hidden md:inline text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 ">S'inscrire</a>
                <?php endif; ?>
            <?php endif; ?>
            <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
            <?php if (PackageController::isInstalled('Shop')): ?>
                <div>
                    <a href="<?= Website::getProtocol() ?>://<?= $_SERVER['SERVER_NAME'] ?><?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>shop/cart" class="inline-flex relative items-center p-3 text-sm font-medium text-center text-black hover:text-blue-600">
                        <i class="text-lg fa-solid fa-cart-shopping"></i>
                        <span class="sr-only">Articles</span>
                        <div class="inline-flex  absolute -top-2 -right-2 justify-center items-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full border-2 border-white dark:border-gray-900"><?= $itemInCart ?></div>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white">
                <?php foreach ($menus->getMenus() as $menu): ?>
                    <?php if ($menu->isUserAllowed()): ?>
                        <li id="multiLevelDropdownButton" data-dropdown-toggle="dropdown-<?= $menu->getId() ?>"
                            class="cursor-pointer block py-2 pr-4 pl-3
                            <?php if ($menu->urlIsActive()) { echo 'text-blue-500'; } ?>
                             rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">
                            <a href="<?= $menu->getUrl() ?>" <?= !$menu->isTargetBlank() ?: "target='_blank'" ?>
                            ><?= $menu->getName() ?></a>
                        </li>
                        <div id="dropdown-<?= $menu->getId() ?>" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                            <?php foreach ($menus->getSubMenusByMenu($menu->getId()) as $subMenu): ?>
                            <?php if ($subMenu->isUserAllowed()): ?>
                                <ul class="py-1 text-sm text-gray-700" aria-labelledby="multiLevelDropdownButton">
                                    <li>
                                        <a href="<?= $subMenu->getUrl() ?>" id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown-<?= $subMenu->getId() ?>" data-dropdown-placement="right-start" type="button" class="flex justify-between items-center py-2 px-4 w-full hover:bg-gray-100" <?= !$subMenu->isTargetBlank() ?: "target='_blank'" ?>><?= $subMenu->getName() ?></a>
                                        <?php foreach ($menus->getSubMenusByMenu($subMenu->getId()) as $subSubMenu): ?>
                                            <?php if ($subSubMenu->isUserAllowed()): ?>
                                        <div id="doubleDropdown-<?= $subMenu->getId() ?>" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(10px, 300px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="right-start">
                                            <ul class="py-1 text-sm text-gray-700" aria-labelledby="doubleDropdownButton">
                                                <li>
                                                    <a href="<?= $subSubMenu->getUrl() ?>" class="block py-2 px-4 hover:bg-gray-100" <?= !$subSubMenu->isTargetBlank() ?: "target='_blank'" ?>><?= $subSubMenu->getName() ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </li>
                            </ul>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>







