<?php
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Spipu\Html2Pdf\Exception\Html2PdfException;

require_once(__DIR__ . "/controllers/sistema.php");
require_once("../vendor/autoload.php");
use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$sistema->connectDB();
switch ($action):
    case 'pu':
        try {
            ob_start();
            include __DIR__ . '/views/reportes/reporte_pu.php';
            $content = ob_get_clean();
            $html2pdf->writeHTML($content);
            $html2pdf->output();
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getHtmlMessage();
        }
        break;
    case 'area':
        try {
            ob_start();
            include __DIR__ . '/views/reportes/reporte_area.php';
            $content = ob_get_clean();
            $html2pdf->writeHTML($content);
            $html2pdf->output();
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getHtmlMessage();
        }
        break;
    case 'dependencia':
        try {
            ob_start();
            include __DIR__ . '/views/reportes/reporte_dependencia.php';
            $content = ob_get_clean();
            $html2pdf->writeHTML($content);
            $html2pdf->output();
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getHtmlMessage();
        }
        break;
    case 'modeloeq':
        try {
            ob_start();
            include __DIR__ . '/views/reportes/reporte_modeloeq.php';
            $content = ob_get_clean();
            $html2pdf->writeHTML($content);
            $html2pdf->output();
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getHtmlMessage();
        }
        break;
        case 'marcaeq':
            try {
                ob_start();
                include __DIR__ . '/views/reportes/reporte_marcaeq.php';
                $content = ob_get_clean();
                $html2pdf->writeHTML($content);
                $html2pdf->output();
            } catch (Html2PdfException $e) {
                $html2pdf->clean();
                $formatter = new ExceptionFormatter($e);
                echo $formatter->getHtmlMessage();
            }
            break;
    default:
        $html = '<h1>Sin reporte</h1>No hay ningún reporte por generar.';
endswitch;
/*$html2pdf->writeHTML($html);
$html2pdf->output();*/
?>