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
        <option value="index.php?action=set_lang&lang=es" <?php echo ($_SESSION['lang'] ?? 'es') === 'es' ? 'selected' : ''; ?> class="text-black">🇪🇸 ES</option>
        <option value="index.php?action=set_lang&lang=ca" <?php echo ($_SESSION['lang'] ?? '') === 'ca' ? 'selected' : ''; ?> class="text-black">🏴󠁡󠁢󠁣󠁴󠁿 CA</option>
        <option value="index.php?action=set_lang&lang=eu" <?php echo ($_SESSION['lang'] ?? '') === 'eu' ? 'selected' : ''; ?> class="text-black">🏴󠁡󠁢󠁰󠁶󠁿 EU</option>
        <option value="index.php?action=set_lang&lang=gl" <?php echo ($_SESSION['lang'] ?? '') === 'gl' ? 'selected' : ''; ?> class="text-black">🏴󠁡󠁢󠁧󠁡󠁿 GL</option>
        <option value="index.php?action=set_lang&lang=va" <?php echo ($_SESSION['lang'] ?? '') === 'va' ? 'selected' : ''; ?> class="text-black">🏴󠁡󠁢󠁪󠁡󠁿 VA</option>
        <option value="index.php?action=set_lang&lang=arn" <?php echo ($_SESSION['lang'] ?? '') === 'arn' ? 'selected' : ''; ?> class="text-black">🏴󠁡󠁢󠁪󠁡󠁿 ARN</option>
        <option value="index.php?action=set_lang&lang=ast" <?php echo ($_SESSION['lang'] ?? '') === 'ast' ? 'selected' : ''; ?> class="text-black">🏴󠁡󠁢󠁪󠁡󠁿 AST</option>
        <option value="index.php?action=set_lang&lang=fr" <?php echo ($_SESSION['lang'] ?? '') === 'fr' ? 'selected' : ''; ?> class="text-black">🇫🇷 FR</option>
        <option value="index.php?action=set_lang&lang=en" <?php echo ($_SESSION['lang'] ?? '') === 'en' ? 'selected' : ''; ?> class="text-black">🇬🇧 EN</option>
      </select>
    </div>
  </header>