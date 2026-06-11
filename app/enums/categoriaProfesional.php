<?php

namespace App\enums;

enum categoriaProfesional: int
{
  case AGENTE        = 10;
  case OFICIAL       = 20;
  case SARGENTO      = 30;
  case SUBINSPECTOR  = 40;
  case INSPECTOR     = 50;
  case COMISARIO     = 60;

  /**
   * Returns String categoria_profecional
   * @return string
   */
  function label(): string
  {
    return match ($this) {
      self::AGENTE        => __('category_agent') ?? 'Agente',
      self::OFICIAL       => __('category_official') ?? 'Oficial',
      self::SARGENTO      => __('category_sergeant') ?? 'Sargento',
      self::SUBINSPECTOR  => __('category_subinspector') ?? 'Subinspector',
      self::INSPECTOR     => __('category_inspector') ?? 'Inspector',
      self::COMISARIO     => __('category_commissioner') ?? 'Comisario/Intendente'
    };
  }

  /**
   * Returns categoria_profesioanl mapped on a JSON-OBJECT
   * @return array
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
