<?php $view->components('head') ?>

<div class="container">
    <form method="post" action="/store">
        <input name="text" required>

        <button type="submit">Сохранить</button>
    </form>

    <div class="cards">
        <?php foreach ($notes as $note) { ?>
        <div class="card">
            <?php echo $note['text'] ?>
        </div>
        <?php } ?>
    </div>
</div>
