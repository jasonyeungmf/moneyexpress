<?php
require('chinese.php'); 
$pdf=new PDF_Chinese();
$pdf->AddGBFont('simhei', '����');
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('simhei', '', 20);
$pdf->Write(10, '���Ƕ��Ǻ����� by hubing.info');
$pdf->Output();
?>