<?php
require_once("../../includes/initialize.php");
$pdf = new PDF();
if(isset($_POST['view'])){

$program=Program:: find_programs_by_department($_POST['department']);
}





$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'DEPARTMENT REPORT',0,1,'C');
$no=1;
$pdf->SetFont('Times','',12);



$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');
    // Header 
	
	
$w = array(10,20,55,40,25);
	$header = array('#','PREFIX',' PROGRAM NAME','DEPARTMENT','DURATION');
	
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
 



foreach($program as $programs):
$dept=Department::find_by_department_id($programs->department_id); 

    $pdf->Cell($w[0],5.5,$no,'LR',0,'L',$fill);
	$pdf->Cell($w[1],5.5,$programs->program_prefix,'LR',0,'L',$fill);
    $pdf->Cell($w[2],5.5,$programs->program_name,'LR',0,'L',$fill);
    $pdf->Cell($w[3],5.5,$dept->department_name,'LR',0,'LR',$fill);
	$pdf->Cell($w[4],5.5,$programs->duration,'LR',0,'LR',$fill);

    $pdf->Ln();
    $fill = !$fill;	
    // Closing line

$no++;
 
endforeach;
$pdf->Cell(array_sum($w),0,'','T');




$pdf->Output();


?>