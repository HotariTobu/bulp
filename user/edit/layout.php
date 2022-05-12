<!--
    $nickname_message:  string
    $note:  string
    $note_message:  string
    $record_message:    string
-->

<form method="POST" enctype="multipart/form-data">
    <?= LABEL_IMAGE ?><input type="file" name="image" accept="image/*"><br>
    <?= LABEL_NICKNAME ?><input type="text" name="nickname" placeholder="<?= PLACEHOLDER_NICKNAME ?>" value = "<?= isset($nickname) ? $nickname : '' ?>"><span class="error-message"><?= isset($nickname_message) ? "*{$nickname_message}" : '' ?></span><br>
    <?= LABEL_NOTE ?><textarea name="note" cols="100" rows="4"><?= isset($note) ? $note : '' ?></textarea><span class="error-message"><?= isset($note_message) ? "*{$note_message}" : '' ?></span><br>
    <input type="submit" name="submit" value="<?= SUBMIT_VALUE_EDIT ?>"><br>
</form>
<span class="error-message"><?= isset($record_message) ? "*{$record_message}" : '' ?></span><br>
<a href="<?= $_SERVER['HTTP_REFERER'] ?>"><?= ACTION_CANCEL ?></a>