<!--
    $e_mail:    string
    $e_mail_message:    string
    $password:  string
    $password_message:  string
    $nickname:  string
    $nickname_message:  string
    $error_message:    string
-->

<a href="../"><?= LINK_TOP ?></a>
<a href="../login"><?= ACTION_LOGIN ?></a>
<form method="POST">
    <?= LABEL_EMAIL ?><input type="email" name="e_mail" placeholder="<?= PLACEHOLDER_EMAIL ?>" value="<?= isset($e_mail) ? $e_mail : '' ?>"><span class="error-message"><?= isset($e_mail_message) ? "*{$e_mail_message}" : '' ?></span><br>
    <?= LABEL_PASSWORD ?><input type="password" name="password" placeholder="<?= PLACEHOLDER_PASSWORD ?>" value = "<?= isset($password) ? $password : '' ?>"><span class="error-message"><?= isset($password_message) ? "*{$password_message}" : '' ?></span><br>
    <?= LABEL_NICKNAME ?><input type="text" name="nickname" placeholder="<?= PLACEHOLDER_NICKNAME ?>" value = "<?= isset($nickname) ? $nickname : '' ?>"><span class="error-message"><?= isset($nickname_message) ? "*{$nickname_message}" : '' ?></span><br>
    <input type="submit" name="submit" value="<?= SUBMIT_VALUE_SIGNUP ?>"><br>
</form>