<?php
require_once __DIR__ . '/BaseModel.php';

class User extends BaseModel
{
    /**
     * Finds an active user/officer by their unique badge number (or ID).
     * @param string $agent_id The user_id or badge to search for.
     * @return array|false The associative array with user data if found, or false if not found.
     */
    public function findUserById($agent_id): array|false
    {
        try {
            $db = self::connect();

            $stmt = $db->prepare(
                "SELECT * FROM usuarios WHERE id_usuario = :id_usuario LIMIT 1;"
            );

            $stmt->execute([
                'id_usuario' => $agent_id
            ]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            error_log("Error en findUserById: " . $error->getMessage());
            return false;
        }
    }
    /**
     * Finds an active user/officer by their unique badge number (or ID).
     * @param string $agent_id The user_id or badge to search for.
     * @return array|false The associative array with user data if found, or false if not found.
     */
    public function findByDni($agent_dni): array|false
    {
        try {
            $db = self::connect();

            $stmt = $db->prepare(
                "SELECT * FROM usuarios WHERE dni = :dni LIMIT 1;"
            );

            $stmt->execute([
                'dni' => $agent_dni
            ]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            error_log("Error en findUserByDni: " . $error->getMessage());
            return false;
        }
    }
    /**
     * Creates a new User relying on DB Unique Constraints for maximum performance.
     * @param array $data Raw user data to be inserted.
     * @return bool       True on success.
     * @throws Exception  If a database constraint is violated.
     */
    public function insertUser(array $data): bool
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
     * Updates a User on DB
     * @param array       $data Raw user data to be updated.
     * @return bool       True on success.
     * @throws Exception  If a database constraint is violated.
     */
    public function updateUser(array $data): bool
    {
        $db = self::connect();
        try {
            $sql =
                "UPDATE usuarios
            SET nombre                      = :nombre,
                apellidos                   = :apellidos,
                dni                         = :dni,
                numero_placa                = :numero_placa,
                tipo_usuario                = :tipo_usuario,
                categoria_profesional       = :categoria_profesional,
                estado_profesional          = :estado_profesional,
                activo                      = :activo,
                avatar_img_src              = :avatar_img_src
            WHERE id_usuario = :id_usuario
        ;";

            $stmt = $db->prepare($sql);

            return $stmt->execute([
                ':nombre'                      => $data['agent_name'],
                ':apellidos'                   => $data['agent_forenames'],
                ':dni'                         => $data['agent_dni'],
                ':numero_placa'                => $data['agent_plate'],
                ':tipo_usuario'                => $data['agent_user_role'],
                ':categoria_profesional'       => $data['agent_category_role'],
                ':estado_profesional'          => $data['agent_profesional_state'],
                ':activo'                      => $data['agent_active'],
                ':id_usuario'                  => $data['agent_id'],
                ':avatar_img_src'              => $data['avatar_img_src']
            ]);
        } catch (PDOException $error) {
            throw new Exception("Failed to update MFA settings: " . $error->getMessage());
        }
    }
    /**
     * Checks if current user has MFA enabled.
     * @param int $id_usuario The unique ID of the user.
     * @return bool True if MFA is active (secret exists and not empty), false otherwise.
     */
    public function checkActiveMfa(int $id_usuario): bool
    {
        try {
            $db = self::connect();

            $sql = "SELECT COUNT(*) FROM usuarios WHERE id_usuario = :id_usuario AND mfa_secret IS NOT NULL AND mfa_secret != '' ;";

            $stmt = $db->prepare($sql);
            
            $stmt->execute([':id_usuario' => $id_usuario]);

            $count = (int) $stmt->fetchColumn();

            return $count > 0;
        } catch (PDOException $error) {
            error_log("Error en checkActiveMfa: " . $error->getMessage());
            return false;
        }
    }
    /**
     * Updates user record with definitive 2FA configuration data.
     * @param array $data Contains keys: 'secretKey', 'jsonBackup', and 'userId'.
     * @return bool       True on successful statement execution.
     * @throws Exception  If a database integrity or connection error occurs.
     */
    public function insert2fa(array $data): bool
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