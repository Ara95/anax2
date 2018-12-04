<?php
$actionUrl = $this->url("comment/{$comment->post_id}/$method");
?>

<form class='delConfirm' method="post" action="<?= $actionUrl ?>">
    <input type='hidden' name='id' value='<?= $comment->id ?>'>
    Vill du radera?
    <br>
    <input class='delButton' type="submit" name="delete" value="delete">
    <input type="submit" name="cancel" value="nej">
</form>
