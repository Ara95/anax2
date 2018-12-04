<?php
$current = $this->currentUrl();
?>

<nav
    <?php foreach ($navbar["config"] as $config => $configVal) : ?>
        <?php if ($config === 'navbar-class') : ?>
             class='<?= $configVal ?>'
        <?php endif; ?>
    <?php endforeach; ?>
>
    <ul>
        <?php foreach ($navbar["items"] as $item) : ?>
            <li
            <?php if ($this->url($item["route"]) === $current) : ?>
                 class='current'
            <?php endif; ?>
            ><a href='<?= $this->url($item["route"]) ?>'><?= $item["text"] ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>
