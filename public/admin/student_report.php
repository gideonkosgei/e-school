<?php
require_once("../../includes/initialize.php");
$pdf = new PDF();
if(isset($_POST['view'])){

$student=Student::find_student_for_report($_POST['program'],$_POST['option'],$_POST['year'],$_POST['gender']);
}

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'STUDENT REPORT',0,1,'C');
$no=1;
$pdf->SetFont('Times','',12);


$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');
    // Header 
	
	
$w = array(6,20,35,35,25,20,20,20);
	$header = array('#','ADM NO','NAME','PROGRAM','ADM YEAR','OPTION','GENDER','MOBILE');
	
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
 

foreach($student as $std):
	$program=Program::find_by_program_id($std->program_id);

    $pdf->Cell($w[0],5.5,$no,'LR',0,'L',$fill);
	$pdf->Cell($w[1],5.5,$std->admission_number,'LR',0,'L',$fill);
    $pdf->Cell($w[2],5.5,$std->first_name ." ".  $std->last_name,'LR',0,'L',$fill);
    $pdf->Cell($w[3],5.5,$program->program_name,'LR',0,'LR',$fill);
	$pdf->Cell($w[4],5.5,$std->year,'LR',0,'LR',$fill);
	$pdf->Cell($w[5],5.5,$std->gssp_pssp,'LR',0,'R',$fill);
	$pdf->Cell($w[6],5.5,$std->sex,'LR',0,'R',$fill);
	$pdf->Cell($w[7],5.5,$std->id_number,'LR',0,'R',$fill);
    $pdf->Ln();
    $fill = !$fill;	
    // Closing line

$no++;
 
endforeach;
$pdf->Cell(array_sum($w),0,'','T');




$pdf->Output();


?>