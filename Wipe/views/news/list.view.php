<?php
$title = "News";
$description = "Affichage de toutes vos news";
use CMW\Model\Core\ThemeModel;
$newsList = $newsModel->getSomeNews(ThemeModel::fetchConfigValue('news_page_number_display'), 'DESC');
use CMW\Controller\Users\UsersController;
?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= getenv("PATH_SUBFOLDER") ?>public/uploads/Wipe/bg.webp" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl"><?= ThemeModel::fetchConfigValue('news_page_title') ?></h1>
            </div>
        </div>
    </div>
</section>

<div class="container mx-auto py-8 px-4 relative">
    <div class="lg:grid lg:grid-cols-2 gap-8 justify-center">
        <?php foreach ($newsList as $news): ?>
                <div class="bg-white mb-4 lg:mb-0 flex flex-wrap h-full overflow-hidden rounded-md shadow-lg">
                    <div class="w-full md:w-5/12 lg:w-full xl:w-5/12">
                        <div class="h-full relative">
                            <img src="<?= $news->getImageLink() ?>" class="h-full w-full" style="object-fit: fill;" alt="..."/>
                            <div class="absolute bg-blue-600 font-semibold leading-tight left-0 ml-3 mt-3 px-3 py-2 text-center text-white top-0">
                                <div class="text-sm"><?= $news->getAuthor()->getUsername() ?></div>
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
                                    <div id="tooltip-liked" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        <?php if(UsersController::isUserLogged()) {echo "Vous aimez déjà !";} else {echo "Connectez-vous pour aimé !";} ?>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <?php else: ?> 
                                    <a href="<?= $news->getLikes()->getSendLike() ?>"><i class="fa-regular fa-heart"></i></a>
                                    <div id="tooltip-like" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
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