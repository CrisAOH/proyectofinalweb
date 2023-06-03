<?php
require_once(__DIR__."/sistema.php");
class Usuario extends Sistema
{
    public function get($id = null)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select * from usuarios";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from usuarios where id_usuario = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function new($data)
    {
        $this->connectDB();
        try {
            $this->db->beginTransaction();
            $sql = "insert into usuarios (usuario, contrasena) values (:usuario, md5(:contrasena))";
            $st = $this->db->prepare($sql);
            $st->bindParam(":usuario", $data['usuario'], PDO::PARAM_STR);
            $st->bindParam(":contrasena", $data['contrasena'], PDO::PARAM_STR);
            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }

    public function edit($id, $data)
    {
        $this->connectDB();
        if($data['cambiar']==1){
            $sql = "update usuarios set usuario=:usuario, contrasena = MD5(:contrasena) WHERE id_usuario = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->bindParam(":usuario", $data['usuario'], PDO::PARAM_STR);
            $st->bindParam(":contrasena", $data['contrasena'], PDO::PARAM_STR);
            $st->execute();
            $rc = $st->rowCount();
        }else{
            $sql = "update usuarios set usuario=:usuario WHERE id_usuario = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->bindParam(":usuario", $data['usuario'], PDO::PARAM_STR);
            $st->execute();
            $rc = $st->rowCount();
        }
        return $rc;
    }

    public function delete($id)
    {
        $this->connectDB();
        try {
            $this->db->beginTransaction();
            $sql = "delete from usuarios_roles where id_usuario=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $sql2 = "delete from usuarios where id_usuario = :id";
            $st2 = $this->db->prepare($sql2);
            $st2->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $st2->execute();
            $rc = $st2->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }

    public function getRol($id)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select r.* from roles r join usuarios_roles ur on r.id_rol = ur.id_rol";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select r.* from roles r join usuarios_roles ur on r.id_rol = ur.id_rol where ur.id_usuario=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    public function deleteRol($id, $id2)
    {
        $this->connectDB();
        $sql = "delete from usuarios_roles where id_usuario = :id and id_rol=:id2";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":id2", $id2, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function newRol($id, $data)
    {
        $this->connectDB();
        $rc=0;
        try{
            $sql = "insert into usuarios_roles (id_rol,id_usuario) values (:id_rol, :id_usuario)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id_rol",$data['id_rol'],  PDO::PARAM_INT);
            $st->bindParam(":id_usuario",$data['id_usuario'], PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();
        }catch(PDOException $e){
            echo "Error al insertar el privilegio, ya existe ese privilegio en este rol " ;
        }
        return $rc;
    }
}
$usuario = new Usuario();
?>