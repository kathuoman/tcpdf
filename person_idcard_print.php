<?php
require_once('vendor/autoload.php');
include("../../connect.php");

#### 8*11 cm  1 page to 2 idcard ####

$fac_id = $_GET['fac_id'];
$fac_name = $_GET['fac_name'];

// create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

define('THSARABUN_REGULAR', TCPDF_FONTS::addTTFfont('vendor/tecnickcom/tcpdf/fonts/thaifont/THSarabun.ttf', 'TrueTypeUnicode'));
define('THSARABUN_BOLD', TCPDF_FONTS::addTTFfont('vendor/tecnickcom/tcpdf/fonts/thaifont/THSarabun Bold.ttf', 'TrueTypeUnicode'));

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle($_GET['fac_name']);
$pdf->SetSubject('TCPDF กีฬามหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย ครั้งที่ ๑๔');
$pdf->SetKeywords('TCPDF, PDF, 14, srivijayagames, ruts');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
// $pdf->setFooterData(array(0,64,0), array(0,64,128));

// // set header and footer fonts
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// // set default monospaced font
// $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(30, 30, 20);
// // $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// // $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// // set auto page breaks
// // $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// // set image scale factor
// // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}


// // set header
$pdf->setPrintHeader(false);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

// Set footer
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set margins
$pdf->SetMargins(30, 0, 20);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Add a page
$pdf->AddPage();

// Image example with resizing

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// $pdf->SetY(20);
// $pdf->SetFont(THSARABUN_BOLD, 'B', 29);
// // Print text
// $pdf->Cell(0, 0, 'บันทึกข้อความ', 0, 1, 'C', 0, '', 0);
// // Set some content to print

$sql = "SELECT h.handler_id, h.handler_tname, h.handler_fname, h.handler_lname, h.handler_pic, f.fac_name
	FROM handler h
	LEFT JOIN faculty f ON h.fac_id = f.fac_id
	WHERE h.fac_id = '$fac_id'
    GROUP BY h.handler_tname, h.handler_fname, h.handler_lname, f.fac_name";
$result = mysql_query($sql);

$i=0;
$setx = 0;
$sety = 15;

$setx2 = 0;
$sety2 = -20;

while($row=mysql_fetch_array($result)){
    $i++;
    if($i == 1){
        $x = 20;
        $y = 1 + $sety;
        $xphoto = 27;
        $yphoto = 46 + $sety;
        $xName = 42;
        $yName = 74 + $sety;
        $xFac = 37;
        $yFac = 81 + $sety;
        $xSport = 47;
        $ySport = 88 + $sety;
        $xNSport = 14;
        $yNSport = 69 +  $sety;
    }else if($i == 2){
        $x = 120;
        $y = 1 + $sety;
        $xphoto = 127;
        $yphoto = 46 +  $sety;
        $xName = 142;
        $yName = 74 + $sety;
        $xFac = 137;
        $yFac = 81 + $sety;
        $xSport = 147;
        $ySport = 88 + $sety;
        $xNSport = 113;
        $yNSport = 62 + $sety;
    }
    else if($i == 3){
        $x = 20;
        $y = 160 + $sety2;
        $xphoto = 27;
        $yphoto = 205 + $sety2;
        $xName = 42;
        $yName = 233.5 + $sety2;
        $xFac = 37;
        $yFac = 240 + $sety2;
        $xSport = 47;
        $ySport = 247 + $sety2;
        $xNSport = 14;
        $yNSport = 257 +  $sety2;
    }else if($i == 4){
        $x = 120;
        $y = 160 + $sety2;
        $xphoto = 127;
        $yphoto = 205 + $sety2;
        $xName = 142;
        $yName = 233.5 + $sety2;
        $xFac = 137;
        $yFac = 240 + $sety2;
        $xSport = 147;
        $ySport = 247 + $sety2;
        $xNSport = 113;
        $yNSport = 257 + $sety2;
    }
    

    $pdf->Image('image/idcard-14-fo.png',$x,$y,80,110);

    if(file_exists('../../pic_sport/'.$row['handler_pic'])){
		if($row['handler_pic'] != '1531813656.jpg'){
			$pdf->Image('../../pic_sport/'.$row['handler_pic'],$xphoto,$yphoto,20,25);
		}
	}

    $pdf->SetXY($xName,$yName);
    $fullname = $row['handler_tname'].$row['handler_fname'].' '.$row['handler_lname'];
    //$pdf->SetFont(THSARABUN_REGULAR, '', 12);
    $pdf->SetFont(THSARABUN_BOLD, 'B', 14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(50, 7, $fullname, 0, 1, 'L', 0, '', 0);
    $pdf->SetXY($xFac,$yFac);
    //$pdf->SetFont(THSARABUN_REGULAR, '', 12);
    $pdf->SetFont(THSARABUN_BOLD, 'B', 13);
    //$pdf->Cell( 80 , 7 , iconv('UTF-8','CP874',$row['fac_name']),0,1,'C');
    $pdf->Cell(50, 7, $row['fac_name'], 0, 1, 'L', 0, '', 0);

    
    $pdf->SetXY($xSport,$ySport);
    //$pdf->SetX($xSport);
    $pdf->SetTextColor(0,0,0);
    //$pdf->SetFont('THSarabunNew','B',14);
    $pdf->SetFont(THSARABUN_BOLD, 'B', 13);

     $s_event = "SELECT h.handler_role, s.spt_name
		FROM handler h 
		LEFT JOIN sporttype s ON h.spt_id = s.spt_id
		WHERE h.handler_fname = '$row[handler_fname]' 
        AND h.handler_lname = '$row[handler_lname]'
        AND h.fac_id = '$fac_id'
		";
    
	$q_event = mysql_query($s_event);
	$no = 0;
	$handlerRole_1 = "";
	
    while($r_event = mysql_fetch_array($q_event)){
        $no++;
        $pdf->Cell(0 , 0 ,$r_event['spt_name'], 0, 1, 'L', 0, '', 0);
        //$pdf->Cell(0 , 0 ,' test', 1, 1, 'L', 0, '', 0);
        $pdf->Ln(7);
        $ySport = $ySport+3;
        $pdf->SetXY($xSport,$ySport);
    }

    if($i == 4){
        $i = 0;
        $pdf->AddPage();
    }
    
}

// $html .= <<<EOD
// <h2>HTML Image</h2>
// <img src="image/1809900986017.jpg" alt="Trulli" width="40" height="30"></p>
// EOD;

// Print text using writeHTMLCell()
//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$fileName = $_GET['fac_id'].'-'.date('Y-d-m').'.pdf';
$pdf->Output($fileName, 'I');
// // save to server
// $pdf->Output(__DIR__ . '/document/modified.pdf', 'F');
//$pdf->Close();
