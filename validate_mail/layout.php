<?php /*
    $error_message:    string
*/ ?>

<a href="../"><?= LINK_TOP ?></a>
<br>
<?php if (empty($error_message)): ?>
    <?= MESSAGE_SUCCEED_IN_VALIDATING_MAIL ?>
<?php endif; ?>