<?php

/* @var \CMW\Entity\Pages\PageEntity $page */
/* @var \CMW\Model\Pages\PagesModel $pages */
/* @var \CMW\Controller\CoreController $core */
/* @var \CMW\Controller\Menus\MenusController $menu */

/*ACTIVER EN PROD :
$title = ucfirst($page->getTitle());
$description = "Description de votre page";*/
?>

<section class="bg-gray-800 relative text-white">
    <!--PROD DEFINIR LA SOURCE-->
    <img src="/dev/img/bg.webp" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl"><?/*= ucfirst($page->getTitle())*/?></h1>
            </div>
        </div>
    </div>
</section>

    <section class="bg-white rounded-lg shadow my-8 mx-2 lg:mx-72 mt-8 mb-8">
            <div class="container p-4">
                <?/*= $page->getConverted()*/ ?>
            </div>
    </section>

