<?php
require ROOT . '\config\user\pdf.php';
require ROOT . '\template\lib\pdf\fpdf.php';
require ROOT . '\template\lib\pdf\qr-code\qrcode.class.php';

//***************************************************************
//							PDF OPTIONS
//***************************************************************

$pdf = new FPDF();
$pdf->AddPage($Orientation);
$pdf->SetAuthor($Author);
$pdf->SetTitle($Title);
$pdf->SetFont('Times','',13);

//$pdf->SetFontProperty('FontStyle=N', 'FontSize=13', 'FontFamily=Courier', 'FontColor=[0,0,0]');	//	FontStyle='B', 'I', 'U'.
																								//	FontFamily=Courier (fixed-width)
																								//			   Helvetica or Arial (synonymous; sans serif)
																								//			   Times (serif)
																								//			   Symbol (symbolic)
																								//			   ZapfDingbats (symbolic)
//***************************************************************
$pdf->SetY(77);
$pdf->Cell(50,7,RANDOM_STRING,1,1,'C');

$pdf->SetY(60);
$pdf->Cell(50, 17, '', 1,1);

$pdf->SetFont('Courier','',10);

$pdf->SetXY(65, 10);
$pdf->MultiCell(135, 6, $TEXT_HEADER, 1, 'C');	//	($w, $h, $txt, $border=0, $align='J', $fill=false)

$pdf->SetXY(65, 77);
//***************************************************************
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(0,0,0);

$qrcode = new QrCode(RANDOM_STRING,'M');
$qrcode->displayFPDF($pdf,10,10,50);

$qrcode1 = new QrCode(RANDOM_STRING,'H');
$qrcode1->displayFPDF($pdf,11,61,15);

$qrcode2 = new QrCode(RANDOM_STRING,'L');
$qrcode2->displayFPDF($pdf,27.5,61,15);

$qrcode3 = new QrCode(RANDOM_STRING,'Q');
$qrcode3->displayFPDF($pdf,44,61,15);
$pdf->Output('cinema_night.pdf','I');
?>