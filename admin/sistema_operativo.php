<?php
require_once(__DIR__ . "/controllers/sistema_operativo.php");
include_once('views/header.php');
include_once('views/menu.php');
$so->validateRol('Administrador');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $so->validatePrivilegio('Insertar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $so->new($data);
            if ($cantidad) {
                $so->flash('success', "Registro dado de alta con éxito");
                $data = $so->get();
                include('views/sistema_operativo/index.php');
            } else {
                $so->flash('danger', "Algo salió mal.");
                include('views/sistema_operativo/form.php');
            }
        } else {
            include('views/sistema_operativo/form.php');
        }
        break;
    case 'edit':
        $so->validatePrivilegio('Actualizar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_so'];
            $cantidad = $so->edit($id, $data);
            if ($cantidad) {
                $so->flash('success', "Registro actualizado con éxito");
                $data = $so->get();
                include('views/sistema_operativo/index.php');
            } else {
                $so->flash('warning', "Algo falló o no hubo cambios");
                $data = $so->get();
                include('views/sistema_operativo/index.php');
            }
        } else {
            $data = $so->get($id);
            include('views/sistema_operativo/form.php');
        }
        break;
    case 'delete':
        $so->validatePrivilegio('Eliminar');
        $cantidad = $so->delete($id);
        if ($cantidad) {
            $so->flash('success', "Registro eliminado con éxito");
            $data = $so->get();
            include('views/sistema_operativo/index.php');
        } else {
            $so->flash('danger', "Algo fallo");
            $data = $so->get();
            include('views/sistema_operativo/index.php');
        }
        break;
    case 'get':
    default:
        $so->validatePrivilegio('Leer');
        $data = $so->get($id);
        include("views/sistema_operativo/index.php");
}
include_once('views/footer.php');
?>