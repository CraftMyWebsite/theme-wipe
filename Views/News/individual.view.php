<?php

use CMW\Manager\Env\EnvManager;
use CMW\Utils\Utils;
/* @var \CMW\Entity\News\NewsEntity $news */
use CMW\Model\Core\ThemeModel;
use CMW\Manager\Security\SecurityManager;
use CMW\Controller\Users\UsersController;
use CMW\Utils\Website;

/*TITRE ET DESCRIPTION*/
$title = Website::getWebsiteName() . ' - '. ThemeModel::fetchConfigValue('news_title') . ' - '. $news->getTitle();
$description = ThemeModel::fetchConfigValue('news_description');
?>
<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl"><?= $news->getTitle() ?></h1>
                <p><?= $news->getDescription() ?></p>
            </div>
        </div>
    </div>
</section>

<div class="my-8 mx-2 xl:mx-72">
    <div class="p-4">
        <div class="md:grid md:grid-cols-5 md:gap-16">
            <div>
                <img class="mx-auto rounded-lg" src="<?= $news->getImageLink() ?>" height="90%" width="90%" alt="...">
                <div class="text-center mt-2">
                    <?= $news->getAuthor()->getPseudo() ?>
                </div>
                <div class="text-center mt-2">
                    <div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs"><?= $news->getDateCreated() ?></div>
                </div>
                <div class="text-center mt-2">
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
                <div class="text-center">
                <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>news" class="text-blue-600">< Revenir aux news</a>
                </div>
            </div>
            <div class="md:hidden mt-4 border"></div>
            <div class="col-span-4">
                <?= $news->getContent() ?>
            </div>
        </div>
    </div>
    <div class="flex flex-no-wrap justify-center items-center pt-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase">Espace commentaire</h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    


    <div class="pt-2 pb-6 px-2 lg:px-24 2xl:px-72">
<?php foreach ($news->getComments() as $comment): ?>
        <div class="bg-white rounded-lg shadow md:grid md:grid-cols-5 py-4 pr-4 mb-4">
            <div class="">
                <img class="hidden lg:block mx-auto rounded-lg border border-gray-300 shadow-xl" height="50%" width="50%" src="<?= $comment->getUser()->getUserPicture()->getImageLink() ?>" alt="...">
            </div>
            <div class="col-span-4 px-4 md:px-0">

                <div class="flex justify-between">
                    <div class="font-medium"><?= $comment->getUser()->getPseudo() ?> :</div>
                    <div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs uppercase"><?= $comment->getDate() ?></div>
                </div>

                <div><?= $comment->getContent() ?></div>
                <div class="flex justify-end">
                            <div class="cursor-pointer">
                                <span data-tooltip-target="<?php if ($comment->userCanLike()) {echo "tooltip-liked";} else {echo "tooltip-like";} ?>">
                                <span class="text-base"><?= $comment->getLikes()->getTotal() ?>                               
                                    <?php if ($comment->userCanLike()): ?>
                                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                                    <div id="tooltip-liked" role="tooltip" class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        <?php if(UsersController::isUserLogged()) {echo "Vous aimez déjà !";} else {echo "Connectez-vous pour aimé !";} ?>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <?php else: ?> 
                                    <a href="<?= $comment->getSendLike() ?>"><i class="fa-regular fa-heart"></i></a>
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
        <form method="post" action="<?= $news->sendComments() ?>" class="">
            <?php (new SecurityManager())->insertHiddenToken() ?>
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Votre commentaire :</label>
            <textarea name="comments" id="message" rows="4" class="tinymce block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Bonjour," required></textarea>
            <div class="text-center mt-4">
                <?php if(UsersController::isUserLogged()): ?>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Commenter <i class="fa-solid fa-comments"></i></i></button>
                <?php else: ?> 
                <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>login" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Commenter <i class="fa-solid fa-comments"></i></i></a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>
