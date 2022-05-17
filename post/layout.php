<?php /*
    $post:  {
        'id'
        'user_id'
        'content'
    }
    $user:  {
        'id'
    }
    $has_action_bar:   boolean
*/ ?>


<div class="post">
    <div class="main">
        <div class="icon">
            <?php if (empty($user)): ?>
                <?php require PATH_ROOT . 'php/parts/icon.php' ?>
            <?php else: ?>
                <a href="<?= PATH_HTTP_ROOT . "user?id={$user['id']}" ?>" class="non-text">
                    <?php require PATH_ROOT . 'php/parts/icon.php' ?>
                </a>
            <?php endif ?>
        </div>
        <a href="<?= PATH_HTTP_ROOT . "post/detail?id={$post['id']}" ?>" class="content">
            <?= $post['content'] ?>
        </a>
    </div>
    <?php if ($has_action_bar): ?>
        <div>
            <button><?= ACTION_POWER_WORD ?></button>
            <a class="a-post" href="#div-popup-post" id="<?= $post['id'] ?>"><?= ACTION_REPLY ?></a>
        </div>
    <?php endif ?>
</div>