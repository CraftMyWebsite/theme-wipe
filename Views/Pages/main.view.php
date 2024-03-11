<?php

/* @var \CMW\Entity\Pages\PageEntity $page */
/* @var \CMW\Model\Pages\PagesModel $pages */
/* @var \CMW\Controller\CoreController $core */
/* @var \CMW\Controller\Menus\MenusController $menu */
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

Website::setTitle(ucfirst($page->getTitle()));
Website::setDescription(ucfirst($page->getTitle()));
?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::getInstance()->fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl"><?= ucfirst($page->getTitle())?></h1>
            </div>
        </div>
    </div>
</section>

    <section>
        <div class="px-2 md:px-24 xl:px-48 2xl:px-72 mt-4 mb-4">
            <div class="container mx-auto rounded-md shadow-lg p-8">
            <?= $page->getConverted() ?>
        </div>
        </div>
    </section>

