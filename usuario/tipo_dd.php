<?php
require_once(__DIR__ . "/controllers/tipo_dd.php");
include_once('views/header.php');
include_once('views/menu.php');
$tdd->validateRol('Capturista');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $tdd->validatePrivilegio('Insertar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $tdd->new($data);
            if ($cantidad) {
                $tdd->flash('success', "Registro dado de alta con éxito");
                $data = $tdd->get();
                include('views/tipo_dd/index.php');
            } else {
                $tdd->flash('danger', "Algo salió mal.");
                include('views/tipo_dd/form.php');
            }
        } else {
            include('views/tipo_dd/form.php');
        }
        break;
    case 'edit':
        $tdd->validatePrivilegio('Actualizar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_tipo'];
            $cantidad = $tdd->edit($id, $data);
            if ($cantidad) {
                $tdd->flash('success', "Registro actualizado con éxito");
                $data = $tdd->get();
                include('views/tipo_dd/index.php');
            } else {
                $tdd->flash('warning', "Algo falló o no hubo cambios");
                $data = $tdd->get();
                include('views/tipo_dd/index.php');
            }
        } else {
            $data = $tdd->get($id);
            include('views/tipo_dd/form.php');
        }
        break;
    case 'delete':
        $tdd->validatePrivilegio('Eliminar');
        $cantidad = $tdd->delete($id);
        if ($cantidad) {
            $tdd->flash('success', "Registro eliminado con éxito");
            $data = $tdd->get();
            include('views/tipo_dd/index.php');
        } else {
            $tdd->flash('danger', "Algo fallo");
            $data = $tdd->get();
            include('views/tipo_dd/index.php');
        }
        break;
    case 'get':
    default:
        $tdd->validatePrivilegio('Leer');
        $data = $tdd->get($id);
        include("views/tipo_dd/index.php");
}
include_once('views/footer.php');
?>