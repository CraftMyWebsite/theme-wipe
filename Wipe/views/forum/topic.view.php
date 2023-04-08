<?php

use CMW\Model\Core\ThemeModel;
use CMW\Utils\Utils;
use CMW\Manager\Security\SecurityManager;

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
                    <a href="/forum" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        Accueil
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="/forum/f/" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Je sais pas</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="/<?= $topic->getLink() ?>" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $topic->getName() ?></a>
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
                    <i data-tooltip-target="tooltip-important" class="fa-solid fa-triangle-exclamation text-orange-500 ml-4"></i>
                    <div id="tooltip-important" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                        Important
                    </div>
                    <i data-tooltip-target="tooltip-pined" class="fa-solid fa-thumbtack text-red-600 ml-4"></i>
                    <div id="tooltip-pined" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                        Épinglé
                    </div>
                    <i data-tooltip-target="tooltip-closed" class="fa-solid fa-lock text-yellow-300 ml-4"></i>
                    <div id="tooltip-closed" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                        Fermé
                    </div>
                </div>
            </div>

            <p><small>Discussion dans crée par <?= $topic->getUser()->getUserName() ?>, le <?= $topic->getCreated() ?></small></p>
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
                <p>#1</p>
            </div>
            <div class="lg:grid grid-cols-5">
                <div class="p-4 text-center ">
                    <div class="bg-gray-100 p-2">
                        <div class="w-36 h-36 mx-auto border">
                            <img style="object-fit: fill; max-height: 144px; max-width: 144px" width="144px" height="144px" src="<?= getenv('PATH_SUBFOLDER') ?>public/uploads/users/<?= $topic->getUser()->getUserPicture()->getImageName() ?>" />
                        </div>
                    </div>
                    <h5 class="font-semibold bg-gray-200"><?= $topic->getUser()->getUserName() ?></h5>
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
                            <p><small><?= $topic->getUser()->getUserName() ?>, <?= $topic->getCreated() ?></small></p>
                            <p>#1</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php if (!$responseModel->countResponseInTopic($topic->getId())): ?>
    <h4 style="text-align: center">Soyez le premier à répondre !</h4>
<?php endif; ?>
<?php foreach ($responseModel->getResponseByTopic($topic->getId()) as $response) : ?>
<section class="border mt-4">
            <div class="flex justify-between bg-gray-200 p-2">
                <p><?= $response->getCreated() ?></p>
                <p>#1</p>
            </div>
            <div class="lg:grid grid-cols-5">
                <div class="p-4 text-center ">
                    <div class="bg-gray-100 p-2">
                        <div class="w-36 h-36 mx-auto border">
                            <img style="object-fit: fill; max-height: 144px; max-width: 144px" width="144px" height="144px" src="<?= getenv('PATH_SUBFOLDER') ?>public/uploads/users/<?= $response->getUser()->getUserPicture()->getImageName() ?>" />
                        </div>
                    </div>
                    <h5 class="font-semibold bg-gray-200"><?= $response->getUser()->getUsername() ?></h5>
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
                            <p><small><?= $response->getUser()->getUserName() ?>, <?= $response->getCreated() ?></small></p>
                            <p>#1</p>
                        </div>
                    </div>
                </div>
                <?php if ($response->isSelfReply()): ?>
                    <a href="<?= $response->deleteLink() ?>">Supprimer ma réponse</a>
                <?php endif; ?>
            </div>
        </section>
<?php endforeach; ?>



<?php if($topic->isDisallowReplies()): ?>

    <section>
        Ce topic est clos
    </section>

<?php else: ?>
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
                            <h5 class="font-semibold bg-gray-200"><?= $topic->getUser()->getUserName() ?></h5>
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
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</section>
<?php endif; ?>
