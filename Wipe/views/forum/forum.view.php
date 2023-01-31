<?php
/** @var \CMW\Entity\Forum\forumEntity $forum */
/** @var \CMW\Model\Forum\forumModel $forumModel */
$title = "Titre de la page";
$description = "Description de votre page";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if ($forumModel->hasSubForums($forum->getId())): ?>
    <h1>Sous-Forums</h1>
    <div class="container">
        <?php foreach ($forumModel->getForumByParent($forum->getId(), true) as $forumEntity): ?>
            <h3><?= $forumEntity->getId() . ". " . $forumEntity->getName() ?></h3>
            <a href="/<?= $forumEntity->getLink() ?>">Aller vers ce Forum</a>
        <?php endforeach; ?>
    </div>
<?php endif ?>
<h1>Topics</h1>
<div class="container">
    <?php foreach ($forumModel->getTopicByForum($forum->getId()) as $topic): ?>
        <h3><?= $topic->getId() . ". " . $topic->getName() ?></h3>
        <a href="/<?= $topic->getLink() ?>">Aller vers ce Topic</a>
    <?php endforeach; ?>
</div>
