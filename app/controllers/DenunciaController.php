<?php
require_once __DIR__ . '/../models/Denuncia.php';

class DenunciaController
{
    /**
     * Loads Denuncia visual interface
     * @return void
     */
    public static function listar(): void
    {
        $model = new Denuncia();
        $denuncias = $model->listar();

        require __DIR__ . '/../views/denuncias/listar.php';
    }

    /**
     * Loads a specific Denuncia by ID
     * @return void
     */
    public static function listarDenuncia(): void
    {
        $id = $_GET['id_denuncia'] ?? null;

        if (!$id) {
            header('Location: /index.php?action=denuncias');
            exit;
        }

        $model = new Denuncia();

        $denuncia = $model->findById($id);

        if (!$denuncia) {
            $_SESSION['flash'] = [
                'type'    => 'error',
                'message' => 'La denuncia solicitada no existe.'
            ];
            header('Location: /index.php?action=denuncias');
            exit;
        }

        require __DIR__ . '/../views/denuncias/listar_denuncia.php';
    }

    /**
     * Loads Crear visual interface
     * @return void
     */
    public static function crear(): void
    {
        require __DIR__ . '/../views/denuncias/crear.php';
    }

    /**
     * Saves a new Denuncia
     * @return void
     */
    public static function guardar(): void
    {
        $model = new Denuncia();

        try {
            $result = $model->crear([
                'tipo_delito'         => (int) ($_POST['tipo_delito']) ?? null,
                'gravedad_delito'     => (int) ($_POST['gravedad_delito']) ?? null,
                'ambito_lugar'        => (int) ($_POST['ambito_lugar']) ?? null,
                'subambito_lugar'     => (int) ($_POST['subambito_lugar']) ?? null,
                'lugar_detalle'       => (string) (trim($_POST['lugar_detalle_texto'])),
                'descripcion_hechos'  => (string) (trim($_POST['descripcion_hechos'])),
                'fecha_hechos'        => (string) ($_POST['fecha_hechos']) ?? null,
                'id_usuario'          => (int) ($_SESSION['user']['agent_id']),
                'codigo_expediente'   => (string) ($_POST['codigo_expediente'] ?? 'EXP-' . strtoupper(bin2hex(random_bytes(4)))),
                'canal_entrada'       => (int) ($_POST['canal_entrada'] ?? 10)
            ]);

            if ($result) {
                $_SESSION['flash'] = [
                    'type'    => 'success',
                    'message' => __('success_denuncia_register') ?? 'Denuncia registrada con éxito.'
                ];
            } else {
                $_SESSION['flash'] = [
                    'type'    => 'error',
                    'message' => __('unsuccess_denuncia_register') ?? 'No se pudo registrar la denuncia.'
                ];
            }
        } catch (Exception $error) {
            /*
            dump_die([
                'Mensaje de Error' => $error->getMessage(),
                'Archivo donde falló' => $error->getFile(),
                'Línea del fallo' => $error->getLine()
            ]);
            */

            $_SESSION['flash'] = [
                'type'    => 'error',
                'message' => __('error_system') ?? 'Error sistémico al procesar el registro.'
            ];
        }

        header('Location: /index.php?action=denuncia_nueva');
        exit;
    }

    /**
     * Updates an existing Denuncia
     * @return void
     */
    public static function actualizar(): void
    {
        // 1. Control de seguridad (Solo Admins pueden editar)
        $sessionUser = $_SESSION['user'] ?? [];
        $currentRole = (int) ($sessionUser['agent_user_role'] ?? 99);
        $isAdmin = ($currentRole <= 20);

        if (!$isAdmin) {
            // Intento de bypass por un usuario sin privilegios
            $_SESSION['flash'] = [
                'type'    => 'error',
                'message' => __('error_unauthorized') ?? 'Acceso denegado: No tienes permisos para modificar denuncias.'
            ];
            // TODO: CREATE LOG FOR ATTACKS
            header('Location: /index.php?action=listar');
            exit;
        }

        $id_denuncia = (int) ($_POST['id_denuncia'] ?? 0);

        if (!$id_denuncia) {
            $_SESSION['flash'] = [
                'type'    => 'error',
                'message' => __('error_missing_id') ?? 'Error: No se ha especificado la denuncia a editar.'
            ];
            header('Location: /index.php?action=denuncias');
            exit;
        }

        $data = [
            'id_denuncia'        => $id_denuncia,
            'tipo_delito'        => (int) ($_POST['tipo_delito'] ?? null),
            'gravedad_delito'    => (int) ($_POST['gravedad_delito'] ?? null),
            'canal_entrada'      => (int) ($_POST['canal_entrada'] ?? 10),
            'estado_legal'       => (int) ($_POST['estado_legal'] ?? 10),
            'fecha_hechos'       => (string) ($_POST['fecha_hechos'] ?? null),
            'ambito_lugar'       => (int) ($_POST['ambito_lugar'] ?? null),
            'subambito_lugar'    => (int) ($_POST['subambito_lugar'] ?? null),
            'lugar_detalle'      => (string) trim($_POST['lugar_detalle'] ?? ''),
            'descripcion_hechos' => (string) trim($_POST['descripcion_hechos'] ?? '')
        ];

        $model = new Denuncia();

        // 3. Persistencia en la Base de Datos
        try {
            $result = $model->actualizar($data);

            if ($result) {
                $_SESSION['flash'] = [
                    'type'    => 'success',
                    'message' => __('success_denuncia_update') ?? 'Denuncia actualizada correctamente.'
                ];
            } else {
                $_SESSION['flash'] = [
                    'type'    => 'error',
                    'message' => __('unsuccess_denuncia_update') ?? 'No se detectaron cambios o no se pudo actualizar.'
                ];
            }
        } catch (Exception $error) {
            $_SESSION['flash'] = [
                'type'    => 'error',
                'message' => __('error_system') ?? 'Error sistémico al procesar la actualización.'
            ];
        }

        header('Location: /index.php?action=denuncia&id_denuncia=' . $id_denuncia);
        exit;
    }

    /**
     * Deletes a Denuncia
     * @return void
     */
    public static function eliminar(): void
    {
        // 1. Control de seguridad (Solo Admins)
        $currentRole = (int) ($_SESSION['user']['agent_user_role'] ?? 99);
        if ($currentRole > 20) {
            $_SESSION['flash'] = [
                'type'    => 'error',
                'message' => __('error_unauthorized') ?? 'No tienes permisos para realizar esta acción.'
            ];
            header('Location: /index.php?action=denuncias');
            exit;
        }

        $id = $_GET['id_denuncia'] ?? null;

        if (!$id) {
            header('Location: /index.php?action=denuncias');
            exit;
        }

        $model = new Denuncia();

        try {
            $result = $model->delete($id);

            if ($result) {
                $_SESSION['flash'] = [
                    'type'    => 'success',
                    'message' => __('success_denuncia_delete') ?? 'Denuncia eliminada correctamente.'
                ];
            } else {
                $_SESSION['flash'] = [
                    'type'    => 'error',
                    'message' => __('error_denuncia_delete') ?? 'No se pudo eliminar la denuncia.'
                ];
            }
        } catch (Exception $e) {
            $_SESSION['flash'] = [
                'type'    => 'error',
                'message' => __('error_system') ?? 'Error sistémico al procesar la eliminación.'
            ];
        }

        header('Location: /index.php?action=denuncias');
        exit;
    }
}
