<?php 

require("vendor/autoload.php");

$password = "123";
$src_file = 'sample.pdf';
$dest_file = 'protected.pdf';

$pdf = new \FPDI_Protection();
$pagecount = $pdf->setSourceFile($src_file);

for ($loop = 1; $loop <= $pagecount; $loop++) {
    $tplidx = $pdf->importPage($loop);
    $pdf->addPage();
    $pdf->useTemplate($tplidx);
}

$pdf->SetProtection(\FPDI_Protection::FULL_PERMISSIONS, $password);
//$pdf->SetProtection(\FPDI_Protection::FULL_PERMISSIONS, '123456');
//$pdf->SetProtection(\FPDI_Protection::FULL_PERMISSIONS, '123456', 'ABCDEF');

$pdf->Output($dest_file, 'F');

?>