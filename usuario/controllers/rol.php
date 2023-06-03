<?php
require_once(__DIR__ . "/sistema.php");
class Rol extends Sistema
{
    public function get($id = null)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select * from roles";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from roles where id_rol = :id";
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
            $sql = "insert into roles (rol) values (:rol)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":rol", $data['rol'], PDO::PARAM_STR);
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
        $sql = "update roles set rol = :rol where id_rol = :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":rol", $data['rol'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function delete($id)
    {
        $this->connectDB();
        try {
            $this->db->beginTransaction();
            $sql = "delete from roles_privilegios where id_rol = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $sql2 = "delete from roles where id_rol = :id";
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

    public function getPrivilegio($id)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select p.* from privilegios p join roles_privilegios rp on p.id_privilegio = rp.id_privilegio";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select p.* from privilegios p join roles_privilegios rp on p.id_privilegio = rp.id_privilegio where rp.id_rol=:id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function deletePrivilegio($id, $id2)
    {
        $this->connectDB();
        $sql = "delete from roles_privilegios where id_rol = :id and id_privilegio=:id2";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":id2", $id2, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function newPrivilegio($id, $data)
    {
        $this->connectDB();
        $rc = 0;
        try {
            $sql = "insert into roles_privilegios (id_privilegio,id_rol) values (:id_privilegio, :id_rol)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id_privilegio", $data['id_privilegio'], PDO::PARAM_INT);
            $st->bindParam(":id_rol", $data['id_rol'], PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();
        } catch (PDOException $e) {
            $this->flash('warning', "Ya existe ese privilegio en este rol.");
        }
        return $rc;
    }
}
$rol = new Rol();
?>