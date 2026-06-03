<?php require_once __DIR__ . '/../layout/header_public.php'; ?>

<main class="form-container">
    <div class="form-card text-center">
        <div class="form-brand">
            <div class="mfa-success-icon-wrapper">
                <svg class="mfa-success-icon" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h1 class="form-title">¡Seguridad Activada!</h1>
            <h2 class="form-subtitle">
                El Segundo Factor de Autenticación (MFA) se ha vinculado correctamente a su placa policial.
            </h2>
        </div>

        <div class="mfa-warning-box">
            <p class="mfa-warning-title">⚠️ GUARDE ESTOS CÓDIGOS DE RECUPERACIÓN</p>
            <p class="mfa-info-text">
                Si pierde el acceso a su aplicación de autenticación (Aegis/Google Authenticator), estos códigos serán la única forma de acceder al sistema. Cada uno sirve para **un único uso**.
            </p>
        </div>

        <div class="mfa-grid-codes">
            <?php foreach ($backupCodes as $code): ?>
                <div class="mfa-code-item">
                    <code><?php echo htmlspecialchars($code); ?></code>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="form-actions">
            <a href="index.php?action=home" class="btn-primary btn-full">
                Entrar al Sistema
            </a>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/../layout/footer_public.php'; ?>