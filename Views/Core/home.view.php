<?php

use CMW\Controller\Core\SecurityController;
use CMW\Controller\Users\UsersController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;
use CMW\Controller\Core\PackageController;
use CMW\Model\News\NewsModel;

if (PackageController::isInstalled('News')) {
    $newsLists = new newsModel;
    $newsList = $newsLists->getSomeNews(ThemeModel::getInstance()->fetchConfigValue('home-news','news_number_display'));
}

/* TITRE ET DESCRIPTION */
Website::setTitle(Website::getWebsiteName());
Website::setDescription(Website::getWebsiteDescription());
?>
<!-- HERO -->
<section class="bg-gray-800 relative text-white">
    <img src="" data-cmw-attr="src:home-hero:hero_img_bg" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-40 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <p class="font-medium mb-2 text-blue-600 uppercase" data-cmw="home-hero:hero_title"></p>
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl"><?= Website::getWebsiteName() ?></h1>
                <p class="font-light mb-6 text-xl" data-cmw="home-hero:hero_description"></p>
                <a data-cmw-attr="href:home-hero:hero_button_link" data-cmw="home-hero:hero_button_text" class="hidden md:inline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none"></a>
            </div>
        </div>
    </div>
</section>
<div data-cmw-visible="home-feature:feature_section_active">
<!-- Fonctionnalités -->
<section  class="py-8">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 data-cmw="home-feature:feature_section_title" class="font-semibold text-2xl uppercase"></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="container mx-auto px-4 relative">
        <div class="flex flex-wrap -mx-4  justify-center">
            <div class="p-4 w-full md:w-6/12 lg:w-4/12">
                <div class="bg-gray-100 p-4">
                    <img data-cmw-attr="src:home-feature:feature_img_1" class="mb-3 mx-auto" alt="Vous devez upload feature1.webp depuis votre panel !" width="160" height="160"/>
                    <div>
                        <h3 data-cmw="home-feature:feature_title_1" class="text-center font-bold text-2xl text-gray-900"></h3>
                        <p data-cmw="home-feature:feature_description_1" class="mt-2 mb-4"></p>
                    </div>
                </div>
            </div>
            <div class="p-4 w-full md:w-6/12 lg:w-4/12">
                <div class="bg-gray-100 p-4">
                    <img data-cmw-attr="src:home-feature:feature_img_2" class="mb-3 mx-auto" alt="Vous devez upload feature2.webp depuis votre panel !" width="160" height="160">
                    <div>
                        <h3 data-cmw="home-feature:feature_title_2" class="text-center font-bold text-2xl text-gray-900"></h3>
                        <p data-cmw="home-feature:feature_description_2" class="mt-2 mb-4"></p>
                    </div>
                </div>
            </div>
            <div class="p-4 w-full md:w-6/12 lg:w-4/12">
                <div class="bg-gray-100 p-4">
                    <img data-cmw-attr="src:home-feature:feature_img_3" class="mb-3 mx-auto" alt="Vous devez upload feature3.webp depuis votre panel !" width="160" height="160">
                    <div>
                        <h3 data-cmw="home-feature:feature_title_3" class="text-center font-bold text-2xl text-gray-900"></h3>
                        <p data-cmw="home-feature:feature_description_3" class="mt-2 mb-4"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>


<!-- News -->
<?php if (PackageController::isInstalled('News')): ?>
<div data-cmw-visible="home-news:news_section_active">
<section class="py-8">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 data-cmw="home-news:news_section_title" class="font-semibold text-2xl uppercase"></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="container mx-auto px-4 relative">
        <div class="md:grid md:grid-cols-2 gap-8 justify-center">

        <?php foreach ($newsList as $news): ?>
                <div class="bg-white mb-4 lg:mb-0 flex flex-wrap h-full overflow-hidden rounded-md shadow-lg">
                    <div class="w-full md:w-5/12 lg:w-full xl:w-5/12">
                        <div class="h-full relative">
                            <img src="<?= $news->getImageLink() ?>" class="h-full w-full" style="object-fit: cover;" alt="..."/>
                            <div class="absolute bg-blue-600 font-semibold leading-tight left-0 ml-3 mt-3 px-3 py-2 text-center text-white top-0">
                                <div class="text-sm"><?= $news->getAuthor()->getPseudo() ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 py-6 w-full md:w-7/12 lg:w-full xl:w-7/12">
                        <div class="mb-3">
                            <div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs"><?= $news->getDateCreated() ?></div>
                        </div>
                        <h3 class="font-bold leading-tight mb-3 text-gray-900 text-xl">
                            <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>news/<?= $news->getSlug() ?>" class="hover:text-blue-600"><?= $news->getTitle() ?></a></h3>
                        <p class="mb-3"><?= $news->getDescription() ?></p>
                        <div class="mt-6 flex justify-between">
                            <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>news/<?= $news->getSlug() ?>" class="font-bold hover:text-blue-700 text-gray-900 text-sm">Lire la suite <i class="fa-solid fa-caret-right"></i></a>
                            <div class="cursor-pointer">
            <?php if ($news->isLikesStatus()): ?>
                                <span data-tooltip-target="<?php if ($news->getLikes()->userCanLike()) { echo 'tooltip-liked'; } else { echo 'tooltip-like'; } ?>">
                                <span class="text-base"><?= $news->getLikes()->getTotal() ?>
                                    <?php if ($news->getLikes()->userCanLike()): ?>
                                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                                    <div id="tooltip-liked" role="tooltip" class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        <?php if (UsersController::isUserLogged()) { echo 'Vous aimez déjà !'; } else { echo 'Connectez-vous pour aimé !'; } ?>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <?php else: ?>
                                    <a href="<?= $news->getLikes()->getSendLike() ?>"><i class="fa-regular fa-heart"></i></a>
                                    <div id="tooltip-like" role="tooltip" class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        Merci pour votre soutien !
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <?php endif; ?>
                                </span>
                                </span>
            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>
</div>
<?php endif; ?>

<!-- Personnalisé 1 -->
<div data-cmw-visible="home-custom:custom_section_active_1">
<section class="py-8">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 data-cmw="home-custom:custom_section_title_1" class="font-semibold text-2xl uppercase"></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="container my-8 mx-2 xl:mx-72 relative">
        <div class="px-4" data-cmw="home-custom:custom_section_content_1">

        </div>
    </div>
</section>
</div>

<!-- Personnalisé 2 -->
<div data-cmw-visible="home-custom:custom_section_active_2">
<section class="py-8">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 data-cmw="home-custom:custom_section_title_2" class="font-semibold text-2xl uppercase"></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="container my-8 mx-2 xl:mx-72 relative">
        <div class="px-4" data-cmw="home-custom:custom_section_content_2">
        </div>
    </div>
</section>
</div>

<!-- Personnalisé 3 -->
<div data-cmw-visible="home-custom:custom_section_active_3">
<section class="py-8">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 data-cmw="home-custom:custom_section_title_3" class="font-semibold text-2xl uppercase"></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="container my-8 mx-2 xl:mx-72 relative">
        <div class="px-4" data-cmw="home-custom:custom_section_content_3">
        </div>
    </div>
</section>
</div>

<!-- Contact -->
<?php if (PackageController::isInstalled('Contact')): ?>
<div data-cmw-visible="home-contact:contact_section_active">
<section class="py-8">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase" data-cmw="home-contact:contact_section_title"></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="container mx-auto px-4 xl:px-72">
        <form action="contact" method="post" class="rounded-md shadow-lg p-8">
            <?php SecurityManager::getInstance()->insertHiddenToken() ?>
            <div class="flex flex-wrap -mx-4 mb-4">
                <div class="px-4 w-full md:w-6/12 lg:w-6/12">
                    <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Votre mail :</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <input type="email" name="email" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="votre@mail.com" required>
                    </div>
                </div>
                <div class="px-4 w-full md:w-6/12 lg:w-6/12">
                    <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Votre nom :</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <input type="text" name="name" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Jean Dupont" required>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                    <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sujet :</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                        <input type="text" name="object" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="J'aimerais aborder avec vous ..." required>
                    </div>
            </div>
            <div class="mb-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Votre message :</label>
                <textarea minlength="50"  id="message" name="content" rows="4" class="tinymce block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonjour," required></textarea>
            </div>
            <div class="text-center">
                <?php SecurityController::getPublicData(); ?>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Soumettre <i class="fa-solid fa-paper-plane"></i></button>
            </div>
        </form>
    </div>
</section>
</div>
<?php endif; ?>

<?php if (PackageController::isInstalled('Newsletter')): ?>
    <div data-cmw-visible="home-newsletter:newsletter_section_active">
        <section class="py-8">
        <div class="flex flex-no-wrap justify-center items-center py-4">
            <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
            <div class="px-10 w-auto">
                <h2 data-cmw="home-newsletter:newsletter_section_title" class="font-semibold text-2xl uppercase"></h2>
            </div>
            <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        </div>
            <div class="container mx-auto px-4 xl:px-72">
                <form action="newsletter" method="post" class="rounded-md shadow-lg p-8">
                    <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                    <p data-cmw="home-newsletter:newsletter_section_description"></p>
                    <div class="relative mt-4">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <input type="email" name="newsletter_users_mail" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="votre@mail.com" required>
                    </div>
                    <?php SecurityController::getPublicData(); ?>
                    <div class="text-center mt-4">
                        <button data-cmw="home-newsletter:newsletter_section_button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none" type="submit">
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
<?php endif; ?>