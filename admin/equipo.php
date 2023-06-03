<?php
require_once(__DIR__ . "/controllers/equipo.php");
require_once(__DIR__ . "/controllers/funcion.php");
require_once(__DIR__ . "/controllers/modelo.php");
require_once(__DIR__ . "/controllers/dependencia.php");
include_once('views/header.php');
include_once('views/menu.php');
$equipo->validateRol('Administrador');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':
        $equipo->validatePrivilegio('Insertar');
        $datafuncion = $funcion->get();
        $datamodelo = $modelo->get();
        $datadependencia = $dependencia->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $equipo->new($data);
            if ($cantidad) {
                $equipo->flash('success', "Registro dado de alta con éxito");
                $data = $equipo->get();
                include('views/equipo/index.php');
            } else {
                $equipo->flash('danger', "Algo salió mal.");
                include('views/equipo/form.php');
            }
        } else {
            include('views/equipo/form.php');
        }
        break;
    case 'edit':
        $equipo->validatePrivilegio('Actualizar');
        $datafuncion = $funcion->get();
        $datamodelo = $modelo->get();
        $datadependencia = $dependencia->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_equipo'];
            $cantidad = $equipo->edit($id, $data);
            if ($cantidad) {
                $equipo->flash('success', "Registro actualizado con éxito");
                $data = $equipo->get();
                include('views/equipo/index.php');
            } else {
                $equipo->flash('warning', "Algo falló o no hubo cambios");
                $data = $equipo->get();
                include('views/equipo/index.php');
            }
        } else {
            $data = $equipo->get($id);
            include('views/equipo/form.php');
        }
        break;
    case 'delete':
        $equipo->validatePrivilegio('Eliminar');
        $cantidad = $equipo->delete($id);
        if ($cantidad) {
            $equipo->flash('success', "Registro eliminado con éxito");
            $data = $equipo->get();
            include('views/equipo/index.php');
        } else {
            $equipo->flash('danger', "Algo fallo");
            $data = $equipo->get();
            include('views/equipo/index.php');
        }
        break;
    case 'get':
    default:
        $equipo->validatePrivilegio('Leer');
        $data = $equipo->get($id);
        include("views/equipo/index.php");
}
include_once('views/footer.php');
?>