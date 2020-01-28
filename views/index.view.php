<?php
require "views/partials/header.php";
require "views/partials/nav.php";
?>
<h1>Hello word, welcome <?= $name ?></h1>
<ol>
    <?php foreach ($tasks as $task) : ?>
        <li>
            <?php if ($task->completed) : ?>
                <del><?= $task->description; ?></del>
            <?php else : ?>
                <?= $task->description; ?>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ol>

<?php require "views/partials/footer.php";