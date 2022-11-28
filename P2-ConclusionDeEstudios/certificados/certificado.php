<?php
$idProceso=$_GET["idProceso"];
require('fpdf.php');
//include("../modelo/conexion.php");
include("../modelo/conexion.php");
include("../modelo/procesoClase.php");
$pro = new Proceso ($idProceso,"","","","","","","","");
$res2=$pro->aceptarCertificado();
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../images/logo_umsa.png',20,8,25);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(90,40,'CERTIFICADO CONCLUSION DE ESTUDIOS',0,0,'C');
    // Salto de línea
    $this->Ln(30);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(153, 230, 85 );

$pdf->SetY(70);
$resultado = $conexion->query("select * from persona xp, proceso_verificacion xpv where xpv.id=$idProceso and xpv.id_persona=xp.id");
$row=mysqli_fetch_array($resultado);
$pdf->SetFillColor(153, 230, 85 );
$pdf->Cell(30,10,'Persona',1,0,'C',1);
$pdf->SetFillColor(255,255,254);
$pdf->Cell(150,10,$row['nombre'],1,1,'C',1);
$pdf->SetFillColor(153, 230, 85 );
$pdf->Cell(30,10,'CI',1,0,'C',1);
$pdf->SetFillColor(255,255,254);
$pdf->Cell(60,10,$row['ci'],1,0,'C',1);
$pdf->SetFillColor(153, 230, 85 );
$pdf->Cell(30,10,'Carrera',1,0,'C',1);
$pdf->SetFillColor(255,255,254);
$pdf->Cell(60,10,$row['carrera'],1,1,'C',1);
$pdf->SetFillColor(255,255,254);
$pdf->Cell(190,10,"Se certifica al alumno ".$row['nombre']. " habiendo completado su procesos educativo en lo que respecta a ",0,1,'C',1);
$pdf->Cell(180,10,"los diez semestres de la carrera",0,1,'C',1);
$pdf->SetY(150);
$pdf->SetFillColor(255,255,254);
$pdf->Cell(180,10,"Director de la Carrera",0,1,'C',1);


$pdf->Output();
?>