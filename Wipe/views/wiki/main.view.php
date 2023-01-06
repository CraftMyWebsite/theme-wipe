<?php 
use CMW\Model\Core\ThemeModel;
/*TITRE ET DESCRIPTION*/
use CMW\Utils\Utils;
$title = Utils::getSiteName() . ' - '. ThemeModel::fetchConfigValue('wiki_title');
$description = ThemeModel::fetchConfigValue('wiki_description');
?>
<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl"><?= ThemeModel::fetchConfigValue('wiki_page_title') ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="px-2 md:px-24 xl:px-48 2xl:px-72 py-6">
    <div class="lg:grid lg:grid-cols-4 gap-6">

        <div class="col-span-3 mt-4 lg:mt-0">
            <div class="container mx-auto rounded-md shadow-lg py-4 px-8">
                <?php if($article !== null): ?>
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase"><?php if(ThemeModel::fetchConfigValue('wiki_display_article_icon')): ?><i class="<?= $article->getIcon() ?>"></i><?php endif; ?> <?= $article->getTitle() ?></h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                <div class="mb-4"><?= $article->getContent() ?></div>
                <div class="flex flex-wrap justify-between border-t">
                    <?php if(ThemeModel::fetchConfigValue('wiki_display_creation_date')): ?><div class="mt-1">Crée le : <?= date("d/m/Y", strtotime($article->getDateCreate())) ?></div><?php endif; ?>
                    <?php if(ThemeModel::fetchConfigValue('wiki_display_autor')): ?><div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs mt-1"><?= $article->getAuthor()->getUsername() ?></div><?php endif; ?>
                    <?php if(ThemeModel::fetchConfigValue('wiki_display_edit_date')): ?><div class="mt-1">Modifié le : <?= date("d/m/Y", strtotime($article->getDateUpdate())) ?></div><?php endif; ?>
                </div>
                <?php elseif($firstArticle === null && $article !== null): ?>
                <div class="flex flex-no-wrap justify-center items-center py-4">
                        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase">Aucun article !</h2>
                    </div>
                        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    </div>
                        <div class="mb-4">Vous n'avez pas encoré commencer la création de votre Wiki ! <br>Connectez-vous pour le remplir !</div>
                    <div class="flex flex-wrap justify-between border-t">
                        <div class="mt-1">Crée le : Jamais</div>
                        <div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs mt-1">Personne</div>
                        <div class="mt-1">Modifié le : Jamais</div>
                    </div>
                <?php else: ?>
                    <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase"><?php if(ThemeModel::fetchConfigValue('wiki_display_article_icon')): ?><i class="<?= $firstArticle->getIcon() ?>"></i><?php endif; ?> <?= $firstArticle->getTitle() ?></h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                <div class="mb-4"><?= $firstArticle->getContent() ?></div>
                <div class="flex flex-wrap justify-between border-t">
                    <?php if(ThemeModel::fetchConfigValue('wiki_display_creation_date')): ?><div class="mt-1">Crée le : <?= date("d/m/Y", strtotime($firstArticle->getDateCreate())) ?></div><?php endif; ?>
                    <?php if(ThemeModel::fetchConfigValue('wiki_display_autor')): ?><div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs mt-1"><?= $firstArticle->getAuthor()->getUsername() ?></div><?php endif; ?>
                    <?php if(ThemeModel::fetchConfigValue('wiki_display_edit_date')): ?><div class="mt-1">Modifié le : <?= date("d/m/Y", strtotime($firstArticle->getDateUpdate())) ?></div><?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="container mx-auto rounded-md shadow-lg p-4 h-fit">
            <div class="flex flex-no-wrap justify-center items-center py-4 -mb-6">
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                <div class="px-10 w-auto">
                    <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('wiki_menu_title') ?></h2>
                </div>
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
            </div>
            <?php foreach ($categories as $categorie): ?>
            <div class="font-medium text-gray-500 mt-6 cursor-default"><?php if(ThemeModel::fetchConfigValue('wiki_display_categorie_icon')): ?><i class="<?= $categorie->getIcon() ?>"></i><?php endif; ?> <?= $categorie->getName() ?></div>
            <?php foreach ($categorie?->getArticles() as $article): ?>
                <a href="<?= getenv("PATH_SUBFOLDER") . "wiki/" . $categorie->getSlug() . "/" . $article->getSlug() ?>">
                    <div class="pl-2 py-1 mt-1 cursor-pointer rounded hover:bg-gray-200"><?php if(ThemeModel::fetchConfigValue('wiki_display_article_categorie_icon')): ?><i class="<?= $article->getIcon() ?>"></i><?php endif; ?> <?= $article->getTitle() ?></div>
                </a>
            <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>


