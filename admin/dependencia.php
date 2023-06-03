<?php
require_once(__DIR__ . "/controllers/dependencia.php");
require_once(__DIR__ . "/controllers/area.php");
include_once('views/header.php');
include_once('views/menu.php');
$dependencia->validateRol('Administrador');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $dependencia->validatePrivilegio('Insertar');
        $dataareas = $area->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $dependencia->new($data);
            if ($cantidad) {
                $dependencia->flash('success', "Registro dado de alta con éxito");
                $data = $dependencia->get();
                include('views/dependencia/index.php');
            } else {
                $dependencia->flash('danger', "Algo salió mal.");
                include('views/dependencia/form.php');
            }
        } else {
            include('views/dependencia/form.php');
        }
        break;
    case 'edit':
        $dependencia->validatePrivilegio('Actualizar');
        $dataareas = $area->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_dependencia'];
            $cantidad = $dependencia->edit($id, $data);
            if ($cantidad) {
                $dependencia->flash('success', "Registro actualizado con éxito");
                $data = $dependencia->get();
                include('views/dependencia/index.php');
            } else {
                $dependencia->flash('warning', "Algo falló o no hubo cambios");
                $data = $dependencia->get();
                include('views/dependencia/index.php');
            }
        } else {
            $data = $dependencia->get($id);
            include('views/dependencia/form.php');
        }
        break;
    case 'delete':
        $dependencia->validatePrivilegio('Eliminar');
        $cantidad = $dependencia->delete($id);
        if ($cantidad) {
            $dependencia->flash('success', "Registro eliminado con éxito");
            $data = $dependencia->get();
            include('views/dependencia/index.php');
        } else {
            $dependencia->flash('danger', "Algo fallo");
            $data = $dependencia->get();
            include('views/dependencia/index.php');
        }
        break;
    case 'get':
    default:
        $dependencia->validatePrivilegio('Leer');
        $data = $dependencia->get($id);
        include("views/dependencia/index.php");
}
include_once('views/footer.php');
?>