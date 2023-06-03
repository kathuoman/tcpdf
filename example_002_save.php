<?php
require('../../fpdf/fpdf.php');

$docYear = date('Y') + 543;
$edocId = $_POST["edoc_id"];
//@$departId = $_POST["departid"];//รหัสหน่วยงานของผูส่ง
$departId = '26';//รหัสหน่วยงานของผูส่ง
$userId = $_POST["userid"];
$Time = $_POST["time"];
$location = '../../document/';
$path_doc = $location.$docYear.'/doc'.'/D00-'.$departId.'/'.$docYear.'/';

if (!file_exists($path_doc)) {
    if (!mkdir($path_doc, 0777, true)) {
        die('Failed to create folders...');
    }
}

$pdf = new FPDF('P','cm','A4');

$pdf->AddPage();
// Set left, top, and right margins
$leftMargin = 3;
$topMargin = 0;
$rightMargin = 2;
$pdf->SetMargins($leftMargin, $topMargin, $rightMargin);

// Add image to the PDF
$pdf->SetY(1.5); // Set Y coordinate to 100
$pdf->Image('../../image/doc/traqut.jpg', 3, 1.5, 0, 1.5, 'JPEG');

$pdf->AddFont('THSarabunNew','b','THSarabunNew Bold.php');//หนา
$pdf->SetFont('THSarabunNew','b',29);
// Set X and Y coordinates
//$pdf->SetX(50); // Set X coordinate to 50
$pdf->SetY(2.5); // Set Y coordinate to 100
$pdf->Cell(0,0,iconv('UTF-8','CP874','บันทึกข้อความ'),0,1,'C');
$pdf->Ln(1);

// Set X and Y coordinates
//$pdf->SetX(5); // Set X coordinate to 50
//$pdf->SetY(5); // Set Y coordinate to 100
$pdf->AddFont('THSarabun','b','THSarabun Bold.php');//ธรรมดา
$pdf->SetFont('THSarabun','b',20);
$pdf->Cell(3,0,iconv('UTF-8','CP874','ส่วนราชการ'),0,1,'');

$pdf->SetY(3.2);
$pdf->SetX(5.5);
$pdf->AddFont('THSarabun','','THSarabun.php');//ธรรมดา
$pdf->SetFont('THSarabun','',16);
$government_text = "สำนักวิทยบริการและเทคโนโลยีสารสนเทศ มหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย โทร. ๐๗-๔๓๑๗-๑๔๖ โทรสาร. ๐๗-๔๓๑๗-๑๔๗ เบอร์ภายใน ๑๑๖๐, ๓๐๓๐";
$pdf->MultiCell(0,0.7 , iconv('UTF-8','CP874',$government_text), '0', '');
$pdf->Ln(1);

$pdf->AddFont('THSarabun','b','THSarabun Bold.php');//อียง
$pdf->SetFont('THSarabun','b',20);
$pdf->Cell(0,0,iconv('UTF-8','CP874','ที่'),'',1,'');
$pdf->SetX(10.5); // Set X coordinate to 50
$pdf->Cell(0,0,iconv('UTF-8','CP874','วันที่'),'',1,'');
$pdf->Ln(1);

$pdf->AddFont('THSarabun','b','THSarabun Bold.php');//หนาเอียง
$pdf->SetFont('THSarabun','b',20);
$pdf->Cell(0,0,iconv('UTF-8','CP874','เรื่อง'),'',1,'');

$pdf->Output($path_doc.'file.pdf', 'F');

?>