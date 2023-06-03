<?php
include('controllers/sistema.php');
include('views/header.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'login';
switch ($action) {
    case 'logout':
        $sistema->logout();
        header('Location: index.php');
        break;
    case 'forgot':
        break;
    case 'login':
    default:
        if (isset($_POST['enviar'])) {
            $data = $_POST;
            if ($sistema->login($data['usuario'], $data['contrasena'])) {
                header("Location: admin/index.php");
            } else {
                $sistema->flash('danger', 'Usuario o contraseña incorrectos. Inténtelo de nuevo.');
                include(__DIR__ . '/views/login/index.php');
            }
        }
        include('views/login/index.php');
        break;
}
include('views/footer_login.php');
?>