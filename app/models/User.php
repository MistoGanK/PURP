<?php
require_once __DIR__ . '/BaseModel.php';

class User extends BaseModel
{
    public function findByPlaca($numeroPlaca)
    {
        $db = self::connect();

        $stmt = $db->prepare(
            "SELECT * FROM usuarios WHERE numero_placa = :placa AND activo = 1"
        );
        $stmt->execute([
            'placa' => $numeroPlaca
        ]);

        return $stmt->fetch();
    }
}
