<!--
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
    PATH_HTTP_ROOT . 'node_modules/magnific-popup/dist/magnific-popup.css',
    ... $styles
];

if (!isset($scripts)) {
    $scripts = [];
}

$scripts = [
    PATH_HTTP_ROOT . 'php/parts/template/standard/logic.js',
    ... $scripts
];

$standard_layout_path = $layout_path;
$layout_path = __DIR__ . '/layout.php';
require PATH_ROOT . 'php/parts/template/minimum.php';