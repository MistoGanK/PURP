<?php
require_once __DIR__ . '/BaseModel.php';

class Denuncia extends BaseModel
{
    /**
     * Inserts a new crime report into the database.
     * * Prepares a secure SQL statement and binds the provided array data 
     * to protect the application against SQL Injection vulnerabilities.
     *
     * @param array $data {
     * The crime report payload fields.
     * @type string $tipo_delito         The category or type of the crime.
     * @type string $descripcion_hechos  The detailed description of the events.
     * @type string $fecha_hechos        The timestamp/date when the events occurred.
     * @type int    $id_usuario          The ID of the officer filing the report.
     * }
     * @return bool True on successful execution, false on failure.
     */
    public function crear($data)
    {
        $db = self::connect();

        $stmt = $db->prepare("
            INSERT INTO denuncias (
                tipo_delito,
                descripcion_hechos,
                fecha_hechos,
                id_usuario
            )
            VALUES (
                :tipo_delito,
                :descripcion_hechos,
                :fecha_hechos,
                :id_usuario
            )
        ");

        return $stmt->execute([
            'tipo_delito'         => $data['tipo_delito'],
            'descripcion_hechos' => $data['descripcion_hechos'],
            'fecha_hechos'       => $data['fecha_hechos'],
            'id_usuario'         => $data['id_usuario']
        ]);
    }

    /**
     * Retrieves all crime reports ordered by date.
     * * Performs an inner join with the users table to fetch the badge number 
     * of the officer who registered each report, sorting from newest to oldest.
     *
     * @return array A multi-dimensional array containing all rows fetched as associative arrays.
     */
    public function listar()
    {
        $db = self::connect();

        return $db->query("
            SELECT d.*, u.numero_placa
            FROM denuncias d
            JOIN usuarios u ON d.id_usuario = u.id_usuario
            ORDER BY d.fecha_hechos DESC
        ")->fetchAll();
    }
}
