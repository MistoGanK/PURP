<?php require_once __DIR__ . '/../layout/header_public.php';
if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    $bgRegisterState = $flash['type'] === 'success' ?  'alert-success' : 'alert-danger';
};
?>

<?php if (isset($_SESSION['flash'])): ?>
    <?php
    $mensajes = is_array($flash['message']) ? $flash['message'] : [$flash['message']];
    ?>
    <div class="alert-container">
        <?php foreach ($mensajes as $msg): ?>
            <div class="alert <?php echo $bgRegisterState; ?>" role="alert">
                <div class="flex-1">
                    <?php echo $msg; ?>
                </div>
                <button onclick="this.parentElement.remove()" class="alert-close-btn">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        <?php endforeach; ?>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<main class="form-container">
    <div class="form-card">
        <div class="form-brand">
            <h1 class="form-title"><?php echo __('mfa_setup_title') ?? 'Configurar Doble Factor (MFA)'; ?></h1>
            <h2 class="form-subtitle">
                <?php echo __('mfa_setup_subtitle') ?? 'Escanee el código QR con su aplicación de autenticación (Aegis, Google Authenticator) para vincular su credencial policial.'; ?>
            </h2>
        </div>

        <div class="qr-wrapper-mfa">
            <?php
            // Generamos una URL para pintar el QR de forma visual
            $qrImageUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' . urlencode($qrCodeUri);
            ?>
            <img src="<?php echo $qrImageUrl; ?>" alt="<?php echo __('mfa_qr_alt') ?? 'Código QR de Seguridad'; ?>">
        </div>

        <div class="mfa-info-box">
            <p class="mfa-info-text"><?php echo __('mfa_manual_text') ?? '¿No puede escanearlo? Introduzca esta clave manualmente en su app:'; ?></p>
            <strong class="mfa-secret-code">
                <?php echo chunk_split($secret, 4, ' '); ?>
            </strong>
        </div>

        <form action="index.php?action=confirm_mfa" method="POST" class="form-layout">
            <div class="form-field">
                <label><?php echo __('mfa_code_label') ?? 'Código de Confirmación de 6 dígitos'; ?></label>
                <input type="text" name="first_mfa_code" class="mfa-code-input" maxlength="6" required placeholder="000000">
            </div>

            <div class="form-actions">
                <a href="/index.php?action=home" class="btn-secondary">
                    <?php echo __('btn_back_home') ?? 'Volver a inicio'; ?>
                </a>

                <button type="submit" class="btn-primary">
                    <?php echo __('btn_mfa_activate') ?? 'Activar y Confirmar Seguridad'; ?>
                </button>
            </div>
        </form>
    </div>
</main>

<?php require_once __DIR__ . '/../layout/footer_public.php'; ?>