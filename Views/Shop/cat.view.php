<?php

use CMW\Utils\Website;

/* @var CMW\Entity\Shop\ShopItemEntity[] $items */

$title = Website::getWebsiteName() . ' - Catégorie';
$description = 'Visitez notre shop ';

?>
Categorie

<?php foreach ($items as $item): ?>
<p><?= $item->getName() ?></p>
<a href="<?= $item->getItemLink() ?>">Allez voir</a>
<br>
<?php endforeach;?>
