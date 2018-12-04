<?php
/**
 * View for create user form
 */
?>

<h1>Redigera konto</h1>

<p><a href='<?= $this->url("user") ?>'>Tillbaka till profilen</a></p>

<form id="<?= $form->id ?>" class="form" action="<?= $this->currentUrl() ?>" method="post">
    <?= $form->input('id', 'hidden') ?>

    <div class="form-control">
        <div class="form-label"><?= $form->label('username', 'Användarnamn (kan inte ändras)') ?></div>
        <div class="form-input">
            <?= $form->text('username', ['readonly' => true]) ?>

            <?php if ($form->hasError('username')) : ?>
                <div class="form-error"><?= $form->getError('username') ?></div>
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
        <div class="form-label"><?= $form->label('old_password', 'Ange ditt gamla lösenord:') ?></div>
        <div class="form-input">
            <?= $form->input('old_password', 'password') ?>

            <?php if ($form->hasError('old_password')) : ?>
                <div class="form-error"><?= $form->getError('old_password') ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-control">
        <div class="form-label"><?= $form->label('password', 'Välj ett nytt lösenord:') ?></div>
        <div class="form-input">
            <?= $form->input('password', 'password') ?>

            <?php if ($form->hasError('password')) : ?>
                <div class="form-error"><?= $form->getError('password') ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-control">
        <div class="form-label"><?= $form->label('password_confirm', 'Upprepa det nya lösenordet:') ?></div>
        <div class="form-input">
            <?= $form->input('password_confirm', 'password') ?>

            <?php if ($form->hasError('password_confirm')) : ?>
                <div class="form-error"><?= $form->getError('password_confirm') ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-control">
        <div class="form-label"></div>
        <div class="form-input">
            <input type="submit" value="Spara">
        </div>
    </div>
</form>

<?php if ($updated) : ?>
    <p>Detaljerna är sparade</p>
<?php endif; ?>
