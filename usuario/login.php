<?php
include('controllers/sistema.php');
include('views/header.php');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'login';
switch ($action) {
    case 'logout':
    $sistema -> logout();
    include('views/login/index.php');
    break;
    case 'forgot':
        break;
    case 'login':
    default:
        if (isset($_POST['enviar'])) {
            $data = $_POST;
            if ($sistema->login($data['usuario'], $data['contrasena'])) {
                header("Location: index.php");
            }
            else{
                $sistema->flash('danger', 'Usuario o contraseña incorrectos. Inténtelo de nuevo.');
                include('views/login/index.php');
            }
        }
        include('views/login/index.php');
        break;
}
include('views/footer.php');
?>