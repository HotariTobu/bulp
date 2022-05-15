<!--
    paths.php
    locale.php

    $title: string
    $description:   string
    $styles:    array of string
    $layout_path:    string
-->

<?php
    if (!isset($styles)) {
        $styles = [];
    }
    
    $styles = [
        ... $styles,
        PATH_HTTP_ROOT . 'styles/style.css'
    ];

    if (!isset($scripts)) {
        $scripts = [];
    }

    $scripts = [
        PATH_HTTP_ROOT . 'node_modules/jquery/dist/jquery.min.js',
        PATH_HTTP_ROOT . 'node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
        ... $scripts
    ];
?>

<html>
    <head>
        <title><?= $title . ' | ' . APPLICATION_NAME ?></title>
        <meta name="description" content="<?= $description ?>">
        <?php foreach ($styles as $style): ?>
            <link rel="stylesheet" type="text/css" href="<?= $style ?>" />
        <?php endforeach ?>
    </head>
    <body>
        <header>
            <?php if (isset($error_message)): ?>
                <span class="error-message"><?= "*{$error_message}" ?></span>
            <?php endif ?>
        </header>

        <?php require_once  $layout_path ?>

        <footer>
            &copy; 2022
        </footer>
        <?php foreach ($scripts as $script): ?>
            <script src="<?= $script ?>"></script>
        <?php endforeach ?>
    </body>
</html>