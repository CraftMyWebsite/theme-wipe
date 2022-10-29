<?php

use CMW\Model\Users\UsersModel;
use CMW\Model\Core\ThemeModel;
use CMW\Entity\Users\UserEntity;
use CMW\Entity\Users\UserPictureEntity;
use CMW\Utils\Utils;
/*TITRE ET DESCRIPTION*/
$title = Utils::getSiteName() . ' - '. ThemeModel::fetchConfigValue('vote_title');
$description = ThemeModel::fetchConfigValue('vote_description');
?>
<section class="bg-gray-800 relative text-white">
    <img src="<?= getenv("PATH_SUBFOLDER") ?>public/uploads/Wipe/bg.webp" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl"><?= ThemeModel::fetchConfigValue('votes_page_title') ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="px-2 md:px-24 xl:px-48 2xl:px-72 py-6">
    <div class="lg:grid lg:grid-cols-3 gap-6">
        <div class="container mx-auto rounded-md shadow-lg p-8 h-fit">
            <div class="flex flex-no-wrap justify-center items-center py-4">
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                <div class="px-10 w-auto">
                    <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('votes_participate_title') ?></h2>
                </div>
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
            </div>


            <?php if (usersModel::getLoggedUser() === -1): ?>
    <!-- Si le joueur n'est pas connecté -->
            <div class="rounded-md shadow-lg p-2 mb-4">
                    <div class="text-center">Pour pouvoir voter et récupérer vos récompenses vous devez être connecté sur le site, alors n'attendez plus pour obtenir des récompenses uniques !</div>
                    <div class="pt-4 pb-2 text-center">
                        <a href="<?= getenv('PATH_SUBFOLDER') ?>login" target="_blank" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2">Connexion</i></a>
                    </div>
            </div>
            
            <?php else: ?>
            <!-- LIST SITES -->
            <?php foreach ($sites as $site): ?>
            <a href="<?= $site->getUrl() ?>"target="_BLANK">
            <div class="rounded-md shadow-lg p-2 mb-4">
                <div class="flex flex-wrap justify-between">
                    <div class="font-medium"><?= $site->getTitle() ?></div>
                    <div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs "><i class="fa-solid fa-clock-rotate-left"></i> <?= $site->getTimeFormatted() ?></div>
                </div>
                <div class="flex flex-wrap justify-between">
                    <div class="mt-2 py-2 font-medium">Récompense : <span class="font-bold">500 points</span></div>
                    <div class="pt-4 pb-2">
                        <a onclick="sendVote('<?= $site->getSiteId() ?>')" type="button" rel="noopener noreferrer" class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2">Voter <i class="fa-solid fa-award"></i></a>
                    </div>
                </div>
            </div>
            </a>
            <?php endforeach; ?>
            <?php endif; ?>

        </div>
        <div class="col-span-2">
            <div class="container mx-auto rounded-md shadow-lg p-8">
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('votes_top_10_title') ?></h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>

                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                <i class="fa-solid fa-user"></i> Voteur
                            </th>
                            <th scope="col" class="py-3 px-6 text-center">
                                <i class="fa-solid fa-trophy"></i> Position
                            </th>
                            <th scope="col" class="py-3 px-6 text-center">
                                <i class="fa-solid fa-award"></i> Nombres de votes
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                                <?php $i = 0;
                                foreach ($topCurrent as $top): $i++; ?>

                                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td scope="row" class="flex items-center px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="w-10 h-10 rounded-full" src="<?= $top->getUser()->getUserPicture()->getImageLink() ?>" alt="...">
                                            <div class="pl-3">
                                                <div class="text-base font-semibold"><?= $top->getUser()->getUsername() ?></div>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            <?php $color_position = $i  ?>
                                            <div class="
                                                <?php 
                                                switch ($color_position) {
                                                    case '1':
                                                        echo "bg-amber-400";
                                                        break;
                                                    case '2':
                                                        echo "bg-amber-300";
                                                        break;
                                                    case '3':
                                                        echo "bg-amber-200";
                                                        break;
                                                    default:
                                                        echo "bg-blue-200";
                                                        break;
                                                }
                                                ?>
                                             inline-block px-3 py-1 rounded-sm font-medium text-black"># <?= $i ?></div>
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            <div class="font-medium"><?= $top->getVotes() ?></div>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <?php if(ThemeModel::fetchConfigValue('votes_display_global')): ?>
    <div class="md:px-16 xl:px-28 2xl:px-48 mt-4">
        <div class="container mx-auto rounded-md shadow-lg p-8">
            <div class="flex flex-no-wrap justify-center items-center py-4">
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                <div class="px-10 w-auto">
                    <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('votes_top_10_global_title') ?></h2>
                </div>
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
            </div>

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            <i class="fa-solid fa-user"></i> Voteur
                        </th>
                        <th scope="col" class="py-3 px-6 text-center">
                            <i class="fa-solid fa-trophy"></i> Position
                        </th>
                        <th scope="col" class="py-3 px-6 text-center">
                            <i class="fa-solid fa-award"></i> Nombres de votes
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0; foreach ($topGlobal as $top): $i++; ?>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="flex items-center px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="<?= $top->getUser()->getUserPicture()->getImageLink() ?>" alt="...">
                            <div class="pl-3">
                                <div class="text-base font-semibold"><?= $top->getUser()->getUsername() ?></div>
                            </div>
                        </th>
                        <td class="py-4 px-6 text-center">
                            <?php $color_position = $i  ?>
                            <div class="
                                <?php 
                                switch ($color_position) {
                                    case '1':
                                        echo "bg-amber-400";
                                        break;
                                    case '2':
                                        echo "bg-amber-300";
                                        break;
                                    case '3':
                                        echo "bg-amber-200";
                                        break;
                                    default:
                                        echo "bg-blue-200";
                                        break;
                                }
                                ?>
                            inline-block px-3 py-1 rounded-sm font-medium text-black"># <?= $i ?> 
                        </div>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="font-medium"><?= $top->getVotes() ?></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <?php endif; ?>
</section>