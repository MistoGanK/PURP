<?php
return [
    // System - Errors
    'error_404'         => 'Páxina non atopada (Router 404)',

    // Header
    'header_title'       => 'PORTAL ÚNICU DE REXISTRU POLICIAL',
    'nav_home'           => 'Inicio',
    'nav_queries'        => 'Consultes',
    'nav_reports'        => 'Informes',
    'nav_admin'          => 'Alministración',
    'nav_logout'         => 'Zarrar Sesión',
    'guest'              => 'Invitáu',

    // Login - Register
    'login_page_title'      => 'Accesu al sistema',
    'badge_number'          => 'Númberu de placa',
    'badge_placeholder'     => 'Ex. 12345',
    'password_label'        => 'Contraseña',
    'btn_login'             => 'Entrar',
    'auth_fail'             => 'Usuariu o contraseña incorreuta',
    'title_new_user'        => 'Rexistrar nuevu usuariu',
    'label_nombre'          => 'Nome',
    'label_apellidos'       => 'Apellíos',
    'label_dni'             => 'DNI / NIE',
    'label_role'            => 'Rol del sistema',
    'label_category'        => 'Categoría policial',
    'label_status'          => 'Estáu profesional',
    'btn_register_user'     => 'Rexistrar Axente',
    'category_agent'        => 'Axente',
    'category_official'     => 'Oficial',
    'category_sergeant'     => 'Sarxentu',
    'category_subinspector' => 'Subinspector',
    'category_inspector'    => 'Inspector',
    'category_commissioner' => 'Comisariu / Intendente',
    'role_super_admin'      => 'Superalministrador',
    'role_admin'            => 'Alministrador',
    'role_supervisor'       => 'Supervisor',
    'role_agent'            => 'Axente',
    'role_inquiry'          => 'Consulta',
    'state_active'          => 'Activu',
    'state_sick_leave'      => 'Baxa médica',
    'state_duty_suspended'  => 'Suspendíu de funciones',
    'state_sanctioned'      => 'Sancionáu',
    'state_retired'         => 'Xubiláu',
    'success_register'      => 'Usuariu rexistráu con ésitu.',
    'unsuccess_register'    => 'Error al rexistrar l\'usuariu. Por favor, inténtelo de nuevo.',
    'state'                 => 'Estáu',
    'state_active'          => 'Activu',
    'state_inactive'        => 'Inactivu',

    // User - Profile
    'title_user_profile'    => 'Perfil del Axente',
    'subtitle_user_profile' => 'Consulte los sos datos de credencial y anueve la so información de rexistru nel sistema.',
    'profile_avatar_help'   => 'Calque nel iconu pa camudar la fotografía oficial',
    'btn_save_changes'      => 'Guardar cambeos',
    'success_update'        => 'Perfil anováu correutamente.',
    'unsuccess_update'      => 'Error al anovar el perfil. Por favor, inténtalo de nuevo.',

    // MFA
    'mfa_setup_title'       => 'Configurar Doble Factor (MFA)',
    'mfa_setup_subtitle'    => 'Escanee el códigu QR cola so aplicación d\'autenticación (Aegis, Google Authenticator) para venceyar la so credencial policial.',
    'mfa_qr_alt'            => 'Códigu QR de Seguranza',
    'mfa_manual_text'       => '¿Nun pue escanealu? Introduza esta clave a mano na so aplicación:',
    'mfa_code_label'        => 'Códigu de Confirmación de 6 díxitos',
    'btn_mfa_activate'      => 'Activar y Confirmar Seguranza',
    'mfa_already_active'    => 'L\'autenticación de doble factor (MFA) yá ta activada.',
    'security_alert'        => 'Seguridá vulnerable',
    '2fa_warning_text'      => 'Non tienes activáu el Segundu Factor d’Autenticación (2FA). Protexe la to cuenta policial dende’l to perfil.',
    'activate_now'          => 'Activar agora →',

    // Erros Messages
    'error_duplicate_badge' => 'El númberu de placa introducíu yá ta rexistráu nel sistema.',
    'error_duplicate_dni'   => 'El DNI/NIE introducíu yá ta rexistráu nel sistema.',
    'error_missing_id'      => 'Error: Nun se pudo identificar al usuariu.',
    'error_system'          => 'Hebo un error inesperáu nel sistema.',

    // Landing - Bienvenida
    'landing_welcome'    => 'Bienveníu al Portal Únicu de Rexistru Policial',
    'landing_subtitle'   => 'Centraliza y xestiona les denuncies de manera eficiente y segura.',
    'btn_new_denuncia'   => 'Rexistrar Nueva Denuncia',
    'btn_view_denuncias' => 'Consultar Denuncies',

    // Landing - Tarjetas de Estadísticas
    'card_registered'    => 'Denuncies Rexistraes Güei',
    'card_in_progress'   => 'Denuncies en Procesu',
    'label_today'        => 'Güei',
    'label_pending'      => 'En Trámite',

    // Landing - Alertas
    'card_alerts'        => 'Alertes Recientes',
    'alert_system'       => 'Sistema: Actualización programada a les 22:00',
    'alert_warning'      => 'Avisu: Informe de robu nel Barriu Centru',
    'link_view_more'     => 'Ver más >',

    // Landing - Buscador
    'card_search'        => 'Sondeu Rápidu',
    'label_case_number'  => 'Buscar por Nº de Casu',
    'placeholder_case'   => 'Introduza númberu de casu...',
    'btn_search'         => 'Buscar',

    // Landing - Gráfico
    'card_stats'         => 'Estadístiques Recientes',
    'label_month_total'  => 'Total Mes:',
    'label_resolved'     => 'Resueltos:',

    // Landing - Guides & Documents
    'guides_docs'        => 'Guíes y Documentos',
    'doc_user_manual'    => 'Manual d\'Usuariu',
    'doc_operating_procedures' => 'Procedimientos Operativos',

    // Footer
    'rights_reserved' => 'Todos los drechos reservaos.',
    'app_version'     => 'Versión del Sistema:',
    'support'         => 'Soporti Téunicu',
    'privacy'         => 'Política de Privacidá',
    'manual'          => 'Manual de l\'Aplicación',

    // Landing - Latest News
    'latest_news'        => 'Últimes Noticies',
    'news_protocol'      => 'Nuevu protocolu d\'actuación aprobáu',
    'news_training'      => 'Capacitación sobre PURP en cursu',

    // Denuncias - Nueva Denuncia
    'title_new_denuncia'       => 'Nueva denuncia',
    'subtitle_new_denuncia'    => 'Complete los datos requeríos para rexistrar una nueva denuncia',
    'label_crime_type'         => 'Tipu de delitu',
    'placeholder_crime_type'   => 'Ex. Robu con fuercia',
    'label_description'        => 'Descripción de los fechos',
    'placeholder_description'  => 'Describa detalladamente los fechos ocurridos',
    'label_date'               => 'Data del sucesu',
    'btn_back_home'            => 'Volver al entamu',
    'btn_register_denuncia'    => 'Rexistrar denuncia',

    // Denuncia - Enums
    'status_initial'        => 'En Fastaya Inicial',
    'status_in_progress'    => 'En Cursu',
    'status_judicialized'   => 'Xudicializáu',
    'status_archived_prov'  => 'Archiváu Provisional',
    'status_archived_def'   => 'Archiváu Definitivu',
    'status_resolved'       => 'Resueltu',

    // User - Enums
    'role_super_admin'      => 'Super Alministrador',
    'role_admin'            => 'Alministrador',
    'role_supervisor'       => 'Supervisor Policial',
    'role_agent'            => 'Axente Operador',
    'role_inquiry'          => 'Personal de Consulta',
];
