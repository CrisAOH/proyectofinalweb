<?php
require_once(__DIR__ . "../../../controllers/sistema.php");
$sistema->connectDB();
$sql = "select pu.pu, a.area from punto_ubicacion pu
        join pu_area pua on pu.id_pu = pua.id_pu
        join area a on a.id_area = pua.id_area;";
$st = $sistema->db->prepare($sql);
$st->execute();
$data = $st->fetchAll(PDO::FETCH_ASSOC);
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

    .titulo{
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
        <h1><i>Puntos de ubicación y sus áreas</i></h1>
    </div>
    <br>
    <table>
        <thead>
            <tr>
                <th>Punto de ubicación</th>
                <th>Áreas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $previous_pu = null;
            foreach ($data as $key => $pu):
                if ($previous_pu !== $pu['pu']):
                    ?>
                    <tr>
                        <td>
                            <?php echo $pu['pu']; ?>
                        </td>
                        <td>
                            <?php echo $pu['area']; ?>
                        </td>
                    </tr>
                    <?php
                else:
                    ?>
                    <tr>
                        <td bgcolor="#C4C4C4"></td>
                        <td>
                            <?php echo $pu['area']; ?>
                        </td>
                    </tr>
                    <?php
                endif;
                $previous_pu = $pu['pu'];
            endforeach;
            ?>
        </tbody>
    </table>
</page>