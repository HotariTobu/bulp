<!--
    initialize.php

    $_SESSION {
        'id'
        'nickname'
    }
-->

<header>
    <a href="<?= PATH_HTTP_ROOT ?>"><?= LINK_TOP ?></a>
    <a class="a_post" href="#div-popup-post" id="-1"><?= ACTION_POST ?></a>
    <?php if (isset($_SESSION['id'])): ?>
        <?= isset($_SESSION['nickname']) ? $_SESSION['nickname'] : '' ?><?= LABEL_WELCOME ?>
        <a href="<?= PATH_HTTP_ROOT . "user?id={$_SESSION['id']}" ?>"><?= LINK_USER ?></a>
        <a href="<?= PATH_HTTP_ROOT . 'logout' ?>"><?= ACTION_LOGOUT ?></a>
    <?php else: ?>
        <a href="<?= PATH_HTTP_ROOT . 'signup' ?>"><?= ACTION_SIGNUP ?></a>
        <a href="<?= PATH_HTTP_ROOT . 'login' ?>"><?= ACTION_LOGIN ?></a>
    <?php endif; ?>
    <br>
    <?php if (isset($_SESSION['e_mail_validation']) && !$_SESSION['e_mail_validation']): ?>
        <?= MESSAGE_WHEN_NOT_HAVE_VALIDATION_MAIL ?>
        <a id="a_resend_validation_mail"><?= LINK_HEAR ?></a>
    <?php endif ?>
</header>

<div id="div-popup-post" class="mfp-hide">
    <div id="div_popup_post_parent_post"></div>
    <form id="form_post">
        <input id="input_post_id" type="hidden" name="id"></input>
        <textarea name="content" cols="100" rows="10"></textarea>
    </form>
    <button id="button_post"><?= ACTION_POST ?></button>
</div>

<?php require_once $standard_layout_path ?>