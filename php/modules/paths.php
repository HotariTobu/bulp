<?php

const PATH_ROOT = __DIR__ . '/../../';
const PATH_LANGUAGES = PATH_ROOT . 'php/languages/';
const PATH_DATABASE_INFO = PATH_ROOT . 'ignore_database_info';
const PATH_ICONS = PATH_ROOT . 'rec/icons/';


define('PATH_HTTP_ROOT', file(PATH_ROOT . 'ignore_root_path', FILE_IGNORE_NEW_LINES)[0]);
