<?php 
use CMW\Controller\Core\SecurityController;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Contact\ContactModel;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/*TITRE ET DESCRIPTION*/
$title = Website::getWebsiteName(). ' - '. ThemeModel::fetchConfigValue('faq_title');
$description = ThemeModel::fetchConfigValue('faq_description');
?>

<section class="bg-gray-800 relative text-white">
    <img src="<?= ThemeModel::fetchImageLink("hero_img_bg") ?>" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl"><?= ThemeModel::fetchConfigValue('faq_page_title') ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="px-2 md:px-24 xl:px-48 2xl:px-72 py-6">
    <div class="<?php if(ThemeModel::fetchConfigValue('faq_display_form')): {echo "lg:grid lg:grid-cols-3 gap-6";} endif ?>">
        <?php if(ThemeModel::fetchConfigValue('faq_display_form')): ?>
            <div class="container mx-auto rounded-md shadow-lg p-8">
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('faq_question_title') ?></h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
            <form action="contact" method="post" class="">
            <?php (new SecurityManager())->insertHiddenToken() ?>
            <div class="flex flex-wrap -mx-4 mb-4">
                <div class="px-4 w-full md:w-6/12 lg:w-6/12">
                    <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Votre mail :</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <input type="email" name="email" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="votre@mail.com" required>
                    </div>
                </div>
                <div class="px-4 w-full md:w-6/12 lg:w-6/12">
                    <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Votre nom :</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <input type="text" name="name" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Jean Dupont" required>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                    <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sujet :</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                        <input type="text" name="object" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="J'aimerais aborder avec vous ..." required>
                    </div>
            </div>
            <div class="mb-2">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Votre message :</label>
                <textarea id="message" name="content" rows="4" class="tinymce block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonjour," required></textarea>
            </div>
            <div class="text-center">
                <?php SecurityController::getPublicData(); ?>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Soumettre <i class="fa-solid fa-paper-plane"></i></button>
            </div>
        </form>
            </div>
            <?php endif; ?>
        <div class="col-span-2">
            <div class="container mx-auto rounded-md shadow-lg p-8">
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('faq_answer_title') ?></h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                <?php foreach ($faqList as $faq) : ?>
                <div class="border-b py-2">
                    <div class="flex flex-wrap justify-between">
                        <div class="font-medium">- <?= $faq->getQuestion() ?> :</div>
                        <?php if(ThemeModel::fetchConfigValue('faq_display_autor')): ?>
                        <div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs"><?= $faq->getAuthor()->getPseudo() ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="ml-4"><?= $faq->getResponse() ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>