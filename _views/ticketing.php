<?php

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
$pdf->AddPage('P');
$pdf->SetAuthor('Ticketing');
$pdf->SetTitle($login . '_' . $iden);

define('FPDF_FONTPATH',ROOT . "template/lib/pdf/font/");
$pdf->AddFont('Arial','','arial.php'); 
$pdf->SetFont('Arial','',12);

//***************************************************************
$pdf->SetXY(68,110);
$pdf->Cell(75,7,$bean->code . "\n | \n" . $iden,1,1,'C');

$pdf->SetXY(68, 117);
$pdf->MultiCell(75,7,"Логин: $login",1,'C');

$pdf->SetFont('Arial','U',13);
$pdf->SetXY(60, 124);
$pdf->MultiCell(91,10,"Цена: " . $bean->price . 'тг(' . $bean->cost . 'тг/шт)',1,'C');

$pdf->SetFont('Arial','',10);
$num = 134;
foreach (json_decode($seats) as $seat)
{
	$row = explode(",", $seat)[0];
	$column = explode(",", $seat)[1];
	$pdf->SetXY(60,$num);
	$pdf->MultiCell(91,5,'Ряд: ' . $row . '|' . 'Место: ' . $column,1,'C');
	$num += 5;
}

//***************************************************************

$qr_code = 'http://' . $_SERVER['HTTP_HOST'] . '/wipe' . $iden;

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(0,0,0);

$qrcode = new QrCode($qr_code,'M');
$qrcode->displayFPDF($pdf,68,10,75);

$qrcode1 = new QrCode($qr_code,'H');
$qrcode1->displayFPDF($pdf,68,85,25);

$qrcode2 = new QrCode($qr_code,'L');
$qrcode2->displayFPDF($pdf,93,85,25);

$qrcode3 = new QrCode($qr_code,'Q');
$qrcode3->displayFPDF($pdf,118,85,25);

$pdf->Output($login . '_' . $iden . '.pdf','I');
?>