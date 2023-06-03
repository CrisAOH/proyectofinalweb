<?php
require_once(__DIR__ . "/controllers/procesador.php");
require_once(__DIR__ . "/controllers/marca_procesador.php");
include_once('views/header.php');
include_once('views/menu.php');
$procesador->validateRol('Capturista');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $procesador->validatePrivilegio('Insertar');
        $datamarcas = $marcaProcesador->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $procesador->new($data);
            if ($cantidad) {
                $procesador->flash('success', "Registro dado de alta con éxito");
                $data = $procesador->get();
                include('views/procesador/index.php');
            } else {
                $procesador->flash('danger', "Algo salió mal.");
                include('views/procesador/form.php');
            }
        } else {
            include('views/procesador/form.php');
        }
        break;
    case 'edit':
        $procesador->validatePrivilegio('Actualizar');
        $datamarcas = $marcaProcesador->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_procesador'];
            $cantidad = $procesador->edit($id, $data);
            if ($cantidad) {
                $procesador->flash('success', "Registro actualizado con éxito");
                $data = $procesador->get();
                include('views/procesador/index.php');
            } else {
                $procesador->flash('warning', "Algo falló o no hubo cambios");
                $data = $procesador->get();
                include('views/procesador/index.php');
            }
        } else {
            $data = $procesador->get($id);
            include('views/procesador/form.php');
        }
        break;
    case 'delete':
        $procesador->validatePrivilegio('Eliminar');
        $cantidad = $procesador->delete($id);
        if ($cantidad) {
            $procesador->flash('success', "Registro eliminado con éxito");
            $data = $procesador->get();
            include('views/procesador/index.php');
        } else {
            $procesador->flash('danger', "Algo fallo");
            $data = $procesador->get();
            include('views/procesador/index.php');
        }
        break;
    case 'get':
    default:
        $procesador->validatePrivilegio('Leer');
        $data = $procesador->get($id);
        include("views/procesador/index.php");
}
include_once('views/footer.php');
?>