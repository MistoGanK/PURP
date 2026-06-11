<?php
// Flow control for loggin
$is_logged = isset($_SESSION['user']);
$nav_login_action = $is_logged ? 'logout' : 'login';
$nav_login_class  = $is_logged ? 'logout-link' : 'login-link';
$nav_login_label  = $is_logged ? __('nav_logout') : __('btn_login');
?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang'] ?? 'es'; ?>">

<head>
  <meta charset="UTF-8">
  <title>PURP</title>
  <link class="nav-link" rel="stylesheet" href="/assets/tailwind/mainOutput.css">
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
            <option value="index.php?action=set_lang&lang=arn" <?php echo ($_SESSION['lang'] ?? '') === 'arn' ? 'selected' : ''; ?> class="text-black">🏴󠁡󠁢󠁪󠁡󠁿 ARN</option>
            <option value="index.php?action=set_lang&lang=ast" <?php echo ($_SESSION['lang'] ?? '') === 'ast' ? 'selected' : ''; ?> class="text-black">🏴󠁡󠁢󠁪󠁡󠁿 AST</option>
            <option value="index.php?action=set_lang&lang=fr" <?php echo ($_SESSION['lang'] ?? '') === 'fr' ? 'selected' : ''; ?> class="text-black">🇫🇷 FR</option>
            <option value="index.php?action=set_lang&lang=en" <?php echo ($_SESSION['lang'] ?? '') === 'en' ? 'selected' : ''; ?> class="text-black">🇬🇧 EN</option>
          </select>
        </div>

        <?php if (isset($_SESSION['user'])): ?>
          <div class="user-profile">
            <span>👤</span>
            <button onclick="(() => location = 'index.php?action=show_profile')()"><?php echo $_SESSION['user']['agent_name'] ?? __('guest'); ?></button>

            <?php if (empty($_SESSION['user']['has_2fa']) || $_SESSION['user']['has_2fa'] === false): ?>
              <div class="twofa-alert-container">
                <span class="twofa-alert-icon">⚠️</span>

                <div class="twofa-popup">
                  <p class="twofa-popup-title">🔒 <?php echo __('security_alert', 'Seguridad vulnerable'); ?></p>
                  <p class="twofa-popup-text"><?php echo __('2fa_warning_text', 'No tienes activado el Segundo Factor de Autenticación (2FA). Protege tu cuenta policial desde tu perfil.'); ?></p>
                  <div class="twofa-popup-action">
                    <a href="index.php?action=setup_mfa"><?php echo __('activate_now', 'Activar ahora →'); ?></a>
                  </div>
                  <div class="twofa-popup-arrow"></div>
                </div>
              </div>
            <?php endif; ?>
          </div>


          <span class="nav-separator">|</span>
          <a href="index.php?action=<?php echo $nav_login_action; ?>" class="<?php echo $nav_login_class; ?>">
            <?php echo $nav_login_label; ?>
          </a>
        <?php endif; ?>

      </div>

    </div>
  </header>