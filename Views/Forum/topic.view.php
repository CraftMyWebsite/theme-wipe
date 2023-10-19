<?php

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Uploads\ImagesManager;
use CMW\Model\Core\ThemeModel;
use CMW\Manager\Security\SecurityManager;
use CMW\Controller\Users\UsersController;
use CMW\Model\Forum\ForumDiscordModel;
use CMW\Model\Forum\ForumFeedbackModel;
use CMW\Model\Forum\ForumFollowedModel;
use CMW\Model\Forum\ForumPermissionRoleModel;
use CMW\Model\Users\UsersModel;
use CMW\Utils\Website;

/* @var \CMW\Entity\Forum\ForumCategoryEntity $category */
/* @var CMW\Model\Forum\ForumModel $forumModel */
/* @var CMW\Entity\Forum\ForumEntity $forum */
/* @var CMW\Controller\Forum\ForumSettingsController $iconNotRead */
/* @var CMW\Controller\Forum\ForumSettingsController $iconImportant */
/* @var CMW\Controller\Forum\ForumSettingsController $iconPin */
/* @var CMW\Controller\Forum\ForumSettingsController $iconClosed */
/* @var CMW\Model\Forum\ForumFeedbackModel $feedbackModel */
/* @var CMW\Entity\Forum\ForumTopicEntity $topic */
/* @var CMW\Entity\Forum\ForumResponseEntity[] $responses */
$title = "Titre de la page";
$description = "Description de votre page";
$i = 0;
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
                            <a href="../../../<?= $parent->getLink() ?>"
                               class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $parent->getName() ?></a>
                        </div>
                    </li>
                <?php endforeach; ?>
                <li>
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href=""
                           class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $topic->getName() ?></a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    <form>
        <div class="flex">
            <div class="relative w-full">
                <input type="search" id="search-dropdown"
                       class="block p-1 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Rechercher">
                <button type="submit"
                        class="absolute top-0 right-0 p-1 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </form>
</section>

<?php if ($totalPage > "1"): ?>
<div class="mx-auto">
    <div class="flex">
        <?php if ($currentPage !== "1"): ?>
            <a href="p1"
                    class="mr-2 p-1 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <i class="fa-solid fa-chevron-left"></i><i class="fa-solid fa-chevron-left"></i></a>
            <a href="p<?=$currentPage-1?>"
               class="p-1 text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <i class="fa-solid fa-chevron-left"></i></a>
        <?php endif; ?>
            <span class="border border-blue-700 p-1 text-sm"><?= $currentPage?>/<?= $totalPage?></span>
        <?php if ($currentPage !== $totalPage): ?>
            <a href="p<?=$currentPage+1?>"
                    class="p-1 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <i class="fa-solid fa-chevron-right"></i></a>
            <a href="p<?=$totalPage?>"
               class="ml-2 p-1 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <i class="fa-solid fa-chevron-right"></i><i class="fa-solid fa-chevron-right"></i></a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<section class="my-8 sm:mx-12 2xl:mx-72">
    <div class="rounded-md shadow-lg p-8">
        <section>
            <div class="flex justify-between">
                <h4>
                    <?php if ($topic->getPrefixId()): ?><span class="px-2 text-white rounded-lg"
                                                              style="color: <?= $topic->getPrefixTextColor() ?>; background: <?= $topic->getPrefixColor() ?>"><?= $topic->getPrefixName() ?></span> <?php endif; ?><?= $topic->getName() ?>
                </h4>
                <div class="">
                    <?php if ($topic->isImportant()): ?>
                        <i data-tooltip-target="tooltip-important"
                           class="<?= $iconImportant ?> text-orange-500 ml-4"></i>
                        <div id="tooltip-important" role="tooltip"
                             class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                            Important
                        </div>
                    <?php endif; ?>
                    <?php if ($topic->isPinned()): ?>
                        <i data-tooltip-target="tooltip-pined" class="<?= $iconPin ?> text-red-600 ml-4"></i>
                        <div id="tooltip-pined" role="tooltip"
                             class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                            Épinglé
                        </div>
                    <?php endif; ?>
                    <?php if ($topic->isDisallowReplies()): ?>
                        <i data-tooltip-target="tooltip-closed" class="<?= $iconClosed ?> text-yellow-300 ml-4"></i>
                        <div id="tooltip-closed" role="tooltip"
                             class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                            Fermé
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <p><small>Discussion dans crée par <?= $topic->getUser()->getPseudo() ?>,
                    le <?= $topic->getCreated() ?></small></p>
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
                <div>
                    <?php if (UsersController::isUserLogged()): ?>
                        <?php if (ForumFollowedModel::getInstance()->isFollower($topic->getId(), UsersModel::getCurrentUser()?->getId())): ?>
                            <a href="<?= $topic->unfollowTopicLink() ?>"><i
                                    class="fa-solid fa-eye-slash text-blue-500 mr-2"></i></a>
                        <?php else: ?>
                            <a href="<?= $topic->followTopicLink() ?>"><i
                                    class="fa-solid fa-eye text-blue-500 mr-2"></i></a>
                        <?php endif ?>
                    <?php endif; ?>
                    <i data-modal-target="reportTopic-<?= $topic->getId() ?>"
                       data-modal-toggle="reportTopic-<?= $topic->getId() ?>" data-tooltip-target="tooltip-admin"
                       class="fa-solid fa-circle-exclamation"></i>
                </div>

            </div>
            <!------------------
            --- REPORT TOPIC MODAL ---
            -------------------->
            <div id="reportTopic-<?= $topic->getId() ?>" tabindex="-1" aria-hidden="true"
                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative w-full h-full max-w-2xl md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Signalé le topic <?= $topic->getName() ?>
                            </h3>
                            <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="reportTopic-<?= $topic->getId() ?>">
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
                        <form id="modal-<?= $topic->getId() ?>"
                              action="p1/reportTopic/<?= $topic->getId() ?>"
                              method="post">
                            <?php (new SecurityManager())->insertHiddenToken() ?>
                            <div class="p-4">
                                <div>
                                    <label for="reportTopic"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raison</label>
                                    <select id="reportTopic" name="reason"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="1">Nom du topic inapproprié</option>
                                        <option value="2">Le topic n'est pas au bon endroit</option>
                                        <option value="3">Contenue choquant</option>
                                        <option value="4">Harcèlement, discrimination ...</option>
                                        <option value="0">Autre</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex justify-between p-6 space-x-2 border-t border-gray-200 rounded-b">
                                <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-md text-sm px-2 py-2.5 mr-2 mb-2">
                                    Signalé
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="lg:grid grid-cols-5">
                <div class="p-4 text-center ">
                    <div class="bg-gray-100 p-2">
                        <div class="w-36 h-36 mx-auto border">
                            <img style="object-fit: fill; max-height: 144px; max-width: 144px" width="144px"
                                 height="144px"
                                 src="<?= $topic->getUser()->getUserPicture()->getImage() ?>"/>
                        </div>
                    </div>
                    <h5 class="font-semibold bg-gray-200"><?= $topic->getUser()->getPseudo() ?></h5>
                    <div class="bg-gray-100 pb-1">
                        <p>
                            <small><?= ForumPermissionRoleModel::getInstance()->getHighestRoleByUser($topic->getUser()->getId())->getName() ?></small>
                        </p>
                    </div>
                    <div class="px-4 pb-2 bg-gray-100">
                        <div class="border">
                            <div class="grid grid-cols-3">
                                <div>
                                    <p><i class="fa-solid fa-comments fa-xs text-gray-600"></i></p>
                                    <p>
                                        <small><?= $responseModel->countResponseByUser($topic->getUser()->getId()) ?></small>
                                    </p>
                                </div>
                                <div>
                                    <p><i class="fa-solid fa-thumbs-up fa-xs text-gray-600"></i></p>
                                    <p>
                                        <small><?= $feedbackModel->countTopicFeedbackByUser($topic->getUser()->getId()) ?></small>
                                    </p>
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

                    <div class="flex flex-wrap gap-2 text-center mt-1">
                        <?php foreach ($feedbackModel->getFeedbacks() as $feedback) : ?>
                            <?php if ($feedback->userCanTopicReact($topic->getId())): ?>
                                <?php if (UsersController::isUserLogged()): ?>
                                    <?php if ($feedback->getFeedbackTopicReacted($topic->getId()) == $feedback->getId()): ?>
                                        <a class="bg-blue-200 border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                           data-tooltip-target="tooltip-users-<?= $feedback->getId() ?>"
                                           href="<?= $topic->getFeedbackDeleteTopicLink($feedback->getId()) ?>">
                                            <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                                 src="<?= $feedback->getImage() ?>"></img>
                                            <?= $feedback->countTopicFeedbackReceived($topic->getId()) ?>
                                            <div id="tooltip-users-<?= $feedback->getId() ?>" role="tooltip"
                                                 class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                                <?php foreach ($feedbackModel->getTopicUsersFeedbackByFeedbackId($topic->getId(), $feedback->getId()) as $userId) : ?>
                                                    <small
                                                        class="px-2 text-xs">- <?= $user = UsersModel::getInstance()->getUserById($userId)->getPseudo() ?></small>
                                                <?php endforeach; ?>
                                                <p class="p-1"><small><?= $feedback->getName() ?></small></p>
                                            </div>
                                        </a>
                                    <?php else: ?>
                                        <a class="bg-blue-50 border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                           data-tooltip-target="tooltip-users-<?= $feedback->getId() ?>"
                                           href="<?= $topic->getFeedbackChangeTopicLink($feedback->getId()) ?>">
                                            <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                                 src="<?= $feedback->getImage() ?>"></img>
                                            <?= $feedback->countTopicFeedbackReceived($topic->getId()) ?>
                                            <div id="tooltip-users-<?= $feedback->getId() ?>" role="tooltip"
                                                 class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                                <?php foreach ($feedbackModel->getTopicUsersFeedbackByFeedbackId($topic->getId(), $feedback->getId()) as $userId) : ?>
                                                    <small
                                                        class="px-2">- <?= $user = UsersModel::getInstance()->getUserById($userId)->getPseudo() ?></small>
                                                <?php endforeach; ?>
                                                <p class="p-1"><small><?= $feedback->getName() ?></small></p>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div
                                        class="bg-blue-50 border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                        data-tooltip-target="tooltip-users-<?= $feedback->getId() ?>">
                                        <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                             src="<?= $feedback->getImage() ?>"></img>
                                        <?= $feedback->countTopicFeedbackReceived($topic->getId()) ?>
                                        <div id="tooltip-users-<?= $feedback->getId() ?>" role="tooltip"
                                             class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                            <?php foreach ($feedbackModel->getTopicUsersFeedbackByFeedbackId($topic->getId(), $feedback->getId()) as $userId) : ?>
                                                <small
                                                    class="px-2">- <?= $user = UsersModel::getInstance()->getUserById($userId)->getPseudo() ?></small>
                                            <?php endforeach; ?>
                                            <p class="p-1"><small><?= $feedback->getName() ?></small></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <a class="bg-blue-50 border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                   data-tooltip-target="tooltip-users-<?= $feedback->getId() ?>"
                                   href="<?= $topic->getFeedbackAddTopicLink($feedback->getId()) ?>">
                                    <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                         src="<?= $feedback->getImage() ?>"></img>
                                    <?= $feedback->countTopicFeedbackReceived($topic->getId()) ?>
                                    <div id="tooltip-users-<?= $feedback->getId() ?>" role="tooltip"
                                         class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                        <?php foreach ($feedbackModel->getTopicUsersFeedbackByFeedbackId($topic->getId(), $feedback->getId()) as $userId) : ?>
                                            <small
                                                class="px-2">- <?= $user = UsersModel::getInstance()->getUserById($userId)->getPseudo() ?></small>
                                        <?php endforeach; ?>
                                        <p class="p-1"><small><?= $feedback->getName() ?></small></p>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>


                    <div class="flex justify-end p-1">
                        <?php if ($topic->isSelfTopic()): ?>
                            <a href="<?= $topic->editTopicLink() ?>">
                                <i data-tooltip-target="tooltip-edittopic"
                                   class="fa-solid fa-edit text-blue-500 ml-4"></i>
                                <div id="tooltip-edittopic" role="tooltip"
                                     class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                    Éditer ma réponse
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </section>


        <div class="flex flex-no-wrap justify-center items-center py-4">
            <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
            <div class="px-10 w-auto">
                <h2 class="font-semibold text-2xl uppercase">Réponses</h2>
            </div>
            <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        </div>


        <?php foreach ($responses as $response) : ?>
            <section class="border mt-4" id="<?= $response->getId() ?>">
                <div class="flex justify-between bg-gray-200 p-2">
                    <p><?= $response->getCreated() ?></p>
                    <div>
                        <span class="mr-2"><?= $response->isTopicAuthor() ? "Auteur du topic" : "" ?></span>
                        <span
                            onclick="copyURL('<?= Website::getProtocol() . "://" . $_SERVER['HTTP_HOST'] . EnvManager::getInstance()->getValue("PATH_SUBFOLDER") . "forum/c/" . $category->getSlug() . "/f/" . $forum->getSlug() . "/t/" . $response->getResponseTopic()->getSlug()."/p".$currentPage."/#" . $response->getId() ?>')"
                            class="text-gray-700 hover:text-blue-600"><i class="fa-solid fa-share-nodes"></i></span>
                        <span><i data-modal-target="reportResponse-<?= $response->getId() ?>"
                                 data-modal-toggle="reportResponse-<?= $response->getId() ?>"
                                 data-tooltip-target="tooltip-admin"
                                 class="fa-solid fa-circle-exclamation ml-2"></i></span>
                        <span class="ml-2">#<?= $response->getResponsePosition() ?></span>
                    </div>
                </div>

                <!------------------
            --- REPORT TOPIC MODAL ---
            -------------------->
                <div id="reportResponse-<?= $response->getId() ?>" tabindex="-1" aria-hidden="true"
                     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                    <div class="relative w-full h-full max-w-2xl md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Signalé cette réponse
                                </h3>
                                <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="reportResponse-<?= $response->getId() ?>">
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
                            <form id="modal-<?= $response->getId() ?>"
                                  action="p1/reportResponse/<?= $response->getId() ?>"
                                  method="post">
                                <?php (new SecurityManager())->insertHiddenToken() ?>
                                <div class="p-4">
                                    <div>
                                        <label for="reportTopic"
                                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Raison</label>
                                        <select id="reportTopic" name="reason"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="1">Réponse inapproprié</option>
                                            <option value="2">Contenue choquant</option>
                                            <option value="3">Harcèlement, discrimination ...</option>
                                            <option value="0">Autre</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="flex justify-between p-6 space-x-2 border-t border-gray-200 rounded-b">
                                    <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-md text-sm px-2 py-2.5 mr-2 mb-2">
                                        Signalé
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="lg:grid grid-cols-5">
                    <div class="p-4 text-center ">
                        <div class="bg-gray-100 p-2">
                            <div class="w-36 h-36 mx-auto border">
                                <img style="object-fit: fill; max-height: 144px; max-width: 144px" width="144px"
                                     height="144px"
                                     src="<?= $response->getUser()->getUserPicture()->getImage() ?>"/>
                            </div>
                        </div>
                        <h5 class="font-semibold bg-gray-200"><?= $response->getUser()->getPseudo() ?></h5>
                        <div class="bg-gray-100 pb-1">
                            <p>
                                <small><?= ForumPermissionRoleModel::getInstance()->getHighestRoleByUser($response->getUser()->getId())->getName() ?></small>
                            </p>
                        </div>
                        <div class="px-4 pb-2 bg-gray-100">
                            <div class="border">
                                <div class="grid grid-cols-3">
                                    <div>
                                        <p><i class="fa-solid fa-comments fa-xs text-gray-600"></i></p>
                                        <p>
                                            <small><?= $responseModel->countResponseByUser($response->getUser()->getId()) ?></small>
                                        </p>
                                    </div>
                                    <div>
                                        <p><i class="fa-solid fa-thumbs-up fa-xs text-gray-600"></i></p>
                                        <p>
                                            <small><?= $feedbackModel->countTopicFeedbackByUser($topic->getUser()->getId()) ?></small>
                                        </p>
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
                                <p><small><?= $response->getUser()->getPseudo() ?>
                                        , <?= $response->getCreated() ?></small></p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 text-center mt-1">
                            <?php foreach ($feedbackModel->getFeedbacks() as $responseFeedback) : ?>
                                <?php if ($responseFeedback->userCanResponseReact($response->getId())): ?>
                                    <?php if (UsersController::isUserLogged()): ?>
                                        <?php if ($responseFeedback->getFeedbackResponseReacted($response->getId()) === $responseFeedback->getId()): ?>

                                            <a class="bg-blue-200 border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                               data-tooltip-target="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>"
                                               href="<?= $response->getFeedbackDeleteResponseLink($responseFeedback->getId()) ?>">
                                                <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                                     src="<?= $responseFeedback->getImage() ?>"></img>
                                                <?= $responseFeedback->countResponseFeedbackReceived($response->getId()) ?>
                                                <div
                                                    id="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>"
                                                    role="tooltip"
                                                    class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                                    <?php foreach ($feedbackModel->getResponseUsersFeedbackByFeedbackId($response->getId(), $responseFeedback->getId()) as $userResponseId) : ?>
                                                        <small
                                                            class="px-2">- <?= $user = UsersModel::getInstance()->getUserById($userResponseId)->getPseudo() ?></small>
                                                        <?php $i++; ?>
                                                    <?php endforeach; ?>
                                                    <p class="p-1"><small><?= $responseFeedback->getName() ?></small>
                                                    </p>
                                                </div>

                                            </a>
                                        <?php else: ?>
                                            <a class="bg-blue-50 border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                               data-tooltip-target="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>"
                                               href="<?= $response->getFeedbackChangeResponseLink($responseFeedback->getId()) ?>">
                                                <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                                     src="<?= $responseFeedback->getImage() ?>"></img>
                                                <?= $responseFeedback->countResponseFeedbackReceived($response->getId()) ?>
                                                <div
                                                    id="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>"
                                                    role="tooltip"
                                                    class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                                    <?php foreach ($feedbackModel->getResponseUsersFeedbackByFeedbackId($response->getId(), $responseFeedback->getId()) as $userResponseId) : ?>
                                                        <small
                                                            class="px-2">- <?= $user = UsersModel::getInstance()->getUserById($userResponseId)->getPseudo() ?></small>
                                                        <?php $i++; ?>
                                                    <?php endforeach; ?>
                                                    <p class="p-1"><small><?= $responseFeedback->getName() ?></small>
                                                    </p>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <div
                                            class="bg-blue-50 border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                            data-tooltip-target="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>">
                                            <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                                 src="<?= $responseFeedback->getImage() ?>"></img>
                                            <?= $responseFeedback->countResponseFeedbackReceived($response->getId()) ?>
                                            <div id="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>"
                                                 role="tooltip"
                                                 class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                                <?php foreach ($feedbackModel->getResponseUsersFeedbackByFeedbackId($response->getId(), $responseFeedback->getId()) as $userResponseId) : ?>
                                                    <small
                                                        class="px-2">- <?= $user = UsersModel::getInstance()->getUserById($userResponseId)->getPseudo() ?></small>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                                <p class="p-1"><small><?= $responseFeedback->getName() ?></small></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a class="bg-blue-50 border-2 border-blue-300 px-1 flex flex-wrap rounded-xl items-center mr-2"
                                       data-tooltip-target="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>"
                                       href="<?= $response->getFeedbackAddResponseLink($responseFeedback->getId()) ?>">
                                        <img class="mr-1" alt="..." style="max-width: 20px; max-height: 20px"
                                             src="<?= $responseFeedback->getImage() ?>"></img>
                                        <?= $responseFeedback->countResponseFeedbackReceived($response->getId()) ?>
                                        <div id="tooltip-users-response-<?= $responseFeedback->getId() ?>-<?= $i ?>"
                                             role="tooltip"
                                             class="absolute z-10 invisible inline-block text-sm font-medium text-white bg-gray-700 rounded-lg">
                                            <?php foreach ($feedbackModel->getResponseUsersFeedbackByFeedbackId($response->getId(), $responseFeedback->getId()) as $userResponseId) : ?>
                                                <small
                                                    class="px-2">- <?= $user = UsersModel::getInstance()->getUserById($userResponseId)->getPseudo() ?></small>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                            <p class="p-1"><small><?= $responseFeedback->getName() ?></small></p>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>


                        <div class="flex justify-end p-1">
                            <?php if ($response->isSelfReply()): ?>
                                <i data-modal-target="popup-modal-<?= $response->getId() ?>"
                                   data-modal-toggle="popup-modal-<?= $response->getId() ?>"
                                   data-tooltip-target="tooltip-delete" class="fa-solid fa-trash text-red-500 ml-4"></i>
                                <div id="tooltip-delete" role="tooltip"
                                     class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                    Supprimer ma réponse
                                </div>
                                <div id="popup-modal-<?= $response->getId() ?>" tabindex="-1"
                                     class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                    data-modal-hide="popup-modal-<?= $response->getId() ?>">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-6 text-center">
                                                <svg aria-hidden="true"
                                                     class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                                     fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Voulez-vous vraiment supprimer votre réponse ?</h3>
                                                <a href="<?= $response->trashLink() ?>"
                                                   class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Supprimer
                                                </a>
                                                <button data-modal-hide="popup-modal-<?= $response->getId() ?>"
                                                        type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Annuler
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>

        <?php if ($totalPage > "1"): ?>
            <div class="mx-auto mt-4">
                <div class="flex">
                    <?php if ($currentPage !== "1"): ?>
                        <a href="p1"
                           class="mr-2 p-1 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <i class="fa-solid fa-chevron-left"></i><i class="fa-solid fa-chevron-left"></i></a>
                        <a href="p<?=$currentPage-1?>"
                           class="p-1 text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <i class="fa-solid fa-chevron-left"></i></a>
                    <?php endif; ?>
                    <span class="border border-blue-700 p-1 text-sm"><?= $currentPage?>/<?= $totalPage?></span>
                    <?php if ($currentPage !== $totalPage): ?>
                        <a href="p<?=$currentPage+1?>"
                           class="p-1 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <i class="fa-solid fa-chevron-right"></i></a>
                        <a href="p<?=$totalPage?>"
                           class="ml-2 p-1 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <i class="fa-solid fa-chevron-right"></i><i class="fa-solid fa-chevron-right"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!$topic->isDisallowReplies() && UsersController::isUserLogged()): ?>
            <section class="border mt-4">
                <div class="bg-gray-200 p-2">
                    <p><b>Répondre à ce topic :</b></p>
                </div>
                <div class="lg:grid grid-cols-5">
                    <div class="p-4 text-center ">
                        <div class="bg-gray-100 pt-2">
                            <div class="w-36 h-36 mx-auto border">
                                <img style="object-fit: fill; max-height: 144px; max-width: 144px" width="144px"
                                     height="144px"
                                     src="<?= UsersModel::getCurrentUser()->getUserPicture()->getImage() ?>"/>
                            </div>
                            <h5 class="font-semibold bg-gray-200"><?= UsersModel::getCurrentUser()->getPseudo() ?></h5>
                        </div>
                    </div>
                    <div class="col-span-4 py-4 pr-2">
                        <div class="h-fit">
                            <form action="" method="post">
                                <?php (new SecurityManager())->insertHiddenToken() ?>
                                <input hidden type="text" name="topicId" value="<?= $topic->getId() ?>">
                                <textarea minlength="20" class="w-full tinymce" name="topicResponse"></textarea>
                                <div class="flex justify-end mt-2">
                                    <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                        <i class="fa-solid fa-reply"></i> Poster ma réponse
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
</section>

<p class="needConnect">blop !</p>

<link rel="stylesheet"
      href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'Admin/Resources/Vendors/Izitoast/iziToast.min.css' ?>">
<script
    src="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'Admin/Resources/Vendors/Izitoast/iziToast.min.js' ?>"></script>

<script>
    let hash = window.location.hash;
    if (hash) {
        hash = hash.substring(1);

        // Fonction pour afficher l'élément avec un décalage de 200 pixels vers le haut
        function scrollToElementWithOffset() {
            var element = document.getElementById(hash);
            if (element) {
                var offsetTop = element.offsetTop - 200;
                window.scrollTo(0, offsetTop);
            }
        }

        // Appelez la fonction scrollToElementWithOffset lorsque la page a fini de se charger
        window.addEventListener('load', scrollToElementWithOffset);

        // Fonction pour faire clignoter la bordure toutes 150 ms
        function toggleHighlight() {
            var element = document.getElementById(hash);
            if (element) {
                if (element.style.border === "2px solid blue") {
                    element.style.border = "1px solid #E5E7EB";
                } else {
                    element.style.border = "2px solid blue";
                }
            }
        }

        // Appelez la fonction toggleHighlight toutes les 150 ms
        var interval = setInterval(toggleHighlight, 150);

        // Arrêtez le clignotement après un certain temps
        setTimeout(function () {
            clearInterval(interval);
            var element = document.getElementById(hash);
            if (element) {
                element.style.border = "1px solid #E5E7EB";
            }
        }, 1200);
    }


    function copyURL(url) {
        navigator.clipboard.writeText(url)
        iziToast.show(
            {
                titleSize: '16',
                messageSize: '14',
                icon: 'fa-solid fa-check',
                title: "Forum",
                message: "Le liens vers cette réponse à été copié !",
                color: "#41435F",
                iconColor: '#22E445',
                titleColor: '#22E445',
                messageColor: '#fff',
                balloon: false,
                close: false,
                position: 'bottomRight',
                timeout: 5000,
                animateInside: false,
                progressBar: false,
                transitionIn: 'fadeInLeft',
                transitionOut: 'fadeOutRight',
            });
    }


    //Besoin d'être connecter pour afficher
    var isLoggedIn = <?php echo UsersController::isUserLogged() ? 'true' : 'false'; ?>;
    var elementsToToggle = document.querySelectorAll('.needConnect');
    for (var i = 0; i < elementsToToggle.length; i++) {
        if (!isLoggedIn) {
            elementsToToggle[i].innerHTML = "<i>Vous devez être <a style='color: #0d6efd' href='/login'>connecter</a> pour afficher ce contenue</i>";
        }
    }
</script>