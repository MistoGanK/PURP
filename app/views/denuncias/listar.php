<?php
require __DIR__ . '/../layout/header.php';

use App\Enums\tipoDelito;

$currentRole = (int) ($_SESSION['user']['agent_user_role'] ?? 99);
$isAdmin = ($currentRole <= 20);

$flash = $_SESSION['flash'] ?? null;
if ($flash) {
  $bgRegisterState = $flash['type'] === 'success' ? 'alert-success' : 'alert-danger';
}
?>

<?php if (isset($_SESSION['flash'])): ?>
  <div class="alert-container">
    <div class="alert <?php echo $bgRegisterState; ?>" role="alert">
      <div class="flex-1">
        <?php echo is_array($flash['message']) ? implode('<br>', $flash['message']) : $flash['message']; ?>
      </div>
      <button onclick="this.parentElement.remove()" class="text-(--cool-steel) hover:text-(--characol) transition-colors">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
  <?php unset($_SESSION['flash']); 
  ?>
<?php endif; ?>

<main class="denuncias-screen px-6">

  <header class="denuncias-header flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8 pb-4 border-b border-(--platinium)">
    <h1 class="denuncias-title text-2xl font-['Montserrat-Bold'] text-(--black)">
      <?= __('title_denuncias_list') ?>
    </h1>

    <div class="flex gap-3 self-end sm:self-auto">
      <a href="/index.php?action=home" class="btn-secondary">
        <?= __('btn_back_home') ?>
      </a>

      <a href="/index.php?action=denuncia_nueva" class="btn-primary">
        <?= __('btn_new_denuncia') ?>
      </a>
    </div>
  </header>

  <div class="denuncias-list shadow-sm">
    <div class="hidden md:grid grid-cols-12 gap-4 px-6 py-3 bg-(--snow) border-b border-(--platinium) text-sm font-['Inter-Bold'] text-(--characol) uppercase tracking-wider">
      <div class="col-span-2"><?= __('label_expediente_num') ?></div>
      <div class="col-span-3"><?= __('label_naturaleza_delito') ?></div>
      <div class="col-span-3"><?= __('label_descripcion_hechos') ?></div>
      <div class="col-span-2"><?= __('label_fecha_hecho') ?></div>
      <?php if ($isAdmin): ?>
        <div class="col-span-2 text-right"><?= __('label_acciones') ?></div>
      <?php endif; ?>
    </div>

    <section class="divide-y divide-(--platinium)">
      <?php if (empty($denuncias)): ?>
        <div class="p-8 text-center text-base"><?= __('msg_no_denuncias') ?></div>
      <?php else: ?>
        <?php foreach ($denuncias as $d): ?>
          <article class="denuncia-item grid grid-cols-1 md:grid-cols-12 gap-2 md:gap-4 items-center p-4">

            <!-- Expediente -->
            <div class="md:col-span-2 flex items-center md:block gap-2">
              <a href="/index.php?action=denuncia&id_denuncia=<?= $d['id_denuncia'] ?>"
                class="font-['Inter-Bold'] text-base text-(--blue-brand) hover:underline"><?= htmlspecialchars($d['codigo_expediente']) ?></a>
            </div>

            <!-- Delito -->
            <div class="md:col-span-3">
              <h2 class="text-sm font-['Inter-Semibold']"><?php
                                                          $delitoEnum = tipoDelito::tryFrom($d['tipo_delito']);
                                                          echo htmlspecialchars($delitoEnum ? $delitoEnum->label() : __('delito_unclassified'));
                                                          ?></h2>
            </div>

            <!-- Hechos (Reducido a col-span-3) -->
            <div class="md:col-span-3">
              <p class="text-xs text-(--characol) line-clamp-1"><?= htmlspecialchars($d['descripcion_hechos']) ?></p>
            </div>

            <!-- Fecha -->
            <div class="md:col-span-2">
              <span class="text-sm text-(--state-grey)"><?= htmlspecialchars(date('d/m/Y', strtotime($d['fecha_hechos']))) ?></span>
            </div>

            <!-- Actions (Only Admin) -->
            <?php if ($isAdmin): ?>
              <div class="md:col-span-2 flex justify-end gap-2">
                <a href="/index.php?action=denuncia&id_denuncia=<?= $d['id_denuncia'] ?>" class="btn-secondary">
                  <?= __('btn_edit') ?>
                </a>
                <a href="/index.php?action=delete_denuncia&id_denuncia=<?= $d['id_denuncia'] ?>" class="btn-danger"
                  onclick="return confirm('<?= __('confirm_delete') ?>');">
                  <?= __('btn_delete') ?>
                </a>
              </div>
            <?php endif; ?>

          </article>
        <?php endforeach; ?>
      <?php endif; ?>
    </section>
  </div>
</main>