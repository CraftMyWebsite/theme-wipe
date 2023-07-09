<?php

use CMW\Utils\Website;

/* @var CMW\Entity\Shop\ShopCartEntity[] $cartContent */

$title = Website::getName() . ' - Panier';
$description = 'Visitez notre shop ';

?>
Panier

<?php foreach ($cartContent as $cart): ?>
    <p><?= $cart->getItem()->getName() ?> : <a
                href="<?= $cart->getDecreaseQuantityLink() ?>">-</a> <?= $cart->getQuantity() ?>
        <a href="<?= $cart->getIncreaseQuantityLink() ?>">+</a></p>
    <p>Prix unitaire : <?= $cart->getItem()->getPrice() ?> €</p>
    <p>Prix Total : <?= $cart->getTotalPrice() ?> €</p>
    <a href="<?= $cart->getRemoveLink() ?>">Supprimé</a>
    <br>
<?php endforeach; ?>