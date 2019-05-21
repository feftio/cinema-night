<?php 
require_once ROOT . '/lib/fpdf/fpdf.php';
require_once ROOT . '/lib/fpdf/qr-code/qrcode.class.php';
require_once ROOT . '/lib/fpdf/code128.php';

//***************************************************************
//							CLASS RESET
//***************************************************************
class New_PDF extends PDF_Code128 {

	protected $FontPropertyArray;
	protected $FontPropertyArrayMemory;

	function __construct($orientation='P', $unit='mm', $format='A4') {
		parent::__construct($orientation, $unit, $format);
		$this->FontPropertyArrayMemory = ['FontSize' => 0, 'FontStyle' => '', 'FontFamily' => '', 'FontColor' => array(0,0,0)];
	}

	function SetFontProperty() {
		$numargs = func_num_args();
    	$arg_list = func_get_args();
    	$string = '';
    	$arr = [];

	    for ($i = 0; $i < $numargs; $i++) {
	    	$string .= $arg_list[$i] . '='; 
	    }
	    $string = substr($string, 0, -1);

		$this->FontPropertyArray = explode('=', $string);

	    for ($i=0; $i < count($this->FontPropertyArray); $i++) { 
	    	if (!($i & 1)) {

	    		switch ($this->FontPropertyArray[$i]) {

	    			case 'FontSize':
	    				$this->FontPropertyArrayMemory['FontSize'] = $this->FontPropertyArray[$i+1];
	    				break;

	    			case 'FontStyle':
	    				if ($this->FontPropertyArray[$i+1] == 'N') {
	    					$this->FontPropertyArray[$i+1] = '';
	    				}
	    				$this->FontPropertyArrayMemory['FontStyle'] = $this->FontPropertyArray[$i+1];
	    				break;

	    			case 'FontFamily':
	    				$this->FontPropertyArrayMemory['FontFamily'] = $this->FontPropertyArray[$i+1];
	    				break;

	    			case 'FontColor':
	    				$arr = explode(',', $this->FontPropertyArray[$i+1]);
	    				$arr[0] = substr($arr[0], 1);
	    				$arr[count($arr)-1] = substr($arr[count($arr)-1], 0, -1);
	    				for ($num=0; $num < 3; $num++) { 
	    					$this->FontPropertyArrayMemory['FontColor'][$num] = $arr[$num];
	    				}
	    				break;
	    		}
	    	} 
	    }

	    $this->SetFont($this->FontPropertyArrayMemory['FontFamily'], $this->FontPropertyArrayMemory['FontStyle'], $this->FontPropertyArrayMemory['FontSize']);
	    $this->SetTextColor($this->FontPropertyArrayMemory['FontColor'][0], $this->FontPropertyArrayMemory['FontColor'][1], $this->FontPropertyArrayMemory['FontColor'][2]);
	}
}

//***************************************************************
//							PDF OPTIONS
//***************************************************************
$pdf = new New_PDF();
$pdf->SetAuthor($Author);
$pdf->SetTitle($Title);
$pdf->AddPage($Orientation);
$pdf->SetFontProperty('FontStyle=N', 'FontSize=13', 'FontFamily=Courier', 'FontColor=[0,0,0]');	//	FontStyle='B', 'I', 'U', 'N'.
																								//	FontFamily=Courier (fixed-width)
																								//			   Helvetica or Arial (synonymous; sans serif)
																								//			   Times (serif)
																								//			   Symbol (symbolic)
																								//			   ZapfDingbats (symbolic)
//***************************************************************
$pdf->SetY(77);
$pdf->Cell(50,7,$RANDOM_STRING,1,1,'C');

$pdf->SetY(60);
$pdf->Cell(50, 17, '', 1,1);

$pdf->SetFontProperty('FontSize=10');

$pdf->SetXY(65, 10);
$pdf->MultiCell(135, 6, $TEXT_HEADER, 1, 'C');	//	($w, $h, $txt, $border=0, $align='J', $fill=false)

$pdf->SetXY(65, 77);

$pdf->SetDrawColor(130,130,130);
$pdf->Cell(135,7,'',1,1,'C',false);
//***************************************************************
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(0,0,0);

$pdf->Code128(66, 77.4, $RANDOM_STRING, 134, 6);
$qrcode = new QrCode($RANDOM_STRING,'M');
$qrcode->displayFPDF($pdf,10,10,50);

$qrcode1 = new QrCode($RANDOM_STRING,'H');
$qrcode1->displayFPDF($pdf,11,61,15);

$qrcode2 = new QrCode($RANDOM_STRING,'L');
$qrcode2->displayFPDF($pdf,27.5,61,15);

$qrcode3 = new QrCode($RANDOM_STRING,'Q');
$qrcode3->displayFPDF($pdf,44,61,15);
$pdf->Output('Ticketing.pdf','I');
?>