<?php

enum estadoProfesional: int
{
  case ACTIVO               = 10;
  case BAJA_MEDICA          = 20;
  case SUSPENDIDO_FUNCIONES = 30;
  case SANCIONADO           = 40;
  case JUBILADO             = 50;

  /**
   * Returns mapped estado_profesional
   * @return string
   */
  public function label(): string
  {
    return match ($this) {
      self::ACTIVO                => __('state_active'),
      self::BAJA_MEDICA           => __('state_sick_leave'),
      self::SUSPENDIDO_FUNCIONES  => __('state_duty_suspended'),
      self::SANCIONADO            => __('state_sanctioned'),
      self::JUBILADO              => __('state_retired')
    };
  }
}
