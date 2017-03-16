<?php
$folder = 'sumber/aplikasi/kitab/vendor/pdf/';
require($folder . 'tcpdf/181/fpdf.php');
require($folder . 'fpdi/1.6.1/fpdi.php');
require($folder . 'tcpdf/textbox/textbox2.php');
//require_once('fpdi.php');

$pdf = new FPDI();
$pdf->setSourceFile('contoh_borang.pdf');
/*
The 2nd paramenter – boxType, can take any one of the following values,

    /MediaBox
    /BleedBox
    /TrimBox
    /CropBox
    /ArtBox
*/
$tplIdx = $pdf->importPage(1, '/ArtBox');
$pdf->addPage();
$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 

# set font
$pdf->SetFont('Arial','',7);

# nama syarikat
$mainCon  = 'AQIL DARWISY ENTERPRISE';
$mainCon2 = 'SPNB CONTRUCTION SDN BHD';
$cellKeterangan = $mainCon . ' AS MAIN-CONTRACTOR ' .$mainCon2. ' AS PRINCIPAL';
$pdf->SetFillColor(255,255,255); 
# http://www.fpdf.org/en/doc/cell.htm
# Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
$pdf->SetXY(51.5, 64); $pdf->Cell(121.5, 3, $cellKeterangan ,0,0,'L',TRUE);

# set pembolehubah
$data = setPembolehubah();

$pdf->SetFont('Arial','',8);
$paksiX = 100;
$pdf->SetXY(59, $paksiX+1.5); $pdf->Write(0,$data[0]);
$pdf->SetXY(81, $paksiX+1.5); $pdf->Write(0,$data[1]);
$pdf->SetXY(51, 111); $pdf->Write(0,$data[2]);
$pdf->SetXY(51, 122); $pdf->Write(0,$data[3]);

$paksiX = 163;
$pdf->SetXY(17, $paksiX+0); $pdf->Write(0,$data[4]); //$no_inden);
$pdf->SetXY(17, $paksiX+3); $pdf->Write(0,$data[5]); //$nama_pemohon);
$pdf->SetXY(17, $paksiX+6); $pdf->Write(0,$data[6]); //$nric_no);
$pdf->SetXY(17, $paksiX+9); $pdf->Write(0,$data[7]); //$alamat_tapak[0]);
$pdf->SetXY(40, $paksiX+12); $pdf->Write(0,$data[8]); //$alamat_tapak[1]);
$pdf->SetXY(17, $paksiX+15); $pdf->Write(0,$data[9]); //$alamat_pemohon[0]);
$pdf->SetXY(40, $paksiX+18); $pdf->Write(0,$data[10]); //$alamat_pemohon[1]);


/*# Begin with regular font
$pdf->SetFont('Arial','',14);
$pdf->Write(5,'Visit ');
$pdf->SetTextColor(0,0,255); #  Then put a blue underlined link
$pdf->SetFont('','U');
$pdf->Write(5,'www.fpdf.org','http://www.fpdf.org');
//*/

$pdf->Output();

function setPembolehubah() 
{
	$data[] = '28-03-2017';
	$data[] = '28-06-2018';
	$data[] = '(I.E:10.01.2018)';
	$data[] = '14-03-2017';
	//$no_inden = "NO. INDEN: PD10K/MLK/16/12-(04770)";
	$data[] = 'NO. INDEN: ' . $_POST['data']['no_inden'];
	$data[] = 'NAMA PEMOHON: ' . huruf('BESAR', $_POST['data']['nama_pemohon']);
	$data[] = 'NRIC NO: ' . huruf('BESAR', $_POST['data']['nric_no']);
	$data[] = 'ALAMAT TAPAK: NO. HAKMILK : ' . huruf('BESAR', $_POST['data']['alamat_tapak_1']);
	$data[] = huruf('BESAR', $_POST['data']['alamat_tapak_2']);
	$data[] = 'ALAMAT PEMOHON: ' . huruf('BESAR', $_POST['data']['alamat_pemohon_1']);
	$data[] = huruf('BESAR', $_POST['data']['alamat_pemohon_2']);

	return $data;
}
function huruf($jenis , $papar) 
{
	switch ($jenis) 
	{# mula - pilih $jenis
	case "BESAR": # huruf('BESAR', )
		$papar = strtoupper($papar);
		break;
	case "kecil": # huruf('kecil', )
		$papar = strtolower($papar);
		break;
	case "Besar": # huruf('Besar', )
		$papar = ucfirst($papar);
		break;
	case "Besar_Depan": # huruf('Besar_Depan', )
		$papar = mb_convert_case($papar, MB_CASE_TITLE);
		break;
	}# tamat - pilih $jenis

	return $papar;
}