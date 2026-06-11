<?php
require __DIR__ . '/../layout/header.php';

// Prepared PHP data for JS injection
$jsonDelitos = json_encode(\app\enums\tipoDelito::jsonOptions());
$jsonAmbitos = json_encode(\app\enums\ambitoLugar::jsonOptions());

if (isset($_SESSION['flash'])) {
  $flash = $_SESSION['flash'];
  $bgRegisterState = $flash['type'] === 'success' ? 'alert-success' : 'alert-danger';
}
?>

<?php if (isset($_SESSION['flash'])): ?>
  <?php $mensajes = is_array($flash['message']) ? $flash['message'] : [$flash['message']]; ?>
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

<main class="denuncia-screen">
  <section class="denuncia-card">

    <header class="denuncia-header">
      <h1 class="denuncia-title"><?php echo __('title_new_denuncia'); ?></h1>
      <p class="denuncia-subtitle">
        <?php echo __('subtitle_new_denuncia'); ?>
      </p>
    </header>

    <form method="POST" action="index.php?action=denuncia_guardar" class="denuncia-form">

      <div class="denuncia-field">
        <label for="tipo_delito"><?php echo __('label_crime_type'); ?></label>
        <select id="tipo_delito" name="tipo_delito" required class="w-full bg-(--snow) ...">
          <option value="" disabled selected hidden><?php echo __('placeholder_crime_type'); ?></option>
          <?php foreach (\app\enums\tipoDelito::jsonOptions() as $opcion): ?>
            <option value="<?php echo $opcion['value']; ?>"><?php echo $opcion['label']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="denuncia-field">
        <label><?php echo __('label_penal_gravity'); ?></label>
        <input type="text" id="gravedad_visual" readonly class="bg-(--platinium) cursor-not-allowed" placeholder="<?php echo __('placeholder_gravity_calc'); ?>">
        <input type="hidden" id="gravedad_delito" name="gravedad_delito">
      </div>

      <div class="denuncia-field">
        <label for="canal_entrada"><?php echo __('label_entry_channel') ?? 'Canal de entrada'; ?></label>
        <select id="canal_entrada" name="canal_entrada" required>
          <option value="" disabled selected hidden><?php echo __('placeholder_entry_channel') ?? 'Seleccione el canal de entrada'; ?></option>
          <?php foreach (\app\enums\canalEntrada::jsonOptions() as $opcion): ?>
            <option value="<?php echo $opcion['value']; ?>"><?php echo $opcion['label']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="denuncia-field">
        <label for="ambito_lugar"><?php echo __('label_scope_location'); ?></label>
        <select id="ambito_lugar" name="ambito_lugar" required>
          <option value="" disabled selected hidden><?php echo __('placeholder_scope'); ?></option>
          <?php foreach (\app\enums\ambitoLugar::jsonOptions() as $opcion): ?>
            <option value="<?php echo $opcion['value']; ?>"><?php echo $opcion['label']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="denuncia-field">
        <label for="subambito_lugar"><?php echo __('label_subscope'); ?></label>
        <select id="subambito_lugar" name="subambito_lugar" required disabled class="bg-(--platinium)">
          <option value="" disabled selected hidden><?php echo __('placeholder_first_scope'); ?></option>
        </select>
      </div>

      <div class="denuncia-field">
        <label for="lugar_detalle_texto"><?php echo __('label_place_details'); ?></label>
        <input type="text" id="lugar_detalle_texto" name="lugar_detalle_texto" placeholder="<?php echo __('placeholder_place_details'); ?>" required>
      </div>

      <div class="denuncia-field">
        <label for="descripcion_hechos"><?php echo __('label_description'); ?></label>
        <textarea
          id="descripcion_hechos"
          name="descripcion_hechos"
          placeholder="<?php echo __('placeholder_description'); ?>"
          required></textarea>
      </div>

      <div class="denuncia-field">
        <label for="fecha_hechos"><?php echo __('label_date'); ?></label>
        <input
          type="date"
          id="fecha_hechos"
          name="fecha_hechos"
          required>
      </div>

      <div class="denuncia-actions">
        <a href="/index.php?action=home" class="btn-secondary">
          <?php echo __('btn_back_home'); ?>
        </a>
        <button type="submit" class="btn-primary">
          <?php echo __('btn_register_denuncia'); ?>
        </button>
      </div>

    </form>

  </section>
</main>

<script>
  document.addEventListener('DOMContentLoaded', () => {

    const mapDelitos = <?php echo $jsonDelitos; ?>;
    const mapAmbitos = <?php echo $jsonAmbitos; ?>;

    // Gravedad Node
    const selectDelito = document.getElementById('tipo_delito');
    const inputGravedadVisual = document.getElementById('gravedad_visual');
    const inputGravedadReal = document.getElementById('gravedad_delito');

    // Ubicación Node
    const selectAmbito = document.getElementById('ambito_lugar');
    const selectSubambito = document.getElementById('subambito_lugar');

    // Logic tipo_delito > gravedad
    selectDelito.addEventListener('change', (e) => {
      const idDelitoSeleccionado = parseInt(e.target.value);

      const delito = mapDelitos.find(d => d.value === idDelitoSeleccionado);

      if (delito) {
        const textosGravedad = {
          10: <?php echo json_encode(__('gravity_minor_label')); ?>,
          20: <?php echo json_encode(__('gravity_moderate_label')); ?>,
          30: <?php echo json_encode(__('gravity_severe_label')); ?>
        };

        inputGravedadVisual.value = textosGravedad[delito.gravedad] || <?php echo json_encode(__('unknown_value')); ?>;
        inputGravedadReal.value = delito.gravedad;

        inputGravedadVisual.classList.remove('bg-(--platinium)');
      }
    });

    // Logic ambito_lugar > subambito_lugar
    selectAmbito.addEventListener('change', (e) => {
      const idAmbitoSeleccionado = parseInt(e.target.value);

      const ambito = mapAmbitos.find(a => a.value === idAmbitoSeleccionado);

      if (ambito) {
        selectSubambito.removeAttribute('disabled');
        selectSubambito.classList.remove('bg-(--platinium)');

        // Reset
        const placeholderText = <?php echo json_encode(__('placeholder_subscope')); ?>;
        selectSubambito.innerHTML = `<option value="" disabled selected hidden>${placeholderText}</option>`;

        // Iterate from Enum to option
        ambito.subambitos.forEach(sub => {
          const opcion = document.createElement('option');
          opcion.value = sub.value;
          opcion.textContent = sub.label;
          selectSubambito.appendChild(opcion);
        });
      }
    });
  });
</script>

<?php require __DIR__ . '/../layout/footer.php'; ?>