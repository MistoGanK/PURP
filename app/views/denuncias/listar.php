<?php require __DIR__ . '/../layout/header.php'; ?>

<main class="denuncias-screen">

  <header class="denuncias-header">
    <h1 class="denuncias-title">
      Denuncias registrada
    </h1>

    <div class="flex gap-4">
      <a href="/PURP/public/index.php?action=home"
        class="btn-secondary">
        Volver a inicio
      </a>


      <a href="/PURP/public/index.php?action=denuncia_nueva"
        class="btn-primary">
        Nueva denuncia
      </a>
  </header>

  <section class="denuncias-list">

    <?php foreach ($denuncias as $d): ?>
      <article class="denuncia-item">

        <h2 class="denuncia-item-title">
          <?= htmlspecialchars($d['tipo_delito']) ?>
        </h2>

        <p class="denuncia-item-description">
          <?= nl2br(htmlspecialchars($d['descripcion_hechos'])) ?>
        </p>

        <span class="denuncia-item-meta">
          <?= htmlspecialchars($d['fecha_hechos']) ?> ·
          <?= htmlspecialchars($d['numero_placa']) ?>
        </span>

      </article>
    <?php endforeach; ?>

  </section>

</main>

<?php require __DIR__ . '/../layout/footer.php'; ?>