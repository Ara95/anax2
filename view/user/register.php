<?php
/**
 * View for create user form
 */
?>

<h1><?= $header ?></h1>

<form id="<?= $form->id ?>" class="form" action="<?= $this->currentUrl() ?>" method="post">
    <div class="form-control">
        <div class="form-label"><?= $form->label('username', 'Välj användarnamn:') ?></label></div>
        <div class="form-input">
            <?= $form->text('username', ['autofocus' => true]) ?>

            <?php if ($form->hasError('username')) : ?>
                <div class="form-error"><?= $form->getError('username') ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-control">
        <div class="form-label"><?= $form->label('password', 'Välj lösenord:') ?></div>
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
        <div class="form-label"><?= $form->label('email', 'Ange din epostadress:') ?></div>
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
            <input type="submit" value="Registrera">
        </div>
    </div>
</form>

<?php if ($created) : ?>
    <p>Användaren har skapats. Du kan nu <a href='<?= $this->url('login') ?>'>logga in</a></p>
<?php endif; ?>
