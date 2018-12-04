<h1>Kontosida</h1>

<p>Välkommen <b><?= $name ?></b></p>

<p><a href="<?= $this->url("user/details") ?>">Redigera kontodetaljer</a></p>
<p class="delete"><a href="<?= $this->url("user/delete") ?>">Radera konto</a></p>
