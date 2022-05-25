<?php /*
    $current_password:    string
    $current_password_message:    string
    $password:  string
    $password_message:  string
    $retype_password:  string
    $retype_password_message:  string
    $error_message:    string
*/ ?>


<a href="<?= PATH_HTTP_ROOT . "user?id={$user_id}" ?>"><?= ACTION_CANCEL ?></a>
<form method="POST">
    <?= LABEL_CURRENT_PASSWORD ?><input type="password" name="current_password" placeholder="<?= PLACEHOLDER_CURRENT_PASSWORD ?>" value="<?= isset($current_password) ? $current_password : '' ?>"><span class="error-message"><?= isset($current_password_message) ? "*{$current_password_message}" : '' ?></span><br>
    <?= LABEL_NEW_PASSWORD ?><input type="password" name="password" placeholder="<?= PLACEHOLDER_NEW_PASSWORD ?>" value = "<?= isset($password) ? $password : '' ?>"><span class="error-message"><?= isset($password_message) ? "*{$password_message}" : '' ?></span><br>
    <?= LABEL_RETYPE_PASSWORD ?><input type="password" name="retype_password" placeholder="<?= PLACEHOLDER_RETYPE_PASSWORD ?>" value = "<?= isset($retype_password) ? $retype_password : '' ?>"><span class="error-message"><?= isset($retype_password_message) ? "*{$retype_password_message}" : '' ?></span><br>
    <input type="submit" name="submit" value="<?= SUBMIT_VALUE_CHANGE_PASSWORD ?>"><br>
</form>