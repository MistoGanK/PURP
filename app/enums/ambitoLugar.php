<?php

namespace App\Enums;

use App\Enums\subambitoLugar;
use App\Enums\lugarDetalle;

enum ambitoLugar: int
{
  // --- 1000: ESPACIOS PÚBLICOS ABIERTOS ---
  case VIA_PUBLICA = 1010;
  case PARQUE_O_ZONA_VERDE = 1020;
  case PLAYA_O_ENTORNO_NATURAL = 1030;

    // --- 2000: ESPACIOS PRIVADOS / RESIDENCIALES ---
  case DOMICILIO_HABITUAL = 2010;
  case SEGUNDA_RESIDENCIA = 2020;
  case GARAJE_O_TRASTERO_PRIVADO = 2030;
  case ZONA_COMUN_EDIFICIO = 2040;

    // --- 3000: ESPACIOS COMERCIALES E INDUSTRIALES ---
  case COMERCIO_MINORISTA = 3010;
  case GRAN_SUPERFICIE_O_CENTRO_COMERCIAL = 3020;
  case ENTIDAD_BANCARIA_O_CAJERO = 3030;
  case POLIGONO_O_NAVE_INDUSTRIAL = 3040;

    // --- 4000: OCIO, EDUCACIÓN Y SANIDAD ---
  case LOCAL_OCIO_NOCTURNO = 4010;
  case CENTRO_EDUCATIVO = 4020;
  case CENTRO_SANITARIO = 4030;
  case INSTALACION_DEPORTIVA = 4040;

    // --- 5000: MEDIOS DE TRANSPORTE E INFRAESTRUCTURAS ---
  case TRANSPORTE_PUBLICO_O_ESTACION = 5010;
  case INTERIOR_VEHICULO_PRIVADO = 5020;
  case PUERTO_O_AEROPUERTO = 5030;

    // --- 6000: ENTORNO DIGITAL / CIBERESPACIO ---
  case INTERNET_CIBERESPACIO = 6010;

  public function label(): string
  {
    return match ($this) {
      self::VIA_PUBLICA => __('scope_public_way'),
      self::PARQUE_O_ZONA_VERDE => __('scope_park_green_zone'),
      self::PLAYA_O_ENTORNO_NATURAL => __('scope_beach_natural_environment'),
      self::DOMICILIO_HABITUAL => __('scope_habitual_residence'),
      self::SEGUNDA_RESIDENCIA => __('scope_second_residence'),
      self::GARAJE_O_TRASTERO_PRIVADO => __('scope_private_garage_storage'),
      self::ZONA_COMUN_EDIFICIO => __('scope_building_common_area'),
      self::COMERCIO_MINORISTA => __('scope_retail_store'),
      self::GRAN_SUPERFICIE_O_CENTRO_COMERCIAL => __('scope_shopping_mall'),
      self::ENTIDAD_BANCARIA_O_CAJERO => __('scope_bank_atm'),
      self::POLIGONO_O_NAVE_INDUSTRIAL => __('scope_industrial_estate_warehouse'),
      self::LOCAL_OCIO_NOCTURNO => __('scope_nightlife_venue'),
      self::CENTRO_EDUCATIVO => __('scope_educational_center'),
      self::CENTRO_SANITARIO => __('scope_healthcare_center'),
      self::INSTALACION_DEPORTIVA => __('scope_sports_facility'),
      self::TRANSPORTE_PUBLICO_O_ESTACION => __('scope_public_transport_station'),
      self::INTERIOR_VEHICULO_PRIVADO => __('scope_private_vehicle_interior'),
      self::PUERTO_O_AEROPUERTO => __('scope_port_airport'),
      self::INTERNET_CIBERESPACIO => __('scope_internet_cyberspace'),
    };
  }

  /**
   * Maps subambito_lugar
   * @return subambitoLugar[]
   */
  public function subambitosValidos(): array
  {
    return match ($this) {
      self::INTERNET_CIBERESPACIO => [
        subambitoLugar::RED_SOCIAL,
        subambitoLugar::CORREO_ELECTRONICO,
        subambitoLugar::APLICACION_MENSAJERIA,
        subambitoLugar::WEB_PLATAFORMA
      ],
      default => [
        subambitoLugar::INTERIOR_INMUEBLE,
        subambitoLugar::EXTERIOR_PERIMETRO,
        subambitoLugar::VIA_PUBLICA_ABIERTA
      ]
    };
  }

  /**
   ** Returns ambito_lugar on a JSON-OBJECT
   */
  public static function jsonOptions(): array
  {
    $options = [];
    foreach (self::cases() as $case) {

      // Procesamos sus subámbitos asociados
      $subambitos = [];
      foreach ($case->subambitosValidos() as $sub) {
        $subambitos[] = ['value' => $sub->value, 'label' => $sub->label()];
      }

      $options[] = [
        'value'       => $case->value,
        'label'       => method_exists($case, 'label') ? $case->label() : __($case->value),
        'subambitos'  => $subambitos,
      ];
    }
    return $options;
  }
}
