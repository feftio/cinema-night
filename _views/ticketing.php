<?php
require ROOT . '\config\user\pdf.php';
require ROOT . '\template\lib\pdf\fpdf.php';
require ROOT . '\template\lib\pdf\qr-code\qrcode.class.php';

//***************************************************************
//							PDF OPTIONS
//***************************************************************

$bean  = G::var('bean');
$iden  = G::var('iden');
$login = G::var('login');
$seats = $bean->seat;

$seats_string = '';
foreach (json_decode($seats) as $seat) 
{
	$row = explode(",", $seat)[0];
	$column = explode(",", $seat)[1];
	$seats_string .= 'Ряд: ' . $row . "\n" . 'Место: ' . $column . "\n";
}

$pdf = new FPDF();
$pdf->AddPage($Orientation);
$pdf->SetAuthor($Author);
$pdf->SetTitle($login . '_' . $iden);

define('FPDF_FONTPATH',ROOT . "template/lib/pdf/font/");
$pdf->AddFont('Arial','','arial.php'); 
$pdf->SetFont('Arial','',10);

//***************************************************************

$pdf->SetY(77);
$pdf->Cell(50,7,$bean->code,1,1,'C');

$pdf->SetY(60);
$pdf->Cell(50, 17, '', 1,1);

$pdf->SetY(84);
$pdf->MultiCell(50,7,"Логин: $login",1,'C');

$pdf->SetFont('Arial','U',12);
$pdf->SetY(91);
$pdf->MultiCell(50,14,'Цена: ' . $bean->price . 'тг',1,'C');

$pdf->SetFont('Arial','',10);
$num = 105;
foreach (json_decode($seats) as $seat)
{
	$row = explode(",", $seat)[0];
	$column = explode(",", $seat)[1];
	$pdf->SetY($num);
	$pdf->MultiCell(50,5,'Ряд: ' . $row . '|' . 'Место: ' . $column,1,'C');
	$num += 5;
}

$pdf->SetFont('Courier','',10);
$pdf->SetXY(65, 10);
$pdf->MultiCell(135, 6, $TEXT_HEADER, 1, 'C');

$pdf->SetXY(65, 77);

//***************************************************************
$qr_code = 'http://' . $_SERVER['HTTP_HOST'] . '/wipe' . $iden;

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(0,0,0);

$qrcode = new QrCode($qr_code,'M');
$qrcode->displayFPDF($pdf,10,10,50);

$qrcode1 = new QrCode($qr_code,'H');
$qrcode1->displayFPDF($pdf,11,61,15);

$qrcode2 = new QrCode($qr_code,'L');
$qrcode2->displayFPDF($pdf,27.5,61,15);

$qrcode3 = new QrCode($qr_code,'Q');
$qrcode3->displayFPDF($pdf,44,61,15);

$pdf->Output($login . '_' . $iden . '.pdf','I');
?>