<?php

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Utils;
use CMW\Manager\Security\SecurityManager;
use CMW\Controller\Users\UsersController;

$title = "Titre de la page";
$description = "Description de votre page";
?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Forum</h1>
            </div>
        </div>
    </div>
</section>


<!-- Il faut gérer ceci ! 
        <section class="py-8 ">
            <div class="container mx-auto px-4 relative">
                <div id="alert-additional-content-4" class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">Oups !!</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm">
                        Ce forum n'éxiste plus ou à été déplacer !
                    </div>
                </div>
            </div>
        </section>
-->

<section class="lg:grid grid-cols-4 gap-6 sm:mx-12 2xl:mx-72 pt-8">
    <div class="col-span-3">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1">
                <li class="inline-flex items-center">
                    <a href="<?= Utils::getEnv()->getValue("PATH_SUBFOLDER") ?>forum" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        Accueil
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="<?= Utils::getEnv()->getValue("PATH_SUBFOLDER") ?>forum/f/" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Je sais pas</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="<?= Utils::getEnv()->getValue("PATH_SUBFOLDER") ?><?= $topic->getLink() ?>" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $topic->getName() ?></a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    <form>
        <div class="flex">
            <div class="relative w-full">
                <input type="search" id="search-dropdown" class="block p-1 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Rechercher">
                <button type="submit" class="absolute top-0 right-0 p-1 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </form>
</section>




<section class="my-8 sm:mx-12 2xl:mx-72">
    <div class="rounded-md shadow-lg p-8">
        <section>
            <div class="flex justify-between">
                <h4><?= $topic->getName() ?></h4>
                <div class="">
                    <?php if($topic->isImportant()): ?>
                        <i data-tooltip-target="tooltip-important" class="fa-solid fa-triangle-exclamation text-orange-500 ml-4"></i>
                        <div id="tooltip-important" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                            Important
                        </div>
                    <?php endif; ?>
                    <?php if($topic->isPinned()): ?>
                        <i data-tooltip-target="tooltip-pined" class="fa-solid fa-thumbtack text-red-600 ml-4"></i>
                        <div id="tooltip-pined" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                            Épinglé
                        </div>
                    <?php endif; ?>
                    <?php if($topic->isDisallowReplies()): ?>
                        <i data-tooltip-target="tooltip-closed" class="fa-solid fa-lock text-yellow-300 ml-4"></i>
                        <div id="tooltip-closed" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                            Fermé
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <p><small>Discussion dans crée par <?= $topic->getUser()->getPseudo() ?>, le <?= $topic->getCreated() ?></small></p>
            <?php if ($topic->getTags() === []): ?>
            <p><small>Ce topic ne possède pas de tags</small></p>
            <?php else: ?>
                <p><small>Tags :</small> 
                <?php foreach ($topic->getTags() as $tag): ?>
                        <small><span class="px-1 bg-gray-200 rounded mr-1"><?= $tag->getContent() ?></span></small>
                <?php endforeach; ?>
                </p>
            <?php endif; ?>

        </section>

        <section class="border mt-4">
            <div class="flex justify-between bg-gray-200 p-2">
                <p><?= $topic->getCreated() ?></p>
            </div>
            <div class="lg:grid grid-cols-5">
                <div class="p-4 text-center ">
                    <div class="bg-gray-100 p-2">
                        <div class="w-36 h-36 mx-auto border">
                            <img style="object-fit: fill; max-height: 144px; max-width: 144px" width="144px" height="144px" src="<?= getenv('PATH_SUBFOLDER') ?>public/uploads/users/<?= $topic->getUser()->getUserPicture()->getImageName() ?>" />
                        </div>
                    </div>
                    <h5 class="font-semibold bg-gray-200"><?= $topic->getUser()->getPseudo() ?></h5>
                    <div class="bg-gray-100 pb-1">
                        <p><small>Grade forum NA</small></p>
                    </div>
                    <div class="px-4 pb-2 bg-gray-100">
                        <div class="border">
                            <div class="grid grid-cols-3">
                                <div>
                                    <p><i class="fa-solid fa-comments fa-xs text-gray-600"></i></p>
                                    <p><small>NA</small></p>
                                </div>
                                <div>
                                    <p><i class="fa-solid fa-thumbs-up fa-xs text-gray-600"></i></p>
                                    <p><small>NA</small></p>
                                </div>
                                <div>
                                    <p><i class="fa-solid fa-trophy fa-xs text-gray-600"></i></p>
                                    <p><small>NA</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-4 py-4 pr-2">
                    <div class="border p-2 h-fit">
                        <?= $topic->getContent() ?>
                        <div class="flex justify-between mt-4">
                            <p><small><?= $topic->getUser()->getPseudo() ?>, <?= $topic->getCreated() ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php foreach ($responseModel->getResponseByTopic($topic->getId()) as $response) : ?>
<section class="border mt-4">
            <div class="flex justify-between bg-gray-200 p-2">
                <p><?= $response->getCreated() ?></p>
                <h5 class=""><?= $response->isTopicAuthor() ? "Auteur du topic" : "" ?></h5>
            </div>
            <div class="lg:grid grid-cols-5">
                <div class="p-4 text-center ">
                    <div class="bg-gray-100 p-2">
                        <div class="w-36 h-36 mx-auto border">
                            <img style="object-fit: fill; max-height: 144px; max-width: 144px" width="144px" height="144px" src="<?= getenv('PATH_SUBFOLDER') ?>public/uploads/users/<?= $response->getUser()->getUserPicture()->getImageName() ?>" />
                        </div>
                    </div>
                    <h5 class="font-semibold bg-gray-200"><?= $response->getUser()->getPseudo() ?></h5>
                    <div class="bg-gray-100 pb-1">
                        <p><small>Grade forum NA</small></p>
                    </div>
                    <div class="px-4 pb-2 bg-gray-100">
                        <div class="border">
                            <div class="grid grid-cols-3">
                                <div>
                                    <p><i class="fa-solid fa-comments fa-xs text-gray-600"></i></p>
                                    <p><small>NA</small></p>
                                </div>
                                <div>
                                    <p><i class="fa-solid fa-thumbs-up fa-xs text-gray-600"></i></p>
                                    <p><small>NA</small></p>
                                </div>
                                <div>
                                    <p><i class="fa-solid fa-trophy fa-xs text-gray-600"></i></p>
                                    <p><small>NA</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-4 py-4 pr-2">
                    <div class="border p-2 h-fit">
                        <?= $response->getContent() ?>
                        <div class="flex justify-between mt-4">
                            <p><small><?= $response->getUser()->getPseudo() ?>, <?= $response->getCreated() ?></small></p>
                        </div>
                    </div>


                    <div class="flex justify-end p-1">
                        <?php if ($response->isSelfReply()): ?>
                        <i data-modal-target="popup-modal-<?= $response->getId() ?>" data-modal-toggle="popup-modal-<?= $response->getId() ?>" data-tooltip-target="tooltip-delete" class="fa-solid fa-trash text-red-500 ml-4"></i>
                        <div id="tooltip-delete" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                            Supprimer ma réponse
                        </div>
                        <div id="popup-modal-<?= $response->getId() ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal-<?= $response->getId() ?>">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Voulez-vous vraiment supprimer votre réponse ?</h3>
                                        <a href="<?= $response->trashLink() ?>" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Supprimer
                                        </a>
                                        <button data-modal-hide="popup-modal-<?= $response->getId() ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (UsersController::isUserLogged() && !$response->isSelfReply()): ?>
                        <div class="ml-4">
                            0 <i data-tooltip-target="tooltip-like" class="fa-solid fa-thumbs-up"></i>
                            <div id="tooltip-like" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                Like
                            </div>
                        </div>
                        <div class="ml-4">
                            0 <i data-tooltip-target="tooltip-dislike" class="fa-solid fa-thumbs-down"></i>
                            <div id="tooltip-dislike" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                Dislike
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
<?php endforeach; ?>



<?php if(!$topic->isDisallowReplies() && UsersController::isUserLogged()): ?>
        <section class="border mt-4">
            <div class="bg-gray-200 p-2">
                <p><b>Répondre à ce topic :</b></p>
            </div>
            <div class="lg:grid grid-cols-5">
                <div class="p-4 text-center ">
                        <div class="bg-gray-100 pt-2">
                            <div class="w-36 h-36 mx-auto border">
                                <img style="object-fit: fill; max-height: 144px; max-width: 144px" width="144px" height="144px" src="<?= getenv('PATH_SUBFOLDER') ?>public/uploads/users/<?= $topic->getUser()->getUserPicture()->getImageName() ?>" />
                            </div>
                            <h5 class="font-semibold bg-gray-200"><?= $topic->getUser()->getPseudo() ?></h5>
                        </div>
                    </div>
                    <div class="col-span-4 py-4 pr-2">
                        <div class="h-fit">
                            <form action="" method="post">
                            <?php (new SecurityManager())->insertHiddenToken() ?>
                                <input hidden type="text" name="topicId" value="<?= $topic->getId() ?>">
                                <textarea class="w-full" name="topicResponse" id="summernote-1" required></textarea>
                            <div class="flex justify-end mt-2">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5"><i class="fa-solid fa-reply"></i> Poster ma réponse</button>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
        </section>
<?php endif; ?>
</div>
</section>
