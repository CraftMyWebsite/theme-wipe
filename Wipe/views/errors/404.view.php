<?php
use CMW\Model\Core\ThemeModel;
$title = "Page introuvable";
$description = "Erreur";
?>
<section class="bg-gray-800 relative text-white">
    <!--PROD DEFINIR LA SOURCE-->
    <img src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Ooops !..</h1>
            </div>
        </div>
    </div>
</section>

<div class="relative w-full text-center">
    <h1 class="text-gray-600 font-extrabold" style="font-size: 12rem">{errorCode}</h1>
    <p>La page que vous demandez n'existe pas ou n'existe plus !</p>
    <p>Vous pouvez toujours <a href="/" class="text-blue-500">retourner à l'accueil.</a></p>
</div>