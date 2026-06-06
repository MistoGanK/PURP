<?php
require __DIR__ . '/layout/header.php';

if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    $bgState = 'alert-danger';
    if ($flash['type'] === 'success') {
        $bgState = 'alert-success';
    } elseif ($flash['type'] === 'info') {
        $bgState = 'alert-info';
    }
}
?>

<?php if (isset($_SESSION['flash'])): ?>
    <?php $mensajes = is_array($flash['message']) ? $flash['message'] : [$flash['message']]; ?>
    <div class="alert-container">
        <?php foreach ($mensajes as $msg): ?>
            <div class="alert <?php echo $bgState; ?>" role="alert">
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

<main class="landing-container">
    <section class="mb-10">
        <h1 class="welcome-title"><?php echo __('landing_welcome'); ?></h1>
        <p class="welcome-subtitle"><?php echo __('landing_subtitle'); ?></p>

        <div class="flex gap-4">
            <a href="/index.php?action=denuncia_nueva" class="btn-primary">
                <?php echo __('btn_new_denuncia'); ?>
            </a>
            <a href="/index.php?action=denuncias" class="btn-secondary">
                <?php echo __('btn_view_denuncias'); ?>
            </a>
        </div>
    </section>

    <div class="stats-grid">
        <div class="stat-card stat-card-blue">
            <h3 class="stat-card-title"><?php echo __('card_registered'); ?></h3>
            <p class="stat-card-value">128 <span class="stat-card-sub"><?php echo __('label_today'); ?></span></p>
        </div>

        <div class="stat-card stat-card-gold">
            <h3 class="stat-card-title"><?php echo __('card_in_progress'); ?></h3>
            <p class="stat-card-value">256 <span class="stat-card-sub"><?php echo __('label_pending'); ?></span></p>
        </div>

        <div class="widget-card">
            <h3 class="stat-card-title mb-4"><?php echo __('card_alerts'); ?></h3>

            <ul class="vertical-list">
                <li class="alert-item alert-item-warning">
                    <span class="text-(--goldenrod)">⚠️</span>
                    <p class="text-(--characol)"><?php echo __('alert_system'); ?></p>
                </li>
                <li class="alert-item alert-item-danger">
                    <span class="text-(--tomatoe-jam)">🚨</span>
                    <p class="text-(--characol) font-['Inter-Bold']"><?php echo __('alert_warning'); ?></p>
                </li>
            </ul>

            <a href="#" class="text-(--blue-brand) text-xs mt-4 block text-right hover:underline"><?php echo __('link_view_more'); ?></a>
        </div>
    </div>

    <div class="widgets-grid">
        <div class="widget-card">
            <h3 class="widget-title"><?php echo __('card_search'); ?></h3>
            <form action="/index.php?action=denuncias" method="GET">
                <label class="text-xs text-(--cool-steel) block mb-2"><?php echo __('label_case_number'); ?></label>
                <div class="search-group">
                    <input type="text" name="id_caso" placeholder="<?php echo __('placeholder_case'); ?>" class="search-input">
                    <button class="btn-search">🔍</button>
                </div>
                <button class="btn-block"><?php echo __('btn_search'); ?></button>
            </form>
        </div>

        <div class="widget-card">
            <h3 class="widget-title"><?php echo __('card_stats'); ?></h3>
            <div class="h-48 flex items-end justify-around gap-2 px-4">
                <div class="bg-(--sea-green) w-10" style="height: 60%"></div>
                <div class="bg-(--blue-brand) w-10" style="height: 40%"></div>
                <div class="bg-(--sea-green) w-10" style="height: 90%"></div>
                <div class="bg-(--blue-brand) w-10" style="height: 70%"></div>
                <div class="bg-(--tomatoe-jam) w-10" style="height: 50%"></div>
            </div>
            <div class="flex justify-between mt-4 text-sm font-['Inter-Bold']">
                <span><?php echo __('label_month_total'); ?> 1,342</span>
                <span class="text-(--sea-green)"><?php echo __('label_resolved'); ?> 894</span>
            </div>
        </div>

        <div class="widget-card">
            <h3 class="widget-title"><?php echo __('guides_docs'); ?></h3>
            <ul class="vertical-list">
                <li class="widget-item">
                    <img src="/assets/icons/app/file-text.svg" alt="" class="widget-icon" aria-hidden="true">
                    <a href="#" class="widget-link"><?php echo __('doc_user_manual'); ?></a>
                </li>
                <li class="widget-item">
                    <img src="/assets/icons/app/folder.svg" alt="" class="widget-icon" aria-hidden="true">
                    <a href="#" class="widget-link"><?php echo __('doc_operating_procedures'); ?></a>
                </li>
            </ul>
            <div class="widget-footer">
                <a href="#" class="view-more-link">
                    <?php echo __('link_view_more'); ?>
                </a>
            </div>
        </div>

        <div class="widget-card">
            <h3 class="widget-title"><?php echo __('latest_news'); ?></h3>
            <ul class="vertical-list">
                <li class="widget-item">
                    <img src="/assets/icons/app/check-square.svg" alt="" class="widget-icon" aria-hidden="true">
                    <a href="#" class="widget-link"><?php echo __('news_protocol'); ?></a>
                </li>
                <li class="widget-item">
                    <img src="/assets/icons/app/check-square.svg" alt="" class="widget-icon" aria-hidden="true">
                    <a href="#" class="widget-link"><?php echo __('news_training'); ?></a>
                </li>
            </ul>
            <div class="widget-footer">
                <a href="#" class="view-more-link">
                    <?php echo __('link_view_more'); ?>
                </a>
            </div>
        </div>
    </div>
</main>

<?php require __DIR__ . '/layout/footer.php'; ?>