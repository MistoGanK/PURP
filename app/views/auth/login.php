<?php require_once __DIR__ . '/../layout/header_public.php'; ?>

<div class="login-card">
    <div class="login-brand">
        <h1 class="login-title"><?php echo __('login_page_title'); ?></h1>
        <h2 class="login-subtitle">
            <?php echo __('header_title'); ?>
        </h2>
    </div>

    <form action="index.php?action=do_login" method="POST" class="login-form">
        <div class="login-field">
            <label><?php echo __('badge_number'); ?></label>
            <input type="text" name="numero_placa" required placeholder="<?php echo __('badge_placeholder'); ?>">
        </div>
        
        <div class="login-field">
            <label><?php echo __('password_label'); ?></label>
            <input type="password" name="password_hash" required placeholder="••••••••">
        </div>

        <button type="submit" class="btn-primary w-full">
            <?php echo __('btn_login'); ?>
        </button>
    </form>
</div>

<?php require_once __DIR__ . '/../layout/footer_public.php'; ?>