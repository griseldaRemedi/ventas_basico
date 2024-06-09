<?php
//============================================================+
// File name   : example_050.php
// Begin       : 2009-04-09
// Last Update : 2013-05-14
//
// Description : Example 050 for TCPDF class
//               2D Barcodes
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: 2D barcodes.
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('../app/TCPDF-main/tcpdf.php');
include('../app/config.php');
include('../app/controllers/ventas/cargar_venta.php');

$id_venta = $_GET['id_venta'];
$nro_venta = $_GET['nro_vta'];
$cliente_nombre = $ventas_datos[0]['nombre_cliente'];
$cliente_dni = $ventas_datos[0]['dni_cliente'];
$factura = true;
$carrito_tabla = "";
include('../app/controllers/ventas/listado_carrito.php');


//código / cantidad / descripción / precio unidad / subtotal
foreach($carrito_datos as $carrito_dato){
    $carrito_tabla = 
    '<tr style="text-align: center; ">
        <td>'.$carrito_dato['codigo'].'</td>
        <td>'.$carrito_dato['cantidad'].'</td>
        <td>'.$carrito_dato['nombre_producto'].'</td>
        <td>'.$carrito_dato['precio_venta_producto'].'</td>
        <td>'.$carrito_dato['cantidad'] * $carrito_dato['precio_venta_producto'].'</td>
    </tr>'.$carrito_tabla;
}

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sistema de Ventas');
$pdf->SetTitle('FACTURA');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(5, 15, 5);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// NOTE: 2D barcode algorithms must be implemented on 2dbarcode.php class file.

// set font
$pdf->SetFont('helvetica', '', 11);

// add a page
$pdf->AddPage();

$pdf->SetFont('helvetica', '', 12);

//inicio html

$html = '
<table>
    <tr>
        <td style="text-align: center"><b>Sistema de ventas</b></td>
        <td></td>
        <td style="font-size: 18px"><b>CUIT:</b> 54654654654</td>
    </tr>
    <tr>
        <td style="text-align: center">Santiago del Estero - Argentina</td>
        <td></td>
        <td><b>Punto de venta:</b> 0001 </td>
    </tr>
    <tr>
        <td style="text-align: center">(385)5069091</td>
        <td></td>
        <td><b>Nro de comprobante:</b> 0002</td>
    </tr>
    <tr>
        <td style="text-align: center">Condición frente al IVA</td>
        <td></td>
        <td><b>Fecha de emisión:</b> 0002</td>
    </tr>    
</table>
<p style="font-size:25px; text-align:center;"><b> FACTURA </b></p>
<table>
    <tr>
        <td>Cliente: '.$cliente_nombre.' </td>
        <td> </td>
        <td>CUIT: '.$cliente_dni.'</td>
    </tr>
</table>
<br><br>
<table border="1">
    <tr style="text-align: center; background-color: #CDCDCD;">
        <td>Código</td>
        <td>Cantidad</td>
        <td>Descripción</td>
        <td>Precio por unidad</td>
        <td>Subtotal</td>
    </tr>
    '.$carrito_tabla.'
</table>

';
$pdf->writeHTML($html);

// fin html

// set style for barcode
$style = array(
    'border' => 2,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

// QRCODE,Q : QR-CODE Better error correction
$pdf->write2DBarcode('ventaNro'.$id_venta, 'QRCODE,Q', 20, 150, 50, 50, $style, 'N');
$pdf->Text(20, 145, 'QR Sistema de Ventas');

// -------------------------------------------------------------------
// PDF417 (ISO/IEC 15438:2006)

/*

 The $type parameter can be simple 'PDF417' or 'PDF417' followed by a
 number of comma-separated options:

 'PDF417,a,e,t,s,f,o0,o1,o2,o3,o4,o5,o6'

 Possible options are:

     a  = aspect ratio (width/height);
     e  = error correction level (0-8);

     Macro Control Block options:

     t  = total number of macro segments;
     s  = macro segment index (0-99998);
     f  = file ID;
     o0 = File Name (text);
     o1 = Segment Count (numeric);
     o2 = Time Stamp (numeric);
     o3 = Sender (text);
     o4 = Addressee (text);
     o5 = File Size (numeric);
     o6 = Checksum (numeric).

 Parameters t, s and f are required for a Macro Control Block, all other parametrs are optional.
 To use a comma character ',' on text options, replace it with the character 255: "\xff".

*/


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Factura.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+