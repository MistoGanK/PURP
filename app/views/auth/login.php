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
                <button onclick="this.parentElement.remove()" class="text-(--cool-steel) hover:text-(--characol) transition-colors cursor-pointer">
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
            <h1 class="form-title"><?php echo __('login_page_title'); ?></h1>
            <h2 class="form-subtitle">
                <?php echo __('header_title'); ?>
            </h2>
        </div>

        <?php if (isset($_SESSION['login_error'])): ?>
            <div class="alert-danger" role="alert">
                <span class="alert-danger-text">
                    <?php
                    echo __($_SESSION['login_error']);
                    ?>
                </span>
            </div>
            <?php unset($_SESSION['login_error']); ?>
        <?php endif; ?>

        <form action="index.php?action=login" method="POST" class="form-layout">
            <div class="form-field">
                <label><?php echo __('label_dni'); ?></label>
                <input type="text" name="agent_dni" required placeholder="<?php echo __('dni_placheholder'); ?>">
            </div>

            <div class="form-field">
                <label><?php echo __('password_label'); ?></label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit" class="btn-primary w-full">
                <?php echo __('btn_login'); ?>
            </button>
        </form>
    </div>
</main>

<?php require_once __DIR__ . '/../layout/footer_public.php'; ?>