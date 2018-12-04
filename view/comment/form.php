<?php
$actionUrl = $this->url("comment/$postid/$method");
?>

<form method="post" action="<?= $actionUrl ?>">
    <?php if (isset($comment) && $comment->id) : ?>
        <?= $form->input('id', 'hidden') ?>
        <?= $form->input('parent_id', 'hidden') ?>
    <?php else : ?>
        <input type="hidden" name="parent_id" value="<?= $parent_id ?>">
    <?php endif; ?>

    <input type="hidden" name="post_id" value="<?= $postid ?>">

    <?= $form->textarea("content", ['rows' => '6', 'cols' => '60', 'required' => true]) ?>
    <?php if ($form->hasError('content')) : ?>
        <div class="form-error"><?= $form->getError('content') ?></div>
    <?php endif; ?>

    <br>
    <input type="submit" value="<?= $submit ?>">
</form>
