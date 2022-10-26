<?php
use CMW\Utils\Utils;
use CMW\Model\Core\ThemeModel;
?>
<!-- HERO -->
<section class="bg-gray-800 relative text-white">
    <img src="<?= getenv("PATH_SUBFOLDER") ?>public/uploads/Wipe/bg.webp" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-40 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <p class="font-medium mb-2 text-blue-600 uppercase"><?= ThemeModel::fetchConfigValue('hero_title') ?></p>
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl"><?= Utils::getSiteName()?></h1>
                <p class="font-light mb-6 text-xl"><?= ThemeModel::fetchConfigValue('hero_description') ?></p>
                <a href="<?= ThemeModel::fetchConfigValue('hero_button_link') ?>" class="hidden md:inline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none"><?= ThemeModel::fetchConfigValue('hero_button_text') ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Fonctionnalités -->
<section class="py-8">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('feature_section_title') ?></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="container mx-auto px-4 relative">
        <div class="flex flex-wrap -mx-4  justify-center">
            <div class="p-4 w-full md:w-6/12 lg:w-4/12">
                <div class="bg-gray-100 p-4">
                    <img src="<?= getenv("PATH_SUBFOLDER") ?>public/uploads/Wipe/bread.webp" class="mb-3 mx-auto" alt="Vous devez upload bread.webp depuis votre panel !" width="160" height="160"/>
                    <div>
                        <h3 class="text-center  font-bold text-2xl text-gray-900"><?= ThemeModel::fetchConfigValue('feature_title_1') ?></h3>
                        <p class="mt-2 mb-4"><?= ThemeModel::fetchConfigValue('feature_description_1') ?></p>
                    </div>
                </div>
            </div>
            <div class="p-4 w-full md:w-6/12 lg:w-4/12">
                <div class="bg-gray-100 p-4">
                    <img src="<?= getenv("PATH_SUBFOLDER") ?>public/uploads/Wipe/potion.webp" class="mb-3 mx-auto" alt="Vous devez upload potion.webp depuis votre panel !" width="160" height="160">
                    <div>
                        <h3 class="text-center font-bold text-2xl text-gray-900"><?= ThemeModel::fetchConfigValue('feature_title_2') ?></h3>
                        <p class="mt-2 mb-4"><?= ThemeModel::fetchConfigValue('feature_description_2') ?></p>
                    </div>
                </div>
            </div>
            <div class="p-4 w-full md:w-6/12 lg:w-4/12">
                <div class="bg-gray-100 p-4">
                    <img src="<?= getenv("PATH_SUBFOLDER") ?>public/uploads/Wipe/craftingtable.webp" class="mb-3 mx-auto" alt="Vous devez upload craftingtable.webp depuis votre panel !" width="160" height="160">
                    <div>
                        <h3 class="text-center font-bold text-2xl text-gray-900"><?= ThemeModel::fetchConfigValue('feature_title_3') ?></h3>
                            <p class="mt-2 mb-4"><?= ThemeModel::fetchConfigValue('feature_description_3') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News -->

<section class="py-8">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase">Nouveautés</h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="container mx-auto px-4 relative">
        <div class="flex flex-wrap -mx-4  justify-center">
            <div class="p-4 w-full lg:w-6/12">
                <div class="bg-white flex flex-wrap h-full overflow-hidden rounded-md shadow-lg">
                    <div class="w-full md:w-5/12 lg:w-full xl:w-5/12">
                        <div class="h-full relative">
                            <img src="https://top-mmo.fr/wp-content/uploads/2022/05/A7zC3bvSNxWGyaP8jSuz2W-1200-80.jpg" class="h-full object-cover w-full" alt="..." width="240" height="260"/>
                            <div class="absolute bg-blue-600 font-semibold leading-tight left-0 ml-3 mt-3 px-3 py-2 text-center text-white top-0">
                                <div class="text-sm">Août</div>
                                <div class="text-2xl">10</div>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 py-6 w-full md:w-7/12 lg:w-full xl:w-7/12">
                        <div class="mb-3">
                            <div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs uppercase">Dev en cours</div>
                        </div>
                        <h3 class="font-bold leading-tight mb-3 text-gray-900 text-xl">
                            <a href="#" class="hover:text-blue-600">I 💞 Front !</a></h3>
                        <p class="mb-3">Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse duis deserunt mollit....</p>
                        <a href="#" class="font-bold hover:text-blue-700 text-gray-900 text-sm">Lire la suite <i class="fa-solid fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="p-4 w-full lg:w-6/12">
                <div class="bg-white flex flex-wrap h-full overflow-hidden rounded-md shadow-lg">
                    <div class="w-full md:w-5/12 lg:w-full xl:w-5/12">
                        <div class="h-full relative">
                            <img src="https://img-4.linternaute.com/nzxEiqEhy50OaTpCi0L7VNgYYmM=/1500x/smart/9f470d6bd221480ca2d6ff383995c382/ccmcms-linternaute/35868718.png" class="h-full object-cover w-full" alt="..." width="240" height="260"/>
                            <div class="absolute bg-blue-600 font-semibold leading-tight left-0 ml-3 mt-3 px-3 py-2 text-center text-white top-0">
                                <div class="text-sm">Sept</div>
                                <div class="text-2xl">15</div>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 py-6 w-full md:w-7/12 lg:w-full xl:w-7/12">
                        <div class="mb-3">
                            <div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs uppercase">Dev en cours</div>
                        </div>
                        <h3 class="font-bold leading-tight mb-3 text-gray-900 text-xl">
                            <a href="#" class="hover:text-blue-600">I 🤯 Front !</a></h3>
                        <p class="mb-3">Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse duis deserunt mollit....</p>
                        <a href="#" class="font-bold hover:text-blue-700 text-gray-900 text-sm">Lire la suite <i class="fa-solid fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="p-4 w-full lg:w-6/12">
                <div class="bg-white flex flex-wrap h-full overflow-hidden rounded-md shadow-lg">
                    <div class="w-full md:w-5/12 lg:w-full xl:w-5/12">
                        <div class="h-full relative">
                            <img src="https://cdn-uploads.gameblog.fr/img/news/404220_62d928477d610.jpg" class="h-full object-cover w-full" alt="..." width="240" height="260"/>
                            <div class="absolute bg-blue-600 font-semibold leading-tight left-0 ml-3 mt-3 px-3 py-2 text-center text-white top-0">
                                <div class="text-sm">Oct</div>
                                <div class="text-2xl">21</div>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 py-6 w-full md:w-7/12 lg:w-full xl:w-7/12">
                        <div class="mb-3">
                            <div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs uppercase">Dev en cours</div>
                        </div>
                        <h3 class="font-bold leading-tight mb-3 text-gray-900 text-xl">
                            <a href="#" class="hover:text-blue-600">I 🥵 Front !</a></h3>
                        <p class="mb-3">Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse duis deserunt mollit....</p>
                        <a href="#" class="font-bold hover:text-blue-700 text-gray-900 text-sm">Lire la suite <i class="fa-solid fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="p-4 w-full lg:w-6/12">
                <div class="bg-white flex flex-wrap h-full overflow-hidden rounded-md shadow-lg">
                    <div class="w-full md:w-5/12 lg:w-full xl:w-5/12">
                        <div class="h-full relative">
                            <img src="https://leclaireur.fnac.com/wp-content/uploads/2021/12/minecraft.jpg" class="h-full object-cover w-full" alt="..." width="240" height="260"/>
                            <div class="absolute bg-blue-600 font-semibold leading-tight left-0 ml-3 mt-3 px-3 py-2 text-center text-white top-0">
                                <div class="text-sm">Dec</div>
                                <div class="text-2xl">12</div>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 py-6 w-full md:w-7/12 lg:w-full xl:w-7/12">
                        <div class="mb-3">
                            <div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs uppercase">Dev en cours</div>
                        </div>
                        <h3 class="font-bold leading-tight mb-3 text-gray-900 text-xl"><a href="#" class="hover:text-blue-600">I 😂 Front !</a></h3>
                        <p class="mb-3">Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse duis deserunt mollit....</p>
                        <a href="#" class="font-bold hover:text-blue-700 text-gray-900 text-sm">Lire la suite <i class="fa-solid fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>