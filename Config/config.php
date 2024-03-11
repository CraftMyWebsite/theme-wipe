<?php use CMW\Controller\Core\PackageController; use CMW\Controller\Core\ThemeController; use CMW\Utils\Utils;use CMW\Manager\Lang\LangManager;use CMW\Model\Core\ThemeModel;use CMW\Utils\SecurityService;use CMW\Model\Votes\VotesConfigModel;use CMW\Model\Core\CoreModel;?>
<!-------------->
<!--Navigation-->
<!-------------->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="setting1-tab" data-bs-toggle="tab" href="#setting1" role="tab" aria-selected="true">En tête & Global</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting2-tab" data-bs-toggle="tab" href="#setting2" role="tab" aria-selected="false">Accueil</a>
    </li>
    <?php if (PackageController::isInstalled("News")): ?>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting3-tab" data-bs-toggle="tab" href="#setting3" role="tab" aria-selected="false">News</a>
    </li>
    <?php endif; ?>
    <?php if (PackageController::isInstalled("Faq")): ?>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting4-tab" data-bs-toggle="tab" href="#setting4" role="tab" aria-selected="false">F.A.Q</a>
    </li>
    <?php endif; ?>
    <?php if (PackageController::isInstalled("Votes")): ?>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting5-tab" data-bs-toggle="tab" href="#setting5" role="tab" aria-selected="false">Votes</a>
    </li>
    <?php endif; ?>
    <?php if (PackageController::isInstalled("Wiki")): ?>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting6-tab" data-bs-toggle="tab" href="#setting6" role="tab" aria-selected="false">Wiki</a>
    </li>
    <?php endif; ?>
    <?php if (PackageController::isInstalled("Forum")): ?>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="setting7-tab" data-bs-toggle="tab" href="#setting7" role="tab" aria-selected="false">Forum</a>
        </li>
    <?php endif; ?>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="setting8-tab" data-bs-toggle="tab" href="#setting8" role="tab" aria-selected="false">Footer</a>
    </li>
</ul>


<!--------------->
<!----CONTENT---->
<!--------------->
<div class="tab-content" id="myTabContent">
    <!---EN TÊTE---->
    <div class="tab-pane fade show active py-2" id="setting1" role="tabpanel" aria-labelledby="setting1-tab">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card-in-card">
                    <div class="card-body">
                        <h4>En tête</h4>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="header_active_logo" name="header_active_logo" <?= ThemeModel::getInstance()->fetchConfigValue('header_active_logo') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="header_active_logo"><h6>Logo : <i data-bs-toggle="tooltip" title="Vous pouvez l'afficher ou le masqué" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                            </div>
                            <div class="text-center ">
                                <img class="w-25" src="<?= ThemeModel::getInstance()->fetchImageLink("header_img_logo") ?>" alt="Image introuvable !">
                            </div>
                            <input class="mt-2 form-control form-control-sm" type="file" id="header_img_logo" name="header_img_logo" accept=".png, .jpg, .jpeg, .webp, .gif">
                            <span>Fichiers autorisés : png, jpg, jpeg, webp, svg, gif</span>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" value="1" name="header_active_title" id="header_active_title" <?= ThemeModel::getInstance()->fetchConfigValue('header_active_title') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="header_active_title"><h6>Titre : <i data-bs-toggle="tooltip" title="Vous pouvez l'afficher ou le masqué" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                <div class="card-in-card">
                    <div class="card-body">
                        <h4>Global</h4>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" value="1" id="header_allow_login_button" name="header_allow_login_button" <?= ThemeModel::getInstance()->fetchConfigValue('header_allow_login_button') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="header_allow_login_button"><h6>Connexion <i data-bs-toggle="tooltip" title="Désactive le bouton de connexion mais vous avez toujours accès à la page" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mb-2">
                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" value="1" name="header_allow_register_button" id="header_allow_register_button" <?= ThemeModel::getInstance()->fetchConfigValue('header_allow_register_button') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="header_allow_register_button"><h6>Inscription <i data-bs-toggle="tooltip" title="Vous pouvez désactiver les inscriptions et afficher un message" class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                                </div>
                            </div>
                            <h6>Message lorsque l'inscription est désactivée :</h6>
                            <textarea name="global_no_register_message" class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('global_no_register_message') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---ACCUEIL---->
    <div class="tab-pane fade py-2" id="setting2" role="tabpanel" aria-labelledby="setting2-tab">
        <!--INDEX / META-->
            <div class="card-in-card">
                <div class="card-body">
                    <h4>Indéxation de la page (meta) :</h4>
                    <div class="alert alert-warning">
                        <h4 class="alert-heading">Bien comprendre l'indéxation</h4>
                        <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des affichages sur Discord, Twitter...<br>
                            Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un peu plus bas (Si votre page est éligible à ce réglage).<br>
                            Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
                    </div>
                    <h6>Titre de la page :</h6>
                        <input type="text" class="form-control" id="home_title" name="home_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('home_title') ?>" required>
                </div>
            </div>
            <!--HERO-->
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <h6>En tête :</h6>
                    <h6>Images :</h6>
                    <input class="mt-2 form-control form-control-sm" type="file" id="hero_img_bg" name="hero_img_bg" accept="png,jpg,jpeg,webp,svg,gif">
                    <span>Fichiers autorisés : png, jpg, jpeg, webp, svg, gif</span>
                    <h6>Réglages :</h6>
                    <section class="bg-gray-800 position-relative text-white">
                        <img width="1080" height="720" src="<?= ThemeModel::getInstance()->fetchImageLink("hero_img_bg") ?>" class="position-absolute h-full inset-0 object-center object-cover w-full" style="width: 100%; height: 100%; object-fit: cover;" alt="Vous devez upload bg.webp depuis votre panel !"/>
                            <div class="container mx-auto position-relative">
                                <div class="flex flex-wrap p-3">
                                    <div class="mx-auto text-center w-full lg:w-8/12">
                                        <div class="form-group">
                                            <input class="form-control text-center" type="text" id="hero_title" name="hero_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('hero_title') ?>">
                                        </div>
                                        <h1 class="font-extrabold text-2xl md:text-6xl"><?= Utils::getSiteName()?></h1>
                                        <div class="form-group">
                                            <input class="form-control text-center" type="text" id="hero_description" name="hero_description" value="<?= ThemeModel::getInstance()->fetchConfigValue('hero_description') ?>">
                                        </div>
                                        <div class="form-group">
                                            <div class="btn btn-primary"><input class="form-control text-center" type="text" id="hero_button_text" name="hero_button_text" value="<?= ThemeModel::getInstance()->fetchConfigValue('hero_button_text') ?>"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="hero_button_link">Lien du bouton :</label>
                                            <input class="form-control text-center" type="text" id="hero_button_link" name="hero_button_link" value="<?= ThemeModel::getInstance()->fetchConfigValue('hero_button_link') ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>
            </div> 
            <!--FONCTIONNALITÉS-->
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="feature_section_active" name="feature_section_active" <?= ThemeModel::getInstance()->fetchConfigValue('feature_section_active') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="feature_section_active"><h6>Fonctionnalités : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                    </div>
                    <h6>Titre de la section :</h6>
                    <input type="text" class="form-control" name="feature_section_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('feature_section_title') ?>" required>
                    <div class="row mt-2">
                        <div class="col card me-2">
                            <label>Image :</label>
                            <div class="text-center">
                                <img src="<?= ThemeModel::getInstance()->fetchImageLink("feature_img_1") ?>" class="mb-3 mx-auto" alt="Vous devez upload feature1.webp depuis votre panel !" width="160" height="160"/>
                            </div>
                            <div class="form-group">
                                <input class="mt-2 form-control form-control-sm" type="file" id="feature_img_1" name="feature_img_1" accept="png,jpg,jpeg,webp,svg,gif">
                                <span>Fichiers autorisés : png, jpg, jpeg, webp, svg, gif</span>
                            </div>
                            <div class="form-group">
                                <label>Titre :</label>
                                <input class="form-control text-center" type="text" id="feature_title_1" name="feature_title_1" value="<?= ThemeModel::getInstance()->fetchConfigValue('feature_title_1') ?>">
                            </div>
                            <div class="form-group">
                                <label>Description :</label>
                                <input class="form-control text-center" type="text" id="feature_description_1" name="feature_description_1" value="<?= ThemeModel::getInstance()->fetchConfigValue('feature_description_1') ?>">
                            </div>
                        </div>
                        <div class="col card me-2">
                            <label>Image :</label>
                            <div class="text-center">
                                <img src="<?= ThemeModel::getInstance()->fetchImageLink("feature_img_2") ?>" class="mb-3 mx-auto" alt="Vous devez upload feature2.webp depuis votre panel !" width="160" height="160">
                            </div>
                            <div class="form-group">
                                <input class="mt-2 form-control form-control-sm" type="file" id="feature_img_2" name="feature_img_2" accept="png,jpg,jpeg,webp,svg,gif">
                                <span>Fichiers autorisés : png, jpg, jpeg, webp, svg, gif</span>
                            </div>
                            <div class="form-group">
                                <label>Titre :</label>
                                <input class="form-control text-center" type="text" id="feature_title_2" name="feature_title_2" value="<?= ThemeModel::getInstance()->fetchConfigValue('feature_title_2') ?>">
                            </div>
                            <div class="form-group">
                                <label>Description :</label>
                                <input class="form-control text-center" type="text" id="feature_description_2" name="feature_description_2" value="<?= ThemeModel::getInstance()->fetchConfigValue('feature_description_2') ?>">
                            </div>
                        </div>
                        <div class="col card me-2">
                            <label>Image :</label>
                            <div class="text-center">
                                <img src="<?= ThemeModel::getInstance()->fetchImageLink("feature_img_3") ?>" class="mb-3 mx-auto" alt="Vous devez upload feature3.webp depuis votre panel !" width="160" height="160">
                            </div>
                            <div class="form-group">
                                <input class="mt-2 form-control form-control-sm" type="file" id="feature_img_3" name="feature_img_3" accept="png,jpg,jpeg,webp,svg,gif">
                                <span>Fichiers autorisés : png, jpg, jpeg, webp, svg, gif</span>
                            </div>
                            <div class="form-group">
                                <label>Titre :</label>
                                <input class="form-control text-center" type="text" id="feature_title_3" name="feature_title_3" value="<?= ThemeModel::getInstance()->fetchConfigValue('feature_title_3') ?>">
                            </div>
                            <div class="form-group">
                                <label>Description :</label>
                                <input class="form-control text-center" type="text" id="feature_description_3" name="feature_description_3" value="<?= ThemeModel::getInstance()->fetchConfigValue('feature_description_3') ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!--NEWS-->
                <?php if (PackageController::isInstalled("News")): ?>
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="news_section_active" name="news_section_active" <?= ThemeModel::getInstance()->fetchConfigValue('news_section_active') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="news_section_active"><h6>Nouveautés : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                    </div>
                    <label>Titre de la section :</label>
                    <input type="text" class="form-control" name="news_section_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_section_title') ?>" required>
                    <div class="form-group">
                        <label>Nombre de news à afficher :</label>
                        <input class="form-control" type="number" id="news_number_display" name="news_number_display" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_number_display') ?>">
                     </div> 
                </div>
            </div>
            <?php endif; ?>
            <!--CUSTOM 1-->
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="custom_section_active_1" name="custom_section_active_1" <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_active_1') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="custom_section_active_1"><h6>Personnalisable 1 : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                    </div>
                    <label>Titre de la section :</label>
                    <input type="text" class="form-control" name="custom_section_title_1" value="<?= ThemeModel::getInstance()->fetchConfigValue('custom_section_title_1') ?>" required>
                    <label>Contenu :</label>
                    <textarea name="custom_section_content_1" class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_1') ?></textarea>
                </div>
            </div>
            <!--CUSTOM 2-->
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="custom_section_active_2" name="custom_section_active_2" <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_active_2') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="custom_section_active_2"><h6>Personnalisable 2 : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                    </div>
                    <label>Titre de la section :</label>
                    <input type="text" class="form-control" name="custom_section_title_2" value="<?= ThemeModel::getInstance()->fetchConfigValue('custom_section_title_2') ?>" required>
                    <label>Contenu :</label>
                    <textarea name="custom_section_content_2" class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_2') ?></textarea>
                </div>
            </div>
            <!--CUSTOM 3-->
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="custom_section_active_3" name="custom_section_active_3" <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_active_3') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="custom_section_active_3"><h6>Personnalisable 3 : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                    </div>
                    <label>Titre de la section :</label>
                    <input type="text" class="form-control" name="custom_section_title_3" value="<?= ThemeModel::getInstance()->fetchConfigValue('custom_section_title_3') ?>" required>
                    <label>Contenu :</label>
                    <textarea name="custom_section_content_3" class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_3') ?></textarea>
                </div>
            </div>
        <!--CONTACT-->
        <div class="card-in-card mt-4">
            <div class="card-body">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" id="contact_section_active" name="contact_section_active" <?= ThemeModel::getInstance()->fetchConfigValue('contact_section_active') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="contact_section_active"><h6>Contact : <i data-bs-toggle="tooltip" title="Vous pouvez activer ou non cette section." class="fa-sharp fa-solid fa-circle-question"></i></h6></label>
                </div>
                <label>Titre de la section :</label>
                <input type="text" class="form-control" name="contact_section_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('contact_section_title') ?>" required>
            </div>
        </div>
    </div>
    <!---NEWS---->
    <?php if (PackageController::isInstalled("News")): ?>
    <div class="tab-pane fade py-2" id="setting3" role="tabpanel" aria-labelledby="setting3-tab">
        <div class="card-in-card">
            <div class="card-body">
                <h4>Indéxation de la page (meta) :</h4>
                <div class="alert alert-warning">
                    <h4 class="alert-heading">Bien comprendre l'indéxation</h4>
                    <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des affichages sur Discord, Twitter...<br>
                        Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un peu plus bas (Si votre page est éligible à ce réglage).<br>
                        Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Titre de la page :</h6>
                        <input type="text" class="form-control" id="news_title" name="news_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_title') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h6>Description de la page :</h6>
                    <input type="text" class="form-control" id="news_description" name="news_description" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_description') ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h4>Réglages :</h4>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Titre :</h6>
                        <input type="text" class="form-control" id="news_page_title" name="news_page_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_page_title') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h6>Nombre de news à afficher:</h6>
                        <input class="form-control" type="number" id="news_page_number_display" name="news_page_number_display" value="<?= ThemeModel::getInstance()->fetchConfigValue('news_page_number_display') ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!---FAQ---->
    <?php if (PackageController::isInstalled("Faq")): ?>
    <div class="tab-pane fade py-2" id="setting4" role="tabpanel" aria-labelledby="setting4-tab">
        <div class="card-in-card">
            <div class="card-body">
                <h4>Indéxation de la page (meta) :</h4>
                <div class="alert alert-warning">
                    <h4 class="alert-heading">Bien comprendre l'indéxation</h4>
                    <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des affichages sur Discord, Twitter...<br>
                        Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un peu plus bas (Si votre page est éligible à ce réglage).<br>
                        Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Titre de la page :</h6>
                        <input type="text" class="form-control" id="faq_title" name="faq_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_title') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h6>Description de la page :</h6>
                        <input type="text" class="form-control" id="faq_description" name="faq_description" value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_description') ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h4>Réglages :</h4>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <h6>Titre :</h6>
                            <input type="text" class="form-control" id="faq_page_title" name="faq_page_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_page_title') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <h6>Titre section formulaire :</h6>
                            <input type="text" class="form-control" id="faq_question_title" name="faq_question_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_question_title') ?>" required>
                            <h6 class="mt-2">Titre section réponse :</h6>
                            <input type="text" class="form-control" id="faq_answer_title" name="faq_answer_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_answer_title') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="faq_display_autor" name="faq_display_autor" <?= ThemeModel::getInstance()->fetchConfigValue('faq_display_autor') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="faq_display_autor"><h6>Afficher l'auteur</h6></label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="faq_display_form" name="faq_display_form" <?= ThemeModel::getInstance()->fetchConfigValue('faq_display_form') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="faq_display_form"><h6>Formulaire de contact</h6></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!---VOTES---->
    <?php if (PackageController::isInstalled("Votes")): ?>
    <div class="tab-pane fade py-2" id="setting5" role="tabpanel" aria-labelledby="setting5-tab">
        <div class="card-in-card">
            <div class="card-body">
                <h4>Indéxation de la page (meta) :</h4>
                <div class="alert alert-warning">
                    <h4 class="alert-heading">Bien comprendre l'indéxation</h4>
                    <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des affichages sur Discord, Twitter...<br>
                        Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un peu plus bas (Si votre page est éligible à ce réglage).<br>
                        Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Titre de la page :</h6>
                        <input type="text" class="form-control" id="vote_title" name="vote_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('vote_title') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h6>Description de la page :</h6>
                        <input type="text" class="form-control" id="vote_description" name="vote_description" value="<?= ThemeModel::getInstance()->fetchConfigValue('vote_description') ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h4>Réglages :</h4>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <h6>Titre :</h6>
                            <input type="text" class="form-control" id="votes_page_title" name="votes_page_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_page_title') ?>" required>
                            <h6 class="mt-2">Participation :</h6>
                            <input type="text" class="form-control" id="votes_participate_title" name="votes_participate_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_participate_title') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <h6>Top <?= (new VotesConfigModel())->getConfig()->getTopShow()?> du mois :</h6>
                            <input type="text" class="form-control" id="votes_top_10_title" name="votes_top_10_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_top_10_title') ?>" required>
                            <h6 class="mt-2">Top <?= (new VotesConfigModel())->getConfig()->getTopShow()?> Global :</h6>
                            <input type="text" class="form-control" id="votes_top_10_global_title" name="votes_top_10_global_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_top_10_global_title') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="votes_display_global" name="votes_display_global" <?= ThemeModel::getInstance()->fetchConfigValue('votes_display_global') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="votes_display_global"><h6>Top global</h6></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!---WIKI---->
    <?php if (PackageController::isInstalled("Wiki")): ?>
    <div class="tab-pane fade py-2" id="setting6" role="tabpanel" aria-labelledby="setting6-tab">
        <div class="card-in-card">
            <div class="card-body">
                <h4>Indéxation de la page (meta) :</h4>
                <div class="alert alert-warning">
                    <h4 class="alert-heading">Bien comprendre l'indéxation</h4>
                    <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des affichages sur Discord, Twitter...<br>
                        Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un peu plus bas (Si votre page est éligible à ce réglage).<br>
                        Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Titre de la page :</h6>
                        <input type="text" class="form-control" id="wiki_title" name="wiki_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_title') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h6>Description de la page :</h6>
                        <input type="text" class="form-control" id="wiki_description" name="wiki_description" value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_description') ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h4>Réglages :</h4>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <h6>Titre :</h6>
                            <input type="text" class="form-control" id="wiki_page_title" name="wiki_page_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_page_title') ?>" required>
                            <h6 class="mt-2">Menu :</h6>
                            <input type="text" class="form-control" id="wiki_menu_title" name="wiki_menu_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_menu_title') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <h6>Icônes :</h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="wiki_display_categorie_icon" name="wiki_display_categorie_icon" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_categorie_icon') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="wiki_display_categorie_icon"><h6>Afficher les icons des catégorie (menu)</h6></label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="wiki_display_article_categorie_icon" name="wiki_display_article_categorie_icon" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_article_categorie_icon') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="wiki_display_article_categorie_icon"><h6>Afficher les icons des articles (menu)</h6></label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="wiki_display_article_icon" name="wiki_display_article_icon" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_article_icon') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="wiki_display_article_icon"><h6>Afficher les icons des articles (articles)</h6></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card me-2 p-3">
                            <h6>Autres :</h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="wiki_display_creation_date" name="wiki_display_creation_date" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_creation_date') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="wiki_display_creation_date"><h6>Afficher la date de création</h6></label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="wiki_display_edit_date" name="wiki_display_edit_date" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_edit_date') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="wiki_display_edit_date"><h6>Afficher la date d'édition</h6></label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="wiki_display_autor" name="wiki_display_autor" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_autor') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="wiki_display_autor"><h6>Afficher l'auteur</h6></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!---FORUM---->
    <?php if (PackageController::isInstalled("Forum")): ?>
        <div class="tab-pane fade py-2" id="setting7" role="tabpanel" aria-labelledby="setting7-tab">
            <div class="card-in-card">
                <div class="card-body">
                    <h4>Indéxation de la page (meta) :</h4>
                    <div class="alert alert-warning">
                        <h4 class="alert-heading">Bien comprendre l'indéxation</h4>
                        <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des affichages sur Discord, Twitter...<br>
                            Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un peu plus bas (Si votre page est éligible à ce réglage).<br>
                            Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <h6>Titre de la page :</h6>
                            <input type="text" class="form-control" id="forum_title" name="forum_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_title') ?>" required>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h6>Description de la page :</h6>
                            <input type="text" class="form-control" id="forum_description" name="forum_description" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_description') ?>" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-in-card mt-4">
                <div class="card-body">
                    <h4>Réglages :</h4>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="card me-2 p-3">
                                <h6>Titres :</h6>
                                <h6>Sous-Forums :</h6>
                                <input type="text" class="form-control" id="forum_sub_forum" name="forum_sub_forum" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_sub_forum') ?>" required>
                                <h6>Topics :</h6>
                                <input type="text" class="form-control" id="forum_topics" name="forum_topics" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_topics') ?>" required>
                                <h6>Messages :</h6>
                                <input type="text" class="form-control" id="forum_message" name="forum_message" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_message') ?>" required>
                                <h6>Dernier messages :</h6>
                                <input type="text" class="form-control" id="forum_last_message" name="forum_last_message" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_last_message') ?>" required>
                                <h6>Affichages :</h6>
                                <input type="text" class="form-control" id="forum_display" name="forum_display" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_display') ?>" required>
                                <h6>Réponses :</h6>
                                <input type="text" class="form-control" id="forum_response" name="forum_response" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_response') ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card me-2 p-3">
                                <h6>Topic sans message :</h6>
                                <div class="form-group">
                                    <h6>Texte :</h6>
                                    <input type="text" class="form-control" id="forum_nobody_send_message_text" name="forum_nobody_send_message_text" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_nobody_send_message_text') ?>" required>
                                </div>
                                <div class="form-group">
                                    <h6>Image :</h6>
                                    <div class="text-center ">
                                        <img class="w-25" src="<?= ThemeModel::getInstance()->fetchImageLink("forum_nobody_send_message_img") ?>" alt="Image introuvable !">
                                    </div>
                                    <input class="mt-2 form-control form-control-sm" type="file" id="forum_nobody_send_message_img" name="forum_nobody_send_message_img" accept=".png, .jpg, .jpeg, .webp, .gif">
                                    <span>Fichiers autorisés : png, jpg, jpeg, webp, svg, gif</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card me-2 p-3">
                                <h6>Bouton :</h6>
                                <div class="form-group">
                                    <h6>Texte :</h6>
                                    <input type="text" class="form-control" id="forum_btn_create_topic" name="forum_btn_create_topic" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_btn_create_topic') ?>" required>
                                </div>
                                <div class="form-group">
                                    <h6>Icône : ( <i class="<?= ThemeModel::getInstance()->fetchConfigValue('forum_btn_create_topic_icon') ?>"></i> )</h6>
                                    <input type="text" class="form-control" id="forum_btn_create_topic_icon" name="forum_btn_create_topic_icon" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_btn_create_topic_icon') ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="card me-2 p-3">
                                <h6>Navigation rapide <small>(accueil)</small> :</h6>
                                <input type="text" class="form-control" id="forum_breadcrumb_home" name="forum_breadcrumb_home" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_breadcrumb_home') ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-in-card mt-4">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" id="forum_use_widgets" name="forum_use_widgets" <?= ThemeModel::getInstance()->fetchConfigValue('forum_use_widgets') ? 'checked' : '' ?>>
                        <label class="form-check-label" for="forum_use_widgets"><h4>Widgets :</h4></label>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="card me-2 p-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="1" id="forum_widgets_show_stats" name="forum_widgets_show_stats" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_stats') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="forum_widgets_show_stats"><h6>Statistiques :</h6></label>
                                </div>
                                <h6>Titre du widget :</h6>
                                <input type="text" class="form-control" id="forum_widgets_title_stats" name="forum_widgets_title_stats" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_title_stats') ?>" required>
                                <hr>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="1" id="forum_widgets_show_member" name="forum_widgets_show_member" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_member') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="forum_widgets_show_member"><h6>Nombre de membres :</h6></label>
                                </div>
                                <input type="text" class="form-control" id="forum_widgets_text_member" name="forum_widgets_text_member" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_member') ?>" required>
                                <hr>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="1" id="forum_widgets_show_messages" name="forum_widgets_show_messages" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_messages') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="forum_widgets_show_messages"><h6>Nombre de messages</h6></label>
                                </div>
                                <input type="text" class="form-control" id="forum_widgets_text_messages" name="forum_widgets_text_messages" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_messages') ?>" required>
                                <hr>
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="forum_widgets_show_topics"><h6>Nombre de topics :</h6></label>
                                    <input class="form-check-input" type="checkbox" value="1" id="forum_widgets_show_topics" name="forum_widgets_show_topics" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_topics') ? 'checked' : '' ?>>
                                </div>
                                <input type="text" class="form-control" id="forum_widgets_text_topics" name="forum_widgets_text_topics" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_topics') ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card me-2 p-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="1" id="forum_widgets_show_discord" name="forum_widgets_show_discord" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_discord') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="forum_widgets_show_discord"><h6>Discord</h6></label>
                                </div>
                                <h6>Id Discord :</h6>
                                <input type="text" class="form-control" id="forum_widgets_content_id" name="forum_widgets_content_id" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_content_id') ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card me-2 p-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="1" id="forum_widgets_show_custom" name="forum_widgets_show_custom" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_custom') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="forum_widgets_show_custom"><h6>Widget personnalisé</h6></label>
                                </div>
                                <h6>Titre du widget :</h6>
                                <input type="text" class="form-control" id="forum_widgets_custom_title" name="forum_widgets_custom_title" value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_custom_title') ?>" required>
                                <h6>Contenu :</h6>
                                <textarea name="forum_widgets_custom_text" class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_custom_text') ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    <?php endif; ?>
    <!---FOOTER---->
    <div class="tab-pane fade py-2" id="setting8" role="tabpanel" aria-labelledby="setting8-tab">
        <div class="card-in-card">
            <div class="card-body">
                <h4>Réglages :</h4>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Année :</h6>
                        <input type="text" class="form-control" id="footer_year" name="footer_year" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_year') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" id="footer_open_link_new_tab" name="footer_open_link_new_tab" <?= ThemeModel::getInstance()->fetchConfigValue('footer_open_link_new_tab') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="footer_open_link_new_tab"><h6>Ouvrir les liens dans un nouvel onglet</h6></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h4>Conditions générales :</h4>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6>Titre de section :</h6>
                        <input type="text" class="form-control" id="footer_title_condition" name="footer_title_condition" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_title_condition') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" value="1" id="footer_active_condition" name="footer_active_condition" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_condition') ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="footer_active_condition"><h6>Afficher dans le footer</h6></label>
                            </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-2">
                        <h6>Condition General d'Utilisation :</h6>
                        <input type="text" class="form-control" id="footer_desc_condition_use" name="footer_desc_condition_use" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_desc_condition_use') ?>" required>
                    </div>
                    <div class="col-12 col-lg-6 mt-2">
                        <h6>Condition General de Vente :</h6>
                        <input type="text" class="form-control" id="footer_desc_condition_sale" name="footer_desc_condition_sale" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_desc_condition_sale') ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-in-card mt-4">
            <div class="card-body">
                <h4>Icônes :</h4>
                <p>Retrouvez les icônes ici : <a href="https://fontawesome.com/search?o=r&m=free" target="_blank">FontAwesome (gratuit)</a></p>
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="footer_active_facebook" name="footer_active_facebook" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_facebook') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="footer_active_facebook"><h6>Icône 1 :</h6></label>
                            </div>
                            <div class="text-center">
                                <i style="font-size : 6rem;" class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_facebook') ?>"></i>
                            </div>
                            <h6 class="mt-2">Lien :</h6>
                            <input type="text" class="mt-1 form-control" id="footer_link_facebook" name="footer_link_facebook" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_facebook') ?>" required>
                            <h6 class="mt-2">Icône :</h6>
                            <input type="text" class="form-control" id="footer_icon_facebook" name="footer_icon_facebook" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_facebook') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="footer_active_twitter" name="footer_active_twitter" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_twitter') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="footer_active_twitter"><h6>Icône 2 :</h6></label>
                            </div>
                            <div class="text-center">
                                <i style="font-size : 6rem;" class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_twitter') ?>"></i>
                            </div>
                            <h6 class="mt-2">Lien :</h6>
                            <input type="text" class="mt-1 form-control" id="footer_link_twitter" name="footer_link_twitter" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_twitter') ?>" required>
                            <h6 class="mt-2">Icône :</h6>
                            <input type="text" class="form-control" id="footer_icon_twitter" name="footer_icon_twitter" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_twitter') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="footer_active_instagram" name="footer_active_instagram" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_instagram') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="footer_active_instagram"><h6>Icône 3 :</h6></label>
                            </div>
                            <div class="text-center">
                                <i style="font-size : 6rem;" class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_instagram') ?>"></i>
                            </div>
                            <h6 class="mt-2">Lien :</h6>
                            <input type="text" class="mt-1 form-control" id="footer_link_instagram" name="footer_link_instagram" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_instagram') ?>" required>
                            <h6 class="mt-2">Icône :</h6>
                            <input type="text" class="form-control" id="footer_icon_instagram" name="footer_icon_instagram" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_instagram') ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card me-2 p-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="footer_active_discord" name="footer_active_discord" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_discord') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="footer_active_discord"><h6>Icône 4 :</h6></label>
                            </div>
                            <div class="text-center">
                                <i style="font-size : 6rem;" class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_discord') ?>"></i>
                            </div>
                            <h6 class="mt-2">Lien :</h6>
                            <input type="text" class="mt-1 form-control" id="footer_link_discord" name="footer_link_discord" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_discord') ?>" required>
                            <h6 class="mt-2">Icône :</h6>
                            <input type="text" class="form-control" id="footer_icon_discord" name="footer_icon_discord" value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_discord') ?>" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
