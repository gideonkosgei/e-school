<?php
require_once("../../includes/initialize.php");
$pdf = new PDF();
if($_POST['year']=="all" AND $_POST['semester']=="all" AND $_POST['option']=="all"){
$course=Course::find_all();
}
else if($_POST['year']!="all" AND $_POST['semester']!="all" AND $_POST['option']=="all"){
$course=Course::find_courses_by_year_sem($_POST['year'],$_POST['semester']);
}
else if($_POST['year']!="all" AND $_POST['semester']=="all" AND $_POST['option']=="all"){
$course=Course::find_courses_by_year($_POST['year']);
}
else if($_POST['year']=="all" AND $_POST['semester']!="all" AND $_POST['option']!="all"){
$course=Course::find_courses_by_sem_option($_POST['option'],$_POST['semester']);
}
else if($_POST['year']=="all" AND $_POST['semester']=="all" AND $_POST['option']!="all"){
$course=Course::find_courses_by_option($_POST['option']);
}
else if($_POST['year']=="all" AND $_POST['semester']!="all" AND $_POST['option']=="all"){
$course=Course::find_courses_by_semester($_POST['semester']);
}
else if($_POST['year']!="all" AND $_POST['semester']!="all" AND $_POST['option']!="all"){
$course=Course::find_courses_by_year_sem_option($_POST['year'],$_POST['option'],$_POST['semester']);
}
else{
$course=Course::find_courses_by_year_sem($_POST['year'],$_POST['semester']);
}




$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'COURSE REPORT',0,1,'C');
$no=1;
$pdf->SetFont('Times','',12);

$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');
    // Header
$w = array(10,20,65, 15,15,25,30);
	$header = array('#','CODE','NAME','UNITS','YEAR','SEMESTER','OPTION');
	
	//pages separator.
	$pdf->Cell(11,10,'',0,2);
	
    for($i=0;$i<count($header);$i++)
       $pdf->Cell($w[$i],7,$header[$i],1,0);
   $pdf->Ln();
    // Color and font restoration
   $pdf->SetFillColor(224,235,255);
   $pdf->SetTextColor(0);
   $pdf->SetFont('','','B');
    // Data
    $fill = false;
   

foreach($course as $course):


    $pdf->Cell($w[0],5.5,$no,'LR',0,'L',$fill);
	$pdf->Cell($w[1],5.5,$course->code,'LR',0,'L',$fill);
    $pdf->Cell($w[2],5.5,$course->course_name,'LR',0,'L',$fill);
    $pdf->Cell($w[3],5.5,$course->units,'LR',0,'LR',$fill);
	$pdf->Cell($w[4],5.5,$course->year,'LR',0,'R',$fill);
	$pdf->Cell($w[5],5.5,$course->semester,'LR',0,'R',$fill);
	$pdf->Cell($w[6],5.5,$course-> elective_core,'LR',0,'R',$fill);
    $pdf->Ln();
    $fill = !$fill;	
    // Closing line

$no++;
 
endforeach;
$pdf->Cell(array_sum($w),0,'','T');




$pdf->Output();


?>