<?php
/**
 * View to delete a user.
 */

// Create urls for navigation
$urlToViewItems = $this->url("admin");

?><h1><?= $header ?></h1>

<h4>Vill du verkligen radera denna användare?</h4>
<dl class="dl-small">
    <dt>ID:</dt>
    <dd><?= $user->id ?></dd>
    <dt>Användarnamn:</dt>
    <dd><?= htmlspecialchars($user->username) ?></dd>
    <dt>Epostadress:</dt>
    <dd><?= htmlspecialchars($user->email) ?></dd>
</dl>

<form action="<?= $this->currentUrl() ?>" method="post">
    <input type="hidden" name="action" value="delete">
    <input type="submit" value="Ta bort">
    <a class="btn btn-2" href="<?= $this->url('admin') ?>">Avbryt</a>
</form>

<p>
    <a href="<?= $urlToViewItems ?>">Visa alla</a>
</p>
