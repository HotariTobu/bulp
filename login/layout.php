<!--
    $e_mail:    string
    $e_mail_message:    string
    $password:  string
    $password_message:  string
    $record_message:    string
-->

<form method="POST">
    <?= LABEL_EMAIL ?><input type="text" name="e_mail" placeholder="<?= PLACEHOLDER_EMAIL ?>" value="<?= isset($e_mail) ? $e_mail : '' ?>"><span class="error-message"><?= isset($e_mail_message) ? "*{$e_mail_message}" : '' ?></span><br>
    <?= LABEL_PASSWORD ?><input type="password" name="password" placeholder="<?= PLACEHOLDER_PASSWORD ?>" value = "<?= isset($password) ? $password : '' ?>"><span class="error-message"><?= isset($password_message) ? "*{$password_message}" : '' ?></span><br>
    <input type="submit" name="submit" value="<?= SUBMIT_VALUE_LOGIN ?>"><br>
</form>
<span class="error-message"><?= isset($record_message) ? "*{$record_message}" : '' ?></span><br>
<a href="<?= __DIR__ . '../signup' ?>"><?= ACTION_SIGNUP ?></a>