<?php
/**
 * View for login form
 */
?>

<h1><?= $header ?></h1>

<form id="<?= $form->id ?>" class="form" action="<?= $this->currentUrl() ?>" method="post">
    <div class="form-control">
        <div class="form-label"><?= $form->label('username', 'Användarnamn:') ?></label></div>
        <div class="form-input">
            <?= $form->text('username', ['autofocus' => true]) ?>

            <?php if ($form->hasError('username')) : ?>
                <div class="form-error"><?= $form->getError('username') ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-control">
        <div class="form-label"><?= $form->label('password', 'Lösenord:') ?></div>
        <div class="form-input">
            <?= $form->input('password', 'password') ?>

            <?php if ($form->hasError('password')) : ?>
                <div class="form-error"><?= $form->getError('password') ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-control">
        <div class="form-label"></div>
        <div class="form-input">
            <input type="submit" value="Logga in">
        </div>
    </div>
</form>
