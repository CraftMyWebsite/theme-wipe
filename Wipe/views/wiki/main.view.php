    <?php foreach ($categories as $category): ?>
        <ul>
            <li><?= $category->getName() ?></li>
            <?php foreach ($category->getArticles() as $article): ?>
                <ol><?= $article->getTitle() ?></ol>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>