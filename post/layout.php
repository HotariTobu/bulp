<!--
    $post:  {
        'id'
        'user_id'
        'content'
    }
    $user:  {
        'id'
    }
    $has_action_bar:   boolean
-->

<div class="post">
    <div class="main">
        <div class="icon">
            <?php if (empty($user)): ?>
                <?php require __DIR__ . 'icon.php' ?>
            <?php else: ?>
                <a href="user.php?id=<?= $user['id'] ?>" class="non-text">
                    <?php require __DIR__ . 'icon.php' ?>
                </a>
            <?php endif ?>
        </div>
        <a href="post_detail.php?post_id=<?= $post['id'] ?>" class="content">
            <?= $post['content'] ?>
        </a>
    </div>
    <?php if ($has_action_bar): ?>
        <div>
            <button><?= ACTION_POWER_WORD ?></button>
            <a class="a_post popup" href="#div-popup-post" id="<?= $post['id'] ?>"><?= ACTION_REPLY ?></a>
        </div>
    <?php endif ?>
</div>