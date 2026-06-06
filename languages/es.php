<?php
return [
    // System - Errors
    'error_404'         => 'Pagina no encontrada (Router 404)',

    // Header
    'header_title'       => 'PORTAL ÚNICO DE REGISTRO POLICIAL',
    'nav_home'           => 'Inicio',
    'nav_queries'        => 'Consultas',
    'nav_reports'        => 'Reportes',
    'nav_admin'          => 'Administración',
    'nav_logout'         => 'Cerrar Sesión',
    'guest'              => 'Invitado',

    // Login - Register
    'login_page_title'      => 'Acceso al sistema',
    'badge_number'          => 'Número de placa',
    'badge_placeholder'     => 'Ej. 12345',
    'dni_placheholder'      => 'Ej. 43010887W',
    'password_label'        => 'Contraseña',
    'btn_login'             => 'Entrar',
    'auth_fail'             => 'Usuario o contraseña incorrecta',
    'title_new_user'        => 'Registrar nuevo usuario',
    'label_nombre'          => 'Nombre',
    'label_apellidos'       => 'Apellidos',
    'label_dni'             => 'DNI / NIE',
    'label_role'            => 'Rol del sistema',
    'label_category'        => 'Categoría policial',
    'label_status'          => 'Estado profesional',
    'btn_register_user'     => 'Registrar Agente',
    'category_agent'        => 'Agente',
    'category_official'     => 'Oficial',
    'category_sergeant'     => 'Sargento',
    'category_subinspector' => 'Subinspector',
    'category_inspector'    => 'Inspector',
    'category_commissioner' => 'Comisario / Intendente',
    'role_super_admin'      => 'Superadministrador',
    'role_admin'            => 'Administrador',
    'role_supervisor'       => 'Supervisor',
    'role_agent'            => 'Agente',
    'role_inquiry'          => 'Consulta',
    'state'                 => 'Estado',
    'state_active'          => 'Activo',
    'state_inactive'        => 'Inactivo',
    'state_sick_leave'      => 'Baja médica',
    'state_duty_suspended'  => 'Suspendido de funciones',
    'state_sanctioned'      => 'Sancionado',
    'state_retired'         => 'Jubilado',
    'success_register'      => 'Usuario registrado con éxito.',
    'unsuccess_register'    => 'Error al registrar el usuario. Por favor, inténtelo de nuevo.',

    // User - Profile
    'title_user_profile'   => 'Perfil del Agente',
    'subtitle_user_profile' => 'Consulte sus datos de credencial y actualice su información de registro en el sistema.',
    'profile_avatar_help'  => 'Haga clic en el icono para cambiar la fotografía oficial',
    'btn_back_home'        => 'Volver a inicio',
    'btn_save_changes'     => 'Guardar Cambios',
    'success_update'       => 'Perfil actualizado correctamente.',
    'unsuccess_update'     => 'Error al actualizar el perfil. Por favor, inténtelo de nuevo.',

    // MFA
    'mfa_setup_title'       => 'Configurar Doble Factor (MFA)',
    'mfa_setup_subtitle'    => 'Escanee el código QR con su aplicación de autenticación (Aegis, Google Authenticator) para vincular su credencial policial.',
    'mfa_qr_alt'            => 'Código QR de Seguridad',
    'mfa_manual_text'       => '¿No puede escanearlo? Introduzca esta clave manualmente en su app:',
    'mfa_code_label'        => 'Código de Confirmación de 6 dígitos',
    'btn_mfa_activate'      => 'Activar y Confirmar Seguridad',
    'mfa_already_active'    => 'La autenticación de doble factor (MFA) ya está activa.',

    // Erros Messages
    'error_duplicate_badge' => 'El número de placa introducido ya está registrado en el sistema.',
    'error_duplicate_dni'   => 'El DNI/NIE introducido ya está registrado en el sistema.',
    'error_missing_id'      => 'Error: No se pudo identificar el usuario.',
    'error_system'          => 'Ha ocurrido un error inesperado en el sistema.',

    // Landing - Bienvenida
    'landing_welcome'    => 'Bienvenido al Portal Único de Registro Policial',
    'landing_subtitle'   => 'Centraliza y gestiona las denuncias de manera eficiente y segura.',
    'btn_new_denuncia'   => 'Registrar Nueva Denuncia',
    'btn_view_denuncias' => 'Consultar Denuncias',

    // Landing - Tarjetas de Estadísticas
    'card_registered'    => 'Denuncias Registradas Hoy',
    'card_in_progress'   => 'Denuncias en Proceso',
    'label_today'        => 'Hoy',
    'label_pending'      => 'En Trámite',

    // Landing - Alertas
    'card_alerts'        => 'Alertas Recientes',
    'alert_system'       => 'Sistema: Actualización programada a las 22:00',
    'alert_warning'      => 'Aviso: Informe de robo en el Barrio Centro',
    'link_view_more'     => 'Ver más >',

    // Landing - Buscador
    'card_search'        => 'Búsqueda Rápida',
    'label_case_number'  => 'Buscar por Nº de Caso',
    'placeholder_case'   => 'Ingrese número de caso...',
    'btn_search'         => 'Buscar',

    // Landing - Gráfico
    'card_stats'         => 'Estadísticas Recientes',
    'label_month_total'  => 'Total Mes:',
    'label_resolved'     => 'Resueltos:',

    // Landing - Guides & Documents
    'guides_docs'        => 'Guías y Documentos',
    'doc_user_manual'    => 'Manual de Usuario',
    'doc_operating_procedures' => 'Procedimientos Operativos',

    // Footer
    'rights_reserved' => 'Todos los derechos reservados.',
    'app_version'     => 'Versión del Sistema:',
    'support'         => 'Soporte Técnico',
    'privacy'         => 'Política de Privacidad',
    'manual'          => 'Manual de la Aplicación',

    // Landing - Latest News
    'latest_news'        => 'Últimas Noticias',
    'news_protocol'      => 'Nuevo protocolo de actuación aprobado',
    'news_training'      => 'Capacitación sobre PURP en curso',

    // Denuncias - Nueva Denuncia
    'title_new_denuncia'       => 'Nueva denuncia',
    'subtitle_new_denuncia'    => 'Complete los datos requeridos para registrar una nueva denuncia',
    'label_crime_type'         => 'Tipo de delito',
    'placeholder_crime_type'   => 'Ej. Robo con fuerza',
    'label_description'        => 'Descripción de los hechos',
    'placeholder_description'  => 'Describa detalladamente los hechos ocurridos',
    'label_date'               => 'Fecha del suceso',
    'btn_back_home'            => 'Volver a inicio',
    'btn_register_denuncia'    => 'Registrar denuncia',

    // Denuncia - Enums
    'status_initial'        => 'En Instancia Inicial',
    'status_in_progress'    => 'En Curso',
    'status_judicialized'   => 'Judicializado',
    'status_archived_prov'  => 'Archivado Provisional',
    'status_archived_def'   => 'Archivado Definitivo',
    'status_resolved'       => 'Resuelto',

    // User - Enums
    'role_super_admin'      => 'Super Administrador',
    'role_admin'            => 'Administrador',
    'role_supervisor'       => 'Supervisor Policial',
    'role_agent'            => 'Agente Operador',
    'role_inquiry'          => 'Personal de Consulta',

];
