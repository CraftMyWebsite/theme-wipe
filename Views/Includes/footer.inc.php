
<?php
use CMW\Controller\Core\CoreController;
use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/** @var CoreController $core */
?>

<div class="border-t-2 text-sm mt-auto">
    <div class="flex flex-wrap  items-center">
        <div class="px-6 py-6 md:flex-1">
            <p>Copyright © <?= date('Y') ?><br>Par <b><a href="https://craftmywebsite.fr/" target="_blank">CraftMyWebsite</a></b> pour <b><?= Website::getWebsiteName() ?></b></p>
            <p class="hidden">Credit thème : Z0mblard</p>
        </div>
        <div data-cmw-visible="footer:footer_active_condition" class="px-6 py-6 md:flex-1">
            <p data-cmw="footer:footer_title_condition"></p><br>
                <b><a data-cmw="footer:footer_desc_condition_use" href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>cgu"></a></b>
                 / 
                 <b><a data-cmw="footer:footer_desc_condition_sale" href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>cgv"></a></b>
             </p>
        </div>
        <div class="px-4 py-2 w-full sm:w-auto">
            <div class="flex-wrap inline-flex space-x-3">
                <a data-cmw-visible="footer:footer_active_facebook" data-cmw-attr="href:footer:footer_link_facebook" <?php if (ThemeModel::getInstance()->fetchConfigValue('footer','footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                    <i data-cmw-class="footer:footer_icon_facebook" class="fa-xl"></i>
                </a>
                <a data-cmw-visible="footer:footer_active_x" data-cmw-attr="href:footer:footer_link_x" <?php if (ThemeModel::getInstance()->fetchConfigValue('footer','footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                    <i data-cmw-class="footer:footer_icon_x" class="fa-xl"></i>
                </a>
                <a data-cmw-visible="footer:footer_active_instagram" data-cmw-attr="href:footer:footer_link_instagram" <?php if (ThemeModel::getInstance()->fetchConfigValue('footer','footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                    <i data-cmw-class="footer:footer_icon_instagram" class="fa-xl"></i>
                </a>
                <a data-cmw-visible="footer:footer_active_discord" data-cmw-attr="href:footer:footer_link_discord" <?php if (ThemeModel::getInstance()->fetchConfigValue('footer','footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                    <i data-cmw-class="footer:footer_icon_discord" class="fa-xl"></i>
                </a>
            </div>
        </div>
    </div>
</div>


