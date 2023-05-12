
<?php use CMW\Controller\Core\CoreController;
use CMW\Manager\Views\View;
use CMW\Utils\Utils;
use CMW\Model\Core\ThemeModel;
/** @var CoreController $core */
/**@var  array $includes*/?>

<div class="border-t-2 text-sm mt-auto">
    <div class="flex flex-wrap  items-center">
        <div class="px-6 py-6 md:flex-1">
            <p>Copyright © <?= ThemeModel::fetchConfigValue('footer_year') ?><br>Par <b><a href="https://craftmywebsite.fr/" target="_blank">CraftMyWebsite</a></b> pour <b><?= Utils::getSiteName()?></b></p>
            <p class="hidden">Credit thème : Z0mblard</p>
        </div>
        <?php if(ThemeModel::fetchConfigValue('footer_active_condition')): ?>
        <div class="px-6 py-6 md:flex-1">
            <p><?= ThemeModel::fetchConfigValue('footer_title_condition') ?><br>
                <b><a href="<?= Utils::getEnv()->getValue("PATH_SUBFOLDER") ?>cgu"><?= ThemeModel::fetchConfigValue('footer_desc_condition_use') ?></a></b>
                 / 
                 <b><a href="<?= Utils::getEnv()->getValue("PATH_SUBFOLDER") ?>cgv"><?= ThemeModel::fetchConfigValue('footer_desc_condition_sale') ?></a></b>
             </p>
        </div>
        <?php endif; ?>
        <div class="px-4 py-2 w-full sm:w-auto">
            <div class="flex-wrap inline-flex space-x-3">
                <?php if(ThemeModel::fetchConfigValue('footer_active_facebook')): ?>
                <a href="<?= ThemeModel::fetchConfigValue('footer_link_facebook') ?>" <?php if(ThemeModel::fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                    <i class="fa-xl <?= ThemeModel::fetchConfigValue('footer_icon_facebook') ?>"></i>
                </a>
                <?php endif; ?>
                <?php if(ThemeModel::fetchConfigValue('footer_active_twitter')): ?>
                <a href="<?= ThemeModel::fetchConfigValue('footer_link_twitter') ?>" <?php if(ThemeModel::fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                    <i class="fa-xl <?= ThemeModel::fetchConfigValue('footer_icon_twitter') ?>"></i>
                </a>
                <?php endif; ?>
                <?php if(ThemeModel::fetchConfigValue('footer_active_instagram')): ?>
                <a href="<?= ThemeModel::fetchConfigValue('footer_link_instagram') ?>" <?php if(ThemeModel::fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                    <i class="fa-xl <?= ThemeModel::fetchConfigValue('footer_icon_instagram') ?>"></i>
                </a>
                <?php endif; ?>
                <?php if(ThemeModel::fetchConfigValue('footer_active_discord')): ?>
                <a href="<?= ThemeModel::fetchConfigValue('footer_link_discord') ?>" <?php if(ThemeModel::fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                    <i class="fa-xl <?= ThemeModel::fetchConfigValue('footer_icon_discord') ?>"></i>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
View::loadInclude($includes, "afterScript");
?>