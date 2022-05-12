<!--
    $title: string
    $description:   string
    $styles:    array of string
    $layout_path:    string
-->

<?php

$styles[] = __DIR__ . '../../../../node_modules/magnific-popup/dist/magnific-popup.css';

$standard_layout_path = $layout_path;
$layout_path = __DIR__ . 'layout.php';
require __DIR__ . '../minimum.php';