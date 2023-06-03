<?php
require_once(__DIR__ . "/controllers/sistema.php");
require_once('../vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

//Arreglos de estilos
//Estilo para el encabezado
$tableHead = [
    'font' => [
        'color' => [
            'rgb' => 'FFFFFF'
        ],
        'bold' => true,
        'size' => 14
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => '000000'
        ]
    ]
];
$titulo = [
    'font' => [
        'color' => [
            'rgb' => 'FFFFFF'
        ],
        'bold' => true,
        'size' => 20
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => 'A58E4E'
        ]
    ]
];
$subTitulo = [
    'font' => [
        'color' => [
            'rgb' => '000000'
        ],
        'bold' => true,
        'size' => 16
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => 'FFFFFF'
        ]
    ]
];
$infoGral = [
    'font' => [
        'color' => [
            'rgb' => '000000'
        ],
        'bold' => true,
        'size' => 12
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => 'D7DBDD'
        ]
    ]
];
$infoGral2 = [
    'font' => [
        'color' => [
            'rgb' => '000000'
        ],
        'bold' => false,
        'size' => 12
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => 'D7DBDD'
        ]
    ]
];
$evenRow = [
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => 'D7DBDD'
        ]
    ]
];
$oddRow = [
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => 'BDC3C7'
        ]
    ]
];
$aesthetic = [
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => 'FFFFFF'
        ]
    ]
];
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$sistema->connectDB();
switch ($action):
    case 'pu':
        $sql = "select pu.pu, a.area from punto_ubicacion pu
        join pu_area pua on pu.id_pu = pua.id_pu
        join area a on a.id_area = pua.id_area;";
        $st = $sistema->db->prepare($sql);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        //Establecer fuente de la letra
        $spreadsheet->getDefaultStyle()
            ->getFont()
            ->setName('Arial')
            ->setSize(10);
        //Encabezado
        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', "Puntos de ubicación y sus Áreas");
        $spreadsheet->getActiveSheet()
            ->mergeCells("A1:B1");
        $spreadsheet->getActiveSheet()
            ->getStyle('A1')
            ->applyFromArray($titulo);
        $spreadsheet->getActiveSheet()
            ->getStyle('A1')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        //Establecer ancho de columnas
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('A')
            ->setAutoSize(true);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('B')
            ->setAutoSize(true);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('C')
            ->setAutoSize(true);
        //Encabezados tabla
        $spreadsheet->getActiveSheet()
            ->setCellValue('A2', "Punto de ubicación")
            ->setCellValue('B2', "Área");
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:B2')
            ->getFont()
            ->setSize(12);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:B2')
            ->getFont()
            ->setBold(true);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:B2')
            ->applyFromArray($tableHead);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:B2')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        //Contenido de la tabla
        $row = 3;
        foreach ($data as $key => $pu):
            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $row, $pu['pu'])
                ->setCellValue('B' . $row, $pu['area']);
            if ($row % 2 == 0) {
                $spreadsheet->getActiveSheet()
                    ->getStyle('A' . $row . ':B' . $row)
                    ->applyFromArray($evenRow);
            } else {
                $spreadsheet->getActiveSheet()
                    ->getStyle('A' . $row . ':B' . $row)
                    ->applyFromArray($oddRow);
            }
            $spreadsheet->getActiveSheet()
                ->getStyle('A' . $row . ':B' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $row++;
        endforeach;
        header('Content-Disposition: attachment;filename="reportePU.xlsx"');
        break;
    case 'area':
        $sql = "select * from area";
        $st = $sistema->db->prepare($sql);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        //Establecer fuente de la letra
        $spreadsheet->getDefaultStyle()
            ->getFont()
            ->setName('Arial')
            ->setSize(10);
        //Encabezado
        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', "Áreas");
        $spreadsheet->getActiveSheet()
            ->mergeCells("A1:B1");
        $spreadsheet->getActiveSheet()
            ->getStyle('A1')
            ->applyFromArray($titulo);
        $spreadsheet->getActiveSheet()
            ->getStyle('A1')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        //Establecer ancho de columnas
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('A')
            ->setAutoSize(true);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('B')
            ->setAutoSize(true);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('C')
            ->setAutoSize(true);
        //Encabezados tabla
        $spreadsheet->getActiveSheet()
            ->setCellValue('A2', "ID")
            ->setCellValue('B2', "Área");
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:B2')
            ->getFont()
            ->setSize(12);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:B2')
            ->getFont()
            ->setBold(true);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:B2')
            ->applyFromArray($tableHead);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:B2')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        //Contenido de la tabla
        $row = 3;
        foreach ($data as $key => $area):
            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $row, $area['id_area'])
                ->setCellValue('B' . $row, $area['area']);
            if ($row % 2 == 0) {
                $spreadsheet->getActiveSheet()
                    ->getStyle('A' . $row . ':B' . $row)
                    ->applyFromArray($evenRow);
            } else {
                $spreadsheet->getActiveSheet()
                    ->getStyle('A' . $row . ':B' . $row)
                    ->applyFromArray($oddRow);
            }
            $spreadsheet->getActiveSheet()
                ->getStyle('A' . $row . ':B' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $row++;
        endforeach;
        header('Content-Disposition: attachment;filename="reporteAreas.xlsx"');
        break;
    case 'dependencia':
        $sql = "select * from dependencia d join area a on d.id_area=a.id_area";
        $st = $sistema->db->prepare($sql);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        //Establecer fuente de la letra
        $spreadsheet->getDefaultStyle()
            ->getFont()
            ->setName('Arial')
            ->setSize(10);
        //Encabezado
        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', "Dependencias y sus Áreas");
        $spreadsheet->getActiveSheet()
            ->mergeCells("A1:C1");
        $spreadsheet->getActiveSheet()
            ->getStyle('A1')
            ->applyFromArray($titulo);
        $spreadsheet->getActiveSheet()
            ->getStyle('A1')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        //Establecer ancho de columnas
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('A')
            ->setAutoSize(true);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('B')
            ->setAutoSize(true);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('C')
            ->setAutoSize(true);
        //Encabezados tabla
        $spreadsheet->getActiveSheet()
            ->setCellValue('A2', "ID")
            ->setCellValue('B2', "Dependencia")
            ->setCellValue('C2', "Área");
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:C2')
            ->getFont()
            ->setSize(12);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:C2')
            ->getFont()
            ->setBold(true);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:C2')
            ->applyFromArray($tableHead);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:C2')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        //Contenido de la tabla
        $row = 3;
        foreach ($data as $key => $dependencia):
            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $row, $dependencia['id_dependencia'])
                ->setCellValue('B' . $row, $dependencia['dependencia'])
                ->setCellValue('C' . $row, $dependencia['area']);
            if ($row % 2 == 0) {
                $spreadsheet->getActiveSheet()
                    ->getStyle('A' . $row . ':C' . $row)
                    ->applyFromArray($evenRow);
            } else {
                $spreadsheet->getActiveSheet()
                    ->getStyle('A' . $row . ':C' . $row)
                    ->applyFromArray($oddRow);
            }
            $spreadsheet->getActiveSheet()
                ->getStyle('A' . $row . ':C' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $row++;
        endforeach;
        header('Content-Disposition: attachment;filename="reporteDependencias.xlsx"');
        break;
    case 'modeloeq':
        $sql = "select * from modelo m join marca_equipo ma on m.id_marca=ma.id_marca";
        $st = $sistema->db->prepare($sql);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        //Establecer fuente de la letra
        $spreadsheet->getDefaultStyle()
            ->getFont()
            ->setName('Arial')
            ->setSize(10);
        //Encabezado
        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', "Marcas y modelos");
        $spreadsheet->getActiveSheet()
            ->mergeCells("A1:C1");
        $spreadsheet->getActiveSheet()
            ->getStyle('A1')
            ->applyFromArray($titulo);
        $spreadsheet->getActiveSheet()
            ->getStyle('A1')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        //Establecer ancho de columnas
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('A')
            ->setAutoSize(true);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('B')
            ->setAutoSize(true);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('C')
            ->setAutoSize(true);
        //Encabezados tabla
        $spreadsheet->getActiveSheet()
            ->setCellValue('A2', "ID")
            ->setCellValue('B2', "Marca")
            ->setCellValue('C2', "Modelo");
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:C2')
            ->getFont()
            ->setSize(12);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:C2')
            ->getFont()
            ->setBold(true);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:C2')
            ->applyFromArray($tableHead);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:C2')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        //Contenido de la tabla
        $row = 3;
        foreach ($data as $key => $modelo):
            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $row, $modelo['id_modelo'])
                ->setCellValue('B' . $row, $modelo['marca'])
                ->setCellValue('C' . $row, $modelo['modelo']);
            if ($row % 2 == 0) {
                $spreadsheet->getActiveSheet()
                    ->getStyle('A' . $row . ':C' . $row)
                    ->applyFromArray($evenRow);
            } else {
                $spreadsheet->getActiveSheet()
                    ->getStyle('A' . $row . ':C' . $row)
                    ->applyFromArray($oddRow);
            }
            $spreadsheet->getActiveSheet()
                ->getStyle('A' . $row . ':C' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $row++;
        endforeach;
        header('Content-Disposition: attachment;filename="reporteModleos.xlsx"');
        break;
    case 'marcaeq':
        $sql = "select * from marca_equipo";
        $st = $sistema->db->prepare($sql);
        $st->execute();
        $data = $st->fetchAll(PDO::FETCH_ASSOC);
        //Establecer fuente de la letra
        $spreadsheet->getDefaultStyle()
            ->getFont()
            ->setName('Arial')
            ->setSize(10);
        //Encabezado
        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', "Marcas");
        $spreadsheet->getActiveSheet()
            ->mergeCells("A1:B1");
        $spreadsheet->getActiveSheet()
            ->getStyle('A1')
            ->applyFromArray($titulo);
        $spreadsheet->getActiveSheet()
            ->getStyle('A1')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        //Establecer ancho de columnas
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('A')
            ->setAutoSize(true);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('B')
            ->setAutoSize(true);
        $spreadsheet->getActiveSheet()
            ->getColumnDimension('C')
            ->setAutoSize(true);
        //Encabezados tabla
        $spreadsheet->getActiveSheet()
            ->setCellValue('A2', "ID")
            ->setCellValue('B2', "Marca");
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:B2')
            ->getFont()
            ->setSize(12);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:B2')
            ->getFont()
            ->setBold(true);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:B2')
            ->applyFromArray($tableHead);
        $spreadsheet->getActiveSheet()
            ->getStyle('A2:B2')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        //Contenido de la tabla
        $row = 3;
        foreach ($data as $key => $marca):
            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $row, $marca['id_marca'])
                ->setCellValue('B' . $row, $marca['marca']);
            if ($row % 2 == 0) {
                $spreadsheet->getActiveSheet()
                    ->getStyle('A' . $row . ':B' . $row)
                    ->applyFromArray($evenRow);
            } else {
                $spreadsheet->getActiveSheet()
                    ->getStyle('A' . $row . ':B' . $row)
                    ->applyFromArray($oddRow);
            }
            $spreadsheet->getActiveSheet()
                ->getStyle('A' . $row . ':B' . $row)
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $row++;
        endforeach;
        header('Content-Disposition: attachment;filename="reporteMarcas.xlsx"');
        break;
    default:
endswitch;
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>