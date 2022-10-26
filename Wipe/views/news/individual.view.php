<?php
/* @var \CMW\Entity\News\NewsEntity $news */

$title = "News - " . $news->getTitle();
$description = "Affichage de la news " . $news->getTitle();

use CMW\Controller\Core\SecurityController;
use CMW\Utils\SecurityService;


?>


<main>

    <div style="text-align: center">
        <h3><?= $news->getTitle() ?></h3>
        <img src="<?= $news->getImageLink() ?>" height="250" width="250">
        <br>
        <p><?= $news->getContent() ?></p>
    </div>

    <a href="/news">Revenir aux news</a>

</main>
