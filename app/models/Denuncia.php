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
     * @type int    $gravedad_delito     The calculated penal gravity level.
     * @type string $ambito_lugar        The general scope/category of the location.
     * @type string $subambito_lugar     The specific sub-scope of the location.
     * @type string $lugar_detalle       Detailed free-text description of the location.
     * @type string $descripcion_hechos  The detailed description of the events.
     * @type string $fecha_hechos        The timestamp/date when the events occurred.
     * @type int    $id_usuario          The ID of the officer filing the report.
     * @type string $codigo_expediente   The record identifier code.
     * @type int    $canal_entrada       The entry channel code.
     * }
     * @return bool True on successful execution, false on failure.
     */
    public function crear($data): bool
    {
        $db = self::connect();

        $stmt = $db->prepare("
            INSERT INTO denuncias (
                tipo_delito,
                gravedad_delito,
                ambito_lugar,
                subambito_lugar,
                lugar_detalle,
                descripcion_hechos,
                fecha_hechos,
                id_usuario,
                codigo_expediente,
                canal_entrada
            )
            VALUES (
                :tipo_delito,
                :gravedad_delito,
                :ambito_lugar,
                :subambito_lugar,
                :lugar_detalle,
                :descripcion_hechos,
                :fecha_hechos,
                :id_usuario,
                :codigo_expediente,
                :canal_entrada
            )
        ");

        $result = $stmt->execute([
            'tipo_delito'         => $data['tipo_delito'],
            'gravedad_delito'     => $data['gravedad_delito'],
            'ambito_lugar'        => $data['ambito_lugar'],
            'subambito_lugar'     => $data['subambito_lugar'],
            'lugar_detalle'       => $data['lugar_detalle'],
            'descripcion_hechos'  => $data['descripcion_hechos'],
            'fecha_hechos'        => $data['fecha_hechos'],
            'id_usuario'          => $data['id_usuario'],
            'codigo_expediente'   => $data['codigo_expediente'],
            'canal_entrada'       => $data['canal_entrada']
        ]);

        if (!$result) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("SQL Estado [" . $errorInfo[0] . "]: " . ($errorInfo[2] ?? 'Error desconocido en la consulta.'));
        }

        return $result;
    }

    /**
     * Updates an existing crime report in the database.
     *
     * @param array $data {
     * @type int    $id_denuncia         The ID of the report to update.
     * @type int    $tipo_delito         The category or type of the crime.
     * @type int    $gravedad_delito     The calculated penal gravity level.
     * @type int    $canal_entrada       The entry channel code.
     * @type int    $estado_legal        The legal status code.
     * @type string $fecha_hechos        The timestamp/date when the events occurred.
     * @type int    $ambito_lugar        The general scope/category of the location.
     * @type int    $subambito_lugar     The specific sub-scope of the location.
     * @type string $lugar_detalle       Detailed free-text description of the location.
     * @type string $descripcion_hechos  The detailed description of the events.
     * }
     * @return bool True on successful execution, false on failure.
     */
    public function actualizar(array $data): bool
    {
        $db = self::connect();

        $stmt = $db->prepare("
            UPDATE denuncias
            SET 
                tipo_delito        = :tipo_delito,
                gravedad_delito    = :gravedad_delito,
                canal_entrada      = :canal_entrada,
                estado_legal       = :estado_legal,
                fecha_hechos       = :fecha_hechos,
                ambito_lugar       = :ambito_lugar,
                subambito_lugar    = :subambito_lugar,
                lugar_detalle      = :lugar_detalle,
                descripcion_hechos = :descripcion_hechos
            WHERE 
                id_denuncia        = :id_denuncia
        ");

        $result = $stmt->execute([
            'tipo_delito'        => $data['tipo_delito'],
            'gravedad_delito'    => $data['gravedad_delito'],
            'canal_entrada'      => $data['canal_entrada'],
            'estado_legal'       => $data['estado_legal'],
            'fecha_hechos'       => $data['fecha_hechos'],
            'ambito_lugar'       => $data['ambito_lugar'],
            'subambito_lugar'    => $data['subambito_lugar'],
            'lugar_detalle'      => $data['lugar_detalle'],
            'descripcion_hechos' => $data['descripcion_hechos'],
            'id_denuncia'        => $data['id_denuncia']
        ]);

        if (!$result) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("SQL Estado [" . $errorInfo[0] . "]: " . ($errorInfo[2] ?? 'Error desconocido en la consulta.'));
        }

        // RowCount permite saber si realmente se modificó alguna fila (si no cambiaron nada, rowCount es 0)
        return $stmt->rowCount() > 0 || $result;
    }

    /**
     * Deletes a denuncia by passed $id
     * @return bool
     */
    public function delete($id): bool
    {
        $db = self::connect();

        $query = "DELETE FROM denuncias WHERE id_denuncia = :id";
        $stmt = $db->prepare($query);
        
        return $stmt->execute(['id' => $id]);
    }

    /**
     * Retrieves all crime reports ordered by date.
     * @return array A multi-dimensional array containing all rows fetched as associative arrays.
     */
    public function listar()
    {
        $db = self::connect();

        // Eliminamos el JOIN. Ahora es una consulta plana y rapidísima.
        $stmt = $db->query("
            SELECT *
            FROM denuncias
            ORDER BY fecha_hechos DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves a specific crime report by its unique ID.     *
     * @param int $id_denuncia The primary key of the crime report.
     * @return array|false An associative array with the report data, or false if not found.
     */
    public function findById(int $id_denuncia): array
    {
        $db = self::connect();

        $stmt = $db->prepare("
            SELECT *
            FROM denuncias
            WHERE id_denuncia = :id_denuncia
        ");

        $stmt->execute(['id_denuncia' => $id_denuncia]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
