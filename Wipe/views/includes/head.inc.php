<?php
use CMW\Controller\Core\CoreController;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Images;
use CMW\Utils\View;
use CMW\Utils\Utils;

/* @var \CMW\Controller\Core\CoreController $core */
/* @var string $title */
/* @var string $description */
/* @var array $includes */

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <meta name="description" content="><?= $description ?>">


    <!-- Theme style -->
    <link rel="stylesheet" type="text/css"
          href="<?= getenv("PATH_SUBFOLDER") ?>public/themes/Wipe/assets/css/style.css">

    <?= Images::getFaviconInclude() ?>

    <?php
    View::loadInclude($includes, "beforeScript", "styles");
    ?>

    <script src="<?= getenv("PATH_SUBFOLDER") ?>public/themes/Wipe/assets/js/flowbite.js"></script>
    <script src="https://kit.fontawesome.com/eced519d56.js" crossorigin="anonymous"></script>

</head>

<body>
<?= $core->cmwWarn() ?>
