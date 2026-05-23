<?php

/**
 * Loads all translations
 * @return void
 */
function loadTranslations()
{

  $lang = $_SESSION['lang'] ?? 'es';
  $path = __DIR__ . "/../../languages/{$lang}.php";

  if (file_exists($path)) {
    return include $path;
  }

  return include __DIR__ . "/../../languages/es.php";
}

$GLOBALS['translations'] = loadTranslations();

/**
 * Translates the given key into the currently active language
 * * Looks the translation on the global array if not found fall back to the original key string
 * @param string $key The unique indentifier or raw text to be translated
 * @return string     The localized text if found, or original fallback
 */
function __($key)
{
  return $GLOBALS['translations'][$key] ?? $key;
}
