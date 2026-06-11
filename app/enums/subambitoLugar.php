<?php

namespace App\Enums;

enum subambitoLugar: int
{
  // --- Asociados a Ámbitos Físicos (Casas, locales, etc.) ---
  case INTERIOR_INMUEBLE = 10;
  case EXTERIOR_PERIMETRO = 20;
  case VIA_PUBLICA_ABIERTA = 30;

    // --- Asociados a Ámbito Digital (Ciberespacio) ---
  case RED_SOCIAL = 40;
  case CORREO_ELECTRONICO = 50;
  case APLICACION_MENSAJERIA = 60;
  case WEB_PLATAFORMA = 70;

  public function label(): string
  {
    return match ($this) {
      self::INTERIOR_INMUEBLE => __('subscope_interior'),
      self::EXTERIOR_PERIMETRO => __('subscope_exterior'),
      self::VIA_PUBLICA_ABIERTA => __('subscope_open_way'),

      self::RED_SOCIAL => __('subscope_social_media'),
      self::CORREO_ELECTRONICO => __('subscope_email'),
      self::APLICACION_MENSAJERIA => __('subscope_im_app'),
      self::WEB_PLATAFORMA => __('subscope_web_platform'),
    };
  }
}
