<?php
require_once(__DIR__ . '/sistema.php');

class Pu extends Sistema
{
    public function get($id = null)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select * from punto_ubicacion";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from punto_ubicacion where id_pu = :id";
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
            $sql = "insert into punto_ubicacion (pu) values (:pu)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":pu", $data['pu'], PDO::PARAM_STR);
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
        try {
            $this->db->beginTransaction();
            $sql = "update punto_ubicacion set pu = :pu where id_pu = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->bindParam(":pu", $data['pu'], PDO::PARAM_STR);
            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }

    public function delete($id)
    {
        $this->connectDB();
        try {
            $this->db->beginTransaction();
            $sql = "delete from pu_area where id_pu = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $sql2 = "delete from punto_ubicacion where id_pu = :id";
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

    public function getArea($id)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select a.* from area a join pu_area pua on a.id_area = pua.id_area";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select a.* from area a join pu_area pua on a.id_area = pua.id_area where pua.id_pu = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function deleteArea($id, $id2)
    {
        $this->connectDB();
        $sql = "delete from pu_area where id_area = :id2 and id_pu=:id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":id2", $id2, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function newArea($id, $data)
    {
        $this->connectDB();
        $rc = 0;
        try {
            $sql = "insert into pu_area (id_area,id_pu) values (:id_area, :id_pu)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id_area", $data['id_area'], PDO::PARAM_INT);
            $st->bindParam(":id_pu", $data['id_pu'], PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();
        } catch (PDOException $e) {
            $this->flash('warning', "Ya existe esa área en este punto de ubicación.");
        }
        return $rc;
    }
}
$pu = new Pu();
?>