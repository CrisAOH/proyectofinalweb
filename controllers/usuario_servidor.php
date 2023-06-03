<?php
require_once(__DIR__.'/sistema.php');
class usuarioServidor extends Sistema
{
    public function get($id = null)
    {
        $this->connectDB();
        if (is_null($id)) {
            $sql = "select * from usuario_servidor";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from usuario_servidor where id_usr = :id";
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
        $sql = "insert into usuario_servidor (usuario, contrasena) values (:usuario, :contrasena)";
        $st = $this->db->prepare($sql);
        $st->bindParam(":usuario", $data['usuario'], PDO::PARAM_STR);
        $st->bindParam(":contrasena", $data['contrasena'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function edit($id, $data)
    {
        $this->connectDB();
        $sql = "update usuario_servidor set usuario = :usuario, 
                contrasena = :contrasena where id_usr = :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":usuario", $data['usuario'], PDO::PARAM_STR);
        $st->bindParam(":contrasena", $data['contrasena'], PDO::PARAM_STR);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    public function delete($id)
    {
        $this->connectDB();
        $sql = "delete from usuario_servidor where id_usr = :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }
}
$us = new usuarioServidor();
?>