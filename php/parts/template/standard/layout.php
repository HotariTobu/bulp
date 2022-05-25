<?php /*
    initialize.php

    $_SESSION {
        'id'
        'nickname'
    }
*/ ?>


<header>
    <a href="<?= PATH_HTTP_ROOT ?>"><?= LINK_TOP ?></a>
    <a class="post-send" href="#div-popup-post"><?= ACTION_POST ?></a>
    <?php if (id >= 0): ?>
        <?= isset($_SESSION['nickname']) ? $_SESSION['nickname'] : '' ?><?= MESSAGE_WELCOME ?>
        <a href="<?= PATH_HTTP_ROOT . "user?id=" . id ?>"><?= LINK_USER ?></a>
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
    <?php foreach (pop_messages() as $message): ?>
        <br>
        <?= $message ?>
    <?php endforeach ?>
</header>

<div id="div-popup-post" class="mfp-hide">
    <div id="div-popup-post-parent-post"></div>
    <form id="form-post">
        <input id="input-post-id" type="hidden" name="post_id"></input>
        <textarea id="textarea-post_content" name="content" cols="100" rows="10"></textarea>
    </form>
    <button id="button-post"><?= ACTION_POST ?></button>
    <button id="button-cancel-post"><?= ACTION_CANCEL ?></button>
</div>

<?php require_once $standard_layout_path ?>