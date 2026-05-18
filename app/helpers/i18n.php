<?php 

  function loadTranslations (){

    $lang = $_SESSION['lang'] ?? 'es';
    $path = __DIR__ . "/../../languages/{$lang}.php";

    if (file_exists($path)){
      return include $path;
    }

    return include __DIR__ . "/../../languages/es.php";
  }

  $GLOBALS['translations'] = loadTranslations();

  function __($key){
    return $GLOBALS['translations'][$key] ?? $key;
  }
?>