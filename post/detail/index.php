<?php
    $title = 'トップ';
    $description = '';
    require 'header.php';
?>

<?php
    # Get get values

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!empty($_GET['post_id'])) {
            $post_id = $_GET['post_id'];
        }
    }
?>
<?php
    # Get parent post
    
    if (isset($post_id)) {
        $query = 'SELECT * FROM `bulp_posts` WHERE id=:id';
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $post_id, PDO::PARAM_INT);
    
        $statement->execute();
        $post = $statement->fetch();
        if ($post === false) {
            header("Location:{$_SERVER['HTTP_REFERER']}");
            exit;
        }
    }
?>
<?php
    # Get child posts

    $query = 'SELECT * FROM `bulp_posts` WHERE reply_id=:reply_id';
    $statement = $pdo->prepare($query);
    $statement->bindParam(':reply_id', $post_id, PDO::PARAM_INT);

    $statement->execute();
    $posts = $statement->fetchAll();
?>
<?php require 'post.php' ?>
<div class="children-container">
    <?php foreach ($posts as $post): ?>
        <?php require 'post.php' ?>
    <?php endforeach ?>
</div>

<?php require 'footer.php' ?>