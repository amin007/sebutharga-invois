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

# set warna latarbelakang
$pdf->SetFont('Arial','',6);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(500,500,0);

# nama syarikat
$pdf->SetXY(51, 65.5); $pdf->Write(0,'AQIL DARWISY ENTERPRISE');

# set pembolehubah
$tarikh[] = '28-03-2017';
$tarikh[] = '28-06-2018';
$tarikh[] = '(I.E:10.01.2018)';
$tarikh[] = '14-03-2017';
//$no_inden = "NO. INDEN: PD10K/MLK/16/12-(04770)";
$no_inden = 'NO. INDEN: ' . $_POST['data']['no_inden'];
//$nama_pemohon = "NAMA PEMOHON: ROSLINDA BINTI ABU TALIB";
$nama_pemohon = 'NAMA PEMOHON: ' . huruf('BESAR', $_POST['data']['nama_pemohon']);
//$nric_no = "NRIC NO: 821113045546";
$nric_no = 'NRIC NO: ' . huruf('BESAR', $_POST['data']['nric_no']);
//$alamat_tapak[] = "ALAMAT TAPAK: NO. HAKMILK : HMM 1132 NI.LOT PT 2933";
$alamat_tapak[] = 'ALAMAT TAPAK: NO. HAKMILK : ' . huruf('BESAR', $_POST['data']['alamat_tapak_1']);
//$alamat_tapak[] = "MUKIM SUNGAI RAMBAI,  DAERAH JASIN MELAKA";
$alamat_tapak[] = huruf('BESAR', $_POST['data']['alamat_tapak_2']);
//$alamat_pemohon[] = "ALAMAT PEMOHON: NO.96, JALAN BR-3, TAMAN BUKIT RAMBAI ";
$alamat_pemohon[] = 'ALAMAT PEMOHON: ' . huruf('BESAR', $_POST['data']['alamat_pemohon_1']);
//$alamat_pemohon[] = "75200 ALOR GAJAH, MELAKA";
$alamat_pemohon[] = huruf('BESAR', $_POST['data']['alamat_pemohon_2']);

$paksiX = 100;
$pdf->SetXY(59, $paksiX+1.5); $pdf->Write(0,$tarikh[0]);
$pdf->SetXY(81, $paksiX+1.5); $pdf->Write(0,$tarikh[1]);
$pdf->SetXY(51, 111); $pdf->Write(0,$tarikh[2]);
$pdf->SetXY(51, 122); $pdf->Write(0,$tarikh[3]);

$paksiX = 163;
$pdf->SetXY(17, $paksiX+0); $pdf->Write(0,$no_inden);
$pdf->SetXY(17, $paksiX+3); $pdf->Write(0,$nama_pemohon);
$pdf->SetXY(17, $paksiX+6); $pdf->Write(0,$nric_no);
$pdf->SetXY(17, $paksiX+9); $pdf->Write(0,$alamat_tapak[0]);
$pdf->SetXY(40, $paksiX+12); $pdf->Write(0,$alamat_tapak[1]);
$pdf->SetXY(17, $paksiX+15); $pdf->Write(0,$alamat_pemohon[0]);
$pdf->SetXY(40, $paksiX+18); $pdf->Write(0,$alamat_pemohon[1]);
//*/
$pdf->Output();

function huruf($jenis , $papar) 
{
	/*
	$_POST=strtoupper($_POST['']['']);
	$_POST=strtolower($_POST['']['']);
	$_POST=mb_convert_case($_POST[''][''], MB_CASE_TITLE);
	ucfirst
	*/

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