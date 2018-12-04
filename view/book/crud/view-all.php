<?php
/**
 * View to display all books.
 */

// Gather incoming variables and use default values if not set
$books = isset($books) ? $books : null;

// Create urls for navigation
$urlToCreate = $this->url("book/create");

?><h1><?= $header ?></h1>

<p>
    <a href="<?= $urlToCreate ?>">Lägg till bok</a>
</p>

<?php if (!$books) : ?>
    <p>Det finns inga böcker ännu, men <a href="<?= $urlToCreate ?>">lägg gärna till en bok</a>.</p>
<?php
    return;
endif;
?>

<table>
    <tr>
        <th>Id</th>
        <th>Titel</th>
        <th>Författare</th>
        <th>År</th>
    </tr>
    <?php foreach ($books as $book) : ?>
    <tr>
        <td>
            <a href="<?= $this->url("book/update/{$book->id}") ?>"><?= $book->id ?></a>
        </td>
        <td><?= $book->title ?></td>
        <td><?= $book->author ?></td>
        <td><?= $book->published ?></td>
        <td>
            <a href="<?= $this->url("book/delete/{$book->id}") ?>">Ta bort</a>
        </td>

    </tr>
    <?php endforeach; ?>
</table>
