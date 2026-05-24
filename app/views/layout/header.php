<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang'] ?? 'es'; ?>">

<head>
  <meta charset="UTF-8">
  <title>PURP</title>
  <link rel="stylesheet" href="/assets/tailwind/mainOutput.css">
</head>

<body>
  <header class="header-main">
    <div class="header-top">
      <img src="/assets/images/logo.png" alt="Logo" class="h-12">
      <div>
        <h1 class="header-title"><?php echo __('header_title'); ?></h1>
        <p class="header-subtitle">(PURP)</p>
      </div>
    </div>

    <div class="header-bottom">

      <nav class="main-nav">
        <ul class="horizontal-list">
          <li><a href="index.php?action=home" class="nav-link-active"><?php echo __('nav_home'); ?></a></li>
          <li><a href="index.php?action=denuncias" class="nav-link"><?php echo __('nav_queries'); ?></a></li>
          <li><a href="#" class="nav-link"><?php echo __('nav_reports'); ?></a></li>
          <li><a href="#" class="nav-link"><?php echo __('nav_admin'); ?> <span>▼</span></a></li>
        </ul>
      </nav>

      <div class="user-actions">

        <div class="lang-widget">
          <label for="lang-select" class="sr-only">Idioma</label>
          <select id="lang-select" onchange="location = this.value;" class="lang-select">
            <option value="index.php?action=set_lang&lang=es" <?php echo ($_SESSION['lang'] ?? 'es') === 'es' ? 'selected' : ''; ?> class="text-black">🇪🇸 ES</option>
            <option value="index.php?action=set_lang&lang=ca" <?php echo ($_SESSION['lang'] ?? '') === 'ca' ? 'selected' : ''; ?> class="text-black">🏴󠁡󠁢󠁣󠁴󠁿 CA</option>
            <option value="index.php?action=set_lang&lang=eu" <?php echo ($_SESSION['lang'] ?? '') === 'eu' ? 'selected' : ''; ?> class="text-black">🏴󠁡󠁢󠁰󠁶󠁿 EU</option>
            <option value="index.php?action=set_lang&lang=gl" <?php echo ($_SESSION['lang'] ?? '') === 'gl' ? 'selected' : ''; ?> class="text-black">🏴󠁡󠁢󠁧󠁡󠁿 GL</option>
            <option value="index.php?action=set_lang&lang=va" <?php echo ($_SESSION['lang'] ?? '') === 'va' ? 'selected' : ''; ?> class="text-black">🏴󠁡󠁢󠁪󠁡󠁿 VA</option>

            <option value="index.php?action=set_lang&lang=arn" <?php echo ($_SESSION['lang'] ?? '') === 'arn' ? 'selected' : ''; ?> class="text-black">🏔️ ARN</option>

            <option value="index.php?action=set_lang&lang=fr" <?php echo ($_SESSION['lang'] ?? '') === 'fr' ? 'selected' : ''; ?> class="text-black">🇫🇷 FR</option>
            <option value="index.php?action=set_lang&lang=en" <?php echo ($_SESSION['lang'] ?? '') === 'en' ? 'selected' : ''; ?> class="text-black">🇬🇧 EN</option>
          </select>
        </div>

        <div class="user-profile">
          <span>👤</span>
          <span><?php
                echo $_SESSION['user']['nombre'] ?? __('guest');
                ?> </span>
          <span>▼</span>
        </div>

        <span class="text-white/30">|</span>

        <a href="index.php?action=logout" class="logout-link">
          <?php echo __('nav_logout'); ?>
        </a>
      </div>

    </div>
  </header>