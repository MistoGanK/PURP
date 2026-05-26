<?php

enum tipoUsuario: int
{
    case SUPER_ADMIN = 10;
    case ADMIN       = 20;
    case SUPERVISOR  = 30;
    case AGENTE      = 40;
    case CONSULTA    = 50;

    /**
     * Returns mapped tipo_usuario
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => __('role_super_admin'),
            self::ADMIN       => __('role_admin'),
            self::SUPERVISOR  => __('role_supervisor'),
            self::AGENTE      => __('role_agent'),
            self::CONSULTA    => __('role_inquiry'),
        };
    }
}
