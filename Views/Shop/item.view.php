<?php

use CMW\Utils\Website;

/* @var CMW\Entity\Shop\ShopItemEntity[] $otherItemsInThisCat */
/* @var CMW\Entity\Shop\ShopItemEntity $item */

$title = Website::getName() . ' - Article';
$description = 'Visitez notre shop ';

?>
Item
<?= $item->getName() ?>
