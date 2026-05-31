<?php
require_once __DIR__ . '/../layout/header_public.php';

// ENFOQUE SEGURIDAD: Eliminadas las bolsas de $_SESSION['errors'] y $_SESSION['old_input']
// para evitar el rastreo de datos en el cliente tras un fallo.

if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    $bgRegisterState = $flash['type'] === 'success' ?  'alert-success' : 'alert-danger';
};
?>

<script>
    window.APP_CONFIG = {
        categoriaProfesional: <?php echo json_encode(categoriaProfesional::jsonOptions()); ?>,
        estadoProfesional: <?php echo json_encode(estadoProfesional::jsonOptions()); ?>,
        tipoUsuario: <?php echo json_encode(tipoUsuario::jsonOptions()); ?>,
        flash: <?php echo isset($flash) ? json_encode($flash) : 'null'; ?>
    }; 
</script>

<?php if (isset($_SESSION['flash'])): ?>
    <?php
    $mensajes = is_array($flash['message']) ? $flash['message'] : [$flash['message']];
    ?>
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

<main class="form-container">
    <div class="form-card">
        <div class="form-brand">
            <h1 class="form-title"><?php echo __('title_new_user') ?? 'Registrar nuevo usuario'; ?></h1>
            <h2 class="form-subtitle">
                <?php echo __('header_title'); ?>
            </h2>
        </div>

        <form action="index.php?action=createUser" method="POST" class="form-layout">

            <div class="form-field">
                <label><?php echo __('label_nombre') ?? 'Nom'; ?></label>
                <input type="text" name="nombre" required placeholder="Ex. Joan">
            </div>

            <div class="form-field">
                <label><?php echo __('label_apellidos') ?? 'Cognoms'; ?></label>
                <input type="text" name="apellidos" required placeholder="Ex. García Pérez">
            </div>

            <div class="form-field">
                <label><?php echo __('label_dni') ?? 'DNI / NIE'; ?></label>
                <input type="text" name="dni" required placeholder="Ex. 12345678X">
            </div>

            <div class="form-field">
                <label><?php echo __('badge_number'); ?></label>
                <input type="text" name="numero_placa" required placeholder="<?php echo __('badge_placeholder'); ?>">
            </div>

            <div class="form-field">
                <label><?php echo __('password_label'); ?></label>
                <input type="password" name="user_password" required placeholder="••••••••">
            </div>

            <div class="form-field">
                <label><?php echo __('label_role') ?? 'Rol del sistema'; ?></label>
                <select name="tipo_usuario" required>
                    <?php foreach (tipoUsuario::jsonOptions() as $opcion): ?>
                        <option value="<?php echo $opcion['value']; ?>" <?php echo $opcion['value'] === 50 ? 'selected' : ''; ?>>
                            <?php echo $opcion['label']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-field">
                <label><?php echo __('label_category') ?? 'Categoria policial'; ?></label>
                <select name="categoria_profesional" required>
                    <?php foreach (categoriaProfesional::jsonOptions() as $opcion): ?>
                        <option value="<?php echo $opcion['value']; ?>" <?php echo $opcion['value'] === 10 ? 'selected' : ''; ?>>
                            <?php echo $opcion['label']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-field">
                <label><?php echo __('label_status') ?? 'Estat professional'; ?></label>
                <select name="estado_profesional" required>
                    <?php foreach (estadoProfesional::jsonOptions() as $opcion): ?>
                        <option value="<?php echo $opcion['value']; ?>" <?php echo $opcion['value'] === 10 ? 'selected' : ''; ?>>
                            <?php echo $opcion['label']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex items-center gap-4 pt-2">
                <a href="/index.php?action=home" class="btn-secondary flex-1">
                    <?php echo __('btn_back_home') ?? 'Volver a inicio'; ?>
                </a>

                <button type="submit" class="btn-primary flex-1">
                    <?php echo __('btn_register_user') ?? 'Registrar Agent'; ?>
                </button>
            </div>
        </form>
    </div>
</main>

<?php require_once __DIR__ . '/../layout/footer_public.php'; ?>