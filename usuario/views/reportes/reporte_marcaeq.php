<?php
require_once(__DIR__ . "../../../controllers/sistema.php");
$sistema->connectDB();
$sql = "select * from marca_equipo";
$st = $sistema->db->prepare($sql);
$st->execute();
$data = $st->fetchAll(PDO::FETCH_ASSOC);
//print_r($data);
//die();
?>

<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    table {
        margin: auto;
    }

    th {
        padding: 10px;
        font-size: 20px;
        text-align: center;
        vertical-align: middle;
    }

    td {
        padding: 5px;
        font-size: 15px;
        text-align: center;
        vertical-align: middle;
    }

    .titulo {
        text-align: center;
    }
</style>

<page backtop="12mm" backbottom="12mm" backleft="12mm" backright="12mm" backimg="../images/salamancatransparente.jpg"
    backimgw="50%">
    <page_header>
        <img src="../images/footer.jpeg" width="756" height="55">
        <hr>
    </page_header>
    <page_footer>
        <hr>
        <img src="../images/footer.jpeg" width="756" height="55">
    </page_footer>
    <br>
    <div class="titulo">
        <h1><i>Marcas</i></h1>
    </div>
    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marcas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $marca): ?>
                <tr>
                    <td>
                        <?php echo $marca['id_marca']; ?>
                    </td>
                    <td>
                        <?php echo $marca['marca']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</page>