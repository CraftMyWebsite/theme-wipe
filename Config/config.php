<?php use CMW\Controller\Core\PackageController;
use CMW\Controller\Core\ThemeController;
use CMW\Manager\Lang\LangManager;
use CMW\Model\Core\CoreModel;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Votes\VotesConfigModel;
use CMW\Utils\SecurityService;
use CMW\Utils\Utils;
use CMW\Utils\Website; ?>
<!-------------->
<!--Navigation-->
<!-------------->
<div class="tab-menu">
    <ul class="tab-horizontal" data-tabs-toggle="#tab-content-config">
        <li>
            <button type="button" data-tabs-target="#tab1" role="tab">En tête & Global</button>
        </li>
        <li>
            <button type="button" data-tabs-target="#tab2" role="tab">Accueil</button>
        </li>
        <?php if (PackageController::isInstalled('News')): ?>
            <li>
                <button type="button" data-tabs-target="#tab3" role="tab">News</button>
            </li>
        <?php endif; ?>
        <?php if (PackageController::isInstalled('Faq')): ?>
            <li>
                <button type="button" data-tabs-target="#tab4" role="tab">F.A.Q</button>
            </li>
        <?php endif; ?>
        <?php if (PackageController::isInstalled('Votes')): ?>
            <li>
                <button type="button" data-tabs-target="#tab5" role="tab">Votes</button>
            </li>
        <?php endif; ?>
        <?php if (PackageController::isInstalled('Wiki')): ?>
            <li>
                <button type="button" data-tabs-target="#tab6" role="tab">Wiki</button>
            </li>
        <?php endif; ?>
        <?php if (PackageController::isInstalled('Forum')): ?>
            <li>
                <button type="button" data-tabs-target="#tab7" role="tab">Forum</button>
            </li>
        <?php endif; ?>
        <li>
            <button type="button" data-tabs-target="#tab8" role="tab">Footer</button>
        </li>
    </ul>
</div>

<div id="tab-content-config">
    <!--
    En tête et Global
    -->
    <div class="tab-content" id="tab1">
        <div class="grid-2">
            <div>
                <h6>En tête</h6>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Titre : <i data-bs-toggle="tooltip"
                                                           title="Vous pouvez l'afficher ou le masqué"
                                                           class="fa-sharp fa-solid fa-circle-question"></i></p>
                        <input type="checkbox" class="toggle-input" name="header_active_title"
                               id="header_active_title" <?= ThemeModel::getInstance()->fetchConfigValue('header_active_title') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Logo : <i data-bs-toggle="tooltip"
                                                          title="Vous pouvez l'afficher ou le masqué"
                                                          class="fa-sharp fa-solid fa-circle-question"></i></p>
                        <input type="checkbox" class="toggle-input" id="header_active_logo"
                               name="header_active_logo" <?= ThemeModel::getInstance()->fetchConfigValue('header_active_logo') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <div class="grid-2">
                    <div class="flex justify-center">
                        <img class="w-25" src="<?= ThemeModel::getInstance()->fetchImageLink('header_img_logo') ?>"
                             alt="Image introuvable !">
                    </div>
                    <div class="drop-img-area mt-4" data-input-name="header_img_logo"></div>
                </div>
            </div>

            <div>
                <h6>Global</h6>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Connexion <i data-bs-toggle="tooltip"
                                                             title="Désactive le bouton de connexion mais vous avez toujours accès à la page"
                                                             class="fa-sharp fa-solid fa-circle-question"></i></p>
                        <input type="checkbox" class="toggle-input" id="header_allow_login_button"
                               name="header_allow_login_button" <?= ThemeModel::getInstance()->fetchConfigValue('header_allow_login_button') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Inscription <i data-bs-toggle="tooltip"
                                                               title="Vous pouvez désactiver les inscriptions et afficher un message"
                                                               class="fa-sharp fa-solid fa-circle-question"></i></p>
                        <input type="checkbox" class="toggle-input" name="header_allow_register_button"
                               id="header_allow_register_button" <?= ThemeModel::getInstance()->fetchConfigValue('header_allow_register_button') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <label for="global_no_register_message">Message lorsque l'inscription est désactivée :</label>
                <textarea name="global_no_register_message" id="global_no_register_message" class="tinymce"
                          data-tiny-height="270"><?= ThemeModel::getInstance()->fetchConfigValue('global_no_register_message') ?></textarea>
            </div>
        </div>
    </div>
    <!--
    Accueil
    -->
    <div class="tab-content" id="tab2">
        <h6>Indéxation de la page (meta) :</h6>
        <div class="alert-warning">
            <h6 class="alert-heading">Bien comprendre l'indéxation</h6>
            <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des
                affichages sur Discord, Twitter...<br>
                Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un peu
                plus bas (Si votre page est éligible à ce réglage).<br>
                Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
        </div>
        <label for="home_title">Titre de la page :</label>
        <input type="text" id="home_title" name="home_title"
               value="<?= ThemeModel::getInstance()->fetchConfigValue('home_title') ?>" required class="input">
        <hr>
        <!--HERO-->
        <h5>En tête :</h5>
        <h6>Images :</h6>
        <div class="drop-img-area" data-input-name="hero_img_bg"></div>
        <h6>Réglages :</h6>
        <section class="relative">
            <img width="1080" height="720" src="<?= ThemeModel::getInstance()->fetchImageLink('hero_img_bg') ?>"
                 class="absolute h-full inset-0 object-center object-cover w-full rounded-lg"
                 style="width: 100%; height: 100%; object-fit: cover;"
                 alt="Vous devez upload bg.webp depuis votre panel !"/>
            <div class="container mx-auto relative">
                <div class="flex flex-wrap p-3">
                    <div class="mx-auto py-16 w-full lg:w-8/12">
                        <input class="input-sm" type="text" id="hero_title" name="hero_title"
                               value="<?= ThemeModel::getInstance()->fetchConfigValue('hero_title') ?>">
                        <h1 class="text-white font-bold text-center"><?= Website::getWebsiteName() ?></h1>
                        <input class="input-sm" type="text" id="hero_description" name="hero_description"
                               value="<?= ThemeModel::getInstance()->fetchConfigValue('hero_description') ?>">
                        <input class="input-sm" type="text" id="hero_button_text" name="hero_button_text"
                               value="<?= ThemeModel::getInstance()->fetchConfigValue('hero_button_text') ?>">
                        <label for="hero_button_link" class="text-white">Lien du bouton :</label>
                        <input class="input-sm" type="text" id="hero_button_link" name="hero_button_link"
                               value="<?= ThemeModel::getInstance()->fetchConfigValue('hero_button_link') ?>">
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <!--FONCTIONNALITÉS-->
        <div>
            <label class="toggle">
                <h5 class="toggle-label">Fonctionnalités : <i data-bs-toggle="tooltip"
                                                              title="Vous pouvez activer ou non cette section."
                                                              class="fa-sharp fa-solid fa-circle-question"></i></h5>
                <input type="checkbox" class="toggle-input" id="feature_section_active"
                       name="feature_section_active" <?= ThemeModel::getInstance()->fetchConfigValue('feature_section_active') ? 'checked' : '' ?>>
                <div class="toggle-slider"></div>
            </label>
        </div>
        <label for="feature_section_title">Titre de la section :</label>
        <input type="text" class="input" id="feature_section_title" name="feature_section_title"
               value="<?= ThemeModel::getInstance()->fetchConfigValue('feature_section_title') ?>" required>
        <div class="grid-3">
            <div>
                <label>Image :</label>
                <div class="text-center">
                    <img src="<?= ThemeModel::getInstance()->fetchImageLink('feature_img_1') ?>" class="mb-3 mx-auto"
                         alt="Vous devez upload feature1.webp depuis votre panel !" width="160" height="160"/>
                </div>
                <div class="drop-img-area" data-input-name="feature_img_1"></div>
                <div class="form-group">
                    <label for="feature_title_1">Titre :</label>
                    <input class="input" type="text" id="feature_title_1" name="feature_title_1"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('feature_title_1') ?>">
                </div>
                <div class="form-group">
                    <label for="feature_description_1">Description :</label>
                    <input class="input" type="text" id="feature_description_1" name="feature_description_1"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('feature_description_1') ?>">
                </div>
            </div>
            <div>
                <label>Image :</label>
                <div class="text-center">
                    <img src="<?= ThemeModel::getInstance()->fetchImageLink('feature_img_2') ?>" class="mb-3 mx-auto"
                         alt="Vous devez upload feature2.webp depuis votre panel !" width="160" height="160">
                </div>
                <div class="drop-img-area" data-input-name="feature_img_2"></div>
                <div class="form-group">
                    <label for="feature_title_2">Titre :</label>
                    <input class="input" type="text" id="feature_title_2" name="feature_title_2"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('feature_title_2') ?>">
                </div>
                <div class="form-group">
                    <label for="feature_description_2">Description :</label>
                    <input class="input" type="text" id="feature_description_2" name="feature_description_2"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('feature_description_2') ?>">
                </div>
            </div>
            <div>
                <label>Image :</label>
                <div class="text-center">
                    <img src="<?= ThemeModel::getInstance()->fetchImageLink('feature_img_3') ?>" class="mb-3 mx-auto"
                         alt="Vous devez upload feature3.webp depuis votre panel !" width="160" height="160">
                </div>
                <div class="drop-img-area" data-input-name="feature_img_3"></div>
                <div class="form-group">
                    <label for="feature_title_3">Titre :</label>
                    <input class="input" type="text" id="feature_title_3" name="feature_title_3"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('feature_title_3') ?>">
                </div>
                <div class="form-group">
                    <label for="feature_description_3">Description :</label>
                    <input class="input" type="text" id="feature_description_3" name="feature_description_3"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('feature_description_3') ?>">
                </div>
            </div>
        </div>
        <hr>
        <!--NEWS-->
        <?php if (PackageController::isInstalled('News')): ?>
            <div>
                <label class="toggle">
                    <h5 class="toggle-label">Nouveautés : <i data-bs-toggle="tooltip"
                                                             title="Vous pouvez activer ou non cette section."
                                                             class="fa-sharp fa-solid fa-circle-question"></i></h5>
                    <input type="checkbox" class="toggle-input" id="news_section_active"
                           name="news_section_active" <?= ThemeModel::getInstance()->fetchConfigValue('news_section_active') ? 'checked' : '' ?>>
                    <div class="toggle-slider"></div>
                </label>
            </div>
            <label for="news_section_title">Titre de la section :</label>
            <input type="text" class="input" id="news_section_title" name="news_section_title"
                   value="<?= ThemeModel::getInstance()->fetchConfigValue('news_section_title') ?>" required>
            <label for="news_number_display">Nombre de news à afficher :</label>
            <input class="input" type="number" id="news_number_display" name="news_number_display"
                   value="<?= ThemeModel::getInstance()->fetchConfigValue('news_number_display') ?>">
        <?php endif; ?>
        <hr>
        <!--CUSTOM 1-->
        <div>
            <label class="toggle">
                <h5 class="toggle-label">Personnalisable 1 : <i data-bs-toggle="tooltip"
                                                                title="Vous pouvez activer ou non cette section."
                                                                class="fa-sharp fa-solid fa-circle-question"></i></h5>
                <input type="checkbox" class="toggle-input" id="custom_section_active_1"
                       name="custom_section_active_1" <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_active_1') ? 'checked' : '' ?>>
                <div class="toggle-slider"></div>
            </label>
        </div>
        <label for="custom_section_title_1">Titre de la section :</label>
        <input type="text" class="input" id="custom_section_title_1" name="custom_section_title_1"
               value="<?= ThemeModel::getInstance()->fetchConfigValue('custom_section_title_1') ?>" required>
        <label for="custom_section_content_1">Contenu :</label>
        <textarea id="custom_section_content_1" name="custom_section_content_1"
                  class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_1') ?></textarea>
        <hr>
        <!--CUSTOM 2-->
        <div>
            <label class="toggle">
                <h5 class="toggle-label">Personnalisable 2 : <i data-bs-toggle="tooltip"
                                                                title="Vous pouvez activer ou non cette section."
                                                                class="fa-sharp fa-solid fa-circle-question"></i></h5>
                <input type="checkbox" class="toggle-input" id="custom_section_active_2"
                       name="custom_section_active_2" <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_active_2') ? 'checked' : '' ?>>
                <div class="toggle-slider"></div>
            </label>
        </div>
        <label for="custom_section_title_2">Titre de la section :</label>
        <input type="text" class="input" id="custom_section_title_2" name="custom_section_title_2"
               value="<?= ThemeModel::getInstance()->fetchConfigValue('custom_section_title_2') ?>" required>
        <label for="custom_section_content_2">Contenu :</label>
        <textarea name="custom_section_content_2" id="custom_section_content_2"
                  class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_2') ?></textarea>
        <hr>
        <!--CUSTOM 3-->
        <div>
            <label class="toggle">
                <h5 class="toggle-label">Personnalisable 3 : <i data-bs-toggle="tooltip"
                                                                title="Vous pouvez activer ou non cette section."
                                                                class="fa-sharp fa-solid fa-circle-question"></i></h5>
                <input type="checkbox" class="toggle-input" id="custom_section_active_3"
                       name="custom_section_active_3" <?= ThemeModel::getInstance()->fetchConfigValue('custom_section_active_3') ? 'checked' : '' ?>>
                <div class="toggle-slider"></div>
            </label>
        </div>
        <label for="custom_section_title_3">Titre de la section :</label>
        <input type="text" class="input" id="custom_section_title_3" name="custom_section_title_3"
               value="<?= ThemeModel::getInstance()->fetchConfigValue('custom_section_title_3') ?>" required>
        <label for="custom_section_content_3">Contenu :</label>
        <textarea name="custom_section_content_3" id="custom_section_content_3"
                  class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('custom_section_content_3') ?></textarea>
        <?php if (PackageController::isInstalled('Contact')): ?>
        <hr>
        <!--CONTACT-->
        <div>
            <label class="toggle">
                <h5 class="toggle-label">Contact : <i data-bs-toggle="tooltip"
                                                      title="Vous pouvez activer ou non cette section."
                                                      class="fa-sharp fa-solid fa-circle-question"></i></h5>
                <input type="checkbox" class="toggle-input" id="contact_section_active"
                       name="contact_section_active" <?= ThemeModel::getInstance()->fetchConfigValue('contact_section_active') ? 'checked' : '' ?>>
                <div class="toggle-slider"></div>
            </label>
        </div>
        <label for="contact_section_title">Titre de la section :</label>
        <input type="text" class="input" id="contact_section_title" name="contact_section_title"
               value="<?= ThemeModel::getInstance()->fetchConfigValue('contact_section_title') ?>" required>
        <?php endif; ?>
        <?php if (PackageController::isInstalled('Newsletter')): ?>
            <hr>
            <!--Newsletter-->
            <div>
                <label class="toggle">
                    <h5 class="toggle-label">Newsletter : <i data-bs-toggle="tooltip"
                                                          title="Vous pouvez activer ou non cette section."
                                                          class="fa-sharp fa-solid fa-circle-question"></i></h5>
                    <input type="checkbox" class="toggle-input" id="newsletter_section_active"
                           name="newsletter_section_active" <?= ThemeModel::getInstance()->fetchConfigValue('newsletter_section_active') ? 'checked' : '' ?>>
                    <div class="toggle-slider"></div>
                </label>
            </div>
            <label for="newsletter_section_title">Titre de la section :</label>
            <input type="text" class="input" id="newsletter_section_title" name="newsletter_section_title"
                   value="<?= ThemeModel::getInstance()->fetchConfigValue('newsletter_section_title') ?>" required>
            <label for="newsletter_section_description">Message :</label>
            <input type="text" class="input" id="newsletter_section_description" name="newsletter_section_description"
                   value="<?= ThemeModel::getInstance()->fetchConfigValue('newsletter_section_description') ?>" required>
            <label for="newsletter_section_button">Bouton :</label>
            <input type="text" class="input" id="newsletter_section_button" name="newsletter_section_button"
                   value="<?= ThemeModel::getInstance()->fetchConfigValue('newsletter_section_button') ?>" required>
        <?php endif; ?>
    </div>
    <div class="tab-content" id="tab3">
        <!---NEWS---->
        <?php if (PackageController::isInstalled('News')): ?>
            <h6>Indéxation de la page (meta) :</h6>
            <div class="alert alert-warning">
                <h6 class="alert-heading">Bien comprendre l'indéxation</h6>
                <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des
                    affichages sur Discord, Twitter...<br>
                    Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un
                    peu plus bas (Si votre page est éligible à ce réglage).<br>
                    Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
            </div>
            <div class="grid-2">
                <div>
                    <label for="news_title">Titre de la page :</label>
                    <input type="text" class="input" id="news_title" name="news_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('news_title') ?>" required>
                </div>
                <div>
                    <label for="news_description">Description de la page :</label>
                    <input type="text" class="input" id="news_description" name="news_description"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('news_description') ?>" required>
                </div>
            </div>
            <hr>
            <h6>Réglages :</h6>
            <div class="grid-2">
                <div>
                    <label for="news_page_title">Titre :</label>
                    <input type="text" class="input" id="news_page_title" name="news_page_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('news_page_title') ?>" required>
                </div>
                <div>
                    <label for="news_page_number_display">Nombre de news à afficher:</label>
                    <input class="input" type="number" id="news_page_number_display" name="news_page_number_display"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('news_page_number_display') ?>">
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="tab-content" id="tab4">
        <!---FAQ---->
        <?php if (PackageController::isInstalled('Faq')): ?>
            <h6>Indéxation de la page (meta) :</h6>
            <div class="alert alert-warning">
                <h6 class="alert-heading">Bien comprendre l'indéxation</h6>
                <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des
                    affichages sur Discord, Twitter...<br>
                    Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un
                    peu plus bas (Si votre page est éligible à ce réglage).<br>
                    Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
            </div>
            <div class="grid-2">
                <div>
                    <label for="faq_title">Titre de la page :</label>
                    <input type="text" class="input" id="faq_title" name="faq_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_title') ?>" required>
                </div>
                <div>
                    <label for="faq_description">Description de la page :</label>
                    <input type="text" class="input" id="faq_description" name="faq_description"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_description') ?>" required>
                </div>
            </div>
            <hr>
            <h6>Réglages :</h6>
            <div class="grid-2">
                <div>
                    <label for="faq_page_title">Titre :</label>
                    <input type="text" class="input" id="faq_page_title" name="faq_page_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_page_title') ?>" required>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher l'auteur</p>
                            <input type="checkbox" class="toggle-input" id="faq_display_autor"
                                   name="faq_display_autor" <?= ThemeModel::getInstance()->fetchConfigValue('faq_display_autor') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Formulaire de contact</p>
                            <input type="checkbox" class="toggle-input" id="faq_display_form"
                                   name="faq_display_form" <?= ThemeModel::getInstance()->fetchConfigValue('faq_display_form') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                </div>
                <div>
                    <label for="faq_question_title">Titre section formulaire :</label>
                    <input type="text" class="input" id="faq_question_title" name="faq_question_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_question_title') ?>" required>
                    <label for="faq_answer_title">Titre section réponse :</label>
                    <input type="text" class="input" id="faq_answer_title" name="faq_answer_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('faq_answer_title') ?>" required>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!---VOTES---->
    <div class="tab-content" id="tab5">
        <?php if (PackageController::isInstalled('Votes')): ?>
            <h6>Indéxation de la page (meta) :</h6>
            <div class="alert alert-warning">
                <h6 class="alert-heading">Bien comprendre l'indéxation</h6>
                <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des
                    affichages sur Discord, Twitter...<br>
                    Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un
                    peu plus bas (Si votre page est éligible à ce réglage).<br>
                    Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
            </div>
            <div class="grid-2">
                <div class="col-12 col-lg-6">
                    <label for="vote_title">Titre de la page :</label>
                    <input type="text" class="input" id="vote_title" name="vote_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('vote_title') ?>" required>
                </div>
                <div class="col-12 col-lg-6">
                    <label for="vote_description">Description de la page :</label>
                    <input type="text" class="input" id="vote_description" name="vote_description"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('vote_description') ?>" required>
                </div>
            </div>
            <hr>
            <h4>Réglages :</h4>
            <div class="grid-3">
                <div>
                    <label for="votes_page_title">Titre :</label>
                    <input type="text" class="input" id="votes_page_title" name="votes_page_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_page_title') ?>" required>
                    <label for="votes_participate_title">Participation :</label>
                    <input type="text" class="input" id="votes_participate_title" name="votes_participate_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_participate_title') ?>"
                           required>
                </div>
                <div>
                    <label for="votes_top_10_title">Top <?= (new VotesConfigModel())->getConfig()->getTopShow() ?> du
                        mois :</label>
                    <input type="text" class="input" id="votes_top_10_title" name="votes_top_10_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_top_10_title') ?>" required>
                    <label
                        for="votes_top_10_global_title">Top <?= (new VotesConfigModel())->getConfig()->getTopShow() ?>
                        Global :</label>
                    <input type="text" class="input" id="votes_top_10_global_title" name="votes_top_10_global_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('votes_top_10_global_title') ?>"
                           required>
                </div>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Top global</p>
                        <input type="checkbox" class="toggle-input" id="votes_display_global"
                               name="votes_display_global" <?= ThemeModel::getInstance()->fetchConfigValue('votes_display_global') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="tab-content" id="tab6">
        <!---WIKI---->
        <?php if (PackageController::isInstalled('Wiki')): ?>
            <h6>Indéxation de la page (meta) :</h6>
            <div class="alert alert-warning">
                <h6 class="alert-heading">Bien comprendre l'indéxation</h6>
                <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des
                    affichages sur Discord, Twitter...<br>
                    Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un
                    peu plus bas (Si votre page est éligible à ce réglage).<br>
                    Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
            </div>
            <div class="grid-2">
                <div class="col-12 col-lg-6">
                    <label for="wiki_title">Titre de la page :</label>
                    <input type="text" class="input" id="wiki_title" name="wiki_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_title') ?>" required>
                </div>
                <div class="col-12 col-lg-6">
                    <label for="wiki_description">Description de la page :</label>
                    <input type="text" class="input" id="wiki_description" name="wiki_description"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_description') ?>" required>
                </div>
            </div>
            <hr>
            <h6>Réglages :</h6>
            <div class="grid-3">
                <div>
                    <label for="wiki_page_title">Titre :</label>
                    <input type="text" class="input" id="wiki_page_title" name="wiki_page_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_page_title') ?>" required>
                    <label for="wiki_menu_title">Menu :</label>
                    <input type="text" class="input" id="wiki_menu_title" name="wiki_menu_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('wiki_menu_title') ?>" required>
                </div>
                <div>
                    <h6>Icônes :</h6>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher les icons des catégorie (menu)</p>
                            <input type="checkbox" class="toggle-input" id="wiki_display_categorie_icon"
                                   name="wiki_display_categorie_icon" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_categorie_icon') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher les icons des articles (menu)</p>
                            <input type="checkbox" class="toggle-input" id="wiki_display_article_categorie_icon"
                                   name="wiki_display_article_categorie_icon" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_article_categorie_icon') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher les icons des articles (articles)</p>
                            <input type="checkbox" class="toggle-input" id="wiki_display_article_icon"
                                   name="wiki_display_article_icon" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_article_icon') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                </div>
                <div>
                    <h6>Autres :</h6>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher la date de création</p>
                            <input type="checkbox" class="toggle-input" id="wiki_display_creation_date"
                                   name="wiki_display_creation_date" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_creation_date') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher la date d'édition</p>
                            <input type="checkbox" class="toggle-input" id="wiki_display_edit_date"
                                   name="wiki_display_edit_date" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_edit_date') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Afficher l'auteur</p>
                            <input type="checkbox" class="toggle-input" id="wiki_display_autor"
                                   name="wiki_display_autor" <?= ThemeModel::getInstance()->fetchConfigValue('wiki_display_autor') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="tab-content" id="tab7">
        <!---FORUM---->
        <?php if (PackageController::isInstalled('Forum')): ?>

            <h6>Indéxation de la page (meta) :</h6>
            <div class="alert alert-warning">
                <h6 class="alert-heading">Bien comprendre l'indéxation</h6>
                <p>Ces options changent le titre et la description de votre page dans l'onglet, mais également lors des
                    affichages sur Discord, Twitter...<br>
                    Ceci n'est aucunement lié au titre de la page en cours de modification. Cette option se trouve un
                    peu plus bas (Si votre page est éligible à ce réglage).<br>
                    Si vous avez besoin d'aide supplémentaire vous pouvez contacter le support CraftMyWebsite.</p>
            </div>
            <div class="grid-2">
                <div>
                    <label for="forum_title">Titre de la page :</label>
                    <input type="text" class="input" id="forum_title" name="forum_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_title') ?>" required>
                </div>
                <div>
                    <label for="forum_description">Description de la page :</label>
                    <input type="text" class="input" id="forum_description" name="forum_description"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_description') ?>" required>
                </div>
            </div>
            <hr>
            <h6>Réglages :</h6>
            <div class="grid-4">
                <div>
                    <h6>Titres :</h6>
                    <label for="forum_sub_forum">Sous-Forums :</label>
                    <input type="text" class="input" id="forum_sub_forum" name="forum_sub_forum"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_sub_forum') ?>" required>
                    <label for="forum_topics">Topics :</label>
                    <input type="text" class="input" id="forum_topics" name="forum_topics"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_topics') ?>" required>
                    <label for="forum_message">Messages :</label>
                    <input type="text" class="input" id="forum_message" name="forum_message"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_message') ?>" required>
                    <label for="forum_last_message">Dernier messages :</label>
                    <input type="text" class="input" id="forum_last_message" name="forum_last_message"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_last_message') ?>" required>
                    <label for="forum_display">Affichages :</label>
                    <input type="text" class="input" id="forum_display" name="forum_display"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_display') ?>" required>
                    <label for="forum_response">Réponses :</label>
                    <input type="text" class="input" id="forum_response" name="forum_response"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_response') ?>" required>

                </div>
                <div>

                    <h6>Topic sans message :</h6>
                    <div class="form-group">
                        <label for="forum_nobody_send_message_text">Texte :</label>
                        <input type="text" class="input" id="forum_nobody_send_message_text"
                               name="forum_nobody_send_message_text"
                               value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_nobody_send_message_text') ?>"
                               required>
                    </div>
                    <div class="form-group">
                        <h6>Image :</h6>
                        <div class="flex justify-center">
                            <img class="w-24"
                                 src="<?= ThemeModel::getInstance()->fetchImageLink('forum_nobody_send_message_img') ?>"
                                 alt="Image introuvable !">
                        </div>
                        <div class="drop-img-area" data-input-name="forum_nobody_send_message_img"></div>
                    </div>
                </div>
                <div>

                    <h6>Bouton :</h6>
                    <div class="form-group">
                        <label for="forum_btn_create_topic">Texte :</label>
                        <input type="text" class="input" id="forum_btn_create_topic" name="forum_btn_create_topic"
                               value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_btn_create_topic') ?>"
                               required>
                    </div>
                    <div class="form-group">
                        <div class="icon-picker" data-id="forum_btn_create_topic_icon"
                             data-name="forum_btn_create_topic_icon" data-label="Icône :"
                             data-placeholder="Sélectionner un icon"
                             data-value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_btn_create_topic_icon') ?>"></div>
                    </div>
                </div>

                <div>
                    <label for="forum_breadcrumb_home">Navigation rapide <small>(accueil)</small> :</label>
                    <input type="text" class="input" id="forum_breadcrumb_home" name="forum_breadcrumb_home"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_breadcrumb_home') ?>" required>
                </div>
            </div>
            <hr>
            <div>
                <label class="toggle">
                    <h6 class="toggle-label">Widgets :</h6>
                    <input type="checkbox" class="toggle-input" id="forum_use_widgets"
                           name="forum_use_widgets" <?= ThemeModel::getInstance()->fetchConfigValue('forum_use_widgets') ? 'checked' : '' ?>>
                    <div class="toggle-slider"></div>
                </label>
            </div>
            <div class="grid-3">
                <div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Statistiques :</p>
                            <input type="checkbox" class="toggle-input" id="forum_widgets_show_stats"
                                   name="forum_widgets_show_stats" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_stats') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <label for="forum_widgets_title_stats">Titre du widget :</label>
                    <input type="text" class="input" id="forum_widgets_title_stats" name="forum_widgets_title_stats"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_title_stats') ?>"
                           required>
                    <hr>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Nombre de membres :</p>
                            <input type="checkbox" class="toggle-input" id="forum_widgets_show_member"
                                   name="forum_widgets_show_member" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_member') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <input type="text" class="input" id="forum_widgets_text_member" name="forum_widgets_text_member"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_member') ?>"
                           required>
                    <hr>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Nombre de messages</p>
                            <input type="checkbox" class="toggle-input" id="forum_widgets_show_messages"
                                   name="forum_widgets_show_messages" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_messages') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <input type="text" class="input" id="forum_widgets_text_messages" name="forum_widgets_text_messages"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_messages') ?>"
                           required>
                    <hr>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Nombre de topics :</p>
                            <input type="checkbox" class="toggle-input" id="forum_widgets_show_topics"
                                   name="forum_widgets_show_topics" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_topics') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <input type="text" class="input" id="forum_widgets_text_topics" name="forum_widgets_text_topics"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_topics') ?>"
                           required>
                </div>
                <div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Discord</p>
                            <input type="checkbox" class="toggle-input" id="forum_widgets_show_discord"
                                   name="forum_widgets_show_discord" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_discord') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <label for="forum_widgets_content_id">Id Discord :</label>
                    <input type="text" class="input" id="forum_widgets_content_id" name="forum_widgets_content_id"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_content_id') ?>"
                           required>
                </div>
                <div>
                    <div>
                        <label class="toggle">
                            <p class="toggle-label">Widget personnalisé</p>
                            <input type="checkbox" class="toggle-input" id="forum_widgets_show_custom"
                                   name="forum_widgets_show_custom" <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_custom') ? 'checked' : '' ?>>
                            <div class="toggle-slider"></div>
                        </label>
                    </div>
                    <label for="forum_widgets_custom_title">Titre du widget :</label>
                    <input type="text" class="input" id="forum_widgets_custom_title" name="forum_widgets_custom_title"
                           value="<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_custom_title') ?>"
                           required>
                    <label for="forum_widgets_custom_text">Contenu :</label>
                    <textarea name="forum_widgets_custom_text" id="forum_widgets_custom_text"
                              class="tinymce"><?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_custom_text') ?></textarea>

                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="tab-content" id="tab8">
        <!---FOOTER---->
        <h6>Réglages :</h6>
        <div class="grid-2">
            <div>
                <label for="footer_year">Année :</label>
                <input type="text" class="input" id="footer_year" name="footer_year"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_year') ?>" required>
            </div>
            <div>
                <label class="toggle">
                    <p class="toggle-label">Ouvrir les liens dans un nouvel onglet</p>
                    <input type="checkbox" class="toggle-input" id="footer_open_link_new_tab"
                           name="footer_open_link_new_tab" <?= ThemeModel::getInstance()->fetchConfigValue('footer_open_link_new_tab') ? 'checked' : '' ?>>
                    <div class="toggle-slider"></div>
                </label>
            </div>
        </div>
        <hr>
        <h4>Conditions générales :</h4>
        <div>
            <label class="toggle">
                <p class="toggle-label">Afficher dans le footer</p>
                <input type="checkbox" class="toggle-input" id="footer_active_condition"
                       name="footer_active_condition" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_condition') ? 'checked' : '' ?>>
                <div class="toggle-slider"></div>
            </label>
        </div>
        <div class="grid-3">
            <div>
                <label for="footer_title_condition">Titre de section :</label>
                <input type="text" class="input" id="footer_title_condition" name="footer_title_condition"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_title_condition') ?>" required>
            </div>
            <div>
                <label for="footer_desc_condition_use">Condition General d'Utilisation :</label>
                <input type="text" class="input" id="footer_desc_condition_use" name="footer_desc_condition_use"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_desc_condition_use') ?>" required>
            </div>
            <div>
                <label for="footer_desc_condition_sale">Condition General de Vente :</label>
                <input type="text" class="input" id="footer_desc_condition_sale" name="footer_desc_condition_sale"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_desc_condition_sale') ?>"
                       required>
            </div>
        </div>
        <hr>
        <h4>Icônes :</h4>
        <p>Retrouvez les icônes ici : <a href="https://fontawesome.com/search?o=r&m=free" target="_blank">FontAwesome
                (gratuit)</a></p>
        <div class="grid-4">
            <div>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Icône 1 :</p>
                        <input type="checkbox" class="toggle-input" id="footer_active_facebook"
                               name="footer_active_facebook" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_facebook') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <div class="text-center">
                    <i style="font-size : 6rem;"
                       class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_facebook') ?>"></i>
                </div>
                <label for="footer_link_facebook">Lien :</label>
                <input type="text" class="mt-1 input" id="footer_link_facebook" name="footer_link_facebook"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_facebook') ?>" required>
                <div class="icon-picker" data-id="footer_icon_facebook" data-name="footer_icon_facebook"
                     data-label="Icône :" data-placeholder="Sélectionner un icon"
                     data-value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_facebook') ?>"></div>
            </div>
            <div>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Icône 2 :</p>
                        <input type="checkbox" class="toggle-input" id="footer_active_twitter"
                               name="footer_active_twitter" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_twitter') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <div class="text-center">
                    <i style="font-size : 6rem;"
                       class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_twitter') ?>"></i>
                </div>
                <label for="footer_link_twitter">Lien :</label>
                <input type="text" class="mt-1 input" id="footer_link_twitter" name="footer_link_twitter"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_twitter') ?>" required>
                <div class="icon-picker" data-id="footer_icon_twitter" data-name="footer_icon_twitter"
                     data-label="Icône :" data-placeholder="Sélectionner un icon"
                     data-value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_twitter') ?>"></div>
            </div>
            <div>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Icône 3 :</p>
                        <input type="checkbox" class="toggle-input" id="footer_active_instagram"
                               name="footer_active_instagram" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_instagram') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <div class="text-center">
                    <i style="font-size : 6rem;"
                       class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_instagram') ?>"></i>
                </div>
                <label for="footer_link_instagram">Lien :</label>
                <input type="text" class="mt-1 input" id="footer_link_instagram" name="footer_link_instagram"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_instagram') ?>" required>
                <div class="icon-picker" data-id="footer_icon_instagram" data-name="footer_icon_instagram"
                     data-label="Icône :" data-placeholder="Sélectionner un icon"
                     data-value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_instagram') ?>"></div>
            </div>
            <div>
                <div>
                    <label class="toggle">
                        <p class="toggle-label">Icône 4 :</p>
                        <input type="checkbox" class="toggle-input" id="footer_active_discord"
                               name="footer_active_discord" <?= ThemeModel::getInstance()->fetchConfigValue('footer_active_discord') ? 'checked' : '' ?>>
                        <div class="toggle-slider"></div>
                    </label>
                </div>
                <div class="text-center">
                    <i style="font-size : 6rem;"
                       class="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_discord') ?>"></i>
                </div>
                <label for="footer_link_discord">Lien :</label>
                <input type="text" class="mt-1 input" id="footer_link_discord" name="footer_link_discord"
                       value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_link_discord') ?>" required>
                <div class="icon-picker" data-id="footer_icon_discord" data-name="footer_icon_discord"
                     data-label="Icône :" data-placeholder="Sélectionner un icon"
                     data-value="<?= ThemeModel::getInstance()->fetchConfigValue('footer_icon_discord') ?>"></div>
            </div>
        </div>
    </div>
</div>