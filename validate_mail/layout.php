<!--
    $record_message:    string
-->

<?php if (isset($record_message)): ?>
    <?= $record_message ?>
<?php else: ?>
    <?= MESSAGE_SUCCEED_IN_VALIDATING_MAIL ?>
<?php endif; ?>
<br>
<a href="<?= __DIR__ . '../' ?>"><?= LINK_TOP ?></a>