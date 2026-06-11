<?php

namespace App\Enums;

// Importamos el nuevo Enum para que PHP sepa dónde encontrarlo
use App\Enums\Gravedad;

enum tipoDelito: int
{
  // --- 1000: CONTRA LAS PERSONAS (VIDA E INTEGRIDAD) ---
  case HOMICIDIO = 1010;
  case ASESINATO = 1020;
  case AUXILIO_INDUCCION_SUICIDIO = 1030;
  case LESIONES_ORDINARIAS = 1110;
  case RIÑA_MUTUA_PELIGROSA = 1120;
  case MALTRATO_OBRA_SIN_LESION = 1130;

    // --- 2000: CONTRA LA LIBERTAD, INTIMIDAD Y MORAL ---
  case DETENCION_ILEGAL_SECUESTRO = 2010;
  case AMENAZAS = 2020;
  case COACCIONES = 2030;
  case ACOSO_STALKING = 2040;
  case INTEGRIDAD_MORAL_TORTURA = 2110;
  case VIOLENCIA_DOMESTICA = 2120;
  case VIOLENCIA_DE_GENERO = 2130;
  case DESCUBRIMIENTO_REVELACION_SECRETOS = 2210;
  case ALLANAMIENTO_MORADA = 2220;
  case CALUMNIAS = 2310;
  case INJURIAS = 2320;

    // --- 3000: LIBERTAD E INDEMNIDAD SEXUAL ---
  case AGRESION_SEXUAL = 3010;
  case ACOSO_SEXUAL = 3020;
  case EXHIBICIONISMO_PROVOCACION_SEXUAL = 3030;
  case CORRUPCION_MENORES_INCAPACES = 3040;

    // --- 4000: CONTRA EL PATRIMONIO Y ORDEN SOCIOECONÓMICO ---
  case HURTO_COMUN = 4010;
  case ROBO_CON_FUERZA_EN_LAS_COSAS = 4020;
  case ROBO_CON_VIOLENCIA_O_INTIMIDACION = 4030;
  case HURTO_ROBO_USO_VEHICULO = 4040;
  case ESTAFA_CONVENCIONAL = 4110;
  case ESTAFA_INFORMATICA_CIBERDELITO = 4120;
  case APROPIACION_INDEBIDA = 4130;
  case RESTRICCIONES_PROP_INTELECTUAL_INDUSTRIAL = 4210;
  case BLANQUEO_CAPITALES = 4310;
  case RECEPTACION = 4320;
  case DAÑOS_PROPIEDAD_SABOTAJE = 4410;

    // --- 5000: CONTRA LA SEGURIDAD COLECTIVA Y MEDIO AMBIENTE ---
  case TRAFICO_DROGAS_MINORISTA = 5010;
  case TRAFICO_DROGAS_ORGANIZADO = 5020;
  case CONDUCCION_TEMERARIA = 5110;
  case CONDUCCION_BAJO_EFECTOS_ALCOHOL_DROGAS = 5120;
  case NEGATIVA_SOMETIMIENTO_PRUEBAS = 5130;
  case CONDUCCION_SIN_PERMISO_PUNTOS = 5140;
  case INCENDIOS_FORESTALES_URBANOS = 5210;
  case DELITOS_MEDIO_AMBIENTE = 5310;
  case MALTRATO_ANIMAL = 5320;

    // --- 6000: CONTRA LA ADMINISTRACIÓN Y EL ORDEN PÚBLICO ---
  case FALSEDAD_DOCUMENTAL = 6010;
  case FALSEDAD_MONEDA_TIMBRES = 6020;
  case COHECHO_SOBORNO = 6110;
  case PREVARICACION_ADMINISTRATIVA = 6120;
  case MALVERSACION_FONDOS_PUBLICOS = 6130;
  case DENUNCIA_FALSA_SIMULACION_DELITO = 6210;
  case FALSO_TESTIMONIO = 6220;
  case OBSTRUCCION_A_LA_JUSTICIA = 6230;
  case ATENTADO_A_AGENTE_AUTORIDAD = 6310;
  case RESISTENCIA_Y_DESOBEDIENCIA_GRAVE = 6320;
  case DESORDENES_PUBLICOS = 6330;
  case TENENCIA_TRAFICO_ARMAS_PROHIBIDAS = 6410;
  case TERRORISMO = 6500;

  /**
   * Resuelve el objeto estricto de Gravedad basado en la naturaleza del delito.
   * Ahora devuelve una instancia de la clase Gravedad en vez de un 'int' plano.
   * * @return Gravedad El identificador de gravedad tipado.
   */
  public function gravedad(): Gravedad
  {
    return match ($this) {
      // --- DELITOS GRAVES ---
      self::HOMICIDIO,
      self::ASESINATO,
      self::DETENCION_ILEGAL_SECUESTRO,
      self::AGRESION_SEXUAL,
      self::ROBO_CON_VIOLENCIA_O_INTIMIDACION,
      self::TRAFICO_DROGAS_ORGANIZADO,
      self::MALVERSACION_FONDOS_PUBLICOS,
      self::TERRORISMO => Gravedad::GRAVE,

      // --- DELITOS LEVES ---
      self::MALTRATO_OBRA_SIN_LESION,
      self::INJURIAS,
      self::HURTO_COMUN,
      self::RIÑA_MUTUA_PELIGROSA => Gravedad::LEVE,

      // --- DELITOS MENOS GRAVES ---
      default => Gravedad::MENOS_GRAVE,
    };
  }

  /**
   * Returns the official translated name for the criminal category.
   */
  public function label(): string
  {
    return match ($this) {
      self::HOMICIDIO => __('crime_homicide'),
      self::ASESINATO => __('crime_murder'),
      self::AUXILIO_INDUCCION_SUICIDIO => __('crime_suicide_assistance_induction'),
      self::LESIONES_ORDINARIAS => __('crime_ordinary_injuries'),
      self::RIÑA_MUTUA_PELIGROSA => __('crime_dangerous_mutual_brawl'),
      self::MALTRATO_OBRA_SIN_LESION => __('crime_battery_without_injury'),

      self::DETENCION_ILEGAL_SECUESTRO => __('crime_unlawful_detention_kidnapping'),
      self::AMENAZAS => __('crime_threats'),
      self::COACCIONES => __('crime_coercion'),
      self::ACOSO_STALKING => __('crime_stalking'),
      self::INTEGRIDAD_MORAL_TORTURA => __('crime_moral_integrity_torture'),
      self::VIOLENCIA_DOMESTICA => __('crime_domestic_violence'),
      self::VIOLENCIA_DE_GENERO => __('crime_gender_violence'),
      self::DESCUBRIMIENTO_REVELACION_SECRETOS => __('crime_discovery_revelation_secrets'),
      self::ALLANAMIENTO_MORADA => __('crime_trespass_dwelling'),
      self::CALUMNIAS => __('crime_slander'),
      self::INJURIAS => __('crime_insults_libel'),

      self::AGRESION_SEXUAL => __('crime_sexual_assault'),
      self::ACOSO_SEXUAL => __('crime_sexual_harassment'),
      self::EXHIBICIONISMO_PROVOCACION_SEXUAL => __('crime_exhibitionsim_sexual_provocation'),
      self::CORRUPCION_MENORES_INCAPACES => __('crime_corruption_minors_incapables'),

      self::HURTO_COMUN => __('crime_theft'),
      self::ROBO_CON_FUERZA_EN_LAS_COSAS => __('crime_robbery_force_things'),
      self::ROBO_CON_VIOLENCIA_O_INTIMIDACION => __('crime_robbery_violence_intimidation'),
      self::HURTO_ROBO_USO_VEHICULO => __('crime_vehicle_theft_robbery_use'),
      self::ESTAFA_CONVENCIONAL => __('crime_conventional_fraud'),
      self::ESTAFA_INFORMATICA_CIBERDELITO => __('crime_computer_fraud_cybercrime'),
      self::APROPIACION_INDEBIDA => __('crime_misappropriation'),
      self::RESTRICCIONES_PROP_INTELECTUAL_INDUSTRIAL => __('crime_property_infringement'),
      self::BLANQUEO_CAPITALES => __('crime_money_laundering'),
      self::RECEPTACION => __('crime_receiving_stolen_goods'),
      self::DAÑOS_PROPIEDAD_SABOTAJE => __('crime_property_damage_sabotage'),

      self::TRAFICO_DROGAS_MINORISTA => __('crime_drug_trafficking_retail'),
      self::TRAFICO_DROGAS_ORGANIZADO => __('crime_drug_trafficking_organized'),
      self::CONDUCCION_TEMERARIA => __('crime_reckless_driving'),
      self::CONDUCCION_BAJO_EFECTOS_ALCOHOL_DROGAS => __('crime_driving_under_influence'),
      self::NEGATIVA_SOMETIMIENTO_PRUEBAS => __('crime_refusal_breathalyzer_test'),
      self::CONDUCCION_SIN_PERMISO_PUNTOS => __('crime_driving_without_license_points'),
      self::INCENDIOS_FORESTALES_URBANOS => __('crime_arson_forest_urban'),
      self::DELITOS_MEDIO_AMBIENTE => __('crime_environmental_offenses'),
      self::MALTRATO_ANIMAL => __('crime_animal_cruelty'),

      self::FALSEDAD_DOCUMENTAL => __('crime_forgery_documents'),
      self::FALSEDAD_MONEDA_TIMBRES => __('crime_counterfeiting_currency_stamps'),
      self::COHECHO_SOBORNO => __('crime_bribery'),
      self::PREVARICACION_ADMINISTRATIVA => __('crime_administrative_malfeasance'),
      self::MALVERSACION_FONDOS_PUBLICOS => __('crime_embezzlement_public_funds'),
      self::DENUNCIA_FALSA_SIMULACION_DELITO => __('crime_false_reporting_simulation'),
      self::FALSO_TESTIMONIO => __('crime_perjury'),
      self::OBSTRUCCION_A_LA_JUSTICIA => __('crime_obstruction_of_justice'),
      self::ATENTADO_A_AGENTE_AUTORIDAD => __('crime_assault_authority_officer'),
      self::RESISTENCIA_Y_DESOBEDIENCIA_GRAVE => __('crime_resistance_serious_disobedience'),
      self::DESORDENES_PUBLICOS => __('crime_public_disorder'),
      self::TENENCIA_TRAFICO_ARMAS_PROHIBIDAS => __('crime_possession_trafficking_weapons'),
      self::TERRORISMO => __('crime_terrorism'),
    };
  }

  /**
   * Returns tipo_delito mapped on a JSON-OBJECT
   */
  public static function jsonOptions(): array
  {
    $options = [];
    foreach (self::cases() as $case) {
      $options[] = [
        'value' => $case->value,
        'label' => method_exists($case, 'label') ? $case->label() : __($case->value),
        'gravedad' => $case->gravedad()->value
      ];
    }
    return $options;
  }
}
