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
                                    <a class="nav-link active" id="config-tabs-colors-tab" data-toggle="pill"
                                       href="#config-tabs-colors" role="tab" aria-controls="config-tabs-colors"
                                       aria-selected="true">Page d'accueil</a>
                                </li>
                            </ul>
                        </div>

                        <!-- CONFIG TABS CONTENT -->

                        <div class="card-body">
                            <div class="tab-content" id="config-tabs-colors-tabContent">
                                <!-- COLORS -->
                                <div class="tab-pane fade active show" id="config-tabs-colors" role="tabpanel"
                                     aria-labelledby="config-tabs-colors-tab">
                                    <!-- CONTENT -->
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
                                                            <div class="btn btn-primary">
                                                                <input type="text" id="hero_button_text" name="hero_button_text" value="<?= ThemeModel::fetchConfigValue('hero_button_text') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="hero_button_link">Lien du bouton :</label>
                                                            <input type="text" id="hero_button_link" name="hero_button_link" value="<?= ThemeModel::fetchConfigValue('hero_button_link') ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    <hr>
                                    <h3>Section fonctionnalités :</h3>

<section>
        <div class="text-center">
            <div class="form-group">
                <label for="hero_button_link">Titre de la section :</label>
                            <input type="text" id="feature_section_title" name="feature_section_title" value="<?= ThemeModel::fetchConfigValue('feature_section_title') ?>">
                        </div>
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

</section>





                                    <hr>
                                    <h3>Section nouveautés :</h3>
                                    <hr>
                                    <h3>Section personnalisé 1 :</h3>
                                    <hr>
                                    <h3>Section personnalisé 2 :</h3>
                                    <hr>
                                    <h3>Section personnalisé 3 :</h3>
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
