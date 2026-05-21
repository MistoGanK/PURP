<?php

class HomeController
{
    public static function index()
    {
        require __DIR__ . '/../views/landing.php';
    }

    public static function set_lang()
    {
        $newLang = $_GET['lang'] ?? 'es';

        $_SESSION['lang'] = $newLang;

        $referer = $_SERVER['HTTP_REFERER'] ?? '/PURP/public/index.php?action=home';
        header('Location: ' . $referer);
        exit;
    }
}
