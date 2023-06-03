<?php
require_once(__DIR__ . "/controllers/modelo.php");
require_once(__DIR__ . "/controllers/marca_equipo.php");
include_once('views/header.php');
include_once('views/menu.php');
$modelo->validateRol('Administrador');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $modelo->validatePrivilegio('Insertar');
        $datamarcas = $marcaEquipo->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $modelo->new($data);
            if ($cantidad) {
                $modelo->flash('success', "Registro dado de alta con éxito");
                $data = $modelo->get();
                include('views/modelo/index.php');
            } else {
                $modelo->flash('danger', "Algo salió mal.");
                include('views/modelo/form.php');
            }
        } else {
            include('views/modelo/form.php');
        }
        break;
    case 'edit':
        $modelo->validatePrivilegio('Actualizar');
        $datamarcas = $marcaEquipo->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_modelo'];
            $cantidad = $modelo->edit($id, $data);
            if ($cantidad) {
                $modelo->flash('success', "Registro actualizado con éxito");
                $data = $modelo->get();
                include('views/modelo/index.php');
            } else {
                $modelo->flash('warning', "Algo falló o no hubo cambios");
                $data = $modelo->get();
                include('views/modelo/index.php');
            }
        } else {
            $data = $modelo->get($id);
            include('views/modelo/form.php');
        }
        break;
    case 'delete':
        $modelo->validatePrivilegio('Eliminar');
        $cantidad = $modelo->delete($id);
        if ($cantidad) {
            $modelo->flash('success', "Registro eliminado con éxito");
            $data = $modelo->get();
            include('views/modelo/index.php');
        } else {
            $modelo->flash('danger', "Algo fallo");
            $data = $modelo->get();
            include('views/modelo/index.php');
        }
        break;
    case 'get':
    default:
    $modelo->validatePrivilegio('Leer');
        $data = $modelo->get($id);
        include("views/modelo/index.php");
}
include_once('views/footer.php');
?>