<?php
/**
 * Enrutador departamento
 */
require_once(__DIR__ . "/controllers/servidor.php");
require_once(__DIR__ . "/controllers/procesador.php");
require_once(__DIR__ . "/controllers/tipo_servidor.php");
require_once(__DIR__ . "/controllers/tipo_dd.php");
require_once(__DIR__ . "/controllers/sistema_operativo.php");
require_once(__DIR__ . "/controllers/equipo.php");
require_once(__DIR__ . "/controllers/usuario_servidor.php");
include_once('views/header.php');
include_once('views/menu.php');
$srv->validateRol('Capturista');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$id_usr = (isset($_GET['id_usr'])) ? $_GET['id_usr'] : null;
switch ($action) {
    case 'new':
        $srv->validatePrivilegio('Insertar');
        $dataprocesador = $procesador->get();
        $datatiposrv = $ts->get();
        $datatipodd = $tdd->get();
        $dataso = $so->get();
        $dataequipo = $equipo->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $srv->new($data);
            if ($cantidad) {
                $srv->flash('success', "Registro dado de alta con éxito");
                $data = $srv->get();
                include('views/servidor/index.php');
            } else {
                $pu->flash('danger', "Algo salió mal.");
                include('views/servidor/form.php');
            }
        } else {
            include('views/servidor/form.php');
        }
        break;
    case 'edit':
        $srv->validatePrivilegio('Actualizar');
        $dataprocesador = $procesador->get();
        $datatiposrv = $ts->get();
        $datatipodd = $tdd->get();
        $dataso = $so->get();
        $dataequipo = $equipo->get();
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_servidor'];
            $cantidad = $srv->edit($id, $data);
            if ($cantidad) {
                $srv->flash('success', "Registro actualizado con éxito");
                $data = $srv->get();
                include('views/servidor/index.php');
            } else {
                $srv->flash('warning', "Algo falló o no hubo cambios");
                $data = $srv->get();
                include('views/servidor/index.php');
            }
        } else {
            $data = $srv->get($id);
            include('views/servidor/form.php');
        }
        break;
    case 'delete':
        $srv->validatePrivilegio('Eliminar');
        $cantidad = $srv->delete($id);
        if ($cantidad) {
            $srv->flash('success', "Registro eliminado con éxito");
            $data = $srv->get();
            include('views/servidor/index.php');
        } else {
            $srv->flash('danger', "Algo fallo");
            $data = $srv->get();
            include('views/servidor/index.php');
        }
        break;
    case 'usuario':
        $srv->validatePrivilegio('Leer');
        $data = $srv->get($id);
        $data_usr = $srv->getUsuario($id);
        include('views/servidor/usr.php');
        break;
    case 'deleteUsuario':
        $srv->validatePrivilegio('Eliminar');
        $cantidad = $srv->deleteUsuario($id_usr, $id);
        if ($cantidad) {
            $srv->flash('success', "Registro eliminado con éxito");
            $data = $srv->get($id);
            $data_usr = $srv->getUsuario($id);
            include('views/servidor/usr.php');
        } else {
            $srv->flash('danger', "Algo fallo");
            $data = $srv->get($id);
            $data_usr = $srv->getUsuario($id);
            include('views/servidor/usr.php');
        }
        break;
    case 'newUsuario':
        $srv->validatePrivilegio('Insertar');
        $data = $srv->get($id);
        $datausr = $us->get();
        if (isset($_POST['enviar'])) {
            $data2 = $_POST['data'];
            $cantidad = $srv->newUsuario($id, $data2);
            if ($cantidad) {
                $srv->flash('success', "Registro dado de alta con éxito");
            } else {
                $srv->flash('danger', "Algo falló.");
            }
            $data_usr = $srv->getUsuario($id);
            include('views/servidor/usr.php');
        } else {
            include('views/servidor/usr_form.php');
        }
        break;
    case 'get':
    default:
        $srv->validatePrivilegio('Leer');
        $data = $srv->get($id);
        include("views/servidor/index.php");
}
include_once('views/footer.php');
?>