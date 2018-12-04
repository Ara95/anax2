<?php
/**
 * View to delete a book.
 */

// Create urls for navigation
$urlToViewItems = $this->url("book");

?><h1><?= $header ?></h1>

<h4>Är du säker på att du vill ta bort denna bok?</h4>
<dl class="dl-small">
    <dt>ID:</dt>
    <dd><?= $book->id ?></dd>
    <dt>Titel:</dt>
    <dd><?= htmlspecialchars($book->title) ?></dd>
    <dt>Författare:</dt>
    <dd><?= htmlspecialchars($book->author) ?></dd>
    <dt>Publiceringsår:</dt>
    <dd><?= $book->published ?></dd>
</dl>

<form action="<?= $this->currentUrl() ?>" method="post">
    <input type="hidden" name="action" value="delete">
    <input type="submit" value="Ta bort">
    <a class="btn btn-2" href="<?= $this->url('book') ?>">Avbryt</a>
</form>

<p>
    <a href="<?= $urlToViewItems ?>">Visa alla</a>
</p>
