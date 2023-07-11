<?php

use CMW\Manager\Env\EnvManager;
use CMW\Utils\Website;

/* @var CMW\Model\Shop\ShopCategoriesModel $categories */
/* @var CMW\Model\Shop\ShopItemsModel $items */
/* @var CMW\Model\Shop\ShopImagesModel $imagesItem */

$title = Website::getWebsiteName() . ' - Shop';
$description = 'Visitez notre shop ';

?>

<a href="<?= Website::getProtocol() ?>://<?=  $_SERVER["SERVER_NAME"]?><?=  EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>shop/cart">Voir mon panier</a>

<?php foreach ($items->getShopItems() as $item): ?>
    <p><?= $item->getName() ?> - <?= $item->getPrice() ?>€</p>
<a href="<?= $item->getAddToCartLink() ?>">Ajouter au panier</a>
<br><br><br>
<?php endforeach; ?>
