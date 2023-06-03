<?php
require_once(__DIR__ . '/sistema.php');
class Modelo extends Sistema
{
    public function get($id = null)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select * from modelo m join marca_equipo mc on m.id_marca = mc.id_marca";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from modelo m join marca_equipo mc on m.id_marca = mc.id_marca where id_modelo = :id";
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
            $sql = "insert into modelo (modelo, id_marca) values (:modelo, :id_marca)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":modelo", $data['modelo'], PDO::PARAM_STR);
            $st->bindParam(":id_marca", $data['id_marca'], PDO::PARAM_STR);
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
            $sql = "update modelo set modelo = :modelo, id_marca = :id_marca 
                where id_modelo = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->bindParam(":modelo", $data['modelo'], PDO::PARAM_STR);
            $st->bindParam(":id_marca", $data['id_marca'], PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
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
            $sql = "delete from modelo where id_modelo = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException $Exception) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }
}
$modelo = new Modelo();
?>