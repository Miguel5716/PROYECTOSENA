<?php
require('fpdf/fpdf.php');
require ("conexion.php");

class PDF extends FPDF
{

function Header()
{
    date_default_timezone_set("America/Bogota");
     $fecha_hora_entrada = $_POST['fecha_hora_entrada'];
$fecha_hora_salida = $_POST['fecha_hora_salida'];
$fecha_reporte = date("Dd-m-Y");

    $this->SetFont('Arial','B',10);
    $this->Cell(40);
    $this->Cell(100,10,'INGRESO DE MENORES ',0,0,'C');
    $this->Ln(10);

    $this->Cell(80,10,$fecha_hora_entrada,0,0,'C');
    $this->Cell(10,10,'Y',0,0,'C');

    $this->Cell(80,10,$fecha_hora_salida,0,0,'C');
    $this->Ln(10);
    $this->Cell(30,10,'FECHA REPORTE:',0,0,'C');

    $this->Cell(40,10,$fecha_reporte,0,0,'C');
    $this->Ln(20);

    $this->Cell(30,10,'DOCUMENTO',1,0,'C',0);
    $this->Cell(30,10,'CARGO',1,0,'C',0);

    $this->Cell(30,10,'NOMBRE',1,0,'C',0);

    $this->Cell(30,10,'APELLIDOS',1,0,'C',0);
    $this->Cell(30,10,'GENERO',1,0,'C',0);


    $this->Cell(40,10,'FECHA',1,1,'C',0);
  
}


function Footer()
{
    
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}
}


$fecha_hora_entrada = $_POST['fecha_hora_entrada'];
$fecha_hora_salida = $_POST['fecha_hora_salida'];


$consulta = "SELECT usuario.doc_usuario, usuario.tipo_doc, usuario.cargo, usuario.nombre, usuario.apellido, usuario.sexo, 
        registro.fecha_hora_entrada from usuario,registro
        where usuario.doc_usuario=registro.doc_usuario and usuario.tipo_doc='RC' or usuario.doc_usuario=registro.doc_usuario and usuario.tipo_doc='TI' 
        and registro.fecha_hora_entrada BETWEEN '$fecha_hora_entrada' AND '$fecha_hora_salida'" ;
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

while ($row=$resultado->fetch_assoc()) {
    $pdf->Cell(30,10,$row['doc_usuario'],1,0,'C',0);
    $pdf->Cell(30,10,$row['cargo'],1,0,'C',0);
    $pdf->Cell(30,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(30,10,$row['apellido'],1,0,'C',0);
    $pdf->Cell(30,10,$row['sexo'],1,0,'C',0);
    $pdf->Cell(40,10,$row['fecha_hora_entrada'],1,1,'C',0);

} 


    $pdf->Output();
?>