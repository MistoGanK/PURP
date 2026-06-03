<?php
return [
    // System - Errors 
    'error_404'         => 'Pàgina no trobada (Router 404)',

    // Header
    'header_title'       => 'PORTAL ÚNIC DE REGISTRE POLICIAL',
    'nav_home'           => 'Inici',
    'nav_queries'        => 'Consultes',
    'nav_reports'        => 'Informes',
    'nav_admin'          => 'Administració',
    'nav_logout'         => 'Tancar Sessió',
    'guest'              => 'Convidat',

    // Login - Register
    'login_page_title'      => 'Accés al sistema',
    'badge_number'          => 'Número de placa',
    'badge_placeholder'     => 'Ex. 12345',
    'password_label'        => 'Contrasenya',
    'btn_login'             => 'Entrar',
    'auth_fail'             => 'Usuari o contrasenya incorrecta',
    'title_new_user'        => 'Registrar nou usuari',
    'label_nombre'          => 'Nom',
    'label_apellidos'       => 'Cognoms',
    'label_dni'             => 'DNI / NIE',
    'label_role'            => 'Rol del sistema',
    'label_category'        => 'Categoria policial',
    'label_status'          => 'Estat professional',
    'btn_register_user'     => 'Registrar Agent',
    'category_agent'        => 'Agent',
    'category_official'     => 'Oficial',
    'category_sergeant'     => 'Sergent',
    'category_subinspector' => 'Subinspector',
    'category_inspector'    => 'Inspector',
    'category_commissioner' => 'Comissari / Intendent',
    'label_role'            => 'Rol del sistema',
    'role_super_admin'      => 'Superadministrador',
    'role_admin'            => 'Administrador',
    'role_supervisor'       => 'Supervisor',
    'role_agent'            => 'Agent',
    'role_inquiry'          => 'Consulta',
    'state_active'          => 'Actiu',
    'state_sick_leave'      => 'Baixa mèdica',
    'state_duty_suspended'  => 'Suspès de funcions',
    'state_sanctioned'      => 'Sancionat',
    'state_retired'         => 'Jubilat',
    'success_register'      => 'Usuari registrat amb èxit.',
    'unsuccess_register'    => "Error en registrar l'usuari. Per favor, intenteu-ho de nou.",

    // MFA
    'mfa_setup_title'       => 'Configurar Doble Factor (MFA)',
    'mfa_setup_subtitle'    => 'Escanegeu el codi QR amb la vostra aplicació d\'autenticació (Aegis, Google Authenticator) per a vincular la vostra credencial policial.',
    'mfa_qr_alt'            => 'Codi QR de Seguretat',
    'mfa_manual_text'       => 'No el podeu escanejar? Introduïu esta clau manualment en la vostra aplicació:',
    'mfa_code_label'        => 'Codi de Confirmació de 6 dígits',
    'btn_mfa_activate'      => 'Activar i Confirmar Seguretat',

    // Landing - Bienvenida
    'landing_welcome'    => 'Benvingut al Portal Únic de Registre Policial',
    'landing_subtitle'   => 'Centralitza i gestiona les denúncies de manera eficient i segura.',
    'btn_new_denuncia'   => 'Registrar Nova Denúncia',
    'btn_view_denuncias' => 'Consultar Denúncies',

    // Landing - Tarjetas de Estadísticas
    'card_registered'    => 'Denúncies Registrades Hui',
    'card_in_progress'   => 'Denúncies en Procés',
    'label_today'        => 'Hui',
    'label_pending'      => 'En Tràmit',

    // Landing - Alertas
    'card_alerts'        => 'Alertes Recents',
    'alert_system'       => 'Sistema: Actualització programada a les 22:00',
    'alert_warning'      => 'Avís: Informe de robatori al Barri Centre',
    'link_view_more'     => 'Vore més >',

    // Landing - Buscador
    'card_search'        => 'Cerca Ràpida',
    'label_case_number'  => 'Cercar per Nº de Cas',
    'placeholder_case'   => 'Introduïsca número de cas...',
    'btn_search'         => 'Cercar',

    // Landing - Gráfico
    'card_stats'         => 'Estadístiques Recents',
    'label_month_total'  => 'Total Mes:',
    'label_resolved'     => 'Resolts:',

    // Landing - Guides & Documents
    'guides_docs'        => 'Guies i Documents',
    'doc_user_manual'    => 'Manual d\'Usuari',
    'doc_operating_procedures' => 'Procediments Operatius',

    // Landing - Latest News
    'latest_news'        => 'Últimes Notícies',
    'news_protocol'      => 'Nou protocol d\'actuació aprovat',
    'news_training'      => 'Capacitació sobre PURP en curs',

    // Footer
    'rights_reserved'    => 'Tots els drets reservats.',
    'app_version'        => 'Versió del Sistema:',
    'support'            => 'Suport Tècnic',
    'privacy'            => 'Política de Privacitat',
    'manual'             => 'Manual de l\'Aplicació',

    // Denuncias - Nueva Denuncia
    'title_new_denuncia'       => 'Nova denúncia',
    'subtitle_new_denuncia'    => 'Ompliu les dades requerides per a registrar una nova denúncia',
    'label_crime_type'         => 'Tipus de delicte',
    'placeholder_crime_type'   => 'Ex. Robatori amb força',
    'label_description'        => 'Descripció dels fets',
    'placeholder_description'  => 'Descriviu detalladament els fets ocorreguts',
    'label_date'               => 'Data del succés',
    'btn_back_home'            => 'Tornar a l\'inici',
    'btn_register_denuncia'    => 'Registrar denúncia',

    // Denuncia - Enums
    'status_initial'        => 'En Instància Inicial',
    'status_in_progress'    => 'En Curs',
    'status_judicialized'   => 'Judicialitzat',
    'status_archived_prov'  => 'Arxivat Provisional',
    'status_archived_def'   => 'Arxivat Definitiu',
    'status_resolved'       => 'Resolt',

    // User - Enums
    'role_super_admin'      => 'Superadministrador',
    'role_admin'            => 'Administrador',
    'role_supervisor'       => 'Supervisor Policial',
    'role_agent'            => 'Agent Operador',
    'role_inquiry'          => 'Personal de Consulta',
];
