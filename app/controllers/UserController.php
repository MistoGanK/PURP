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

    try {
      $result = $userModel->insertUser([
        'dni'                   => $_POST['dni'] ?? null,
        'numero_placa'          => $_POST['numero_placa'] ?? '',
        'nombre'                => $_POST['nombre'] ?? '',
        'apellidos'             => $_POST['apellidos'] ?? '',
        'password_hash'         => $hashedPassword,
        'categoria_profesional' => $_POST['categoria_profesional'] ?? 10,
        'estado_profesional'    => $_POST['estado_profesional'] ?? 10,
        'tipo_usuario'          => $_POST['tipo_usuario'] ?? 50
      ]);

      if ($result) {
        $_SESSION['flash'] = [
          'type'    => 'success',
          'message' => __('success_register')
        ];
      
      } else {
        $_SESSION['flash'] = [
          'type'    => 'error',
          'message' => __('unsuccess_register')
        ];
      }
    } catch (Exception $error) { 
      $_SESSION['flash'] = [
        'type'    => 'error',
        'message' => __('unsuccess_register') ?? 'No se pudo procesar el registro. Verifique los datos.'
      ];
    }

    header('Location: /index.php?action=register');
    exit;
  }
}