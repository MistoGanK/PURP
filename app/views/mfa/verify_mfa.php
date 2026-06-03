<?php require_once __DIR__ . '/../layout/header_public.php'; ?>

<main class="form-container">
  <div class="form-card">
    <div class="form-brand">
      <h1 class="form-title">Verificación de Seguridad</h1>
      <h2 class="form-subtitle">Introduzca el código de 6 dígitos enviado a su dispositivo autorizado.</h2>
    </div>

    <?php if (isset($_SESSION['flash'])): ?>
      <?php
      $flash = $_SESSION['flash'];
      $bgState = $flash['type'] === 'success' ? 'alert-success' : 'alert-danger';
      $mensajes = is_array($flash['message']) ? $flash['message'] : [$flash['message']];
      ?>
      <div class="alert-container-mfa" role="alert">
        <?php foreach ($mensajes as $msg): ?>
          <div class="alert <?php echo $bgState; ?>">
            <div class="alert-text-wrapper">
              <strong><?php echo $msg; ?></strong>
            </div>
            <button onclick="this.parentElement.remove()" class="alert-close-btn">
              <svg class="alert-close-icon" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        <?php endforeach; ?>
      </div>
      <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <form action="index.php?action=verify_mfa" method="POST" class="form-layout">
      <div class="form-field">
        <label>Código de Seguridad (MFA)</label>
        <input type="text" name="code_verification" class="mfa-code-input" maxlength="6" required placeholder="000000">
      </div>

      <div class="form-actions">
        <button type="submit" class="btn-primary btn-submit-mfa">
          Verificar Identidad
        </button>
      </div>
    </form>
  </div>
</main>

<?php require_once __DIR__ . '/../layout/footer_public.php'; ?>