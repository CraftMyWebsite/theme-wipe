<?php

use CMW\Controller\Core\SecurityController;
use CMW\Manager\Security\SecurityManager;

$title = "Contactez-nous";
$description = "Contactez-nous dès maintenant"; ?>


<h1>Formulaire de contact</h1>

<main>

    <!-- CONTACT FORM -->

    <form action="" method="post">
        <?php (new SecurityManager())->insertHiddenToken() ?>
        <label>
            email
            <input type="email" name="email" required>
        </label>

        <label>
            name
            <input type="text" name="name" required>
        </label>

        <label>
            object
            <input type="text" name="object" required>
        </label>

        <label>
            content
            <input type="text" name="content" required>
        </label>

        <?php SecurityController::getPublicData(); ?>

        <button type="submit">Envoyer</button>
    </form>

</main>