<?php
require_once __DIR__ . '/BaseModel.php';

class Denuncia extends BaseModel
{
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
?>
