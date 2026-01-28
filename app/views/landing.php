<?php require __DIR__ . '/layout/header.php'; ?>

<main class="dashboard">
  <h1 class="dashboard-title">
    Portal Único de Registro Policial
  </h1>

  <p class="dashboard-subtitle">
    Bienvenido, elige una opción para continuar.
  </p>

  <div class="dashboard-actions">
    <a href="index.php?action=denuncias" class="btn-primary">
      Ver denuncias
    </a>

    <a href="index.php?action=denuncia_nueva" class="btn-secondary">
      Nueva denuncia
    </a>
  </div>
</main>

<?php require __DIR__ . '/layout/footer.php'; ?>