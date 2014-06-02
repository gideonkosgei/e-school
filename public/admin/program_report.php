<?php
require_once("../../includes/initialize.php");
$pdf = new PDF();
$course=Course::find_courses_for_reporting($_POST['program'],$_POST['semester'],$_POST['year']);



$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'PROGRAM REPORT',0,1,'C');
$no=1;
$pdf->SetFont('Times','',12);
$prog=Program::find_by_program_id($_POST['program']);

$pdf->Cell(0,10,'PROGRAM: '. $prog->program_name,0,1,'A');

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