<?php
session_start();
require_once(__DIR__ . '/../config.php');
class Sistema
{
    var $db = null;

    public function connectDB()
    {
        $dsn = DBDRIVER . ':host=' . DBHOST . ';dbname=' . DBNAME . ';port=' . DBPORT;
        $this->db = new PDO($dsn, DBUSER, DBPASS);
    }

    public function flash($color, $msg)
    {
        include('views/flash.php');
    }

    public function login($user, $contrasena)
    {
        if (!is_null($contrasena)) {
            if (strlen($contrasena) > 0) {
                if ($this->userExists($user)) {
                    $contrasena = md5($contrasena);
                    $this->connectDB();
                    $sql = 'select id_usuario, usuario from usuarios where usuario = :usuario and contrasena = :contrasena';
                    $st = $this->db->prepare($sql);
                    $st->bindParam(":usuario", $user, PDO::PARAM_STR);
                    $st->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
                    $st->execute();
                    $data = $st->fetchAll(PDO::FETCH_ASSOC);
                    if (isset($data[0])) {
                        $data = $data[0];
                        $_SESSION = $data;
                        $_SESSION['roles'] = $this->getRoles($user);
                        $_SESSION['privilegios'] = $this->getPrivilegios($user);
                        $_SESSION['validado'] = true;
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function logout()
    {
        unset($_SESSION["validado"]);
        session_destroy();
    }

    public function userExists($user)
    {
        $this->connectDB(); //Realiza conexión con la base de datos.
        $sql = 'select usuario from usuarios where usuario = :usuario'; //Realiza consulta para buscar al usuario.
        $st = $this->db->prepare($sql); //Prepara el query.
        $st->bindParam(':usuario', $user, PDO::PARAM_STR); //Realiza una unión para enviar la información de la variable a la consutla.
        $st->execute(); //Ejecuta el query.
        //$data = $st -> fetchAll(PDO::FETCH_ASSOC); //Almacena en $data el resultado de la consulta
        $rc = $st->rowCount();
        if ($rc > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getRoles($user)
    {
        $roles = array();
        if ($this->userExists($user)) {
            $this->connectDB();
            $sql = 'select r.rol from usuarios u 
            join usuarios_roles ur on u.id_usuario = ur.id_usuario 
            join roles r on r.id_rol = ur.id_rol
            where u.usuario = :usuario';
            $st = $this->db->prepare($sql);
            $st->bindParam(":usuario", $user, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $key => $rol) {
                array_push($roles, $rol['rol']);
            }
        }
        return $roles;
    }

    public function getPrivilegios($user)
    {
        $privilegios = array();
        if ($this->userExists($user)) {
            $this->connectDB();
            $sql = 'select p.privilegio from privilegios p 
         join roles_privilegios rp on p.id_privilegio = rp.id_privilegio
         join roles r on r.id_rol = rp.id_rol
         join usuarios_roles ur on r.id_rol = ur.id_rol
         join usuarios u on u.id_usuario = ur.id_usuario
         where u.usuario = :usuario';
            $st = $this->db->prepare($sql);
            $st->bindParam(":usuario", $user, PDO::PARAM_STR);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $key => $privilegio) {
                array_push($privilegios, $privilegio['privilegio']);
            }
        }
        return $privilegios;
    }
    public function validateRol($rol)
    {
        if (isset($_SESSION['validado'])) {
            if ($_SESSION['validado']) {
                if (isset($_SESSION['roles'])) {
                    if (count($_SESSION['roles']) == 1 && in_array('Capturista', $_SESSION['roles'])) {
                        // Si el usuario solo tiene el rol "Usuario", redirige a la página deseada
                        header("Location: ../usuario/index.php");
                    } else {
                        // El usuario tiene otros roles además de "Usuario"
                        if (in_array($rol, $_SESSION['roles'])) {
                            // El usuario tiene el rol adecuado, continua con la operación
                            print('Eres un usuario también');
                        } else {
                            // El usuario no tiene el rol adecuado, muestra un mensaje de error
                            $this->killApp('No tienes el rol adecuado.');
                        }
                    }
                } else {
                    $this->killApp('No tienes roles asignados.');
                }
            } else {
                $this->killApp('No estás validado.');
            }
        } else {
            $this->killApp('No te has logueado.');
        }
    }

    public function validatePrivilegio($privilegio)
    {
        if (isset($_SESSION['validado'])) {
            if ($_SESSION['validado']) {
                if (isset($_SESSION['privilegios'])) {
                    if (!in_array($privilegio, $_SESSION['privilegios'])) {
                        $this->killApp('No tienes el privilegio adecuado.');
                    }
                } else {
                    $this->killApp('No tienes privilegios asignados.');
                }
            } else {
                $this->killApp('No estás validado.');
            }
        } else {
            $this->killApp('No te has logueado.');
        }
    }

    public function killApp($mensaje)
    {
        ob_end_clean();
        include('views/header_error.php');
        $this->flash('danger', $mensaje);
        include('views/footer_error.php');
        die();
    }

    public function uploadfile($tipo, $ruta, $archivo)
    {
        $name = false;
        $uploads['imagen'] = array("image/jpeg", "image/jpg", "image/gif", "image/png");
        if ($_FILES[$tipo]['error'] == 4) {
            return $name;
        }
        if ($_FILES[$tipo]['error'] == 0) {
            if (in_array($_FILES[$tipo]['type'], $uploads['imagen'])) {
                if ($_FILES[$tipo]['size'] <= 10 * 1048 * 1048) //Se puede declarar otro arreglo de tamaños
                {
                    $origen = $_FILES[$tipo]['tmp_name'];
                    $ext = explode(".", $_FILES[$tipo]['name']);
                    $ext = $ext[sizeof($ext) - 1];
                    $destino = $ruta . $archivo . "." . $ext;
                    if (move_uploaded_file($origen, __DIR__ . '/../' . $destino)) {
                        $name = $destino;
                    }
                }
            }
        }
        return $name;
    }
}

$sistema = new Sistema();
?>