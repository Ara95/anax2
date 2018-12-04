<?php
$form = "";
if (isset($editForm)) {
    $form = $editForm;
} elseif (isset($replyForm)) {
    $form = $replyForm;
}
?>

<div class="comments">

    <h4>Posta</h4>
    <?php if ($isLoggedIn) : ?>
        <?= $this->renderView('comment/form', ["method" => "", "submit" => "Posta", "postid" => $postid, "form" => $newForm, "parent_id" => 0]) ?>
    <?php else : ?>
        <p><a href="<?= $this->url('login') ?>">Logga in</a> för att posta en kommentar.</p>
    <?php endif; ?>

    <h3></h3>

    <?= $this->renderView("comment/comment-tree", ["comments" => $comments, "textfilter" => $textfilter, "postid" => $postid, "action" => $action, "actionID" => $actionID, "form" => $form, "isLoggedIn" => $isLoggedIn]) ?>
</div>
