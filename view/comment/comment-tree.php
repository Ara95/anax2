<?php foreach ($comments as $comment) : ?>
    <?php
    $email = !$comment->userObject->deleted ? $comment->userObject->email : 'deleted@example.com';
    $gravatarString = md5(strtolower(trim($email)));
    $points = ( (int)$comment->upvote - (int)$comment->downvote );
    $created = $comment->timeElapsedString($comment->created);
    $edited = $comment->edited ? ", redigerad " . $comment->timeElapsedString($comment->edited) : "";
    $content = $textfilter->parse($comment->content, ["htmlentities", "markdown"])->text;
    ?>

    <div class='entry'>

        <a name='<?= $comment->id ?>'></a>

        <?= $this->renderView("comment/vote-buttons", ["comment" => $comment]) ?>

        <img src='http://www.gravatar.com/avatar/<?= $gravatarString ?>.jpg?d=identicon&s=40'>

        <?php if ($action == "edit" && $actionID == $comment->id) : ?>
            <?= $this->renderView('comment/form', ["method" => "edit?id={$comment->id}", "submit" => "Spara", "postid" => $postid, "comment" => $comment, "form" => $form]) ?>
        <?php elseif ($comment->deleted) : ?>
            <div class='text'><p><i>borttagen</i></p></div>
        <?php else : ?>
            <div class='text'><?= $content ?></div>
        <?php endif; ?>

        <div class='actions'>
            <?php if ($isLoggedIn) : ?>
                <a href='<?= $this->url("comment/$postid/reply?id={$comment->id}#{$comment->id}") ?>'>svara</a>
                <?php if (!$comment->deleted && ($comment->isUserOwner || $comment->isUserAdmin)) : ?>
                    | <a href='<?= $this->url("comment/$postid/edit?id={$comment->id}#{$comment->id}") ?>'>redigera</a>
                    | <a href='<?= $this->url("comment/$postid/delete?id={$comment->id}#{$comment->id}") ?>'>radera</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <?php if ($action == "reply" && $actionID == $comment->id) : ?>
            <?= $this->renderView('comment/form', ["method" => "reply?id={$comment->id}", "submit" => "Posta", "postid" => $postid, "parent_id" => $comment->id, "form" => $form]) ?>
        <?php elseif ($action == "delete" && $actionID == $comment->id) : ?>
            <?= $this->renderView("comment/delete", ["comment" => $comment, "method" => "delete?id={$comment->id}"]) ?>
        <?php endif; ?>

        <div class='children'>
            <?php if (!empty($comment->children)) : ?>
                <?= $this->renderView('comment/comment-tree', ["comments" => $comment->children, "textfilter" => $textfilter, "postid" => $postid, "action" => $action, "actionID" => $actionID, "form" => $form, "isLoggedIn" => $isLoggedIn]) ?>
            <?php endif; ?>
        </div>
    </div>

<?php endforeach ?>
