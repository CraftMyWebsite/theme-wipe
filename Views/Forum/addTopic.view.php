<?php

use CMW\Controller\Forum\ForumPermissionController;
use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Manager\Security\SecurityManager;
use CMW\Controller\Users\UsersController;
use CMW\Utils\Website;

/** @var \CMW\Entity\Forum\ForumCategoryEntity $category */
/** @var \CMW\Entity\Forum\ForumEntity $forum */
/* @var CMW\Model\Forum\ForumModel $forumModel */
/* @var CMW\Controller\Forum\ForumSettingsController $iconNotRead */
/* @var CMW\Controller\Forum\ForumSettingsController $iconImportant */
/* @var CMW\Controller\Forum\ForumSettingsController $iconPin */
/* @var CMW\Controller\Forum\ForumSettingsController $iconClosed */

Website::setTitle("Forum");
Website::setDescription("Ajouter un sujet");
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


<section class="lg:grid grid-cols-4 gap-6 sm:mx-12 2xl:mx-72 pt-8">
    <div class="col-span-3">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1">
                <li class="inline-flex items-center">
                    <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>forum" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <?= ThemeModel::fetchConfigValue('forum_breadcrumb_home') ?>
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="<?= $category->getLink() ?>"
                           class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $category->getName() ?></a>
                    </div>
                </li>
                <?php foreach ($forumModel->getParentByForumId($forum->getId()) as $parent): ?>
                    <li>
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right"></i>
                            <a href="../../<?= $parent->getLink() ?>"
                               class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $parent->getName() ?></a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>
    </div>
</section>


<?php if(UsersController::isUserLogged()): ?>
<section class="my-8 sm:mx-12 2xl:mx-72">
    <div class="rounded-md shadow-lg p-8">

        <h4>Nouveau topic dans : <b><?= $forum->getName() ?></b></h4>
        <form action="" method="post">
            <?php (new SecurityManager())->insertHiddenToken() ?>
            <?php if (UsersController::isAdminLogged() || ForumPermissionController::getInstance()->hasPermission("operator")) : ?>
            <!--
            ADMINISTRATION
            -->
            <div class="border-b p-2">
                <div class="bg-gray-100 rounded-lg p-3">
                    <p class="font-semibold mt-2 text-center">Administration</p>
                    <div class="flex">
                        <div class="flex ml-3 space-x-4">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input name="important" value="1" id="important" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50" >
                                </div>
                                <label for="important" class="ml-2 text-sm font-medium text-gray-900"><i class="<?= $iconImportant ?> text-orange-500 fa-sm"></i> Important</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input name="pin" id="pin" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50" >
                                </div>
                                <label for="pin" class="ml-2 text-sm font-medium text-gray-900"><i class="<?= $iconPin ?> text-red-600 fa-sm"></i> Épingler</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input name="disallow_replies" value="1" id="closed" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50" >
                                </div>
                                <label for="closed" class="ml-2 text-sm font-medium text-gray-900"><i class="<?= $iconClosed ?> text-yellow-300 fa-sm"></i> Fermer</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


            <!--
            PUBLIC
            -->
            <div class="border-b p-2">
                <div class="bg-gray-100 rounded-lg p-3">
                    <p class="font-semibold mt-4 text-center">Topic<span class="text-red-500">*</span></p>
                <div class="grid gap-6 mb-4 md:grid-cols-2 mt-4">
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre du topic<span class="text-red-500">*</span> :</label>
                        <input name="name" id="title" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Titre du topic" required>
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags : <small>Séparez vos tags par ','</small></label>
                        <input name="tags" type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Tag1,Tag2,Tag3">
                    </div>
                </div>

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Options :</label>
                    <div class="flex mb-4 ">
                        <div class="flex ml-3 space-x-4">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="follow" type="checkbox" name="followTopic" class="w-4 h-4 border border-gray-300 rounded bg-gray-50" checked>
                                </div>
                                <label for="follow" class="ml-2 text-sm font-medium">Suivre la discussion (alérter par mail)</label>
                            </div>
                        </div>
                    </div>
                    <label for="summernote-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenue<span class="text-red-500">*</span> :</label>
                    <textarea minlength="20" name="content"  class="w-full tinymce"></textarea>
                </div>
            </div>

            <div class="border-b p-2">
                <div class="bg-red-500 rounded-lg p-3">
                    <p class="font-semibold mt-4 text-center">Sondage <small><i>Falcutatif</i></small></p>
                    <div class="mt-4">
                        <label for="question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question :</label>
                        <input id="question" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div class="mt-4">
                        <label for="response" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Réponse possible :</label>
                        <input id="response" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1" placeholder="Réponse 1">
                        <input type="text" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1" placeholder="Réponse 2">
                        <div class="mt-1 text-center">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto p-1 text-center"><i class="fa-solid fa-plus"></i> Ajouter une réponse</button>
                        </div>
                    </div>
                    <label class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">Options des réponses :</label>
                    <div class=" mb-4">
                        <div class=" ml-3">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="unique" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                </div>
                                <label for="unique" class="ml-2 text-sm font-medium text-gray-900">Choix unique</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="multiple" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                </div>
                                <label for="multiple" class="ml-2 text-sm font-medium text-gray-900">Choix multiple illimité</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="multipleLimit" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                </div>
                                <label for="multipleLimit" class="ml-2 text-sm font-medium text-gray-900">Choix multiple limité :</label>
                            </div>
                            <div class="flex flex-wrap space-x-2">
                                    <div class="flex">
                                        <div class="relative w-full ml-4">
                                            <button id="plus" class="absolute top-0 left-0 p-1 text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800"><i class="fa-solid fa-minus"></i></button>
                                            <input class="text-center block p-1 px-6 w-20 z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg" value="2">
                                            <button id="plus" class="absolute top-0 right-0 p-1 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800"><i class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <label class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">Options :</label>
                    <div class=" mb-4">
                        <div class=" ml-3">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="canchange" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                </div>
                                <label for="canchange" class="ml-2 text-sm font-medium text-gray-900">Les votant peuvent changer leur votes</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="public" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                </div>
                                <label for="public" class="ml-2 text-sm font-medium text-gray-900">Les résultats sont publique</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="publicnovote" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                </div>
                                <label for="publicnovote" class="ml-2 text-sm font-medium text-gray-900">Les résultats sont publique sans avoir voter</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="autoclose" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                </div>
                                <label for="autoclose" class="ml-2 text-sm font-medium text-gray-900">Clore automatiquement après :</label>
                            </div>
                            <div class="flex flex-wrap space-x-2">
                                <div class="w-20">
                                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1" placeholder="3">
                                </div>
                                <div>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1">
                                        <option value="">Heures</option>
                                        <option value="">Jours</option>
                                        <option value="">Semaines</option>
                                        <option value="">Mois</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-2">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center"><i class="fa-solid fa-pen-to-square"></i> Poster</button>
            </div>
        </form>
    </div>
</section>

<?php else: ?>
        <section class="py-8 ">
            <div class="container mx-auto px-4 relative">
                <div id="alert-additional-content-4" class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">Oups !!</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm">
                        Vous devez vous connecter pour pouvoir poster un nouveau topic !
                        <div class="flex mt-2">
                        <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>login" type="button" class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center">
                            <p>Connexion</p>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </section>

<?php endif; ?>