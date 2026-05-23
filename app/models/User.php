<?php
require_once __DIR__ . '/BaseModel.php';

class User extends BaseModel
{
    /**
     * Finds an active user/officer by their unique badge number.
     * * Prepares a secure query to fetch credentials, enforcing that the
     * account status must be active (activo = 1) for security compliance.
     *
     * @param string $numeroPlaca The unique police badge number (numero_placa) to search for.
     * @return array|false        The associative array with user data if found, or false if not found.
     */
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