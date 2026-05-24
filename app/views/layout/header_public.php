<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang'] ?? 'es'; ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo __('header_title'); ?></title>
  <link rel="stylesheet" href="/assets/tailwind/mainOutput.css">
</head>

<body>

  <header class="public-header">
    <div class="lang-widget">
      <label for="lang-select" class="sr-only">Idioma</label>
      <select id="lang-select" onchange="location = this.value;" class="lang-select">
        <option value="index.php?action=set_lang&lang=es" <?php echo ($_SESSION['lang'] ?? 'es') === 'es' ? 'selected' : ''; ?>>🇪🇸 ES</option>
        <option value="index.php?action=set_lang&lang=ca" <?php echo ($_SESSION['lang'] ?? '') === 'ca' ? 'selected' : ''; ?>>🏴󠁡󠁢󠁣󠁴󠁿 CA</option>
        <option value="index.php?action=set_lang&lang=eu" <?php echo ($_SESSION['lang'] ?? '') === 'eu' ? 'selected' : ''; ?>>🏴󠁡󠁢󠁰󠁶󠁿 EU</option>
        <option value="index.php?action=set_lang&lang=gl" <?php echo ($_SESSION['lang'] ?? '') === 'gl' ? 'selected' : ''; ?>>🏴󠁡󠁢󠁧󠁡󠁿 GL</option>
        <option value="index.php?action=set_lang&lang=fr" <?php echo ($_SESSION['lang'] ?? '') === 'fr' ? 'selected' : ''; ?>>🇫🇷 FR</option>
        <option value="index.php?action=set_lang&lang=en" <?php echo ($_SESSION['lang'] ?? '') === 'en' ? 'selected' : ''; ?>>🇬🇧 EN</option>
        <option value="index.php?action=set_lang&lang=va" <?php echo ($_SESSION['lang'] ?? '') === 'va' ? 'selected' : ''; ?>>🏴󠁡󠁢󠁪󠁡󠁿 VA</option>
        <option value="index.php?action=set_lang&lang=arn" <?php echo ($_SESSION['lang'] ?? '') === 'arn' ? 'selected' : ''; ?>>🏔️ ARN</option>
      </select>
    </div>
  </header>

  <main class="login-container">