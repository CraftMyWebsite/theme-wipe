<?php
use CMW\Utils\Utils;
use CMW\Model\Core\ThemeModel;
use CMW\Controller\Core\SecurityController;
use CMW\Manager\Security\SecurityManager;
use CMW\Controller\Users\UsersController;


/*Check installed package*/
use CMW\Controller\Core\PackageController;
/*NEWS BASIC NEED*/
use CMW\Model\News\NewsModel;
if (PackageController::isInstalled("news")) {
    $newsList = new newsModel;
    $newsList = $newsList->getSomeNews( ThemeModel::fetchConfigValue('news_number_display'));
}

/*CONTACT BASIC NEDD*/
use CMW\Model\Contact\ContactModel;

/*TITRE ET DESCRIPTION*/
$title = Utils::getSiteName() . ' - '. ThemeModel::fetchConfigValue('home_title');
$description = Utils::getSiteDescription();
?>
<!-- HERO -->
<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-40 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <p class="font-medium mb-2 text-blue-600 uppercase"><?= ThemeModel::fetchConfigValue('hero_title') ?></p>
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl"><?= Utils::getSiteName()?></h1>
                <p class="font-light mb-6 text-xl"><?= ThemeModel::fetchConfigValue('hero_description') ?></p>
                <a href="<?= ThemeModel::fetchConfigValue('hero_button_link') ?>" class="hidden md:inline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none"><?= ThemeModel::fetchConfigValue('hero_button_text') ?></a>
            </div>
        </div>
    </div>
</section>
<?php if(ThemeModel::fetchConfigValue('feature_section_active')): ?>
<!-- Fonctionnalités -->
<section class="py-8">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('feature_section_title') ?></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="container mx-auto px-4 relative">
        <div class="flex flex-wrap -mx-4  justify-center">
            <div class="p-4 w-full md:w-6/12 lg:w-4/12">
                <div class="bg-gray-100 p-4">
                    <img src="<?= ThemeModel::fetchImageLink("feature_img_1") ?>" class="mb-3 mx-auto" alt="Vous devez upload feature1.webp depuis votre panel !" width="160" height="160"/>
                    <div>
                        <h3 class="text-center  font-bold text-2xl text-gray-900"><?= ThemeModel::fetchConfigValue('feature_title_1') ?></h3>
                        <p class="mt-2 mb-4"><?= ThemeModel::fetchConfigValue('feature_description_1') ?></p>
                    </div>
                </div>
            </div>
            <div class="p-4 w-full md:w-6/12 lg:w-4/12">
                <div class="bg-gray-100 p-4">
                    <img src="<?= ThemeModel::fetchImageLink("feature_img_2") ?>" class="mb-3 mx-auto" alt="Vous devez upload feature2.webp depuis votre panel !" width="160" height="160">
                    <div>
                        <h3 class="text-center font-bold text-2xl text-gray-900"><?= ThemeModel::fetchConfigValue('feature_title_2') ?></h3>
                        <p class="mt-2 mb-4"><?= ThemeModel::fetchConfigValue('feature_description_2') ?></p>
                    </div>
                </div>
            </div>
            <div class="p-4 w-full md:w-6/12 lg:w-4/12">
                <div class="bg-gray-100 p-4">
                    <img src="<?= ThemeModel::fetchImageLink("feature_img_3") ?>" class="mb-3 mx-auto" alt="Vous devez upload feature3.webp depuis votre panel !" width="160" height="160">
                    <div>
                        <h3 class="text-center font-bold text-2xl text-gray-900"><?= ThemeModel::fetchConfigValue('feature_title_3') ?></h3>
                            <p class="mt-2 mb-4"><?= ThemeModel::fetchConfigValue('feature_description_3') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<!-- News -->
<?php if (PackageController::isInstalled("news")): ?>
<?php if(ThemeModel::fetchConfigValue('news_section_active')): ?>
<section class="py-8">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('news_section_title') ?></h2>
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
                            <a href="news/<?= $news->getSlug() ?>" class="hover:text-blue-600"><?= $news->getTitle() ?></a></h3>
                        <p class="mb-3"><?= $news->getDescription() ?></p>
                        <div class="mt-6 flex justify-between">
                            <a href="news/<?= $news->getSlug() ?>" class="font-bold hover:text-blue-700 text-gray-900 text-sm">Lire la suite <i class="fa-solid fa-caret-right"></i></a>
                            <div class="cursor-pointer">
                                <span data-tooltip-target="<?php if ($news->getLikes()->userCanLike()) {echo "tooltip-liked";} else {echo "tooltip-like";} ?>">
                                <span class="text-base"><?= $news->getLikes()->getTotal() ?>                                 
                                    <?php if ($news->getLikes()->userCanLike()): ?>
                                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                                    <div id="tooltip-liked" role="tooltip" class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        <?php if(UsersController::isUserLogged()) {echo "Vous aimez déjà !";} else {echo "Connectez-vous pour aimé !";} ?>
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
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>      
        </div>
    </div>
</section>
<?php endif; ?>
<?php else: ?>
    <?php if (UsersController::isAdminLogged()) : ?>
        <section class="py-8">
            <div class="container mx-auto px-4 relative">
                <div id="alert-additional-content-4" class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">Vous n'utilisez pas le package News</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm">
                        Le thème Wipe prend en charge le package News, pour le moment vous ne l'utilisez pas, installez le si vous voulez en bénéficier.<br>Seuls les administrateurs voient ce message !
                    </div>
                    <div class="flex">
                        <a href="/cmw-admin" target="_blank" type="button" class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-yellow-300 dark:text-gray-800 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                            <p><i class="fa-solid fa-download"></i> Installer le package</p>
                        </a>
                        <button type="button" class="text-yellow-800 bg-transparent border border-yellow-800 hover:bg-yellow-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-yellow-300 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-gray-800 dark:focus:ring-yellow-800" data-dismiss-target="#alert-additional-content-4" aria-label="Close">
                            <p><i class="fa-solid fa-eye-slash"></i> Masquer</p>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>


<!-- Personnalisé 1 -->
<?php if(ThemeModel::fetchConfigValue('custom_section_active_1')): ?>
<section class="py-8">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('custom_section_title_1') ?></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="container my-8 mx-2 xl:mx-72 relative">
        <div class="px-4">
            <?= ThemeModel::fetchConfigValue('custom_section_content_1') ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Personnalisé 2 -->
<?php if(ThemeModel::fetchConfigValue('custom_section_active_2')): ?>
<section class="py-8">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('custom_section_title_2') ?></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="container my-8 mx-2 xl:mx-72 relative">
        <div class="px-4">
            <?= ThemeModel::fetchConfigValue('custom_section_content_2') ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Personnalisé 3 -->
<?php if(ThemeModel::fetchConfigValue('custom_section_active_3')): ?>
<section class="py-8">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('custom_section_title_3') ?></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="container my-8 mx-2 xl:mx-72 relative">
        <div class="px-4">
            <?= ThemeModel::fetchConfigValue('custom_section_content_3') ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Contact -->
<?php if (PackageController::isInstalled("contact")): ?>
<?php if(ThemeModel::fetchConfigValue('contact_section_active')): ?>
<section class="py-8">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('contact_section_title') ?></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="container mx-auto px-4 xl:px-72">
        <form action="contact" method="post" class="rounded-md shadow-lg p-8">
            <?php (new SecurityManager())->insertHiddenToken() ?>
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
                <textarea id="message" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonjour," required></textarea>
            </div>
            <div class="text-center">
                <?php SecurityController::getPublicData(); ?>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Soumettre <i class="fa-solid fa-paper-plane"></i></button>
            </div>
        </form>
    </div>
</section>
<?php endif; ?>
<?php else: ?>
    <?php if (UsersController::isAdminLogged()) : ?>
        <section class="py-8">
            <div class="container mx-auto px-4 relative">
                <div id="alert-additional-content-4" class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">Vous n'utilisez pas le package Contact</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm">
                        Le thème Wipe prend en charge le package Contact, pour le moment vous ne l'utilisez pas, installez le si vous voulez en bénéficier.<br>Seuls les administrateurs voient ce message !
                    </div>
                    <div class="flex">
                        <a href="/cmw-admin" target="_blank" type="button" class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-yellow-300 dark:text-gray-800 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                            <p><i class="fa-solid fa-download"></i> Installer le package</p>
                        </a>
                        <button type="button" class="text-yellow-800 bg-transparent border border-yellow-800 hover:bg-yellow-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-yellow-300 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-gray-800 dark:focus:ring-yellow-800" data-dismiss-target="#alert-additional-content-4" aria-label="Close">
                            <p><i class="fa-solid fa-eye-slash"></i> Masquer</p>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>