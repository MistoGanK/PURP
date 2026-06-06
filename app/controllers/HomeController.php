<?php

class HomeController
{
    /**
     * Loads landing visual interface
     * @return void
     */
    public static function index(): void
    {
        require __DIR__ . '/../views/landing.php';
    }

    /**
     * Sets new lang selected securely
     * @return void
     */
    public static function set_lang(): void
    {
        $requestedLang = (string) ($_GET['lang'] ?? 'es');

        $allowedLangs = ['es', 'ca', 'en', 'va', 'eu', 'gl', 'arn', 'ast', 'fr'];

        if (in_array($requestedLang, $allowedLangs, true)) {
            $_SESSION['lang'] = $requestedLang;
        } else {
            $_SESSION['lang'] = 'es';
        }

        $referer = (string) ($_SERVER['HTTP_REFERER'] ?? '/index.php?action=home');

        // Prevention Open Direct
        $host = (string) ($_SERVER['HTTP_HOST'] ?? '');
        if (strpos($referer, 'http') === 0 && strpos($referer, $host) === false) {
            $referer = '/index.php?action=home';
        }

        header('Location: ' . $referer);
        exit;
    }
}
