<?php
require_once __DIR__ . '/../models/Denuncia.php';

class DenunciaController
{
    public static function listar()
    {
        $model = new Denuncia();
        $denuncias = $model->listar();

        require __DIR__ . '/../views/denuncias/listar.php';
    }

    public static function crear()
    {
        require __DIR__ . '/../views/denuncias/crear.php';
    }

    public static function guardar()
    {
        $model = new Denuncia();

        $model->crear([
            'tipo_delito'         => $_POST['tipo_delito'],
            'descripcion_hechos' => $_POST['descripcion_hechos'],
            'fecha_hechos'       => $_POST['fecha_hechos'],
            'id_usuario'         => $_SESSION['user']['id']
        ]);

        header('Location: /PURP/public/index.php?action=denuncias');
        exit;
    }
}
?>
