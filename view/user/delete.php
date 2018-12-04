<?php
/**
 * View to delete user account.
 */
?>
<h1>Radera konto</h1>

<h4>Vill du radera ditt konto?</h4>
<dl class="dl-small">
    <dt>Användarnamn:</dt>
    <dd><?= htmlspecialchars($user->username) ?></dd>
    <dt>Epostadress:</dt>
    <dd><?= htmlspecialchars($user->email) ?></dd>
</dl>

<form action="<?= $this->currentUrl() ?>" method="post">
    <input type="hidden" name="action" value="delete">
    <input type="submit" value="Ta bort">
    <a class="btn btn-2" href="<?= $this->url('user') ?>">Avbryt</a>
</form>
