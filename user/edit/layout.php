<?php /*
    $user_id:    int
    $nickname_message:  string
    $note:  string
    $note_message:  string
    $error_message:    string
*/ ?>


<a href="<?= PATH_HTTP_ROOT . "user?id={$user_id}" ?>"><?= ACTION_CANCEL ?></a>
<form method="POST" enctype="multipart/form-data">
    <?= LABEL_IMAGE ?><input type="file" name="image" accept="image/*"><br>
    <?= LABEL_NICKNAME ?><input type="text" name="nickname" placeholder="<?= PLACEHOLDER_NICKNAME ?>" value = "<?= isset($nickname) ? $nickname : '' ?>"><span class="error-message"><?= isset($nickname_message) ? "*{$nickname_message}" : '' ?></span><br>
    <?= LABEL_NOTE ?><textarea name="note" cols="100" rows="4"><?= isset($note) ? $note : '' ?></textarea><span class="error-message"><?= isset($note_message) ? "*{$note_message}" : '' ?></span><br>
    <input type="submit" name="submit" value="<?= SUBMIT_VALUE_EDIT ?>"><br>
</form>