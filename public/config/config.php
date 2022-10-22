<?php

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
