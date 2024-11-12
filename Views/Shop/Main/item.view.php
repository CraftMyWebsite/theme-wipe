<?php

use CMW\Controller\Users\UsersController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var CMW\Entity\Shop\Categories\ShopCategoryEntity $parentCat */
/* @var CMW\Entity\Shop\Items\ShopItemEntity $item */
/* @var CMW\Entity\Shop\Items\ShopItemVariantEntity[] $itemVariants */
/* @var CMW\Model\Shop\Item\ShopItemVariantValueModel $variantValuesModel */
/* @var \CMW\Model\Shop\Image\ShopImagesModel $defaultImage */
/* @var \CMW\Entity\Shop\Items\ShopItemPhysicalRequirementEntity $physicalInfo */
/* @var CMW\Model\Shop\Review\ShopReviewsModel $review */
/* @var \CMW\Model\Shop\Setting\ShopSettingsModel $allowReviews */
/* @var CMW\Entity\Shop\Items\ShopItemEntity [] $otherItemsInThisCat */

Website::setTitle('Boutique - Article');
Website::setDescription("Venez découvrir l'article !");

?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::getInstance()->fetchImageLink('hero_img_bg') ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Boutique</h1>
            </div>
        </div>
    </div>
</section>

<section class="relative bg-white rounded-lg shadow my-8 sm:mx-12 lg:mx-72">
    <?php if ($item->getDiscountImpactDefaultApplied()): ?>
        <div style="z-index: 5000; position: absolute; top: 0; left: 0; transform: translate(5%, 10%) rotate(-10deg); background-color: #f44336; color: white; padding: 8px 16px; border-radius: 0 16px 0 16px;">
            <p class="text-center text-xl"><?= $item->getDiscountImpactDefaultApplied() ?></p>
        </div>
    <?php endif; ?>
    <div class="container p-4">
        <div class="xl:grid grid-cols-6 gap-6">
            <div class="col-span-2 h-fit">
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
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item="<?php if ($x === 0): ?>active<?php endif; ?>">
                                        <img src="<?= $imagesUrl->getImageUrl() ?>"
                                             class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                             alt="...">
                                    </div>
                                    <?php $x++;
                                endforeach; ?>
                            </div>
                            <!-- Slider indicators -->
                            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                                <?php $i = 0;
                                foreach ($getImagesItem as $imageId): ?>
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="<?php if ($i === 0): ?>true<?php endif; ?>"
                                            aria-label="Slide 1" data-carousel-slide-to="<?= $i ?>"></button>
                                    <?php $i++;
                                endforeach; ?>
                            </div>
                            <!-- Slider controls -->
                            <button type="button"
                                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
                            </button>
                            <button type="button"
                                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
            </div>
            <div class="col-span-4 h-fit">
                <h2 class="font-medium"><?= $item->getName() ?></h2>

                <?php if ($allowReviews): ?>
                <div class="flex items-center">
                    <?= $review->getStars($item->getId()) ?>
                    <span class="mx-1 "></span>
                    <p class="text-sm font-medium text-gray-900 underline"><?= $review->countTotalRatingByItemId($item->getId()) ?> avis</p>
                </div>
                <?php endif; ?>


                <?php if ($item->getPriceDiscountDefaultApplied()): ?>
                    <h3><s class="text-xl"><?= $item->getPriceFormatted() ?></s> <?= $item->getPriceDiscountDefaultAppliedFormatted() ?></h3>
                <?php else: ?>
                    <h3><?= $item->getPriceFormatted() ?></h3>
                <?php endif; ?>
                <p><?= $item->getShortDescription() ?></p>

                <form method="post">
                    <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                    <div class="flex flex-wrap">
                        <?php foreach ($itemVariants as $itemVariant): ?>
                            <div class="mr-2">
                                <div class="my-2">
                                    <?= $itemVariant->getName() ?> :
                                </div>
                                <select name="selected_variantes[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1">
                                    <?php foreach ($variantValuesModel->getShopItemVariantValueByVariantId($itemVariant->getId()) as $variantValue): ?>
                                        <option value="<?= $variantValue->getId() ?>"><?= $variantValue->getValue() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="flex items-center my-2">
                        <input type="number" value="1" name="quantity" class="text-center w-14 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        <button type="submit" class="inline-flex items-center py-2 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            Ajouter au panier
                        </button>
                    </div>
                </form>
                <p>Catégorie : <a href="<?= $parentCat->getCatLink() ?>" class="text-blue-600 hover:text-blue-400"><?= $parentCat->getName() ?></a></p>
            </div>
        </div>





        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 rounded-t-lg border-b-2" id="description-tab" data-tabs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="false">Description</button>
                </li>
                <?php if (!empty($physicalInfo)): ?>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="info-tab" data-tabs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="false">Informations sur le produit</button>
                </li>
                <?php endif; ?>
                <?php if ($allowReviews): ?>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="reviews-tab" data-tabs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Avis</button>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden p-4 bg-gray-50 rounded-lg" id="description" role="tabpanel" aria-labelledby="description-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <?= $item->getDescription() ?>
                </p>
            </div>
            <?php if ($allowReviews): ?>
            <div class="hidden p-4 bg-gray-50 rounded-lg" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <div class="xl:grid grid-cols-3">
                    <div>
                        <div class="flex items-center">
                            <?= $review->getStars($item->getId()) ?>
                            <span class="mx-1 "></span>
                            <p class="ml-2 text-sm font-medium text-gray-900 dark:text-white"><?= $review->getAverageRatingByItemId($item->getId()) ?> sur 5</p>
                        </div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400"><?= $review->countTotalRatingByItemId($item->getId()) ?> avis</p>
                        <?php foreach ($review->getRatingsPercentageByItemId($item->getId()) as $rating): ?>
                        <div class="flex items-center mt-4">
                            <span class="text-sm font-medium text-blue-600 dark:text-blue-500"><?= $rating->getRating() ?> étoiles</span>
                            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                                <div class="h-5 rounded" style="background-color: #FFD700; width: <?= $rating->getPercentage() ?>%"></div>
                            </div>
                            <span class="text-sm font-medium text-blue-600 dark:text-blue-500"><?= $rating->getPercentage() ?>%</span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-span-2">

                        <?php foreach ($review->getShopReviewByItemId($item->getId()) as $reviewed): ?>
                        <article class="rounded-lg bg-white p-4 mb-4">
                            <div class="flex items-center mb-4 space-x-4">
                                <img class="w-10 h-10 rounded-full" src="<?= $reviewed->getUser()->getUserPicture()->getImage() ?>" alt="">
                                <div class="space-y-1 font-medium dark:text-white">
                                    <p><?= $reviewed->getUser()->getPseudo() ?> <span class="block text-sm text-gray-500"><?= $reviewed->getCreated() ?></span></p>
                                </div>
                            </div>
                            <div class="flex items-center mb-1">
                                <?= $reviewed->getStarsReview() ?>
                                <h3 class="ml-2 text-sm font-semibold text-gray-900"><?= $reviewed->getReviewRating() ?> sur 5</h3>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900"><?= $reviewed->getReviewTitle() ?></h3>
                            <p class="mb-2 font-light text-gray-500"><?= $reviewed->getReviewText() ?></p>
                        </article>
                        <?php endforeach; ?>

                        <div class="rounded-lg bg-white p-4 mb-4">
                            <form method="post" action="<?= $item->getSlug() ?>/addReview" class="">
                                <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                                <h3 class="text-base font-semibold text-gray-900 mb-2">Donner votre avis.</h3>
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Note</label>
                                <?= $review->getInputStars() ?>
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Titre</label>
                                <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" required>
                                <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Contenue :</label>
                                <textarea minlength="20" name="content" id="content" rows="4" class="tinymce block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Bonjour," required></textarea>
                                <div class="text-center mt-4">
                                    <?php if (UsersController::isUserLogged()): ?>
                                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Envoyer <i class="fa-solid fa-paper-plane"></i></button>
                                    <?php else: ?>
                                        <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>login" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Connectez-vous <i class="fa-solid fa-paper-plane"></i></a>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if (!empty($physicalInfo)): ?>
            <div class="hidden p-4 bg-gray-50 rounded-lg" id="info" role="tabpanel" aria-labelledby="info-tab">
                <p>
                    Poids : <?= $physicalInfo->getWeight() ?> grammes<br>
                    Longueur : <?= $physicalInfo->getLength() ?> cm<br>
                    Largeur : <?= $physicalInfo->getWidth() ?> cm<br>
                    Hauteur : <?= $physicalInfo->getHeight() ?> cm<br>
                </p>
            </div>
            <?php endif; ?>
        </div>

    </div>
</section>