<?php
/**
 * View to display all users.
 */

// Gather incoming variables and use default values if not set
$users = isset($users) ? $users : null;

// Create urls for navigation
$urlToCreate = $this->url("admin/create");

?><h1><?= $header ?></h1>

<p>
    <a href="<?= $urlToCreate ?>">Lägg till</a>
</p>

    <?php if (!$users) : ?>
    <p>Det finns inga användare att visa.</p>
    <?php
    return;
endif;
?>

<table>
    <tr>
        <th>Id</th>
        <th>Användarnamn</th>
        <th>Epostadress</th>
        <th>Raderad</th>
    </tr>
    <?php foreach ($users as $user) : ?>
    <tr>
        <td>
            <a href="<?= $this->url("admin/update/{$user->id}") ?>"><?= $user->id ?></a>
        </td>
        <td><?= $user->username ?></td>
        <td><?= $user->email ?></td>
        <td><?= $user->deleted ? "X" : "-" ?></td>
        <td>
            <a href="<?= $this->url("admin/delete/{$user->id}") ?>">Ta bort</a>
        </td>

    </tr>
    <?php endforeach; ?>
</table>
