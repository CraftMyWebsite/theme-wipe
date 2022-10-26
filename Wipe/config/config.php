<?php
use CMW\Utils\Utils;
use CMW\Manager\Lang\LangManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\SecurityService;
?>

<div class="row">
    <div class="col-12">
        <form action="" method="post"> <!-- IMPORTANT, KEEP THE FORM -->
            <?php (new SecurityService())->insertHiddenToken() ?>
            <div class="card card-primary">
                <div class="card-body">

                    <!-- CONFIG TABS -->

                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="config-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="config-tabs-home-tab" data-toggle="pill"
                                       href="#config-tabs-home" role="tab" aria-controls="config-tabs-home"
                                       aria-selected="true">Page d'accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="config-tabs-news-tab" data-toggle="pill"
                                       href="#config-tabs-news" role="tab" aria-controls="config-tabs-news"
                                       aria-selected="false">Page des news</a>
                                </li>
                            </ul>
                        </div>

                        <!-- CONFIG TABS CONTENT -->

<div class="card-body">
    <div class="tab-content" id="config-tabs-home-tabContent">
        <div class="tab-pane fade active show" id="config-tabs-home" role="tabpanel" aria-labelledby="config-tabs-home-tab">
            <h3>Section hero :</h3>
                <section class="bg-gray-800 position-relative text-white">
                <img width="1080" height="720" src="<?= getenv("PATH_SUBFOLDER") ?>public/uploads/Wipe/bg.webp" class="position-absolute h-full inset-0 object-center object-cover w-full" style="width: 100%; height: 100%; object-fit: cover;" alt="Vous devez upload bg.webp depuis votre panel !"/>
                <div class="container mx-auto position-relative">
                    <div class="flex flex-wrap p-3">
                        <div class="mx-auto text-center w-full lg:w-8/12">
                            <div class="form-group">
                                <input type="text" id="hero_title" name="hero_title" value="<?= ThemeModel::fetchConfigValue('hero_title') ?>">
                            </div>
                            <h1 class="font-extrabold text-2xl md:text-6xl"><?= Utils::getSiteName()?></h1>
                            <div class="form-group">
                                <input style="width: 50%" type="text" id="hero_description" name="hero_description" value="<?= ThemeModel::fetchConfigValue('hero_description') ?>">
                            </div>
                            <div class="form-group">
                                <div class="btn btn-primary"><input type="text" id="hero_button_text" name="hero_button_text" value="<?= ThemeModel::fetchConfigValue('hero_button_text') ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="hero_button_link">Lien du bouton :</label>
                                <input type="text" id="hero_button_link" name="hero_button_link" value="<?= ThemeModel::fetchConfigValue('hero_button_link') ?>">
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            <hr class="border border-dark">
                <div class="form-group float-right">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="feature_section_active" value="false" class="custom-control-input" id="feature_section_active" <?= ThemeModel::fetchConfigValue('feature_section_active') ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="feature_section_active">Activer cette section ?</label>
                    </div>
                </div>
            <h3>Section fonctionnalités :</h3>
                <div class="form-group">
                    <label for="hero_button_link">Titre de la section :</label>
                        <input type="text" id="feature_section_title" name="feature_section_title" value="<?= ThemeModel::fetchConfigValue('feature_section_title') ?>">
                </div>
                <div class="text-center">
                    <div class="row">
                        <div class="col">
                            <img src="<?= getenv("PATH_SUBFOLDER") ?>public/uploads/Wipe/bread.webp" class="mb-3 mx-auto" alt="Vous devez upload bread.webp depuis votre panel !" width="160" height="160"/>
                            <div class="form-group">
                                <input type="text" id="feature_title_1" name="feature_title_1" value="<?= ThemeModel::fetchConfigValue('feature_title_1') ?>">
                            </div>
                            <div class="form-group">
                                <input style="width: 100%" type="text" id="feature_description_1" name="feature_description_1" value="<?= ThemeModel::fetchConfigValue('feature_description_1') ?>">
                            </div>
                        </div>
                        <div class="col">
                            <img src="<?= getenv("PATH_SUBFOLDER") ?>public/uploads/Wipe/potion.webp" class="mb-3 mx-auto" alt="Vous devez upload potion.webp depuis votre panel !" width="160" height="160">
                            <div class="form-group">
                                <input type="text" id="feature_title_2" name="feature_title_2" value="<?= ThemeModel::fetchConfigValue('feature_title_2') ?>">
                            </div>
                            <div class="form-group">
                                <input style="width: 100%" type="text" id="feature_description_2" name="feature_description_2" value="<?= ThemeModel::fetchConfigValue('feature_description_2') ?>">
                            </div>
                        </div>
                        <div class="col">
                            <img src="<?= getenv("PATH_SUBFOLDER") ?>public/uploads/Wipe/craftingtable.webp" class="mb-3 mx-auto" alt="Vous devez upload craftingtable.webp depuis votre panel !" width="160" height="160">
                            <div class="form-group">
                                <input type="text" id="feature_title_3" name="feature_title_3" value="<?= ThemeModel::fetchConfigValue('feature_title_3') ?>">
                            </div>
                            <div class="form-group">
                                <input style="width: 100%" type="text" id="feature_description_3" name="feature_description_3" value="<?= ThemeModel::fetchConfigValue('feature_description_3') ?>">
                            </div>
                        </div>
                    </div>
                </div>
            <hr class="border border-dark">
                <div class="form-group float-right">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="news_section_active" value="false" class="custom-control-input" id="news_section_active" <?= ThemeModel::fetchConfigValue('news_section_active') ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="news_section_active">Activer cette section ?</label>
                    </div>
                </div>
            <h3>Section nouveautés :</h3>                                                        
                <div class="form-group">
                    <label for="hero_button_link">Titre de la section :</label>
                        <input type="text" id="news_section_title" name="news_section_title" value="<?= ThemeModel::fetchConfigValue('news_section_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Nombre de news à afficher :</label>
                    <input type="text" id="news_number_display" name="news_number_display" value="<?= ThemeModel::fetchConfigValue('news_number_display') ?>">
                </div>  
            <hr class="border border-dark">
                <div class="form-group float-right">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="custom_section_active_1" value="false" class="custom-control-input" id="custom_section_active_1" <?= ThemeModel::fetchConfigValue('custom_section_active_1') ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="custom_section_active_1">Activer cette section ?</label>
                    </div>
                </div>
            <h3>Section personnalisé 1 :</h3>
                <div class="form-group">
                    <label for="hero_button_link">Titre de la section :</label>
                    <input type="text" id="custom_section_title_1" name="custom_section_title_1" value="<?= ThemeModel::fetchConfigValue('custom_section_title_1') ?>">
                </div>  
                <div class="form-floating">
                    <label>Contenue de la section :</label>
                    <textarea class="form-control" name="custom_section_content_1" id="custom_section_content_1"><?= ThemeModel::fetchConfigValue('custom_section_content_1') ?></textarea>
                </div>
            <hr class="border border-dark">
                <div class="form-group float-right">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="custom_section_active_2" value="false" class="custom-control-input" id="custom_section_active_2" <?= ThemeModel::fetchConfigValue('custom_section_active_2') ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="custom_section_active_2">Activer cette section ?</label>
                    </div>
                </div>
            <h3>Section personnalisé 2 :</h3>
                <div class="form-group">
                    <label for="hero_button_link">Titre de la section :</label>
                    <input type="text" id="custom_section_title_2" name="custom_section_title_2" value="<?= ThemeModel::fetchConfigValue('custom_section_title_2') ?>">
                </div>  
                <div class="form-floating">
                    <label>Contenue de la section :</label>
                    <textarea class="form-control" name="custom_section_content_2" id="custom_section_content_2"><?= ThemeModel::fetchConfigValue('custom_section_content_2') ?></textarea>
                </div>
            <hr class="border border-dark">
                <div class="form-group float-right">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="custom_section_active_3" value="false" class="custom-control-input" id="custom_section_active_3" <?= ThemeModel::fetchConfigValue('custom_section_active_3') ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="custom_section_active_3">Activer cette section ?</label>
                    </div>
                </div>
            <h3>Section personnalisé 3 :</h3>
                <div class="form-group">
                    <label for="hero_button_link">Titre de la section :</label>
                    <input type="text" id="custom_section_title_3" name="custom_section_title_3" value="<?= ThemeModel::fetchConfigValue('custom_section_title_3') ?>">
                </div>  
                <div class="form-floating">
                    <label>Contenue de la section :</label>
                    <textarea class="form-control" name="custom_section_content_3" id="custom_section_content_3"><?= ThemeModel::fetchConfigValue('custom_section_content_3') ?></textarea>
                </div>
            <hr class="border border-dark">
                <div class="form-group float-right">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success float-left">
                        <input type="checkbox" name="contact_section_active" value="false" class="custom-control-input" id="contact_section_active" <?= ThemeModel::fetchConfigValue('contact_section_active') ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="contact_section_active">Activer cette section ?</label>
                    </div>
                </div>
            <h3>Contact :</h3>
                <div class="form-group">
                    <label for="hero_button_link">Titre de la section :</label>
                    <input type="text" id="contact_section_title" name="contact_section_title" value="<?= ThemeModel::fetchConfigValue('contact_section_title') ?>">
                </div>  
        </div>



        <div class="tab-pane fade active show" id="config-tabs-news" role="tabpanel" aria-labelledby="config-tabs-news-tab">
                <div class="form-group">
                    <label for="hero_button_link">Titre de la section :</label>
                        <input type="text" id="news_page_title" name="news_page_title" value="<?= ThemeModel::fetchConfigValue('news_page_title') ?>">
                </div>
                <div class="form-group">
                    <label for="hero_button_link">Nombre de news à afficher :</label>
                    <input type="text" id="news_page_number_display" name="news_page_number_display" value="<?= ThemeModel::fetchConfigValue('news_page_number_display') ?>">
                </div> 
        </div>



    </div>




</div>
</div>
</div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit"
                            class="btn btn-primary float-right"><?= LangManager::translate("core.btn.save") ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
