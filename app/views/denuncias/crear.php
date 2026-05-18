<?php require __DIR__ . '/../layout/header.php'; ?>

<main class="denuncia-screen">

  <section class="denuncia-card">

    <header class="denuncia-header">
      <h1 class="denuncia-title"><?php echo __('title_new_denuncia'); ?></h1>
      <p class="denuncia-subtitle">
        <?php echo __('subtitle_new_denuncia'); ?>
      </p>
    </header>

    <form method="POST"
          action="/PURP/public/index.php?action=denuncia_guardar"
          class="denuncia-form">

      <div class="denuncia-field">
        <label for="tipo_delito"><?php echo __('label_crime_type'); ?></label>
        <input
          type="text"
          id="tipo_delito"
          name="tipo_delito"
          placeholder="<?php echo __('placeholder_crime_type'); ?>"
          required>
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
        <a href="/index.php?action=home"
           class="btn-secondary">
          <?php echo __('btn_back_home'); ?>
        </a>

        <button type="submit" class="btn-primary">
          <?php echo __('btn_register_denuncia'); ?>
        </button>
      </div>

    </form>

  </section>

</main>

<?php require __DIR__ . '/../layout/footer.php'; ?>