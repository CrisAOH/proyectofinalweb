<?php
require_once(__DIR__ . '/sistema.php');
class marcaProcesador extends Sistema
{
    public function get($id = null)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select * from marca_procesador";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from marca_procesador where id_marca = :id";
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
            $sql = "insert into marca_procesador (marca) values (:marca)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":marca", $data['marca'], PDO::PARAM_STR);
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
            $sql = "update marca_procesador set marca = :marca where id_marca = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->bindParam(":marca", $data['marca'], PDO::PARAM_STR);
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
            $sql = "delete from marca_procesador where id_marca = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        } catch (PDOException $Exxception) {
            $rc = 0;
            $this->db->rollBack();
        }
        return $rc;
    }
}
$marcaProcesador = new marcaProcesador();
?>