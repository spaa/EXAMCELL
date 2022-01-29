<?php
 include'server.php';


$sql ="SELECT * FROM student_general_info
where uid = '115CP1001A'";

$records = mysqli_query($db,$sql);

require("../fpdf181/fpdf.php");

$pdf = new FPDF('l','mm','A4');

$pdf->Addpage();

//!--------PLEASE DONT CHANGE ANY VALUE HERE------!
$pdf->SetFont('Times','B','16');
$pdf->Multicell(0,30," ",1,'C');
$pdf->Text(120,20,'University Of Mumbai');
$pdf->SetFont('');
$pdf->Text(50,28,'MAHATMA GANDHI MISSION COLLEGE OF ENGINEERING & TECHNOLOGY');
$pdf->Text(100,36,'sector-18, Kamothe, Navi Mumbai - 410209');
$pdf->SetFont('Arial','B','12');
$pdf->cell(200,18,' ',1,0,'R');
$pdf->Text(180,46,'CENTRE :');
$pdf->cell(30,18,'',1,0,'L');
$pdf->Text(215,46,'SEAT NO :');
$pdf->Text(210,55,'VAR_SEAT NO');
$pdf->SetFont('Arial','B','12');
$pdf->Text(186,52,'124');
$pdf->Rect(240,40,47,33,'');
$pdf->Line(170,40,170,58);
$pdf->Line(210,49,240,49);
$pdf->SetFont('Times','','13');
$pdf->Multicell(0,18," ",1,'C');
$pdf->Text(12,46,'UNIVERSITY EXAMINATION OF VAR_YEAR : VAR_DEPARTMENT');
$pdf->Text(12,52,'(CBSGS) HELD IN VAR_EXAM_YEAR FOR VAR_SEMSESTER');
$pdf->Multicell(0,15," ",1,'L');
$pdf->SetFont('Arial','B','14');
$pdf->Text(100,67,'VAR_CANDIATE_NAME');
$pdf->SetFont('');
$pdf->Text(12,67,'CANDIATE NAME');
$pdf->SetFont('Arial','B','14');
$pdf->cell(60,10,'SUBJECT CODE',1,0,'C');
$pdf->Cell(140,10,'SUBJECT',1,0,'C');
$pdf->Cell(40,10,'Date',1,0,'C');
$pdf->Cell(37,10,'Time',1,1,'C');
$pdf->SetFont('');
$pdf->Rect(10,83,277,60,'');
$pdf->Rect(10,83,60,60,'');
$pdf->Rect(70,83,140,60,'');
$pdf->Rect(210,83,40,60,'');
$pdf->Rect(10,143,277,30,'');
$pdf->SetFont('Arial','','14');
$pdf->Text(12,150,'Note: Please see the notice board for timetable');
$pdf->Text(12,157,'E : Exemption');
$pdf->SetFont('Times','B','14');
$pdf->Text(12,170,'SIGNATURE OF THE CANDIDATE');
$pdf->Text(240,170,'PRINCIPAL');
$pdf->SetFont('Times','B','14');
$pdf->SetFont('');

//!--------- DESIGN STRUCTURE--------!

//!-------IMAGE UPLOAD SECTION-------!
$pdf->Image('../files/student_files/115CP1001A/photo.jpg',240.5,40,46,32.5,'JPG');

//!-----Database image upload-------
//$pdf->Image('../files/$_SESSION['user_type']/$uid/photo.jpg',240.5,40,46,32.5,'JPG');




//!------SUBJECT CODE------! 
$pdf->Text(15,90,'SUBJECT_1');
$pdf->Text(15,97,'SUBJECT_2');
$pdf->Text(15,104,'SUBJECT_3');
$pdf->Text(15,111,'SUBJECT_4');
$pdf->Text(15,118,'SUBJECT_5');
$pdf->Text(15,125,'SUBJECT_6');

//!------SUBJECTS------!
$pdf->Text(80,90,'SUBJECT_NAMES_1');
$pdf->Text(80,97,'SUBJECT_NAMES_2');
$pdf->Text(80,104,'SUBJECT_NAMES_3');
$pdf->Text(80,111,'SUBJECT_NAMES_4');
$pdf->Text(80,118,'SUBJECT_NAMES_5');
$pdf->Text(80,125,'SUBJECT_NAMES_6');

//!------DATE------!
$pdf->Text(212,90,'D_O_E_1');
$pdf->Text(212,97,'D_O_E_2');
$pdf->Text(212,104,'D_O_E_3');
$pdf->Text(212,111,'D_O_E_4');
$pdf->Text(212,118,'D_O_E_5');
$pdf->Text(212,125,'D_O_E_6');

//!------DATE------!
$pdf->Text(252,90,'TIME_1');
$pdf->Text(252,97,'TIME_2');
$pdf->Text(252,104,'TIME_3');
$pdf->Text(252,111,'TIME_4');
$pdf->Text(252,118,'TIME_5');
$pdf->Text(252,125,'TIME_6');
$pdf->Output();
?>