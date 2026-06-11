<?php
/** @var array $denuncia */
require __DIR__ . '/../layout/header.php';

// Datos para JS
$jsonDelitos = json_encode(\app\enums\tipoDelito::jsonOptions());
$jsonAmbitos = json_encode(\app\enums\ambitoLugar::jsonOptions());
$jsonCanales = json_encode(\app\enums\canalEntrada::jsonOptions());
$jsonEstadoLegal = json_encode(\app\enums\denunciasEstadoLegal::jsonOptions());



$currentRole = (int) ($_SESSION['user']['agent_user_role'] ?? 99);
$isAdmin = ($currentRole <= 20);

$flash = $_SESSION['flash'] ?? null;
if ($flash) {
  $bgRegisterState = $flash['type'] === 'success' ? 'alert-success' : 'alert-danger';
}
?>

<?php if ($flash): ?>
  <div class="alert-container">
    <div class="alert <?php echo $bgRegisterState; ?>" role="alert">
      <div class="flex-1"><?php echo is_array($flash['message']) ? implode('<br>', $flash['message']) : $flash['message']; ?></div>
      <button onclick="this.parentElement.remove()" class="text-(--cool-steel) hover:text-(--characol) transition-colors">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
  <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<main class="px-6 py-8 max-w-5xl mx-auto">
  <!-- Header del Editor -->
  <header class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8 pb-4 border-b border-(--platinium)">
    <div>
      <h1 class="text-2xl font-['Montserrat-Bold'] text-(--black)"><?= htmlspecialchars($denuncia['codigo_expediente']) ?></h1>
    </div>
    <div class="flex gap-3">
      <a href="/index.php?action=denuncias" class="btn-secondary"><?= __('btn_back_home') ?></a>
      <?php if ($isAdmin): ?>
        <button type="submit" form="editForm" class="btn-primary"><?= __('btn_save_changes') ?></button>
      <?php endif; ?>
    </div>
  </header>

  <!-- Contenedor del Formulario -->
  <div class="bg-(--white) shadow-sm rounded-xl border border-(--platinium) p-8">
    <form id="editForm" method="POST" action="index.php?action=denuncia_update" class="space-y-6">
      <input type="hidden" name="id_denuncia" value="<?php echo $denuncia['id_denuncia']; ?>">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Tipo de Delito -->
        <div class="denuncia-field">
          <label class="block mb-2 text-sm font-['Inter-Bold'] text-(--characol)"><?= __('label_crime_type') ?></label>
          <select name="tipo_delito" id="tipo_delito" required class="w-full border border-(--platinium) rounded-lg p-2.5 bg-(--white)" <?php echo !$isAdmin ? 'disabled' : ''; ?>>
            <?php foreach (\app\enums\tipoDelito::jsonOptions() as $opcion): ?>
              <option value="<?= $opcion['value'] ?>" <?= ($denuncia['tipo_delito'] == $opcion['value']) ? 'selected' : '' ?>><?= $opcion['label'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Gravedad Calculada -->
        <div class="denuncia-field">
          <label class="block mb-2 text-sm font-['Inter-Bold'] text-(--characol)"><?= __('label_penal_gravity') ?></label>
          <input type="text" id="gravedad_visual" readonly class="w-full border border-(--platinium) rounded-lg p-2.5 bg-(--snow) cursor-not-allowed">
          <input type="hidden" id="gravedad_delito" name="gravedad_delito" value="<?= $denuncia['gravedad_delito'] ?>">
        </div>

        <!-- Canal de entrada -->
        <div class="denuncia-field">
          <label class="block mb-2 text-sm font-['Inter-Bold'] text-(--characol)"><?= __('label_entry_channel') ?></label>
          <select name="canal_entrada" required class="w-full border border-(--platinium) rounded-lg p-2.5 bg-(--white)" <?php echo !$isAdmin ? 'disabled' : ''; ?>>
            <?php foreach (\app\enums\canalEntrada::jsonOptions() as $opcion): ?>
              <option value="<?= $opcion['value'] ?>" <?= ($denuncia['canal_entrada'] == $opcion['value']) ? 'selected' : '' ?>><?= $opcion['label'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Fecha -->
        <div class="denuncia-field">
          <label class="block mb-2 text-sm font-['Inter-Bold'] text-(--characol)"><?= __('label_date') ?></label>
          <input type="date" name="fecha_hechos" value="<?= date('Y-m-d', strtotime($denuncia['fecha_hechos'])) ?>" required class="w-full border border-(--platinium) rounded-lg p-2.5 bg-(--white)" <?php echo !$isAdmin ? 'disabled' : ''; ?>>
        </div>

        <!-- Ámbito -->
        <div class="denuncia-field">
          <label class="block mb-2 text-sm font-['Inter-Bold'] text-(--characol)"><?= __('label_scope_location') ?></label>
          <select id="ambito_lugar" name="ambito_lugar" required class="w-full border border-(--platinium) rounded-lg p-2.5 bg-(--white)" <?php echo !$isAdmin ? 'disabled' : ''; ?>>
            <?php foreach (\app\enums\ambitoLugar::jsonOptions() as $opcion): ?>
              <option value="<?= $opcion['value'] ?>" <?= ($denuncia['ambito_lugar'] == $opcion['value']) ? 'selected' : '' ?>><?= $opcion['label'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Subámbito -->
        <div class="denuncia-field">
          <label class="block mb-2 text-sm font-['Inter-Bold'] text-(--characol)"><?= __('label_subscope') ?></label>
          <select id="subambito_lugar" name="subambito_lugar" required class="w-full border border-(--platinium) rounded-lg p-2.5 bg-(--white)" <?php echo !$isAdmin ? 'disabled' : ''; ?>>
            <!-- Dinámico JS -->
          </select>
        </div>

        <!-- Estado Legal -->
        <div class="denuncia-field">
          <label class="block mb-2 text-sm font-['Inter-Bold'] text-(--characol)"><?= __('label_status_legal') ?></label>
          <select name="estado_legal" required class="w-full border border-(--platinium) rounded-lg p-2.5 bg-(--white)" <?php echo !$isAdmin ? 'disabled' : ''; ?>>
            <?php foreach (\app\enums\denunciasEstadoLegal::jsonOptions() as $opcion): ?>
              <option value="<?= $opcion['value'] ?>" <?= (isset($denuncia['estado_legal']) && $denuncia['estado_legal'] == $opcion['value']) ? 'selected' : '' ?>><?= $opcion['label'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Lugar Detalle -->
        <div class="md:col-span-2">
          <label class="block mb-2 text-sm font-['Inter-Bold'] text-(--characol)"><?= __('label_place_details') ?></label>
          <input type="text" name="lugar_detalle" value="<?= htmlspecialchars($denuncia['lugar_detalle'] ?? '') ?>" required class="w-full border border-(--platinium) rounded-lg p-2.5 bg-(--white)" <?php echo !$isAdmin ? 'disabled' : ''; ?>>
        </div>

        <!-- Descripción -->
        <div class="md:col-span-2">
          <label class="block mb-2 text-sm font-['Inter-Bold'] text-(--characol)"><?= __('label_description') ?></label>
          <textarea name="descripcion_hechos" rows="4" required class="w-full border border-(--platinium) rounded-lg p-2.5 bg-(--white)" <?php echo !$isAdmin ? 'disabled' : ''; ?>><?= htmlspecialchars($denuncia['descripcion_hechos']) ?></textarea>
        </div>

      </div>
    </form>
  </div>
</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const mapDelitos = <?php echo $jsonDelitos; ?>;
    const mapAmbitos = <?php echo $jsonAmbitos; ?>;

    const selectDelito = document.getElementById('tipo_delito');
    const inputGravedadVisual = document.getElementById('gravedad_visual');
    const inputGravedadReal = document.getElementById('gravedad_delito');

    const selectAmbito = document.getElementById('ambito_lugar');
    const selectSubambito = document.getElementById('subambito_lugar');
    const currentSubambito = <?php echo json_encode($denuncia['subambito_lugar']); ?>;

    const processGravedad = (idDelito) => {
      const delito = mapDelitos.find(d => d.value === parseInt(idDelito));
      if (delito) {
        const textosGravedad = {
          10: <?php echo json_encode(__('gravity_minor_label')); ?>,
          20: <?php echo json_encode(__('gravity_moderate_label')); ?>,
          30: <?php echo json_encode(__('gravity_severe_label')); ?>
        };
        inputGravedadVisual.value = textosGravedad[delito.gravedad] || <?php echo json_encode(__('unknown_value')); ?>;
        inputGravedadReal.value = delito.gravedad;
      }
    };

    const processSubambitos = (idAmbito, selectedSub = null) => {
      const ambito = mapAmbitos.find(a => a.value === parseInt(idAmbito));
      if (ambito) {
        selectSubambito.innerHTML = '';
        ambito.subambitos.forEach(sub => {
          const opcion = document.createElement('option');
          opcion.value = sub.value;
          opcion.textContent = sub.label;
          if (parseInt(sub.value) === parseInt(selectedSub)) opcion.selected = true;
          selectSubambito.appendChild(opcion);
        });
      }
    };

    processGravedad(selectDelito.value);
    processSubambitos(selectAmbito.value, currentSubambito);

    selectDelito.addEventListener('change', (e) => processGravedad(e.target.value));
    selectAmbito.addEventListener('change', (e) => processSubambitos(e.target.value));
  });
</script>

<?php require __DIR__ . '/../layout/footer.php'; ?>