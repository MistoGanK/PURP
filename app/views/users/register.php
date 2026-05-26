<?php require_once __DIR__ . '/../layout/header_public.php'; ?>
<main>
    <div class="form-card">
        <div class="form-brand">
            <h1 class="form-title"><?php echo __('title_new_user' ?? 'Registrar nou usuari'); ?></h1>
            <h2 class="form-subtitle">
                <?php echo __('header_title'); ?>
            </h2>
        </div>

        <form action="index.php?action=create_user" method="POST" class="form-layout">

            <div class="form-field">
                <label><?php echo __('label_nombre' ?? 'Nom'); ?></label>
                <input type="text" name="nombre" required placeholder="Ex. Joan">
            </div>

            <div class="form-field">
                <label><?php echo __('label_apellidos' ?? 'Cognoms'); ?></label>
                <input type="text" name="apellidos" required placeholder="Ex. García Pérez">
            </div>

            <div class="form-field">
                <label><?php echo __('label_dni' ?? 'DNI / NIE'); ?></label>
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
                <label><?php echo __('label_role' ?? 'Rol del sistema'); ?></label>
                <select name="tipo_usuario" required>
                    <option value="50" selected><?php echo __('role_inquiry'); ?></option>
                    <option value="40"><?php echo __('role_agent'); ?></option>
                    <option value="30"><?php echo __('role_supervisor'); ?></option>
                    <option value="20"><?php echo __('role_admin'); ?></option>
                    <option value="10"><?php echo __('role_super_admin'); ?></option>
                </select>
            </div>

            <div class="form-field">
                <label><?php echo __('label_category' ?? 'Categoria policial (ID)'); ?></label>
                <input type="number" name="id_categoria" value="10" required placeholder="Ex. 10">
            </div>

            <div class="form-field">
                <label><?php echo __('label_status' ?? 'Estat professional (ID)'); ?></label>
                <input type="number" name="estado_profesional" value="10" required placeholder="Ex. 10">
            </div>

            <button type="submit" class="btn-primary w-full">
                <?php echo __('btn_register_user' ?? 'Registrar Agent'); ?>
            </button>
        </form>
    </div>
</main>

<?php require_once __DIR__ . '/../layout/footer_public.php'; ?>