<!--
    $title: string
    $description:   string
    $styles:    array of string
    $layout_path:    string
-->

<?php
    require __DIR__ . '../../modules/locale.php';

    $styles[] = __DIR__ . '../../../styles/style.css';
?>

<html>
    <head>
        <title><?= $title . ' | ' . APPLICATION_NAME ?></title>
        <meta name="description" content="<?= $description ?>">
        <link rel="stylesheet" type="text/css" href="" />
        <?php foreach ($styles as $style): ?>
            <link rel="stylesheet" type="text/css" href="<?= $style ?>.css" />
        <?php endforeach ?>
        <script src="<?= __DIR__ . '../../../node_modules/jquery/dist/jquery.min.js' ?>"></script>
        <script src="<?= __DIR__ . '../../../node_modules/magnific-popup/dist/magnific-popup.min.js' ?>"></script>
    </head>
    <body>
        <?php require  $layout_path ?>

        <footer>
            &copy; 2022
        </footer>
    </body>
</html>