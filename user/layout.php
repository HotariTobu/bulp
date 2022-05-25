<?php /*
    $user:  {
        'nickname'
        'note'
    }
    $is_same:   boolean
    $posts: array of post
    $error_message:    string
*/ ?>

<div class="user-icon">
    <?php require PATH_ROOT . 'php/parts/icon.php' ?>
</div>
<br>
<span><?= $user['nickname'] ?></span>
<br>
<span><?= $user['note'] ?></span>
<br>
<?php foreach ($posts as $post): ?>
    <?php require PATH_ROOT . 'post/index.php' ?>
<?php endforeach ?>
<br>
<?php if ($is_same): ?>
    <a href="edit"><?= ACTION_EDIT ?></a>
    <br>
    <a href="change_password"><?= ACTION_CHANGE_PASSWORD ?></a>
    <br>
    <a href="delete.php"><?= ACTION_RESIGN ?></a>
<?php endif ?>