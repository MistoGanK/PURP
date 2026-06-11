<?php

namespace App\enums;

enum denunciasEstadoLegal: int
{
  case  INSTANCIA_INICIAL       = 10;
  case  EN_CURSO                = 20;
  case  JUDICALIZADO            = 30;
  case  ARCHIVADO_PROVISIONAL   = 40;
  case  ARCHIVADO_DEFINITIVO    = 50;
  case  RESUELTO                = 60;

  /**
   * Returns String estado_legal
   * @return string
   */
  public function label(): string
  {
    return match ($this) {
      self::INSTANCIA_INICIAL     => __('status_initial'),
      self::EN_CURSO              => __('status_in_progress'),
      self::JUDICALIZADO          => __('status_judicialized'),
      self::ARCHIVADO_PROVISIONAL => __('status_archived_prov'),
      self::ARCHIVADO_DEFINITIVO  => __('status_archived_def'),
      self::RESUELTO              => __('status_resolved')
    };
  }
  /**
   * Return mapped estado_legal on a JSON-OBJECT
   */
  public static function jsonOptions(): array
  {
    $options = [];
    foreach (self::cases() as $case) {
      $options[] = [
        'value' => $case->value,
        'label' => $case->label()
      ];
    };
    return $options;
  }
  
}
