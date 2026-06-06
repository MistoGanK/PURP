<?php
return [
    // System - Errors
    'error_404'         => 'Páxina non atopada (Roteador 404)',

    // Header
    'header_title'       => 'PORTAL ÚNICO DE REXISTRO POLICIAL',
    'nav_home'           => 'Inicio',
    'nav_queries'        => 'Consultas',
    'nav_reports'        => 'Informes',
    'nav_admin'          => 'Administración',
    'nav_logout'         => 'Pechar Sesión',
    'guest'              => 'Convidado',

    // Login - Register
    'login_page_title'      => 'Acceso ao sistema',
    'badge_number'          => 'Número de placa',
    'badge_placeholder'     => 'Ex. 12345',
    'password_label'        => 'Contrasinal',
    'btn_login'             => 'Entrar',
    'auth_fail'             => 'Usuario ou contrasinal incorrectos',
    'title_new_user'        => 'Rexistrar novo usuario',
    'label_nombre'          => 'Nome',
    'label_apellidos'       => 'Apelidos',
    'label_dni'             => 'DNI / NIE',
    'label_role'            => 'Rol do sistema',
    'label_category'        => 'Categoría policial',
    'label_status'          => 'Estado profesional',
    'btn_register_user'     => 'Rexistrar Axente',
    'category_agent'        => 'Axente',
    'category_official'     => 'Oficial',
    'category_sergeant'     => 'Sarxento',
    'category_subinspector' => 'Subinspector',
    'category_inspector'    => 'Inspector',
    'category_commissioner' => 'Comisario / Intendente',
    'label_role'            => 'Rol do sistema',
    'role_super_admin'      => 'Superadministrador',
    'role_admin'            => 'Administrador',
    'role_supervisor'       => 'Supervisor',
    'role_agent'            => 'Axente',
    'role_inquiry'          => 'Consulta',
    'state_active'          => 'Activo',
    'state_sick_leave'      => 'Baixa médica',
    'state_duty_suspended'  => 'Suspendido de funcións',
    'state_sanctioned'      => 'Sancionado',
    'state_retired'         => 'Xubilado',
    'success_register'      => 'Usuario rexistrado con éxito.',
    'unsuccess_register'    => 'Erro ao rexistrar o usuario. Por favor, ténteo de novo.',
    'state'                 => 'Estado',
    'state_active'          => 'Activo',
    'state_inactive'        => 'Inactivo',

    // User - Profile
    'title_user_profile'    => 'Perfil do Axente',
    'subtitle_user_profile' => 'Consulte os seus datos de credencial e actualice a súa información de rexistro no sistema.',
    'profile_avatar_help'   => 'Prema na icona para cambiar a fotografía oficial',
    'btn_save_changes'      => 'Gardar cambios',
    'success_update'        => 'Perfil actualizado correctamente.',
    'unsuccess_update'      => 'Erro ao actualizar o perfil. Por favor, ténteo de novo.',

    // MFA 
    'mfa_setup_title'    => 'Configurar Dobre Factor (MFA)',
    'mfa_setup_subtitle' => 'Escanee o código QR coa súa aplicación de autenticación (Aegis, Google Authenticator) para vincular a súa credencial policial.',
    'mfa_qr_alt'         => 'Código QR de Seguridade',
    'mfa_manual_text'    => 'Non pode escanealo? Introduza esta clave manualmente na súa aplicación:',
    'mfa_code_label'     => 'Código de Confirmación de 6 díxitos',
    'btn_mfa_activate'   => 'Activar e Confirmar Seguridade',
    'mfa_already_active' => 'A autenticación de dobre factor (MFA) xa está activada.',

    // Errors Messages
    'error_duplicate_badge' => 'O número de placa introducido xa está rexistrado no sistema.',
    'error_duplicate_dni'   => 'O DNI/NIE introducido xa está rexistrado no sistema.',
    'error_missing_id'      => 'Erro: Non se puido identificar o usuario.',
    'error_system'          => 'Ocorreu un erro inesperado no sistema.',


    // Landing - Bienvenida
    'landing_welcome'    => 'Benvido ao Portal Único de Rexistro Policial',
    'landing_subtitle'   => 'Centraliza e xestiona as denuncias de xeito eficiente e seguro.',
    'btn_new_denuncia'   => 'Rexistrar Nova Denuncia',
    'btn_view_denuncias' => 'Consultar Denuncias',

    // Landing - Tarjetas de Estadísticas
    'card_registered'    => 'Denuncias Rexistradas Hoxe',
    'card_in_progress'   => 'Denuncias en Tramitación',
    'label_today'        => 'Hoxe',
    'label_pending'      => 'En Trámite',

    // Landing - Alertas
    'card_alerts'        => 'Alertas Recentes',
    'alert_system'       => 'Sistema: Actualización programada ás 22:00',
    'alert_warning'      => 'Aviso: Informe de roubo no Barrio Centro',
    'link_view_more'     => 'Ver máis >',

    // Landing - Buscador
    'card_search'        => 'Busca Rápida',
    'label_case_number'  => 'Buscar por Nº de Caso',
    'placeholder_case'   => 'Introduza o número de caso...',
    'btn_search'         => 'Buscar',

    // Landing - Gráfico
    'card_stats'         => 'Estatísticas Recentes',
    'label_month_total'  => 'Total Mes:',
    'label_resolved'     => 'Resolto:',

    // Landing - Guides & Documents
    'doc_user_manual'    => 'Manual de Usuario',
    'doc_operating_procedures' => 'Procedementos Operativos',

    // Landing - Latest News
    'latest_news'        => 'Últimas Noticias',
    'news_protocol'      => 'Novo protocolo de actuación aprobado',
    'news_training'      => 'Capacitación sobre PURP en curso',

    // Footer
    'rights_reserved'    => 'Todos los dereitos reservados.',
    'app_version'        => 'Versión do Sistema:',
    'support'            => 'Soporte Técnico',
    'privacy'            => 'Política de Privacidade',
    'manual'             => 'Manual da Aplicación',

    // Denuncias - Nueva Denuncia
    'title_new_denuncia'       => 'Nova denuncia',
    'subtitle_new_denuncia'    => 'Complete os datos requiridos para rexistrar uma nova denuncia',
    'label_crime_type'         => 'Tipo de delito',
    'placeholder_crime_type'   => 'Ex. Roubo con forza',
    'label_description'        => 'Descrición dos feitos',
    'placeholder_description'  => 'Describa detalladamente os feitos ocorridos',
    'label_date'               => 'Data do suceso',
    'btn_back_home'            => 'Volver ao inicio',
    'btn_register_denuncia'    => 'Rexistrar denuncia',

    // Denuncia - Enums
    'status_initial'        => 'En Instancia Inicial',
    'status_in_progress'    => 'En Curso',
    'status_judicialized'   => 'Xudicializado',
    'status_archived_prov'  => 'Arquivado Provisional',
    'status_archived_def'   => 'Arquivado Definitivo',
    'status_resolved'       => 'Resolto',

    // User - Enums
    'role_super_admin'      => 'Superadministrador',
    'role_admin'            => 'Administrador',
    'role_supervisor'       => 'Supervisor Policial',
    'role_agent'            => 'Axente Operador',
    'role_inquiry'          => 'Persoal de Consulta',
];
