<?php



$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 0, 0), array(23, 155, 86));
$pdf->setFooterData(array(0, 0, 0), array(23, 155, 86));

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.


// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
$firstPage = <<<EOD
<b style="font-size:100px">BitBit</b>
EOD;
$pdf->writeHTMLCell(0, 0, '70', '80', $firstPage, 0, 1, 0, true, '', true);
$pdf->Image('assets/img/favicon.png', 80, 120, 48, 48, 'PNG', '', '', true, 150, '', false, false, 1, false, false, false);

$pdf->SetPrintHeader(true);
$pdf->SetPrintFooter(true);
$pdf->AddPage();


$id_incidencia = $incidencia[0]["id_incidencia"];
$estadoAveria = $incidenciaEsatdo[0]["Descrip"];
$nombreCliente = $incidenciaCliente[0]["username"];
$uuid = $incidencia[0]["uuid"];
$nombreTecnico = ' ';
$diagnostico_prev = $incidencia[0]["Diagnostico_prev"];
$desc_averia = $incidencia[0]["desc_averia"];
$fecha_entrada = $incidencia[0]["Fecha_entrada"];
$marca = $incidencia[0]["Marca"];
$modelo = $incidencia[0]["Modelo"];
$numero_serie = $incidencia[0]["Numero_serie"];


$tbl = <<<EOD

<table class="tg" border="1" cellpadding="2" cellspacing="2" align="center">
  <tr>
    <th colspan="2">INFORMACIÓN INCIDENCIA</th>
  </tr>


  <tr>
    <td>Identificador de la incidencia</td>
    <td>{$uuid}</td>
  </tr>
  <tr>
    <td>Cliente</td>
    <td>{$nombreCliente}</td>
  </tr>
  <tr>
    <td>Esatdo actual de la avería</td>
    <td>{$estadoAveria}</td>
  </tr>
  <tr>
    <td>Tecnico asignado a la avería</td>
    <td>{$nombreTecnico}</td>
  </tr>
  <tr>
    <td>Diagnóstico previo a la reparación</td>
    <td>{$diagnostico_prev}</td>
  </tr>
  <tr>
    <td>Descripción de la avería</td>
    <td>{$desc_averia}</td>
  </tr>
  <tr>
    <td>Fecha entrada de la incidencia</td>
    <td>{$fecha_entrada}</td>
  </tr>
  <tr>
    <td>Marca y modelo</td>
    <td>{$marca}{$modelo}</td>
  </tr>
  <tr>
    <td>Numero de serie</td>
    <td>{$numero_serie}</td>
  </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');


foreach ($ficheros as $fichero) {
    if ($fichero["extension"] == 'png') {
        $file = 'http://localhost/BitBit/imagen/' . $incidencia[0]["id_incidencia"] . '/' . $fichero["id_fichero"];
        $pdf->AddPage();
    }
    $pdf->Image($file, 30, 50, 150, 180, 'PNG', '', '', true, 150, '', false, false, 1, false, false, false);
}

$pdf->AddPage();

$canva= file_get_contents($incidencia[0]["canvasImage"]);
$path = tempnam(sys_get_temp_dir(), 'prefix');
file_put_contents ($path, $canva);
$pdf->Image($path, 30, 50, 150, 180, 'PNG', '', '', true, 150, '', false, false, 1, false, false, false);


$pdf->Output('example_001.pdf', 'D');
