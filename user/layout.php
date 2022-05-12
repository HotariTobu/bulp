<!--
    $user:  {
        'nickname'
        'note'
    }
    $is_same:   boolean
    $posts: array of post
    $record_message:    string
-->

<?php require __DIR__ . '../php/parts/icon.php' ?>
<br>
<span><?= $user['nickname'] ?></span>
<br>
<span><?= $user['note'] ?></span>
<br>
<?php if ($is_same): ?>
    <a href="<?= __DIR__ . 'edit' ?>"><?= ACTION_EDIT ?></a>
<?php endif ?>
<br><br>
<?php foreach ($posts as $post): ?>
    <?php require __DIR__ . '../php/parts/post.php' ?>
<?php endforeach ?>
<span class="error-message"><?= isset($record_message) ? "*{$record_message}" : '' ?></span><br>