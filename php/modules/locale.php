<?php

define('LANGUAGES_DIRECTORY_PATH', '../languages/');

$language_filenames = [];
$directory_handle = opendir(LANGUAGES_DIRECTORY_PATH);
while (($filename = readdir($directory_handle)) !== false) {
    $language_filenames[] = $filename;
}
closedir($directory_handle);

$raw_languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
foreach ($raw_languages as $raw_language) {
  $language = explode(';', $raw_language)[0];

  foreach ($language_filenames as $filename) {
      if (str_starts_with($filename, $language)) {
          $language_filename = LANGUAGES_DIRECTORY_PATH . $filename;
          break 2;
      }
  }
}

if (empty($language_filename)) {
    $language_filename = LANGUAGES_DIRECTORY_PATH . 'ja-JP.php';
}

require $language_filename;