<?php
require_once('vendor/autoload.php');
// create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

define('THSARABUN_REGULAR', TCPDF_FONTS::addTTFfont('vendor/tecnickcom/tcpdf/fonts/thaifont/THSarabun.ttf', 'TrueTypeUnicode'));
define('THSARABUN_BOLD', TCPDF_FONTS::addTTFfont('vendor/tecnickcom/tcpdf/fonts/thaifont/THSarabun Bold.ttf', 'TrueTypeUnicode'));

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

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

// // // ---------------------------------------------------------

// // // set default font subsetting mode
// // $pdf->setFontSubsetting(true);

// // Set font
// // dejavusans is a UTF-8 Unicode font, if you only need to
// // print standard ASCII chars, you can use core fonts like
// // helvetica or times to reduce file size.
// //$pdf->SetFont('dejavusans', '', 14, '', true);

// $pdf->SetFont(THSARABUN_REGULAR, '', 14);

// // Add a page
// // This method has several options, check the source code documentation for more information.
// $pdf->AddPage();

// $pdf->SetFont(THSARABUN_BOLD, '', 14);

// // Print text
// $pdf->Write(0, 'เมียโหดโมโหผัว คว้าฉมวกแทงเป้าแล้วบิด อวัยวะเพศเหวอะ เย็บ 17 เข็ม ด้านผัวยังไม่กล้ากลับบ้าน รอเมียใจเย็นก่อน

// (3 มี.ค. 65) ผู้สื่อข่าวได้รับแจ้งจากชาวบ้านหมู่ 20 ต.ตาจง อ.ละหานทราย จ.บุรีรัมย์ ว่ามีสองผัวเมียในหมู่บ้านชอบทะเลาะกันถึงขั้นใช้ฉมวกแทงปลาแทงอวัยวะเพศ ต้องเย็บถึง 17 เข็ม
// ');

// // set text shadow effect
// $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// // Set some content to print
// $html = <<<EOD
// <h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
// <i>This is the first example of TCPDF library.</i>
// <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
// <p>Please check the source code documentation and other examples for further information.</p>
// <p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
// EOD;

// // Print text using writeHTMLCell()
// $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


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
//$pdf->Image('image/1800400340853.jpg', 30, 15, 0, 15, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
//$img = file_get_contents('https://reg.rmutsv.ac.th/regis2file/thungyai/stdImage/1800400340853.jpg');
$img = 'https://reg.rmutsv.ac.th/regis2file/thungyai/stdImage/1800400340853.jpg';

$pdf->Image($img, 30, 15, 0, 15, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

//$pdf->Image('@' . $img);


$pdf->SetY(20);
$pdf->SetFont(THSARABUN_BOLD, 'B', 29);
// Print text
$pdf->Cell(0, 0, 'บันทึกข้อความ', 0, 1, 'C', 0, '', 0);

$pdf->SetFont(THSARABUN_BOLD, 'B', 20);
// Print text
$pdf->Cell(30, 0, 'ส่วนราชการ', 0, 1, 'L', 0, '', 0);



$pdf->SetFillColor(255, 255, 255);
$pdf->SetY(34);
$pdf->SetX(55);
$pdf->SetFont(THSARABUN_REGULAR, '', 16);
$government_text = "สำนักวิทยบริการและเทคโนโลยีสารสนเทศ มหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย 
โทร. ๐๗-๔๓๑๗-๑๔๖ โทรสาร. ๐๗-๔๓๑๗-๑๔๗ เบอร์ภายใน ๑๑๖๐, ๓๐๓๐";
$pdf->MultiCell(0, 2, $government_text, 0, 'L', 1, 0, '', '', true);
$pdf->Ln();

$pdf->SetFont(THSARABUN_BOLD, 'B', 20);
$pdf->Cell(5, 0, 'ที่', 0, 0, 'L', 0, '', 0);

$pdf->SetFont(THSARABUN_REGULAR, '', 16);
$pdf->Cell(75, 9, 'อว ๐๖๕๕.๑๒/๔๒๖', 0, 0, 'L', 0, '', 0);

$pdf->SetFont(THSARABUN_BOLD, 'B', 20);
$pdf->Cell(15, 0, 'วันที่', 0, 0, 'L', 0, '', 0);

$pdf->SetFont(THSARABUN_REGULAR, '', 16);
$pdf->Cell(0, 9, '๗ กันยายน ๒๕๖๕', 0, 1, 'L', 0, '', 0);

$pdf->SetFont(THSARABUN_BOLD, 'B', 20);
$pdf->Cell(15, 0, 'เรื่อง', 0, 0, 'L', 0, '', 0);

$pdf->SetFont(THSARABUN_REGULAR, '', 16);
$pdf->SetXY(45,58);
$pdf->MultiCell(0, 0, 'แจ้งมติที่ประชุมคณะกรรมการตรวจรับพัสดุ รายการอุปกรณ์เครือข่ายไร้สาย สำหรับการเรียนการสอนออนไลน์ จำนวน ๑ ระบบ', 0, 'L',  1, 1, '', '', true);

$pdf->SetFont(THSARABUN_REGULAR, '', 16);
// $pdf->SetX(55);
// $pdf->MultiCell(0, 0, 'แจ้งมติที่ประชุมคณะกรรมการตรวจรับพัสดุ รายการอุปกรณ์เครือข่ายไร้สาย สำหรับการเรียนการสอนออนไลน์ จำนวน ๑ ระบบ', 0, 'L',  1, 1, '', '', true);

// ภาคเหตุ
$pdf->Ln(2.116);
$pdf->MultiCell(0, 0, '                    ภาคเหตุ จากมติที่ประชุมคณะกรรมการตรวจรับพัสดุ รายการอุปกรณ์เครือข่ายไร้สาย สำหรับการเรียนการสอนออนไลน์ จำนวน ๑ ระบบ', 0, 'L',  1, 1, '', '', true);

// ภาคความประสงค์
$pdf->Ln(2.116);
$pdf->MultiCell(0, 0, '                    ภาคความประสงค์ จากมติที่ประชุมคณะกรรมการตรวจรับพัสดุ รายการอุปกรณ์เครือข่ายไร้สาย สำหรับการเรียนการสอนออนไลน์ จำนวน ๑ ระบบ', 0, 'L',  1, 1, '', '', true);

// ภาคสรุป
$pdf->Ln(2.116);
$pdf->MultiCell(0, 0, '                    ภาคสรุป จึงเรียนมาเพื่อโปรดพิจราณา', 0, 'L',  1, 1, '', '', true);

// ตำแหน่ง
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln(2.116);
$pdf->SetX(105);
//$pdf->MultiCell(0, 0, '(ชื่อผู้ลงนาม........................)', 0, 'L',  1, 1, '', '', true);

$pdf->Cell(0, 0, '(ชื่อผู้ลงนาม........................)', 0, 1, 'L', 0, '', 0);
$pdf->SetX(60);
$pdf->Cell(0, 0, 'ผู้อำนวยการสำนักวิทยบริการและเทคโนโลยีสารสนเทศ', 0, 1, 'C', 0, '', 0);


//$date_timestamp = date('m/d/Y H:i:s', 1687026425);
//$pdf->Cell(0, 0, $date_timestamp , 0, 1, 'C', 0, '', 0);

// test Cell stretching
// $pdf->Cell(0, 0, 'TEST CELL STRETCH: no stretch', 1, 1, 'C', 0, '', 0);
// $pdf->Cell(0, 0, 'TEST CELL STRETCH: scaling', 1, 1, 'C', 0, '', 1);

// Print text
//$pdf->Write(0, 'เมียโหดโมโหผัว คว้าฉมวกแทงเป้าแล้วบิด อวัยวะเพศเหวอะ เย็บ 17 เข็ม ด้านผัวยังไม่กล้ากลับบ้าน รอเมียใจเย็นก่อน');

// ---------------------------------------------------------

// // Close and output PDF document
// // This method has several options, check the source code documentation for more information.
// // Save the modified PDF to the server
// $outputFilePath = 'document/modified.pdf';
// //read
$pdf->Output('example_001.pdf', 'I');
// // save to server
// $pdf->Output(__DIR__ . '/document/modified.pdf', 'F');
$pdf->Close();
?>