<?php
require_once(__DIR__ . "/controllers/marca_equipo.php");
include_once('views/header.php');
include_once('views/menu.php');
$marcaEquipo->validateRol('Capturista');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $marcaEquipo->validatePrivilegio('Insertar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $marcaEquipo->new($data);
            if ($cantidad) {
                $marcaEquipo->flash('success', "Registro dado de alta con éxito");
                $data = $marcaEquipo->get();
                include('views/marca_equipo/index.php');
            } else {
                $area->flash('danger', "Algo salió mal.");
                include('views/marca_equipo/form.php');
            }
        } else {
            include('views/marca_equipo/form.php');
        }
        break;
    case 'edit':
        $marcaEquipo->validatePrivilegio('Actualizar');
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_marca'];
            $cantidad = $marcaEquipo->edit($id, $data);
            if ($cantidad) {
                $marcaEquipo->flash('success', "Registro actualizado con éxito");
                $data = $marcaEquipo->get();
                include('views/marca_equipo/index.php');
            } else {
                $marcaEquipo->flash('warning', "Algo falló o no hubo cambios");
                $data = $marcaEquipo->get();
                include('views/marca_equipo/index.php');
            }
        } else {
            $data = $marcaEquipo->get($id);
            include('views/marca_equipo/form.php');
        }
        break;
    case 'delete':
        $marcaEquipo->validatePrivilegio('Eliminar');
        $cantidad = $marcaEquipo->delete($id);
        if ($cantidad) {
            $marcaEquipo->flash('success', "Registro eliminado con éxito");
            $data = $marcaEquipo->get();
            include('views/marca_equipo/index.php');
        } else {
            $marcaEquipo->flash('danger', "Algo fallo");
            $data = $marcaEquipo->get();
            include('views/marca_equipo/index.php');
        }
        break;
    case 'get':
    default:
        $marcaEquipo->validatePrivilegio('Leer');
        $data = $marcaEquipo->get($id);
        include("views/marca_equipo/index.php");
}
include_once('views/footer.php');
?>