<?php require_once __DIR__ . '/../layout/header_public.php'; ?>

<script>
    window.APP_CONFIG = {
        categoriaProfesional: <?php echo json_encode(categoriaProfesional::jsonOptions()); ?>,
        estadoProfesional: <?php echo json_encode(estadoProfesional::jsonOptions()); ?>,
        tipoUsuario: <?php echo json_encode(tipoUsuario::jsonOptions()); ?>
    };
</script>

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
                <select name="id_categoria" required>
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

            <button type="submit" class="btn-primary w-full">
                <?php echo __('btn_register_user') ?? 'Registrar Agent'; ?>
            </button>
        </form>
    </div>
</main>

<?php require_once __DIR__ . '/../layout/footer_public.php'; ?>