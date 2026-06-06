<?php
return [
    // System - Errors
    'error_404'         => 'Page introuvable (erreur 404)',

    // Header
    'header_title'       => 'PORTAIL UNIQUE D\'ENREGISTREMENT POLICIER',
    'nav_home'           => 'Accueil',
    'nav_queries'        => 'Consultations',
    'nav_reports'        => 'Rapports',
    'nav_admin'          => 'Administration',
    'nav_logout'         => 'Se Déconnecter',
    'guest'              => 'Invité',

    // Login - Register
    'login_page_title'      => 'Accés ath sistèma',
    'badge_number'          => 'Numéro de matricule',
    'badge_placeholder'     => 'Ex. 12345',
    'password_label'        => 'Mot de passe',
    'btn_login'             => 'Se connecter',
    'auth_fail'             => 'Identifiant ou mot de passe incorrect',
    'title_new_user'        => 'Enregistrer un nouvel utilisateur',
    'label_nombre'          => 'Prénom',
    'label_apellidos'       => 'Nom',
    'label_dni'             => 'DNI / NIE',
    'label_role'            => 'Rôle du système',
    'label_category'        => 'Catégorie de police',
    'label_status'          => 'Statut professionnel',
    'btn_register_user'     => "Enregistrer l'agent",
    'category_agent'        => 'Agent',
    'category_official'     => 'Officier',
    'category_sergeant'     => 'Sergent',
    'category_subinspector' => 'Sous-inspecteur',
    'category_inspector'    => 'Inspecteur',
    'category_commissioner' => 'Commissaire / Intendant',
    'label_role'            => 'Rôle du système',
    'role_super_admin'      => 'Super-administrateur',
    'role_admin'            => 'Administrateur',
    'role_supervisor'       => 'Superviseur',
    'role_agent'            => 'Agent',
    'role_inquiry'          => 'Consultation',
    'state_active'          => 'Actif',
    'state_sick_leave'      => 'Congé maladie',
    'state_duty_suspended'  => 'Suspendu de fonctions',
    'state_sanctioned'      => 'Sanctionné',
    'state_retired'         => 'Retraité',
    'success_register'      => 'Utilisateur enregistré avec succès.',
    'unsuccess_register'    => "Erreur lors de l'enregistrement de l'utilisateur. Veuillez réessayer.",
    'state'                 => 'État',
    'state_active'          => 'Actif',
    'state_inactive'        => 'Inactif',

    // User - Profile
    'title_user_profile'    => 'Profil de l\'Agent',
    'subtitle_user_profile' => 'Consultez vos données d\'identification et mettez à jour vos informations d\'inscription dans le système.',
    'profile_avatar_help'   => 'Cliquez sur l\'icône pour modifier la photographie officielle',
    'btn_save_changes'      => 'Enregistrer les modifications',
    'success_update'        => 'Profil mis à jour avec succès.',
    'unsuccess_update'      => 'Erreur lors de la mise à jour du profil. Veuillez réessayer.',
    
    // MFA 
    'mfa_setup_title'       => 'Configurer l\'Authentification à Double Facteur (MFA)',
    'mfa_setup_subtitle'    => 'Scannez le code QR avec votre application d\'authentification (Aegis, Google Authenticator) pour lier votre identifiant de police.',
    'mfa_qr_alt'            => 'Code QR de Sécurité',
    'mfa_manual_text'       => 'Vous ne pouvez pas le scanner ? Saisissez cette clé manuellement dans votre application :',
    'mfa_code_label'        => 'Code de Confirmation à 6 chiffres',
    'btn_mfa_activate'      => 'Activer et Confirmer la Sécurité',
    'mfa_already_active'    => 'L\'authentification multifacteur (MFA) est déjà activée.',

    // Errors Messages
    'error_duplicate_badge' => 'Le numéro de matricule saisi est déjà enregistré dans le système.',
    'error_duplicate_dni'   => 'Le DNI/NIE saisi est déjà enregistré dans le système.',
    'error_missing_id'      => 'Erreur : L\'utilisateur n\'a pas pu être identifié.',
    'error_system'          => 'Une erreur système inattendue s\'est produite.',


    // Landing - Bienvenida
    'landing_welcome'    => 'Bienvenue sur le Portail Unique d\'Enregistrement Policier',
    'landing_subtitle'   => 'Centralisez et gérez les plaintes de manière efficace et sécurisée.',
    'btn_new_denuncia'   => 'Enregistrer une Nouvelle Plainte',
    'btn_view_denuncias' => 'Consulter les Plaintes',

    // Landing - Tarjetas de Estadísticas
    'card_registered'    => 'Plaintes Enregistrées Aujourd\'hui',
    'card_in_progress'   => 'Plaintes en Cours',
    'label_today'        => 'Aujourd\'hui',
    'label_pending'      => 'En Cours',

    // Landing - Alertas
    'card_alerts'        => 'Alertes Récentes',
    'alert_system'       => 'Système : Mise à jour programmée à 22h00',
    'alert_warning'      => 'Avis : Signalement de vol dans le Quartier Centre',
    'link_view_more'     => 'Voir plus >',

    // Landing - Buscador
    'card_search'        => 'Recherche Rapide',
    'label_case_number'  => 'Rechercher par Nº de Dossier',
    'placeholder_case'   => 'Entrez le numéro de dossier...',
    'btn_search'         => 'Rechercher',

    // Landing - Gráfico
    'card_stats'         => 'Statistiques Récentes',
    'label_month_total'  => 'Total Mois :',
    'label_resolved'     => 'Résolus :',

    // Landing - Guides & Documents
    'guides_docs'        => 'Guides et Documents',
    'doc_user_manual'    => 'Manuel de L\'Utilisateur',
    'doc_operating_procedures' => 'Procédures Opérationnelles',

    // Landing - Latest News
    'latest_news'        => 'Dernières Nouvelles',
    'news_protocol'      => 'Nouveau protocole d\'action approuvé',
    'news_training'      => 'Formation sur le PURP en cours',

    // Footer
    'rights_reserved' => 'Tous droits réservés.',
    'app_version'     => 'Version du Système :',
    'support'         => 'Support Technique',
    'privacy'         => 'Politique de Confidentialité',
    'manual'          => 'Manuel de l\'Application',

    // Denuncias - Nueva Denuncia
    'title_new_denuncia'       => 'Nouvelle plainte',
    'subtitle_new_denuncia'    => 'Veuillez remplir les données requises pour enregistrer une nouvelle plainte',
    'label_crime_type'         => 'Type de délit',
    'placeholder_crime_type'   => 'Ex. Vol par effraction',
    'label_description'        => 'Description des faits',
    'placeholder_description'  => 'Veuillez décrire en détail les faits survenus',
    'label_date'               => 'Date de l\'événement',
    'btn_back_home'            => 'Retour à l\'accueil',
    'btn_register_denuncia'    => 'Enregistrer la plainte',

    // Denuncia - Enums
    'status_initial'        => 'En Instance Initiale',
    'status_in_progress'    => 'En Cours',
    'status_judicialized'   => 'Judiciarisé',
    'status_archived_prov'  => 'Archivé Provisoirement',
    'status_archived_def'   => 'Archivé Définitivement',
    'status_resolved'       => 'Résolu',

    // User - Enums
    'role_super_admin'      => 'Super Administrateur',
    'role_admin'            => 'Administrateur',
    'role_supervisor'       => 'Superviseur de Police',
    'role_agent'            => 'Agent Opérateur',
    'role_inquiry'          => 'Personnel de Consultation',

];
