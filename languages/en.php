<?php
return [
    // System - Errors
    'error_404'         => 'Page not found (Router 404)',

    // Header
    'header_title'       => 'UNIQUE POLICE REGISTRY PORTAL',
    'nav_home'           => 'Home',
    'nav_queries'        => 'Queries',
    'nav_reports'        => 'Reports',
    'nav_admin'          => 'Administration',
    'nav_logout'         => 'Log Out',
    'guest'              => 'Guest',

    // Login
    'login_page_title'      => 'Accès au système',
    'badge_number'          => 'Badge number',
    'badge_placeholder'     => 'E.g. 12345',
    'password_label'        => 'Password',
    'btn_login'             => 'Login',
    'auth_fail'             => 'Incorrect username or password',
    'title_new_user'        => 'Register new user',
    'label_nombre'          => 'First name',
    'label_apellidos'       => 'Last name',
    'label_dni'             => 'DNI / NIE',
    'label_role'            => 'System role',
    'label_category'        => 'Police category',
    'label_status'          => 'Professional status',
    'btn_register_user'     => 'Register Agent',
    'category_agent'        => 'Officer / Agent',
    'category_official'     => 'Official',
    'category_sergeant'     => 'Sergeant',
    'category_subinspector' => 'Sub-inspector',
    'category_inspector'    => 'Inspector',
    'category_commissioner' => 'Commissioner / Superintendent',
    'label_role'            => 'System role',
    'role_super_admin'      => 'Super admin',
    'role_admin'            => 'Administrator',
    'role_supervisor'       => 'Supervisor',
    'role_agent'            => 'Agent',
    'role_inquiry'          => 'Inquiry',
    'state_active'          => 'Active',
    'state_sick_leave'      => 'Sick leave',
    'state_duty_suspended'  => 'Suspended from duty',
    'state_sanctioned'      => 'Sanctioned',
    'state_retired'         => 'Retired',
    'success_register'      => 'User registered successfully.',
    'unsuccess_register'    => 'Error registering the user. Please try again.',
    'state'                 => 'Status',
    'state_active'          => 'Active',
    'state_inactive'        => 'Inactive',

    // User - Profile
    'title_user_profile'    => 'Agent Profile',
    'subtitle_user_profile' => 'View your credential data and update your registration information in the system.',
    'profile_avatar_help'   => 'Click on the icon to change the official photograph',
    'btn_save_changes'      => 'Save Changes',
    'success_update'        => 'Profile updated successfully.',
    'unsuccess_update'      => 'Error updating profile. Please try again.',

    // MFA
    'mfa_setup_title'       => 'Configure Multi-Factor Authentication (MFA)',
    'mfa_setup_subtitle'    => 'Scan the QR code with your authenticator app (Aegis, Google Authenticator) to link your police credential.',
    'mfa_qr_alt'            => 'Security QR Code',
    'mfa_manual_text'       => 'Can\'t scan it? Enter this key manually into your app:',
    'mfa_code_label'        => '6-digit Confirmation Code',
    'btn_mfa_activate'      => 'Activate and Confirm Security',
    'mfa_already_active'    => 'Multi-factor authentication (MFA) is already enabled.',

    // Erros Messages
    'error_duplicate_badge' => 'The entered badge number is already registered in the system.',
    'error_duplicate_dni'   => 'The entered DNI/NIE is already registered in the system.',
    'error_missing_id'      => 'Error: User ID could not be identified.',
    'error_system'          => 'An unexpected system error occurred.',



    // Landing - Bienvenida
    'landing_welcome'    => 'Welcome to the Unique Police Registry Portal',
    'landing_subtitle'   => 'Centralize and manage complaints efficiently and securely.',
    'btn_new_denuncia'   => 'Register New Complaint',
    'btn_view_denuncias' => 'Consult Complaints',

    // Landing - Tarjetas de Estadísticas
    'card_registered'    => 'Complaints Registered Today',
    'card_in_progress'   => 'Complaints in Progress',
    'label_today'        => 'Today',
    'label_pending'      => 'In Progress',

    // Landing - Alertas
    'card_alerts'        => 'Recent Alerts',
    'alert_system'       => 'System: Scheduled update at 22:00',
    'alert_warning'      => 'Notice: Theft report in the Central District',
    'link_view_more'     => 'View more >',

    // Landing - Buscador
    'card_search'        => 'Quick Search',
    'label_case_number'  => 'Search by Case No.',
    'placeholder_case'   => 'Enter case number...',
    'btn_search'         => 'Search',

    // Landing - Gráfico
    'card_stats'         => 'Recent Statistics',
    'label_month_total'  => 'Month Total:',
    'label_resolved'     => 'Resolved:',

    // Landing - Guides & Documents
    'guides_docs'        => 'Guides and Documents',
    'doc_user_manual'    => 'User Manual',
    'doc_operating_procedures' => 'Operating Procedures',

    // Landing - Latest News
    'latest_news'        => 'Latest News',
    'news_protocol'      => 'New action protocol approved',
    'news_training'      => 'PURP training in progress',

    // Footer
    'rights_reserved' => 'All rights reserved.',
    'app_version'     => 'System Version:',
    'support'         => 'Technical Support',
    'privacy'         => 'Privacy Policy',
    'manual'          => 'Application Manual',

    // Denuncias - Nueva Denuncia
    'title_new_denuncia'       => 'New Report',
    'subtitle_new_denuncia'    => 'Complete the required information to register a new crime report',
    'label_crime_type'         => 'Type of Crime',
    'placeholder_crime_type'   => 'E.g., Burglary',
    'label_description'        => 'Description of Facts',
    'placeholder_description'  => 'Describe the occurred events in detail',
    'label_date'               => 'Date of Occurrence',
    'btn_back_home'            => 'Back to Home',
    'btn_register_denuncia'    => 'Register Report',

    // Denuncia - Enums
    'status_initial'        => 'In Initial Stage',
    'status_in_progress'    => 'In Progress',
    'status_judicialized'   => 'Judicialized',
    'status_archived_prov'  => 'Provisionally Archived',
    'status_archived_def'   => 'Definitively Archived',
    'status_resolved'       => 'Resolved',

    // User - Enums
    'role_super_admin'      => 'Super Administrator',
    'role_admin'            => 'Administrator',
    'role_supervisor'       => 'Police Supervisor',
    'role_agent'            => 'Operator Agent',
    'role_inquiry'          => 'Inquiry Staff',

];
