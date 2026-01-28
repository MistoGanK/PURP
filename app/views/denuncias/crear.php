<?php require __DIR__ . '/../layout/header.php'; ?>

<main class="denuncia-screen">

  <section class="denuncia-card">

    <header class="denuncia-header">
      <h1 class="denuncia-title">Nueva denuncia</h1>
      <p class="denuncia-subtitle">
        Complete los datos requeridos para registrar una nueva denuncia
      </p>
    </header>

    <form method="POST"
          action="/PURP/public/index.php?action=denuncia_guardar"
          class="denuncia-form">

      <!-- BLOQUE: TIPO DE DELITO -->
      <div class="denuncia-field">
        <label for="tipo_delito">Tipo de delito</label>
        <input
          type="text"
          id="tipo_delito"
          name="tipo_delito"
          placeholder="Ej. Robo con fuerza"
          required>
      </div>

      <!-- BLOQUE: DESCRIPCIÓN -->
      <div class="denuncia-field">
        <label for="descripcion_hechos">Descripción de los hechos</label>
        <textarea
          id="descripcion_hechos"
          name="descripcion_hechos"
          placeholder="Describa detalladamente los hechos ocurridos"
          required></textarea>
      </div>

      <!-- BLOQUE: FECHA -->
      <div class="denuncia-field">
        <label for="fecha_hechos">Fecha del suceso</label>
        <input
          type="date"
          id="fecha_hechos"
          name="fecha_hechos"
          required>
      </div>

      <!-- ACCIONES -->
      <div class="denuncia-actions">
        <a href="/PURP/public/index.php?action=home"
           class="btn-secondary">
          Volver a inicio
        </a>

        <button type="submit" class="btn-primary">
          Registrar denuncia
        </button>
      </div>

    </form>

  </section>

</main>

<?php require __DIR__ . '/../layout/footer.php'; ?>
