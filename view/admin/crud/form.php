<?php
/**
 * View to create/update users.
 */

// Create urls for navigation
$urlToViewItems = $this->url("admin");
?>

<h1><?= $header ?></h1>

<form id="<?= $form->id ?>" class="form" action="<?= $this->currentUrl() ?>" method="post">
    <?php if ($user && $user->id) : ?>
        <?= $form->input('id', 'hidden') ?>
    <?php endif; ?>

    <div class="form-control">
        <div class="form-label"><?= $form->label('username', 'Användarnamn:') ?></label></div>
        <div class="form-input">
            <?= $form->text('username', ['autofocus' => true]) ?>

            <?php if ($form->hasError('username')) : ?>
                <div class="form-error"><?= $form->getError('username') ?></div>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($user && $user->password) : ?>
    <?php endif; ?>

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
        <div class="form-label"><?= $form->label('password_confirm', 'Upprepa lösenord:') ?></div>
        <div class="form-input">
            <?= $form->input('password_confirm', 'password') ?>

            <?php if ($form->hasError('password_confirm')) : ?>
                <div class="form-error"><?= $form->getError('password_confirm') ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-control">
        <div class="form-label"><?= $form->label('email', 'Epostadress:') ?></div>
        <div class="form-input">
            <?= $form->input('email', 'email') ?>

            <?php if ($form->hasError('email')) : ?>
                <div class="form-error"><?= $form->getError('email') ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-control">
        <div class="form-label"></div>
        <div class="form-input">
            <input type="submit" value="<?= $submit ?>">
            <a class="btn btn-2" href="<?= $this->url('admin') ?>">Avbryt</a>
        </div>
    </div>
</form>

<p>
    <a href="<?= $urlToViewItems ?>">Visa alla</a>
</p>
