<?php

use CMW\Entity\Shopextendedtoken\ShopExtendedTokenInventoryEntity;
use CMW\Interface\Shop\IPriceTypeMethod;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var IPriceTypeMethod $token */
/* @var ShopExtendedTokenInventoryEntity $userToken */
/* @var \CMW\Entity\Users\UserEntity[] $userList */
/* @var \CMW\Entity\Shopextendedtoken\ShopExtendedTokenHistoryEntity[] $tokenHistory */
/* @var \CMW\Entity\Shop\Items\ShopItemEntity[] $items */
/* @var \CMW\Interface\Shop\IPaymentMethod $paymentToken */

Website::setTitle('Boutique - ' . $token->name());
Website::setDescription('Gérez vos ' . $token->name());

?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::getInstance()->fetchImageLink('hero_img_bg') ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl"><?= $paymentToken->faIcon() ?> <?= $token->name() ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="px-2 md:px-24 xl:px-48 2xl:px-72 py-6">
    <div class="lg:grid lg:grid-cols-3 gap-6">
        <div class="container mx-auto rounded-md shadow-lg p-8 h-fit">
            <div class="flex flex-no-wrap justify-center items-center py-4">
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                <div class="px-10 w-auto">
                    <h2 class="font-semibold text-2xl uppercase">Envoyer des <?= $token->name() ?></h2>
                </div>
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
            </div>
            <form method="post" action="">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <div class="mb-4">
                    <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Montant :</label>
                    <input type="text" name="amount" id="amount" placeholder="19.99"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5""
                    required>
                </div>
                <div class="mb-2">
                    <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Envoyé à :</label>
                    <select name="user" id="user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <?php foreach ($userList as $user): ?>
                            <option value="<?= $user->getId() ?>">
                                <?= $user->getPseudo() ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Envoyer</button>
                </div>
            </form>
        </div>
        <div class="col-span-2">
            <div class="container mx-auto rounded-md shadow-lg p-8">
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase">Mes <?= $token->name() ?></h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                <div>
                    <h2 class="text-center font-bold"><?= $userToken?->getStock() ?? 0 ?> <?= $paymentToken->faIcon() ?></h2>
                </div>
            </div>
            <div class="container mx-auto rounded-md shadow-lg p-8">
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase">Historique</h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                <div class="lg:grid grid-cols-2 gap-6">
                    <?php foreach ($tokenHistory as $history): ?>
                    <div class="p-2 border shadow-xl">
                        <div class="flex flex-wrap justify-between">

                            <div <?php if ($history->getEvent() == 1) { echo "style='background-color: #06a93a'"; } else { echo "style='background-color: #E2320F'"; } ?> class="font-medium inline-block px-3 py-1 rounded-sm text-base"><?= $history->getFormattedEvent() ?> <?= $history->getAmount() ?> <?= $paymentToken->faIcon() ?></div>
                            <div class="text-sm"><?= $history->getCreated() ?></div>
                        </div>
                        <div class="mt-2"><?= $history->getReason() ?></div>
                    </div>
                    <?php endforeach; ?>
                    <div class="p-2 border shadow-xl flex justify-center items-center">
                        <a href="tokens/history" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 focus:outline-none">Consulter l'historique complet</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php if (!empty($items)): ?>
<section class="px-2 md:px-24 xl:px-48 2xl:px-72 py-6">
    <div class="container mx-auto rounded-md shadow-lg p-8 h-fit">
        <div class="flex flex-no-wrap justify-center items-center py-4">
            <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
            <div class="px-10 w-auto">
                <h2 class="font-semibold text-2xl uppercase">Obtenir des <?= $token->name() ?></h2>
            </div>
            <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        </div>
        <div class="py-4 flex flex-wrap">
            <?php foreach ($items as $item): ?>
                <div class="relative w-full xl:w-1/2 2xl:w-1/4 mt-4 mb-5 2xl:mb-0 px-4 hover:scale-105 transition">
                    <?php if ($item->getDiscountImpactDefaultApplied()): ?>
                        <div style="z-index: 5000; position: absolute; top: 0; left: 0; transform: translate(5%, 10%) rotate(-10deg); background-color: #f44336; color: white; padding: 8px 16px; border-radius: 0 16px 0 16px;">
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
                            <a href="<?= $item->getItemLink() ?>"><h4 class="text-center"><?= $item->getName() ?></h4>
                                <?php if ($allowReviews): ?>
                                    <div class="flex justify-center items-center">
                                        <?= $review->getStars($item->getId()) ?>
                                        <span class="mx-1 "></span>
                                        <p class="text-sm font-medium text-gray-900 underline"><?= $review->countTotalRatingByItemId($item->getId()) ?> avis</p>
                                    </div>
                                <?php endif; ?>

                                <p><?= $item->getShortDescription() ?></p>
                                <p class="text-xs text-center hover:text-blue-600">Lire la suite</p></a>
                        </div>
                        <div class="grid grid-cols-2 border rounded-b py-2">
                            <?php if ($item->getPriceDiscountDefaultApplied()): ?>
                                <p class="text-center"><s><?= $item->getPriceFormatted() ?></s> <b class="text-xl"><?= $item->getPriceDiscountDefaultAppliedFormatted() ?></b></p>
                            <?php else: ?>
                                <p class="text-center text-xl"><?= $item->getPriceFormatted() ?></p>
                            <?php endif; ?>

                            <a href="<?= $item->getAddToCartLink() ?>" class="border-l text-center text-2xl hover:text-blue-600"><i
                                    class="fa-solid fa-cart-plus"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<script>
    let inputElement = document.querySelector('input[name="amount"]');

    inputElement.addEventListener('input', function() {
        let inputValue = this.value;
        inputValue = inputValue.replace(/,/g, '.');
        inputValue = inputValue.replace(/[^\d.]/g, '');
        if (/\.\d{3,}/.test(inputValue)) {
            let decimalIndex = inputValue.indexOf('.');
            inputValue = inputValue.substring(0, decimalIndex + 3);
        }
        this.value = inputValue;
    });
</script>