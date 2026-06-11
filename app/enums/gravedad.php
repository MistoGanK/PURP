<?php

namespace App\Enums;

enum Gravedad: int
{
  case LEVE = 10;
  case MENOS_GRAVE = 20;
  case GRAVE = 30;

  /**
   * Returns translated label
   */
  public function label(): string
  {
    return match ($this) {
      self::LEVE => __('gravity_minor'),
      self::MENOS_GRAVE => __('gravity_moderate'),
      self::GRAVE => __('gravity_severe'),
    };
  }

  /**
   * Returns gravedad_delito mapped on a JSON-OBJECT
   */
  public static function jsonOptions(): array
  {
    $options = [];
    foreach (self::cases() as $case) {
      $options[] = [
        'value' => $case->value,
        'label' => $case->label()
      ];
    }
    return $options;
  }
}
