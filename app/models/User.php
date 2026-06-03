<?php
require_once __DIR__ . '/BaseModel.php';

class User extends BaseModel
{
    /**
     * Finds an active user/officer by their unique badge number.
     * Prepares a secure query to fetch credentials, enforcing that the
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
     * Creates a new User relying on DB Unique Constraints for maximum performance.
     * @param array $data Raw user data to be inserted.
     * @return bool       True on success.
     * @throws Exception  If a database constraint is violated.
     */
    public function insertUser(array $data)
    {
        $db = self::connect();

        try {
            $sql = "INSERT INTO usuarios (dni, numero_placa, nombre, apellidos, password_hash, categoria_profesional, estado_profesional, tipo_usuario) 
                    VALUES (:dni, :numero_placa, :nombre, :apellidos, :password_hash, :categoria_profesional, :estado_profesional, :tipo_usuario)";

            $stmt = $db->prepare($sql);

            return $stmt->execute([
                'dni'                       => $data['dni'],
                'numero_placa'              => $data['numero_placa'],
                'nombre'                    => $data['nombre'],
                'apellidos'                 => $data['apellidos'],
                'password_hash'             => $data['password_hash'],
                'categoria_profesional'     => $data['categoria_profesional'],
                'estado_profesional'        => $data['estado_profesional'],
                'tipo_usuario'              => $data['tipo_usuario']
            ]);
        } catch (PDOException $error) {
            // capture the integrity constraint violation code (23000)
            if ($error->getCode() == '23000') {
                throw new Exception("Registration failed due to unique constraint violation: " . $error->getMessage());
            }
            throw $error;
        }
    }

    /**
     * Updates user record with definitive 2FA configuration data.
     * * @param array $data Contains keys: 'secretKey', 'jsonBackup', and 'userId'.
     * @return bool       True on successful statement execution.
     * @throws Exception  If a database integrity or connection error occurs.
     */
    public function insert2fa(array $data)
    {
        $db = self::connect();
        try {
            $sql = "UPDATE usuarios 
                    SET mfa_secret = :mfa_secret, mfa_backup_codes = :mfa_backup_codes 
                    WHERE id_usuario = :id_usuario";

            $stmt = $db->prepare($sql);

            return $stmt->execute([
                'mfa_secret'            => $data['secretKey'],
                'mfa_backup_codes'      => $data['jsonBackup'],
                'id_usuario'            => $data['userId']
            ]);
        } catch (PDOException $error) {
            throw new Exception("Failed to update MFA settings: " . $error->getMessage());
        }
    }
}
