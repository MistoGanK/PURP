<?php require __DIR__ . '/../layout/header.php'; ?>
<div class="login-wrapper">
  <div class="login-card">

    <h1 class="login-title">Acceso al sistema</h1>
    <p class="login-subtitle">Portal Único de Registro Policial</p>

    <form method="POST" action="/PURP/public/index.php?action=do_login">

      <div class="form-group">
        <label>Número de placa</label>
        <input type="text" name="numero_placa" required>
      </div>

      <div class="form-group">
        <label>Contraseña</label>
        <input type="password" name="password" required>
      </div>

      <button type="submit" class="btn-primary">
        Entrar
      </button>

    </form>
  </div>
</div>
<?php require __DIR__ . '/../layout/footer.php'; ?>
