<?php

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Utils\Website;

/* @var CMW\Model\Shop\Category\ShopCategoriesModel $categoryModel */
/* @var \CMW\Entity\Shop\Items\ShopItemEntity [] $items */
/* @var CMW\Model\Shop\Review\ShopReviewsModel $review */
/* @var CMW\Model\Shop\Image\ShopImagesModel $imagesItem */
/* @var \CMW\Model\Shop\Image\ShopImagesModel $defaultImage */
/* @var \CMW\Model\Shop\Setting\ShopSettingsModel $allowReviews */
/* @var CMW\Entity\Shop\Categories\ShopCategoryEntity|null $thisCat */

Website::setTitle('Boutique');
Website::setDescription('Découvrez la boutique !');

?>

<section class="bg-gray-800 relative text-white">
    <img data-cmw-attr="src:home-hero:hero_img_bg"
         class="absolute h-full inset-0 object-center object-cover w-full"
         alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Boutique</h1>
            </div>
        </div>
    </div>
</section>

<section class="bg-white rounded-lg shadow my-8 sm:mx-12 lg:mx-60">
    <div class="container p-4">

        <div class="flex flex-wrap justify-between border-t border-b py-2">
            <div>
                <select onchange="location = this.value;"
                        class="block pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    <option selected
                            value="<?= Website::getProtocol() . '://' . $_SERVER['SERVER_NAME'] . EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'shop' ?>">
                        Catégorie : Tout afficher
                    </option>
                    <?php foreach ($categoryModel->getShopCategories() as $category): ?>
                        <option <?= $category->getName() === $thisCat?->getName() ? 'selected' : '' ?>
                            value="<?= $category->getCatLink() ?>">Catégorie : <?= $category->getName() ?></option>
                        <?php foreach ($categoryModel->getSubsCat($category->getId()) as $subCategory): ?>
                            <option <?= $subCategory->getSubCategory()->getName() === $thisCat?->getName() ? 'selected' : '' ?>
                                value="<?= $subCategory->getSubCategory()->getCatLink() ?>"> <?php echo str_repeat("\u{00A0}\u{00A0}", $subCategory->getDepth()) . ' Sous-Cat :  ' . $subCategory->getSubCategory()->getName() ?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="flex hidden xl:block">
                <form action="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>shop/search" method="post">
                    <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                    <div class="relative w-full lg:w-96">
                        <input name="for" type="search" id="search-dropdown"
                               class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Rechercher" required>
                        <button type="submit"
                                class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="py-4 flex flex-wrap">
            <?php if (empty($items)) : ?>
                <h3>Aucun article trouvé !</h3>
            <?php else: ?>
                <?php foreach ($items as $item): ?>
                    <div class="relative w-full xl:w-1/2 2xl:w-1/4 mt-4 mb-5 2xl:mb-0 px-4 hover:scale-105 transition">
                        <?php if ($item->getDiscountImpactDefaultApplied()): ?>
                            <div
                                style="z-index: 5000; position: absolute; top: 0; left: 0; transform: translate(5%, 10%) rotate(-10deg); background-color: #f44336; color: white; padding: 8px 16px; border-radius: 0 16px 0 16px;">
                                <p class="text-center"><?= $item->getDiscountImpactDefaultApplied() ?></p>
                            </div>
                        <?php endif; ?>
                        <div>
                            <div class="rounded-t border-t border-l border-r border-gray-200 p-4">

                                <?php $getImagesItem = $imagesItem->getShopImagesByItem($item->getId());
                                $v = 0;
                                foreach ($getImagesItem as $countImage) {
                                    $v++;
                                } ?>
                                <?php if ($getImagesItem): ?>
                                    <?php if ($v !== 1): ?>
                                        <div id="indicators-carousel" class="relative w-full" data-carousel="static">
                                            <!-- Carousel wrapper -->
                                            <div class="relative h-56 overflow-hidden rounded-lg md:h-48">
                                                <!-- Item 1 -->
                                                <?php $x = 0;
                                                foreach ($getImagesItem as $imagesUrl): ?>
                                                    <div class="hidden duration-700 ease-in-out"
                                                         data-carousel-item="<?php if ($x === 0): ?>active<?php endif; ?>">
                                                        <img src="<?= $imagesUrl->getImageUrl() ?>"
                                                             class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                                             alt="...">
                                                    </div>
                                                    <?php $x++;
                                                endforeach; ?>
                                            </div>
                                            <!-- Slider indicators -->
                                            <div
                                                class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                                                <?php $i = 0;
                                                foreach ($getImagesItem as $imageId): ?>
                                                    <button type="button" class="w-3 h-3 rounded-full"
                                                            aria-current="<?php if ($i === 0): ?>true<?php endif; ?>"
                                                            aria-label="Slide 1"
                                                            data-carousel-slide-to="<?= $i ?>"></button>
                                                    <?php $i++;
                                                endforeach; ?>
                                            </div>
                                            <!-- Slider controls -->
                                            <button type="button"
                                                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                                    data-carousel-prev>
                                        <span
                                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="M5 1 1 5l4 4"/>
                                            </svg>
                                            <span class="sr-only">Previous</span>
                                        </span>
                                            </button>
                                            <button type="button"
                                                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                                    data-carousel-next>
                                        <span
                                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="m1 9 4-4-4-4"/>
                                            </svg>
                                            <span class="sr-only">Next</span>
                                        </span>
                                            </button>
                                        </div>

                                    <?php else: ?>
                                        <?php foreach ($imagesItem->getShopImagesByItem($item->getId()) as $imageUrl): ?>
                                            <img class="mx-auto h-48"
                                                 src="<?= $imageUrl->getImageUrl() ?>">
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <img class="mx-auto h-48"
                                         src="<?= $defaultImage ?>">
                                <?php endif; ?>
                                <a href="<?= $item->getItemLink() ?>"><h4
                                        class="text-center"><?= $item->getName() ?></h4>
                                    <?php if ($allowReviews): ?>
                                        <div class="flex justify-center items-center">
                                            <?= $review->getStars($item->getId()) ?>
                                            <span class="mx-1 "></span>
                                            <p class="text-sm font-medium text-gray-900 underline"><?= $review->countTotalRatingByItemId($item->getId()) ?>
                                                avis</p>
                                        </div>
                                    <?php endif; ?>

                                    <p><?= $item->getShortDescription() ?></p>
                                    <p class="text-xs text-center hover:text-blue-600">Lire la suite</p></a>
                            </div>
                            <div class="grid grid-cols-2 border rounded-b py-2">
                                <?php if ($item->getPriceDiscountDefaultApplied()): ?>
                                    <p class="text-center"><s><?= $item->getPriceFormatted() ?></s> <b
                                            class="text-xl"><?= $item->getPriceDiscountDefaultAppliedFormatted() ?></b>
                                    </p>
                                <?php else: ?>
                                    <p class="text-center text-xl"><?= $item->getPriceFormatted() ?></p>
                                <?php endif; ?>

                                <a href="<?= $item->getAddToCartLink() ?>"
                                   class="border-l text-center text-2xl hover:text-blue-600"><i
                                        class="fa-solid fa-cart-plus"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
