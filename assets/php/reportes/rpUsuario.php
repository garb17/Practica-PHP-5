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

$title = 'Compras registrados';
$pdf->SetTitle($title);

$pdf->AddPage();

// First table: output all columns
/* $pdf->Table($link,'SELECT * FROM `clientes`');
$pdf->AddPage(); */
// Second table: specify 3 columns
$pdf->AddCol('cedula',23,'Cedula','C');
$pdf->AddCol('nombre',40,'Nombre','C');
$pdf->AddCol('sucursal',35,'Sede','C');
$pdf->AddCol('cantidad',30,'Cantidad','C');
$pdf->AddCol('fecha',25,'Fecha','C');
$pdf->AddCol('hora',20,'Hora','C');
$prop = array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,210),
			'padding'=>2);
$pdf->Table($conec,'SELECT us.cedula, concat(us.nombre, " ",us.apellido) AS nombre, s.sucursal , c.cantidad, c.fecha, c.hora FROM emb_compra c 
INNER JOIN emb_usuario us ON c.cedula_usuario=us.cedula
INNER JOIN emb_sede s ON c.id_sede=s.id ORDER BY us.cedula ASC',$prop);
$pdf->Output();
?>
