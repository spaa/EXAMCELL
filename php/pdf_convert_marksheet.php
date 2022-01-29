<?php
 include'server.php';


$sql ="SELECT * FROM student_general_info
where uid = '115CP1001A'";
$NAME = "SWAPNIL SUNIL CHOPADE";
$records = mysqli_query($db,$sql);

require("../fpdf181/fpdf.php");
$pdf = new FPDF('P','mm','Letter');
$pdf->AddFont('OldEnglishFive','','OldEnglishFive.php');

$pdf->Addpage();

//!--------PLEASE DONT CHANGE ANY VALUE HERE------!
$pdf->Rect(05,05,207,270,'');
$pdf->SetFont('OldEnglishFive','',8);
//$pdf->Multicell(0,30," ",1,'C');
$pdf->Text(95,15,'University Of Mumbai');
$pdf->SetFont('Times','B','10');
$pdf->Text(50,19,'MAHATMA GANDHI MISSION COLLEGE OF ENGINEERING & TECHNOLOGY');
$pdf->Text(80,23,'sector-18, Kamothe, Navi Mumbai - 410209');
$pdf->SetFont('Times','B','12');
$pdf->Text(98,32,'GRADE CARD');
$pdf->Line(12,35,205,35);
$pdf->SetFont('Times','','10');
$pdf->Text(14,42,'NAME');
$pdf->Text(14,46,'EXAMINATION');
$pdf->Text(14,50,'BRANCH');
$pdf->Text(14,54,'HELD-IN');
$pdf->Text(14,58,'SEAT NUMBER');
$pdf->Text(120,58,'REGISTRATON NO : ');
$pdf->Text(16,70,'COURSE');
$pdf->Text(18,74,'CODE');
$pdf->Text(48,73,'COURSE TITLE');
$pdf->Text(96,70,'COURSE');
$pdf->Text(96,74,'CREDITS');
$pdf->Text(126,67,'GRADE');
$pdf->Text(116,73,'ESE/');
$pdf->Text(116,77,'PR/');
$pdf->Text(116,81,'OR');
$pdf->Text(132,74,'IA/');
$pdf->Text(132,78,'TW');
$pdf->Text(142,74,'OVER-');
$pdf->Text(142,78,'ALL');
$pdf->Text(156.5,70,'CREDITS');
$pdf->Text(156.5,74,'EARNED');
$pdf->Text(160,78,'(C)');
$pdf->Text(175,67,'GRADE');
$pdf->Text(175,71,'POINTS');
$pdf->Text(178,75,'(GP)');
$pdf->Text(191,71,'C x GP');

$pdf->SetFont('Times','B','10');
$pdf->Text(16,230,'REMARK : ');
$pdf->Text(38,230,'VAR_REMARKS');
$pdf->Text(16,236,'RESULT DECLARED ON : ');
$pdf->Text(62,236,'VAR_RESULT DECLARED ON');
$pdf->Text(94,230,'SGPI : ');
$pdf->Text(106,230,'VAR_SGPI');
$pdf->Text(150,230,'CGPI : ');
$pdf->Text(162,230,'VAR_CGPI');
$pdf->Text(16,262,'PREPARED BY');
$pdf->Text(62,262,'CHECKED BY');
$pdf->Text(106,262,'EXAMCELL INCHARGE');
$pdf->Text(170,262,'PRINCIPAL');
$pdf->SetFont('');

//!--------TO BE FETCHED FROM DATABASE-----!

$pdf->Text(15,90,'VAR_SC_1');
$pdf->Text(15,110,'VAR_SC_2');
$pdf->Text(15,130,'VAR_SC_3');
$pdf->Text(15,150,'VAR_SC_4');
$pdf->Text(15,170,'VAR_SC_5');
$pdf->Text(15,190,'VAR_SC_6');

$pdf->Text(40,90,'VAR_SUB_1');
$pdf->Text(40,110,'VAR_SUB_2');
$pdf->Text(40,130,'VAR_SUB_3');
$pdf->Text(40,150,'VAR_SUB_4');
$pdf->Text(40,170,'VAR_SUB_5');
$pdf->Text(40,190,'VAR_SUB_6');


$pdf->Text(95,90,'VAR_CC_1');
$pdf->Text(95,110,'VAR_CC_2');
$pdf->Text(95,130,'VAR_CC_3');
$pdf->Text(95,150,'VAR_CC_4');
$pdf->Text(95,170,'VAR_CC_5');
$pdf->Text(95,190,'VAR_CC_6');


$pdf->Text(115,90,'VAR_1');
$pdf->Text(115,110,'VAR_2');
$pdf->Text(115,130,'VAR_3');
$pdf->Text(115,150,'VAR_4');
$pdf->Text(115,170,'VAR_5');
$pdf->Text(115,190,'VAR_6');

$pdf->Text(128,90,'VAR_1');
$pdf->Text(128,110,'VAR_2');
$pdf->Text(128,130,'VAR_3');
$pdf->Text(128,150,'VAR_4');
$pdf->Text(128,170,'VAR_5');
$pdf->Text(128,190,'VAR_6');

$pdf->Text(141,90,'VAR_1');
$pdf->Text(141,110,'VAR_2');
$pdf->Text(141,130,'VAR_3');
$pdf->Text(141,150,'VAR_4');
$pdf->Text(141,170,'VAR_5');
$pdf->Text(141,190,'VAR_6');

$pdf->Text(157.5,90,'VAR_1');
$pdf->Text(157.5,110,'VAR_2');
$pdf->Text(157.5,130,'VAR_3');
$pdf->Text(157.5,150,'VAR_4');
$pdf->Text(157.5,170,'VAR_5');
$pdf->Text(157.5,190,'VAR_6');

$pdf->Text(175.5,90,'VAR_1');
$pdf->Text(175.5,110,'VAR_2');
$pdf->Text(175.5,130,'VAR_3');
$pdf->Text(175.5,150,'VAR_4');
$pdf->Text(175.5,170,'VAR_5');
$pdf->Text(175.5,190,'VAR_6');

$pdf->Text(191,90,'VAR_1');
$pdf->Text(191,110,'VAR_2');
$pdf->Text(191,130,'VAR_3');
$pdf->Text(191,150,'VAR_4');
$pdf->Text(191,170,'VAR_5');
$pdf->Text(191,190,'VAR_6');






//!-----TABLE STRUCTURE-------!
$pdf->Rect(14,62,190,160,'');
$pdf->Rect(14,62,20,160,'');
$pdf->Rect(34,62,60,160,'');
$pdf->Rect(94,62,20,160,'');
$pdf->Rect(114,62,40,160,'');
$pdf->Rect(154,62,20,160,'');
$pdf->Rect(174,62,15,160,'');
$pdf->Rect(14,62,190,20 ,'');
$pdf->Rect(114,62,40,7.5,'');
$pdf->Rect(114,69.5,13.3,152.5,'');
$pdf->Rect(127.5,69.5,13.3,152.5,'');





//!---- Values to be fetched through database-----!
$pdf->Text(50,42,$NAME);
$pdf->Text(50,46,'VAR_EXAMINATION');
$pdf->Text(50,50,'VAR_BRANCH');
$pdf->Text(50,54,'VAR_HELD-IN');
$pdf->Text(50,58,'VAR_SEAT NUMBER');
$pdf->Text(155,58,'VAR_REGISTRATON NO');
//!--------- DESIGN STRUCTURE--------!

//!-------IMAGE UPLOAD SECTION-------!
$pdf->Image('../files/student_files/115CP1001A/photo.jpg',240.5,40,46,32.5,'JPG');
$pdf->Image('../images/mgm_logo.png',10,10,32.5,'PNG');

//!-----Database image upload-------
//$pdf->Image('../files/$_SESSION['user_type']/$uid/photo.jpg',240.5,40,46,32.5,'JPG');


/*

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
$pdf->Text(252,125,'TIME_6'); */
$pdf->Output();
?>