<!--
    $nickname
-->

<?php
    require __DIR__ . '../../modules/database.php';
    require __DIR__ . '../../modules/session.php';
?>

<header>
    <a href="<?= __DIR__ . '../../../' ?>"><?= LINK_TOP ?></a>
    <a class="a_post popup" href="#div-popup-post" id="-1"><?= ACTION_POST ?></a>
    <?php if (isset($id)): ?>
        <?= empty($nickname) ? '' : $nickname ?><?= LABEL_WELCOME ?>
        <a href="<?= __DIR__ . "../../../user?id={$id}" ?>"><?= LINK_USER ?></a>
        <a href="<?= __DIR__ . '../../../logout' ?>"><?= ACTION_LOGOUT ?></a>
    <?php else: ?>
        <a href="<?= __DIR__ . '../../../signup' ?>"><?= ACTION_SIGNUP ?></a>
        <a href="<?= __DIR__ . '../../../login' ?>"><?= ACTION_LOGIN ?></a>
    <?php endif; ?>
    <br>
    <?php if (isset($e_mail_validation) && !$e_mail_validation): ?>
        <?= MESSAGE_WHEN_NOT_HAVE_VALIDATION_MAIL ?>
        <a id="a_resend_validation_mail"><?= LINK_HEAR ?></a>
    <?php endif ?>
</header>

<div id="div-popup-post" class="mfp-hide">
    <div id="div_popup_post_parent_post"></div>
    <form id="form_post">
        <input id="input_post_id" type="hidden" name="id"></input>
        <textarea name="content" cols="100" rows="4"></textarea>
    </form>
    <button id="button_post"></button>
</div>

<?php require $standard_layout_path ?>

<script src="<?= __DIR__ . 'logic.js' ?>"></script>