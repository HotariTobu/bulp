<?php /*
    initialize.php

    $_SESSION {
        'id'
        'nickname'
    }
*/ ?>


<header>
    <a href="<?= PATH_HTTP_ROOT ?>"><?= LINK_TOP ?></a>
    <a class="a-post" href="#div-popup-post" id="-1"><?= ACTION_POST ?></a>
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
        <a id="a-resend-validation-mail" href=""><?= LINK_HEAR ?></a>
    <?php endif ?>
</header>

<div id="div-popup-post" class="mfp-hide">
    <div id="div-popup-post-parent-post"></div>
    <form id="form-post">
        <input id="input-post-id" type="hidden" name="post_id"></input>
        <textarea name="content" cols="100" rows="10"></textarea>
    </form>
    <button id="button-post"><?= ACTION_POST ?></button>
    <button id="button-cancel-post"><?= ACTION_CANCEL ?></button>
</div>

<?php require_once $standard_layout_path ?>