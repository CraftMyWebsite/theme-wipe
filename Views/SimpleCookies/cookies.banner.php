<?php

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Simplecookies\SimpleCookiesModel;

//Import the SimpleCookies settings
$settings = SimpleCookiesModel::getInstance()->getSettings();

?>
<div class="w-64 lg:w-96" style="position: fixed;bottom: 20px;right: 15px;  background: rgba(241,237,186,0.8); border: 1px #938787 solid; border-radius: 10px; padding: .9rem">
    <h4><i class="fa-solid fa-cookie-bite"></i> <?= $settings->getBannerTitle() ?></h4>

    <small><?= $settings->getPageContent() ?></small>

    <form style="display: flex; justify-content: center; margin-top: 5px" action="<?= EnvManager::getInstance()->getValue('PATH_URL') . 'api/cookies/consent' ?>" method="post">
        <?php SecurityManager::getInstance()->insertHiddenToken(); ?>
        <button type="submit" name="consent" style="padding: .2rem .6rem .2rem .6rem; background-color: #2141e1; border-radius: 5px;" class="text-white" value="1">Ok</button>
    </form>
</div>