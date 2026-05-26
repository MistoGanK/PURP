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
    /**
     * Creates a new User
     * @param string $numeroPlaca $passwordHash, $userTipe, 
     * @return void
     */

    public function insertUser(array $data)
    {
        $db = self::connect();

        $sql = "INSERT INTO usuarios (dni, numero_placa, nombre, apellidos, password_hash, id_categoria, estado_profesional, tipo_usuario) 
                VALUES (:dni, :numero_placa, :nombre, :apellidos, :password_hash, :id_categoria, :estado_profesional, :tipo_usuario)";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            'dni'                => $data['dni'],
            'numero_placa'       => $data['numero_placa'],
            'nombre'             => $data['nombre'],
            'apellidos'          => $data['apellidos'],
            'password_hash'      => $data['password_hash'],
            'id_categoria'       => $data['id_categoria'],
            'estado_profesional' => $data['estado_profesional'],
            'tipo_usuario'       => $data['tipo_usuario']
        ]);
    }
}
