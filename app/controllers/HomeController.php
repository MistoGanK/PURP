<?php

class HomeController
{
    /**
     * Loads landing visual interface
     * @return void
     */
    public static function index()
    {
        require __DIR__ . '/../views/landing.php';
    }
    /**
     * Set's new lang selected
     * @return void
     */
    public static function set_lang()
    {
        $newLang = $_GET['lang'] ?? 'es';

        $_SESSION['lang'] = $newLang;

        $referer = $_SERVER['HTTP_REFERER'] ?? '/PURP/public/index.php?action=home';
        header('Location: ' . $referer);
        exit;
    }
}
