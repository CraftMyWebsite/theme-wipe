<?php

use CMW\Manager\Env\EnvManager;
use CMW\Model\Users\UsersModel;
use CMW\Utils\Website;

$title = Website::getName() . ' - Shop';
$description = 'Visitez notre shop ';

?>
Item
<a href="<?=Website::getProtocol()?>://<?=$_SERVER["SERVER_NAME"]?><?=EnvManager::getInstance()->getValue("PATH_SUBFOLDER")?>shop/add_to_cart/36/<?= UsersModel::getCurrentUser()->getId() ?>">Ajouter au panier</a>