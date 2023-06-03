<?php
require_once("controllers/rol.php");
require_once("controllers/privilegio.php");
include_once('views/header.php');
include_once('views/menu.php');
$rol->validateRol('Administrador');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$id_privilegio = (isset($_GET['id_privilegio'])) ? $_GET['id_privilegio'] : null;
switch ($action) {
    case 'new':
        $rol->validatePrivilegio('Agregar Roles');
        $dataprivilegio = $privilegio->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $rol->new($data);
            if ($cantidad) {
                $rol->flash('success', "Registro dado de alta con éxito");
                $data = $rol->get();
                include('views/rol/index.php');
            } else {
                $rol->flash('danger', "Algo fallo");
                include('views/rol/form.php');
            }
        } else {
            include('views/rol/form.php');
        }
        break;
    case 'edit':
        $rol->validatePrivilegio('Actualizar Roles');
        $dataprivilegio = $privilegio->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_rol'];
            $cantidad = $rol->edit($id, $data);
            if ($cantidad) {
                $rol->flash('success', "Registro actualizado con éxito");
                $data = $rol->get();
                include('views/rol/index.php');
            } else {
                $rol->flash('warning', "Algo falló o no hubo cambios");
                $data = $rol->get();
                include('views/rol/index.php');
            }
        } else {
            $data = $rol->get($id);
            include('views/rol/form.php');
        }
        break;
    case 'delete':
        $rol->validatePrivilegio('Eliminar Roles');
        $cantidad = $rol->delete($id);
        if ($cantidad) {
            $rol->flash('success', "Registro eliminado con éxito");
            $data = $rol->get();
            include('views/rol/index.php');
        } else {
            $rol->flash('danger', "Algo fallo");
            $data = $rol->get();
            include('views/rol/index.php');
        }
        break;
    case 'privilegio':
        $rol->validatePrivilegio('Leer');
        $data = $rol->get($id);
        $data_privilegio = $rol->getPrivilegio($id);
        include('views/rol/privilegio.php');
        break;
    case 'deletePrivilegio':
        $rol->validatePrivilegio('Eliminar Privilegio');
        $cantidad = $rol->deletePrivilegio($id, $id_privilegio);
        if ($cantidad) {
            $rol->flash('success', "Registro eliminado con éxito");
            $data = $rol->get($id);
            $data_privilegio = $rol->getPrivilegio($id);
            include('views/rol/privilegio.php');
        } else {
            $rol->flash('danger', "Algo fallo");
            $data = $rol->get($id);
            $data_privilegio = $rol->getPrivilegio($id);
            include('views/rol/privilegio.php');
        }
        break;
    case 'newPrivilegio':
        $rol->validatePrivilegio('Agregar Privilegio');
        $data = $rol->get($id);
        $dataprivilegio = $privilegio->get();
        if (isset($_POST['enviar'])) {
            $data2 = $_POST['data'];
            $cantidad = $rol->newPrivilegio($id, $data2);
            if ($cantidad) {
                $rol->flash('success', "Registro dado de alta con éxito");

            } else {
                $rol->flash('danger', "Algo falló.");
            }
            $data_privilegio = $rol->getPrivilegio($id);
            include('views/rol/privilegio.php');
        } else {
            include('views/rol/privilegio_form.php');
        }
        break;
    case 'get':
    default:
        $rol->validatePrivilegio('Leer');
        $data = $rol->get($id);
        include("views/rol/index.php");
}
include_once('views/footer.php');
?>