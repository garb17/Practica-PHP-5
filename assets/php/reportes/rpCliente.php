<?php

    require('../../../mysql_table.php');
    include_once("../conexion.php");

class PDF extends PDF_MySQL_Table
{
function Header()
{
		global $title;
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Calculamos ancho y posici�n del t�tulo.
		$w = $this->GetStringWidth($title)+6;
		$this->SetX((210-$w)/2);
		// Colores de los bordes, fondo y texto
		$this->SetDrawColor(85,112,144);
		$this->SetFillColor(125,189,245);
		$this->SetTextColor(21,86,159);
		// Ancho del borde (1 mm)
		$this->SetLineWidth(1);
		// T�tul
		$this->Cell($w,9,$title,1,1,'C',true);
		// Salto de l
		$this->Ln(10);
	// Ensure table header is printed
	parent::Header();
}
}

$pdf = new PDF();

$title = 'Clientes registrados';
$pdf->SetTitle($title);

$pdf->AddPage();
// First table: output all columns
/* $pdf->Table($link,'SELECT * FROM `clientes`');
$pdf->AddPage(); */
// Second table: specify 3 columns
$pdf->AddCol('cedula',25,'Cedula','C');
$pdf->AddCol('nombre',30,'Nombre','C');
$pdf->AddCol('direccion',80,'Direccion','C');
$pdf->AddCol('telefono',50,'Telefono','C');
$prop = array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,210),
			'padding'=>2);
$pdf->Table($conec,'SELECT * FROM emb_cliente',$prop);
$pdf->Output();
?>
