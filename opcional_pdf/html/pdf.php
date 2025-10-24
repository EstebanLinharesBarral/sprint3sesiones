<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$db = mysqli_connect("localhost", "root", "1234", "certificados") or die ("Error al conectar con la base de datos");

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellido"];

$query = $db->prepare("Select * from alumnos where (nombre = ? and apellidos = ?)");
$query->bind_param("ss", $nombre, $apellidos);
$query->execute();
$alumno = mysqli_fetch_array($query->get_result());

$query2 = $db->prepare("Select nombre from ciclos where codigo = ?");
$idCiclo = $alumno["id_ciclo"];
$query2->bind_param("s", $idCiclo);
$query2->execute();
$ciclo = mysqli_fetch_array($query2->get_result());

$nombre = $alumno["nombre"];
$apellidos = $alumno["apellidos"];
$dni = $alumno["DNI"];
$codigo = $alumno["id_ciclo"];

mysqli_close($db);

/*COMPROBACIONES*/
$correcto = true;

if($nombre == "" || $apellidos == ""){
    $correcto = false;
}
if($alumno["aprob"] == 0){
    $correcto = false;
}

if(!$correcto){
    session_start();
    $_SESSION['errors'] = ['Alumno no válido o no aprobado. Comprueba nombre y apellidos.'];
    $_SESSION['old'] = ['nombre' => $_POST['nombre'] ?? '', 'apellido' => $_POST['apellido'] ?? ''];

    header("Location: certificados.php");
    exit();
}


require('../fpdf186/fpdf.php');

$pdf = new FPDF("L", "mm", "A4");
$pdf->AddPage();
$pdf->Image("../img/marco.png", -2.5, 0, 300, 210);
$pdf->Image("../img/afundacion.png", 210, 28, 50, 16.5);
$pdf->Image("../img/xunta.png", 105, 30, 90, 10);

$pdf->SetFont('Arial','B',16);
$pdf->SetY(55);
$pdf->Cell(0, 11, "CONSELLERIA DE EDUCACION", 0, 1, "C");
$pdf->SetFont('Arial','',13);
$pdf->Cell(0,11,"CENTRO DE FORMACION PROFESIONAL AFUNDACION", 0, 1, "C");
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0, 11, "FORMACION PROFESIONAL SUPERIOR", 0, 1, "C");
$pdf->SetY(90);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0, 11, "A DIRECCION XERAL", 0, 1, "C");
$pdf->SetFont('Arial','',13);
$pdf->Cell(0, 5, "CERTIFICA: Que D./D.a " . $nombre . " " . $apellidos, 0, 1, "C");
$pdf->Cell(0, 10, "con NIF " . $dni . ", participou con aproveitamento na accion formativa", 0, 1, "C");
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0, 18, $codigo . " - " . $ciclo[0] , 0, 1, "C");
$pdf->SetFont('Arial','',13);
$pdf->SetY(135);
$pdf->Cell(0, 10, "que tivo lugar na entiedade:", 0, 1, "C");
$pdf->Cell(0, 10, "CPR A CORUNA AFUNDACION", 0, 1, "C");
$pdf->Cell(0, 10, "do 19 de Setembro de 2024 ao 21 de Xuno de 2026.", 0, 1, "C");
$pdf->SetXY(200,175);
$pdf->SetFont('Arial','',10);
$fecha = date("d-m-y");
$pdf->Cell(0, 10, "Fecha de solicitud: " . $fecha, 0, 1, "C");
$pdf->Output();
?>