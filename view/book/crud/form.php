<?php
/**
 * View to create a new book.
 */

// Create urls for navigation
$urlToViewItems = $this->url("book");

//$this->renderView('default/msgs');
?>

<h1><?= $header ?></h1>

<form id="<?= $form->id ?>" class="form" action="<?= $this->currentUrl() ?>" method="post">
    <?php if ($book && $book->id) : ?>
        <?= $form->input('id', 'hidden') ?>
    <?php endif; ?>

    <div class="form-control">
        <div class="form-label"><?= $form->label('title', 'Titel:') ?></label></div>
        <div class="form-input">
            <?= $form->text('title', ['maxlength' => 300, 'required' => false, 'autofocus' => true]) ?>

            <?php if ($form->hasError('title')) : ?>
                <div class="form-error"><?= $form->getError('title') ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-control">
        <div class="form-label"><?= $form->label('author', 'Författare:') ?></div>
        <div class="form-input">
            <?= $form->text('author', ['maxlength' => 300, 'required' => false]) ?>

            <?php if ($form->hasError('author')) : ?>
                <div class="form-error"><?= $form->getError('author') ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-control">
        <div class="form-label"><?= $form->label('published', 'Publiceringsår:') ?></div>
        <div class="form-input">
            <?= $form->input('published', 'number', ['max' => 2100]) ?>

            <?php if ($form->hasError('published')) : ?>
                <div class="form-error"><?= $form->getError('published') ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-control">
        <div class="form-label"></div>
        <div class="form-input">
            <input type="submit" value="<?= $submit ?>">
            <a class="btn btn-2" href="<?= $this->url('book') ?>">Avbryt</a>
        </div>
    </div>
</form>

<p>
    <a href="<?= $urlToViewItems ?>">Visa alla</a>
</p>
