<?php

use CMW\Interface\Shop\IPriceTypeMethod;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/* @var IPriceTypeMethod $token */
/* @var \CMW\Entity\Shopextendedtoken\ShopExtendedTokenHistoryEntity[] $tokenHistory */
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

<section class="px-2 md:px-24 py-6">
    <div class="lg:grid grid-cols-3">
        <div></div>
        <div class="container mx-auto rounded-md shadow-lg p-8 h-fit">
            <div class="flex flex-no-wrap justify-center items-center py-4">
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                <div class="px-10 w-auto">
                    <h2 class="font-semibold text-2xl uppercase">Historique</h2>
                </div>
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
            </div>
            <?php foreach ($tokenHistory as $history): ?>
                <div class="p-4 border shadow-xl mt-4">
                    <div class="flex flex-wrap justify-between">
                        <div <?php if ($history->getEvent() == 1) { echo "style='background-color: #06a93a'"; } else { echo "style='background-color: #E2320F'"; } ?> class="font-medium inline-block px-3 py-1 rounded-sm text-base"><?= $history->getFormattedEvent() ?> <?= $history->getAmount() ?> <?= $paymentToken->faIcon() ?></div>
                        <div class="text-sm"><?= $history->getCreated() ?></div>
                    </div>
                    <p class="mt-2 text-center"><?= $history->getReason() ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>