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




    <section>
        <div class="container">
            <h2><?= "{$topic->getId()}. {$topic->getName()}" ?></h2>
            <p>
                <?= $topic->getContent() ?>
            </p>
        </div>
        <div class="container">
            <h3>Réponses :</h3>
            <?php if (!$responseModel->countResponseInTopic($topic->getId())): ?>
                <h4 style="text-align: center">Aucune réponse...</h4>
            <?php endif; ?>
            <?php foreach ($responseModel->getResponseByTopic($topic->getId()) as $response) : ?>
                <h4><?= $response->getContent() ?></h4>
                <span><?= $response->getUser()->getUsername() ?></span>
                <span><?= $response->getCreated() ?></span>
                <span><?= $response->getUpdate() ?></span>
                <?php if ($response->isSelfReply()): ?>
                    <a href="<?= $response->deleteLink() ?>">Supprimer ma réponse</a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <hr>
    </section>

<?php if($topic->isDisallowReplies()): ?>

    <section>
        Les réponses sont désactivés sur ce topic.
    </section>

<?php else: ?>

    <section>
        <form action="" method="post">
            <?php (new SecurityManager())->insertHiddenToken() ?>
            <label style="display:block;" for="topicResponse">Votre réponse : </label>
            <input hidden type="text" name="topicId" value="<?= $topic->getId() ?>">
            <textarea required name="topicResponse" id="summernote-1" cols="30" rows="10"></textarea>
            <input type="submit" value="Envoyer !">
        </form>
    </section>

<?php endif; ?>

<?php if ($topic->getTags() === []): ?>

    <div class="container" style="margin-top: 25px">
        <h5>Ce topic ne possède pas de tags</h5>
    </div>

<?php else: ?>

    <div class="container" style="margin-top: 25px">
        Voici les tags de ce topic:

        <ul>
            <?php foreach ($topic->getTags() as $tag): ?>
                <li>#<?= $tag->getContent() ?></li>
            <?php endforeach; ?>
        </ul>

    </div>
<?php endif; ?>