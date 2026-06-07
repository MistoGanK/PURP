<?php
require_once __DIR__ . '/../layout/header_public.php';

$currentRole = (int)($_SESSION['user']['agent_user_role'] ?? 0);
$isAdmin     = ($currentRole <= 20);

if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    $bgRegisterState = 'alert-danger'; // default
    if ($flash['type'] === 'success') $bgRegisterState = 'alert-success';
    if ($flash['type'] === 'info')    $bgRegisterState = 'alert-info';
}
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

<main class="form-container">
    <div class="form-card max-w-profile">
        <div class="form-brand">
            <h1 class="form-title"><?php echo __('title_user_profile') ?? 'Perfil del Agente'; ?></h1>
            <h2 class="form-subtitle">
                <?php echo __('subtitle_user_profile'); ?>
            </h2>
        </div>

        <form action="index.php?action=update_profile" method="POST" enctype="multipart/form-data" class="form-layout">

            <input type="hidden" name="agent_id" value="<?php echo htmlspecialchars($usuarioActual['id_usuario'] ?? ''); ?>">

            <div class="profile-avatar-section">
                <div class="profile-avatar-wrapper">
                    <?php
                    $avatarSrc = (isset($usuarioActual['avatar_img_src']) && !empty($usuarioActual['avatar_img_src']))
                        ? $usuarioActual['avatar_img_src']
                        : 'assets/images/users/avatar_src/default-avatar.png';
                    ?>
                    <img id="avatar-preview" src="<?php echo $avatarSrc; ?>" alt="Fotografía del Agente" class="profile-avatar-img">

                    <label for="avatar-input" class="profile-avatar-upload-btn">
                        <svg class="w-4 h-4 text-(--characol)" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                        </svg>
                        <input type="file" id="avatar-input" name="avatar_file" accept="image/*" class="hidden">
                    </label>
                </div>
                <p class="profile-avatar-help"><?php echo __('profile_avatar_help') ?></p>
            </div>

            <div class="profile-fields-grid">
                <div class="form-field">
                    <label><?php echo __('label_nombre') ?? 'Nombre'; ?></label>
                    <input type="text" name="agent_name" value="<?php echo htmlspecialchars($usuarioActual['nombre'] ?? ''); ?>" required placeholder="Ex. Joan" <?php echo !$isAdmin ? 'disabled' : ''; ?>>
                </div>

                <div class="form-field">
                    <label><?php echo __('label_apellidos') ?? 'Apellidos'; ?></label>
                    <input type="text" name="agent_forenames" value="<?php echo htmlspecialchars($usuarioActual['apellidos'] ?? ''); ?>" required placeholder="Ex. García Pérez" <?php echo !$isAdmin ? 'disabled' : ''; ?>>
                </div>

                <div class="form-field">
                    <label><?php echo __('label_dni') ?? 'DNI / NIE'; ?></label>
                    <input type="text" name="agent_dni" value="<?php echo htmlspecialchars($usuarioActual['dni'] ?? ''); ?>" required placeholder="Ex. 12345678X" <?php echo !$isAdmin ? 'disabled' : ''; ?>>
                </div>

                <div class="form-field">
                    <label><?php echo __('badge_number') ?? 'Número de placa'; ?></label>
                    <input type="text" name="agent_plate" value="<?php echo htmlspecialchars($usuarioActual['numero_placa'] ?? ''); ?>" required placeholder="<?php echo __('badge_placeholder'); ?>" <?php echo !$isAdmin ? 'disabled' : ''; ?>>
                </div>

                <div class="form-field">
                    <label><?php echo __('label_role') ?? 'Rol del sistema'; ?></label>
                    <select name="agent_user_role" required <?php echo !$isAdmin ? 'disabled' : ''; ?>>
                        <?php foreach (tipoUsuario::jsonOptions() as $opcion): ?>
                            <option value="<?php echo $opcion['value']; ?>" <?php echo (isset($usuarioActual['tipo_usuario']) && $usuarioActual['tipo_usuario'] == $opcion['value']) ? 'selected' : ''; ?>>
                                <?php echo $opcion['label']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-field">
                    <label><?php echo __('label_category') ?? 'Categoría policial'; ?></label>
                    <select name="agent_category_role" required <?php echo !$isAdmin ? 'disabled' : ''; ?>>
                        <?php foreach (categoriaProfesional::jsonOptions() as $opcion): ?>
                            <option value="<?php echo $opcion['value']; ?>" <?php echo (isset($usuarioActual['categoria_profesional']) && $usuarioActual['categoria_profesional'] == $opcion['value']) ? 'selected' : ''; ?>>
                                <?php echo $opcion['label']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-field md:col-span-2">
                    <label><?php echo __('label_status') ?? 'Estado professional'; ?></label>
                    <select name="agent_profesional_state" required <?php echo !$isAdmin ? 'disabled' : ''; ?>>
                        <?php foreach (estadoProfesional::jsonOptions() as $opcion): ?>
                            <option value="<?php echo $opcion['value']; ?>" <?php echo (isset($usuarioActual['estado_profesional']) && $usuarioActual['estado_profesional'] == $opcion['value']) ? 'selected' : ''; ?>>
                                <?php echo $opcion['label']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-field">
                <label><?php echo __('state'); ?></label>
                <select name="agent_active" required <?php echo !$isAdmin ? 'disabled' : ''; ?>>
                    <option value="1" <?php echo (isset($usuarioActual['activo']) && $usuarioActual['activo'] == '1') ? 'selected' : ''; ?>>
                        <?php echo __('state_active'); ?>
                    </option>
                    <option value="0" <?php echo (isset($usuarioActual['activo']) && $usuarioActual['activo'] == '0') ? 'selected' : ''; ?>>
                        <?php echo __('state_inactive'); ?>
                    </option>
                </select>
            </div>

            <div class="profile-form-actions">
                <a href="/index.php?action=home" class="btn-secondary flex-1">
                    <?php echo __('btn_back_home'); ?>
                </a>

                <button type="submit" class="btn-primary flex-1">
                    <?php echo __('btn_save_changes'); ?>
                </button>
            </div>
        </form>
    </div>
</main>

<script>
    document.getElementById('avatar-input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatar-preview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

<?php require_once __DIR__ . '/../layout/footer_public.php'; ?>