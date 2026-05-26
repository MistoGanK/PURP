<?php
class UserController
{
  /**
   * Loads the user registration visual interface
   * Only accessible by authorized personnel (SuperAdmin/Admin)
   * @return void
   */
  public static function showRegister()
  {
    require __DIR__ . '/../views/user/register.php';
  }

  /**
   * Creates the user with hashed password to the db
   * @return void
   */
  public static function createUser()
  {
    $plainPassword = $_POST['user_password'] ?? '';
    $hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);

    $userModel = new User();

    $userModel->insertUser([
      'dni'                => $_POST['dni'] ?? null,
      'numero_placa'       => $_POST['numero_placa'] ?? '',
      'nombre'             => $_POST['nombre'] ?? '',
      'apellidos'          => $_POST['apellidos'] ?? '',
      'password_hash'      => $hashedPassword,
      'id_categoria'       => $_POST['id_categoria'] ?? 10,       // Initial default value
      'estado_profesional' => $_POST['estado_profesional'] ?? 10, // Default value active
      'tipo_usuario'       => $_POST['tipo_usuario'] ?? 50        // By default CONSULTA for security
    ]);

    header('Location: /index.php?action=admin_users');
    exit;
  }
}
