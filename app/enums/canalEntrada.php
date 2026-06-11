<?php

namespace App\enums;

enum canalEntrada: int
{
  case PRESENCIAL = 10;
  case TELEFONICO = 20;
  case TELEMATICO = 30;
  case DE_OFICIO  = 40;
  case JUDICIAL   = 50;

  /**
   * Generates a structural array compatible with view dropdowns and JS injections.
   * * @return array Multi-dimensional array containing values and resolved labels.
   */
  public static function jsonOptions(): array
  {
    return array_map(fn($case) => [
      'value' => $case->value,
      'label' => $case->label()
    ], self::cases());
  }

  /**
   * Resolves the human-readable text using the localization helper system.
   * Incorporates a strict defensive fallback mechanism for unregistered keys.
   * * @return string Translated label or human-readable fallback string.
   */
  public function label(): string
  {
    return match ($this) {
      self::PRESENCIAL => __('channel_presencial'),
      self::TELEFONICO => __('channel_telefonic'),
      self::TELEMATICO => __('channel_telematic'),
      self::DE_OFICIO  => __('channel_officio'),
      self::JUDICIAL   => __('channel_judicial'),
    };
  }
}
