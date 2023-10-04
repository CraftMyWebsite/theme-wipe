<?php

use CMW\Controller\Forum\ForumController;
use CMW\Controller\Forum\ForumPermissionController;
use CMW\Controller\Users\UsersController;
use CMW\Controller\Users\UsersSettingsController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Forum\ForumPrefixModel;
use CMW\Model\Users\UsersModel;

/* @var CMW\Model\Forum\ForumModel $forumModel */
/* @var \CMW\Entity\Forum\ForumCategoryEntity $category */
/* @var CMW\Entity\Forum\ForumEntity $forum */
/* @var CMW\Model\Forum\ForumTopicModel $topicModel */
/* @var CMW\Entity\Forum\ForumTopicEntity $topic */
/* @var CMW\Model\Forum\ForumResponseModel $responseModel */
/* @var CMW\Controller\Forum\ForumSettingsController $iconNotRead */
/* @var CMW\Controller\Forum\ForumSettingsController $iconImportant */
/* @var CMW\Controller\Forum\ForumSettingsController $iconPin */
/* @var CMW\Controller\Forum\ForumSettingsController $iconClosed */

$title = "Titre de la page";
$description = "Description de votre page";
?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>"
         class="absolute h-full inset-0 object-center object-cover w-full"
         alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Forum</h1>
            </div>
        </div>
    </div>
</section>

<!--
<section class="py-8 ">
    <div class="container mx-auto px-4 relative">
        <div id="alert-additional-content-4"
             class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
             role="alert">
            <div class="flex items-center">
                <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                          clip-rule="evenodd"></path>
                </svg>
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
                    <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>forum"
                       class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
                            <a href="<?= $parent->getLink() ?>"
                               class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $parent->getName() ?></a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>
    </div>
    <form>
        <div class="flex">
            <?php if (UsersController::isUserLogged() && ForumPermissionController::getInstance()->hasPermission("user_create_topic") && !$forum->disallowTopics()): ?>
                <div class="text-center mb-4">
                    <a href="<?= $forum->getSlug() ?>/add"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none"><i
                            class="<?= ThemeModel::fetchConfigValue('forum_btn_create_topic_icon') ?>"></i> <?= ThemeModel::fetchConfigValue('forum_btn_create_topic') ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </form>
</section>


<section
    class="<?php if (ThemeModel::fetchConfigValue('forum_use_widgets')): ?>lg:grid <?php endif; ?> grid-cols-4 gap-6 my-8 sm:mx-12 2xl:mx-72 ">
    <div class="lg:col-span-3 h-fit">


        <?php if ($forumModel->getSubforumByForum($forum->getId(), true)): ?>
            <div class="w-full shadow-md mb-10">
                <div class="flex py-4 bg-gray-100">
                    <div class="md:w-[55%] px-4 font-bold"><?= ThemeModel::fetchConfigValue('forum_sub_forum') ?></div>
                    <div
                        class="hidden md:block w-[10%] font-bold text-center"><?= ThemeModel::fetchConfigValue('forum_topics') ?></div>
                    <div
                        class="hidden md:block w-[10%] font-bold text-center"><?= ThemeModel::fetchConfigValue('forum_message') ?></div>
                    <div
                        class="hidden md:block w-[25%] font-bold text-center"><?= ThemeModel::fetchConfigValue('forum_last_message') ?></div>
                </div>

                <?php foreach ($forumModel->getSubforumByForum($forum->getId(), true) as $forumEntity): ?>
                    <?php if ($forumEntity->isUserAllowed()): ?>
                        <div class="flex py-6 border-t bg-gray-50 hover:bg-gray-100">
                            <div class="md:w-[55%] px-5">
                                <a class="flex"
                                   href="<?= $forumEntity->getLink() ?>">
                                    <div
                                        class="py-2 px-2 bg-gradient-to-b from-gray-400 to-gray-300 rounded-xl shadow-connect w-fit h-fit">
                                        <?= $forumEntity->getFontAwesomeIcon("fa-xl") ?>
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-bold">
                                            <?= $forumEntity->getName() ?>
                                        </div>
                                        <div>
                                            <?= $forumEntity->getDescription() ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div
                                class="hidden md:block w-[10%] text-center my-auto"><?= $forumModel->countTopicInForum($forumEntity->getId()) ?></div>
                            <div
                                class="hidden md:inline-block w-[10%] text-center my-auto"><?= $forumModel->countMessagesInForum($forumEntity->getId()) ?></div>
                            <!--Dernier message-->
                            <div class="hidden md:block w-[25%] my-auto">
                                <div class="flex text-sm">
                                    <?php if ($forumEntity->getLastResponse() !== null) : ?>
                                    <a href="<?= $forumEntity->getLastResponse()->getResponseTopic()->getForum()->getSlug() ?>/t/<?= $forumEntity->getLastResponse()->getResponseTopic()->getSlug() ?>/#<?= $forumEntity->getLastResponse()?->getId() ?>">
                                        <?php endif; ?>
                                        <div tabindex="0" class="avatar w-10">
                                            <div class="w-fit rounded-full ">
                                                <img
                                                    src="<?= $forumEntity->getLastResponse()?->getUser()->getUserPicture()->getImageLink() ?? ThemeModel::fetchImageLink("forum_nobody_send_message_img") ?>"/>
                                            </div>
                                        </div>
                                    </a>
                                    <?php if ($forumEntity->getLastResponse() !== null) : ?>
                                    <a href="<?= $forumEntity->getLastResponse()->getResponseTopic()->getForum()->getSlug() ?>/t/<?= $forumEntity->getLastResponse()->getResponseTopic()->getSlug() ?>/#<?= $forumEntity->getLastResponse()?->getId() ?>">
                                        <?php endif; ?>
                                        <div class="ml-2">
                                            <div
                                                class=""><?= $forumEntity->getLastResponse()?->getUser()->getPseudo() ?? ThemeModel::fetchConfigValue('forum_nobody_send_message_text') ?></div>
                                            <div><?= $forumEntity->getLastResponse()?->getCreated() ?? "" ?></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif ?>


        <div class="w-full shadow-md mb-10">
            <div class="flex py-4 bg-gray-100">
                <div class="md:w-[55%] px-4 font-bold"><?= ThemeModel::fetchConfigValue('forum_topics') ?></div>
                <div
                    class="hidden md:block w-[10%] font-bold text-center"><?= ThemeModel::fetchConfigValue('forum_display') ?></div>
                <div
                    class="hidden md:block w-[10%] font-bold text-center"><?= ThemeModel::fetchConfigValue('forum_response') ?></div>
                <div
                    class="hidden md:block w-[25%] font-bold text-center"><?= ThemeModel::fetchConfigValue('forum_last_message') ?></div>
            </div>


            <?php foreach ($topicModel->getTopicByForum($forum->getId()) as $topic): ?>
                <div class="relative flex py-2 border-t bg-gray-50 hover:bg-gray-100">
                    <div class="md:w-[55%] px-5 relative">
                        <a class="flex flex-wrap hover:text-blue-800"
                           href="<?= $topic->getLink() ?>">
                            <div class="w-12 h-12 shadow-xl">
                                <img style="object-fit: fill; max-height: 48px; max-width: 48px" width="48px"
                                     height="48px"
                                     src="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Uploads/Users/<?= $topic->getUser()->getUserPicture()->getImageName() ?>"/>
                            </div>
                            <div class="ml-4">
                                <p><?php if ($topic->getPrefixId()): ?><span class="px-2 text-white rounded-lg"
                                                                             style="color: <?= $topic->getPrefixTextColor() ?>; background: <?= $topic->getPrefixColor() ?>"><?= $topic->getPrefixName() ?></span> <?php endif; ?><?= $topic->getName() ?>
                                </p>
                                <p><span class="font-medium"><?= $topic->getUser()->getPseudo() ?></span> <span
                                        class="text-sm">le <?= $topic->getCreated() ?></span></p>
                                </p>
                            </div>
                            <div class="absolute top-0 right-0">
                                <?= $topic->isImportant() ? "
                            <i data-tooltip-target='tooltip-important' class='<?= $iconImportant ?> fa-sm text-orange-500'></i>
                            <div id='tooltip-important' role='tooltip' class='absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg'>
                                Important
                            </div>
                            " : "" ?>
                                <?= $topic->isPinned() ? "
                            <i data-tooltip-target='tooltip-pined' class='<?= $iconPin ?> fa-sm text-red-600 ml-2'></i>
                            <div id='tooltip-pined' role='tooltip' class='absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg'>
                                Épinglé
                            </div>
                             " : "" ?>
                                <?= $topic->isDisallowReplies() ? "
                            <i data-tooltip-target='tooltip-closed' class='<?= $iconClosed ?> fa-sm text-yellow-300 ml-2'></i>
                            <div id='tooltip-closed' role='tooltip' class='absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg'>
                                Fermé
                            </div>
                             " : "" ?>
                            </div>
                        </a>
                    </div>
                    <div class="hidden md:block w-[10%] text-center my-auto"><?= $topic->countViews() ?></div>
                    <div
                        class="hidden md:inline-block w-[10%] text-center my-auto"><?= $responseModel->countResponseInTopic($topic->getId()) ?></div>
                    <!--Dernier message-->
                    <div class="hidden md:block w-[25%] my-auto">
                        <div class="flex text-sm">
                            <?php if ($topic->getLastResponse() !== null) : ?>
                            <a href="<?= $topic->getLastResponse()->getResponseTopic()->getForum()->getSlug() ?>/t/<?= $topic->getLastResponse()->getResponseTopic()->getSlug() ?>/#<?= $topic->getLastResponse()?->getId() ?>">
                                <?php endif; ?>
                                <div tabindex="0" class="avatar w-10">
                                    <div class="w-fit">
                                        <img
                                            src="<?= $topic->getLastResponse()?->getUser()->getUserPicture()->getImageLink() ?? ThemeModel::fetchImageLink("forum_nobody_send_message_img") ?>"/>
                                    </div>
                                </div>
                            </a>
                            <?php if ($topic->getLastResponse() !== null) : ?>
                            <a href="<?= $topic->getLastResponse()->getResponseTopic()->getForum()->getSlug() ?>/t/<?= $topic->getLastResponse()->getResponseTopic()->getSlug() ?>/#<?= $topic->getLastResponse()?->getId() ?>">
                                <?php endif; ?>
                                <div class="ml-2">
                                    <div
                                        class=""><?= $topic->getLastResponse()?->getUser()->getPseudo() ?? ThemeModel::fetchConfigValue('forum_nobody_send_message_text') ?></div>
                                    <div><?= $topic->getLastResponse()?->getCreated() ?? "" ?></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php if (UsersController::isAdminLogged()) : ?>
                        <!------------------
                         -- ADMIN SECTION --
                        -------------------->
                        <i data-modal-target="defaultModal-<?= $topic->getId() ?>"
                           data-modal-toggle="defaultModal-<?= $topic->getId() ?>" data-tooltip-target="tooltip-admin"
                           class="absolute right-1 top-8 fa-solid fa-lg fa-screwdriver-wrench text-blue-800 ml-6 "></i>
                        <div id="tooltip-admin" role="tooltip"
                             class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                            Administration du topic
                        </div>
                        <!------------------
                         --- ADMIN MODAL ---
                        -------------------->
                        <div id="defaultModal-<?= $topic->getId() ?>" tabindex="-1" aria-hidden="true"
                             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                            <div class="relative w-full h-full max-w-2xl md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Gestion de <?= $topic->getName() ?>
                                        </h3>
                                        <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="defaultModal-<?= $topic->getId() ?>">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4">

                                        <form id="modal-<?= $topic->getId() ?>"
                                              action="<?= $forum->getSlug() ?>/adminedit" method="post">
                                            <?php (new SecurityManager())->insertHiddenToken() ?>

                                            <input type="text" name="topicId" hidden value="<?= $topic->getId() ?>">

                                            <div class="flex justify-between mb-2">
                                                <div class="flex space-x-4">
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input name="important" value="1"
                                                                   id="important-<?= $topic->getId() ?>" type="checkbox"
                                                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50" <?= $topic->isImportant() ? 'checked' : '' ?>>
                                                        </div>
                                                        <label for="important-<?= $topic->getId() ?>"
                                                               class="ml-2 text-sm font-medium text-gray-900"><i
                                                                class="<?= $iconImportant ?> text-orange-500 fa-sm"></i>
                                                            Important</label>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input name="pin" id="pin-<?= $topic->getId() ?>"
                                                                   type="checkbox" value=""
                                                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50" <?= $topic->isPinned() ? 'checked' : '' ?>>
                                                        </div>
                                                        <label for="pin-<?= $topic->getId() ?>"
                                                               class="ml-2 text-sm font-medium text-gray-900"><i
                                                                class="<?= $iconPin ?> text-red-600 fa-sm"></i>
                                                            Épingler</label>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input name="disallow_replies" value="1"
                                                                   id="closed-<?= $topic->getId() ?>" type="checkbox"
                                                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50" <?= $topic->isDisallowReplies() ? 'checked' : '' ?>>
                                                        </div>
                                                        <label for="closed-<?= $topic->getId() ?>"
                                                               class="ml-2 text-sm font-medium text-gray-900"><i
                                                                class="<?= $iconClosed ?> text-yellow-300 fa-sm"></i>
                                                            Fermer</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grid gap-6 md:grid-cols-2">
                                                <div>
                                                    <label for="title"
                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre
                                                        du topic<span class="text-red-500">*</span> :</label>
                                                    <input name="name" id="title" type="text"
                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                           placeholder="Titre du topic" value="<?= $topic->getName() ?>"
                                                           required>
                                                </div>
                                                <div>
                                                    <label for="tags"
                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags
                                                        du topic<span class="text-red-500">*</span> :</label>
                                                    <input name="tags" id="tags" type="text"
                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                           placeholder="Titre du topic"
                                                           value="<?php foreach ($topic->getTags() as $tag) {
                                                               echo "" . $tag->getContent() . ",";
                                                           } ?>" required>
                                                </div>
                                            </div>

                                            <div class="grid gap-6 md:grid-cols-2 mt-2">
                                                <div>
                                                    <label for="prefix"
                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prefix
                                                        :</label>
                                                    <select name="prefix" id="prefix"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                        <option value="">Aucun</option>
                                                        <?php foreach ($prefixesModel = ForumPrefixModel::getInstance()->getPrefixes() as $prefix) : ?>
                                                            <option value="<?= $prefix->getId() ?>"
                                                                <?= ($topic->getPrefixName() === $prefix->getName() ? "selected" : "") ?>>
                                                                <?= $prefix->getName() ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label for="countries"
                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Déplacer
                                                        vers :</label>
                                                    <select id="forum" name="move"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <!--                                                        TODO Améliorer la façon dont les options sont affiché-->
                                                        <?php foreach ($categoryModel->getCategories() as $cat): ?>
                                                            <option disabled>──── <?= $cat->getName() ?> ────</option>
                                                            <?php foreach ($forumModel->getChildForumByCatId($cat->getId()) as $forumObject): ?>
                                                                <option
                                                                    value="<?= $forumObject->getId() ?>" <?= ($forumObject->getName() === $topic->getForum()->getName() ? "selected" : "") ?>><?= $forumObject->getName() ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </form>


                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex justify-between p-6 space-x-2 border-t border-gray-200 rounded-b">
                                        <a href="<?= $topic->trashLink($category->getLink(), $forum->getSlug()) ?>"
                                           class="text-gray-700 border-2 border-red-700 hover:border-red-800 font-medium rounded-md text-sm px-2 py-2.5 mr-2 mb-2">
                                            <i class="fa-solid fa-trash fa-lg"></i> Corbeille
                                        </a>

                                        <button type="submit" form="modal-<?= $topic->getId() ?>"
                                                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-md text-sm px-2 py-2.5 mr-2 mb-2">
                                            Valider
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>


        </div>
    </div>

    <?php if (ThemeModel::fetchConfigValue('forum_use_widgets')): ?>
        <div class="h-fit">
            <?php if (ThemeModel::fetchConfigValue('forum_widgets_show_stats')): ?>
                <div class="w-full shadow-md mb-6">
                    <div class="flex py-4 bg-gray-100 border-b">
                        <div class="px-4 font-bold">Stats forum</div>
                    </div>
                    <div class="px-2 py-4">
                        <?php if (ThemeModel::fetchConfigValue('forum_widgets_show_member')): ?>
                            <p><?= ThemeModel::fetchConfigValue('forum_widgets_text_member') ?>
                            <b><?= UsersModel::getInstance()->countUsers() ?></b></p><?php endif; ?>
                        <?php if (ThemeModel::fetchConfigValue('forum_widgets_show_messages')): ?>
                            <p><?= ThemeModel::fetchConfigValue('forum_widgets_text_messages') ?>
                            <b><?= $forumModel->countAllMessagesInAllForum() ?></b></p><?php endif; ?>
                        <?php if (ThemeModel::fetchConfigValue('forum_widgets_show_topics')): ?>
                            <p><?= ThemeModel::fetchConfigValue('forum_widgets_text_topics') ?>
                            <b><?= $forumModel->countAllTopicsInAllForum() ?></b></p><?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (ThemeModel::fetchConfigValue('forum_widgets_show_discord')): ?>
                <div class="w-full shadow-md mb-6">
                    <div class="">
                        <iframe style="width: 100%"
                                src="https://discord.com/widget?id=<?= ThemeModel::fetchConfigValue('forum_widgets_content') ?>&theme=light"
                                height="400" allowtransparency="true"
                                sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (ThemeModel::fetchConfigValue('forum_widgets_show_custom')): ?>
                <div class="w-full shadow-md mb-6">
                    <div class="flex py-4 bg-gray-100 border-b">
                        <div
                            class="px-4 font-bold"><?= ThemeModel::fetchConfigValue('forum_widgets_custom_title') ?></div>
                    </div>
                    <div class="px-2 py-4">
                        <?= ThemeModel::fetchConfigValue('forum_widgets_custom_text') ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>
