<?php /*
    $post:  {
        'id'
        'user_id'
        'pw_count'
        'content'
    }
    $user:  {
        'id'
    }
    $has_action_bar:   boolean
*/ ?>


<div class="post-container" data-post-id="<?= $post['id'] ?>">
    <div class="post-main">
        <div class="post-icon">
            <?php if (empty($user)): ?>
                <?php require PATH_ROOT . 'php/parts/icon.php' ?>
            <?php else: ?>
                <a href="<?= PATH_HTTP_ROOT . "user?id={$user['id']}" ?>" class="non-text">
                    <?php require PATH_ROOT . 'php/parts/icon.php' ?>
                </a>
            <?php endif ?>
        </div>
        <a href="<?= PATH_HTTP_ROOT . "post/detail?id={$post['id']}" ?>" class="post-content">
            <?= $post['content'] ?>
        </a>
    </div>
    <?php if ($has_action_bar): ?>
        <div>
            <button class="post-pw"><?= ACTION_POWER_WORD ?></button>
            <div class="post-pw-count">
                <?= $post['pw_count'] ?>
            </div>
            <a class="post-send" href="#div-popup-post"><?= ACTION_REPLY ?></a>
            <?php if (id === $post['user_id']): ?>
                <a class="post-edit" href="#div-popup-post"><?= ACTION_EDIT ?></a>
                <a class="post-delete"><?= ACTION_DELETE ?></a>
            <?php endif ?>
        </div>
    <?php endif ?>
</div>