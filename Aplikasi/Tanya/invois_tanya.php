<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__; 
class Invois_Tanya extends \Aplikasi\Kitab\Tanya
{
#==================================================================================================
	public function __construct() { parent::__construct(); }
#-------------------------------------------------------------------------------------------------#
	public function semakPembolehubah($senarai,$jadual,$p='0')
	{
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '1') var_export($senarai);
		echo '</pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
	}
#-------------------------------------------------------------------------------------------------#
	public function contohDataSyarikat001()
	{
		# ada nilai
		$hasil = array ( '0' => array (
			'namaOrang' => 'Khairil Iszuddin Ismail',
			'namaSyarikat' => 'My Awesome Company Name',
			'alamat' => '200 Jalan Lurus,<br> Taman Bunga Orchid,<br> 53300 Kuala Lumpur',
			'notel' => '012-222 4455',
			'namaBank' => 'CIMB BANK',
			'namaAkaunBank' => '8000522622'
		));

		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}
#-------------------------------------------------------------------------------------------------#
	public function contohDataSyarikat002()
	{
		# ada nilai
		$hasil = array ( '0' => array (
			'namaOrang' => huruf('Besar_Depan', NAMAORANG),
			'namaSyarikat' => huruf('Besar_Depan', NAMASYARIKAT),
			'noSSM' => SSMSYARIKAT,
			'alamat' => ALAMATSYARIKAT,
			'notel' => NOTELSYARIKAT,
			'namaBank' => NAMABANK,
			'namaAkaunBank' => NAMAAKAUNBANK
		));

		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}
#-------------------------------------------------------------------------------------------------#
	public function contohSebutHarga001()
	{
		# ada nilai
		$hasil = array ( '0' => array (
				'id' => '1',
				'Nama' => 'Fulan Bin Fulan',
				'Alamat' => 'No 1, Jalan 2, Taman 3, 40000 KL',
				'Tajuk' => 'Test 123',
				'Mesej' => '12/12/2019 Test 123',
				'Email' => 'fulan@mail.com',
				'Bayaran' => 'Belum Daa',
				'Status' => 'Fulan2 Bin Fulan2',
				'Temujanji' => 'Fulan2 Bin Fulan2',
				'Tarikh' => '18 Januari 2020',
				));

		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}
#-------------------------------------------------------------------------------------------------#
	public function contohSebutHarga002()
	{
		# ada nilai
		$hasil = array ( '0' => array (
				'id' => '1',
				'Nama' => NAMA_ORGANISASI,
				'Alamat' => ALAMAT_ORGANISASI,
				'UP' => huruf('Besar_Depan', NAMA_RUJUKAN),
				'Tajuk' => 'Test 123',
				'Mesej' => '12/12/2019 Test 123',
				'Email' => EMAIL_ORGANISASI,
				'Bayaran' => 'Belum Daa',
				'Status' => 'Fulan2 Bin Fulan2',
				'Temujanji' => 'Fulan2 Bin Fulan2',
				'Tarikh' => '18 Januari 2020',
				'webapa' => WEB_APA,
				));

		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}
#-------------------------------------------------------------------------------------------------#
	public function jadualSkopProjek($a = 'www.apa.com',$b = 3500)
	{
		# ada nilai
		$hasil = array(
			array (
			'Skop projek' => 'Untuk membuat website '
				. $a . ' yang menggunakan gateway epayment billplz',
			'Harga (RM)' => $b,
			'Kuantiti' => '1',
			'Jumlah (RM)' => $b,
			),
			array (
			'Skop projek' => '&nbsp;',
			'Harga (RM)' => '&nbsp;',
			'Kuantiti' => 'JUMLAH',
			'Jumlah (RM)' => $b,
			),
		);

		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}
#-------------------------------------------------------------------------------------------------#
	public function jadualPeratusBayar($a = 'www.apa.com',$b = 3500)
	{
		# ada nilai
		$hasil = array(
			array (
			'Skop projek' => 'Untuk membuat website '
				. $a . ' yang menggunakan gateway epayment billplz',
			'Harga (RM)' => $b,
			'Kuantiti' => '1',
			'Jumlah (RM)' => $b,
			),
			array (
			'Skop projek' => 'Pembayaran pertama sebanyak 20% - projek bermula',
			'Harga (RM)' => '20%', //700
			'Kuantiti' => '1',
			'Jumlah (RM)' => kira(0.2 * $b),
			),array (
			'Skop projek' => 'Pembayaran kedua sebanyak 30% - selepas demo projek pertama',
			'Harga (RM)' => '30%', //30%	1	1050
			'Kuantiti' => '1',
			'Jumlah (RM)' => kira(0.3 * $b),
			),array (
			'Skop projek' => 'Pembayaran ketiga sebanyak 50% - Baki yang perlu dibayar',
			'Harga (RM)' => '50%',//50%	1	1750
			'Kuantiti' => '1',
			'Jumlah (RM)' => kira(0.5 * $b),
			),
			array (
			'Skop projek' => '&nbsp;',
			'Harga (RM)' => '&nbsp;',
			'Kuantiti' => 'JUMLAH',
			'Jumlah (RM)' => $b,
			),
		);

		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}
#-------------------------------------------------------------------------------------------------#
	function kiraJumlahBesar($hasil)
	{
		$kiraJum = array();
		$kiraJum['Kos (RM)'] = 0;
		$abaikan = array('Aktiviti','Masa','Alasan');
		foreach ($hasil as $k=>$subArray) {
			foreach ($subArray as $id=>$value) {
				//echo $k. '|$id = ' . $id . '<br>';
				if(!in_array($id,$abaikan))
					$kiraJum[$id]+=$value;
			}
		}
		$jum = array(array (
			'Aktiviti' => '','Masa' => 'Jumlah',
			'Kos (RM)' => $kiraJum['Kos (RM)'],'Alasan' => '',
			));
		#
		return $jum;
	}
#-------------------------------------------------------------------------------------------------#
	public function contohJadual000($a)
	{
		# ada nilai
		$hasil = array(
			array (
			'Kadar Sejam' => $a
			));
		//$hasil = array_merge($hasil, $jum);
		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}
#-------------------------------------------------------------------------------------------------#
	public function contohJadual001($a)
	{
		# ada nilai
		$hasil = array(
			array (
			'Aktiviti' => 'Buat DFD',
			'Masa' => '1',
			'Kos (RM)' => kira(1*$a),
			'Alasan' => 'Supaya dapat tentukan saiz aplikasi',
			),
			array (
			'Aktiviti' => 'Buat ERD',
			'Masa' => '1',
			'Kos (RM)' => kira(1*$a),
			'Alasan' => 'Supaya dapat tentukan berapa table/jadual yang perlu dibuat ',
			),
			array (
			'Aktiviti' => 'Buat database/table',
			'Masa' => '5',
			'Kos (RM)' => kira(5*$a),
			'Alasan' => 'Memastikan semua table/jadual sudah dibuat awal-awal',
			),
			array (
			'Aktiviti' => 'Buat fail-fail php',
			'Masa' => '5',
			'Kos (RM)' => kira(5*$a),
			'Alasan' => 'Memastikan semua fail asas dibuat dahulu sebelum koding ditulis ',
			),
			array (
			'Aktiviti' => 'Buat class-class',
			'Masa' => '5',
			'Kos (RM)' => kira(5*$a),
			'Alasan' => 'Menulis rangka class dahulu sebelum fungsi dibuat ',
			),
			array (
			'Aktiviti' => 'Buat fungsi/metod',
			'Masa' => '5',
			'Kos (RM)' => kira(5*$a),
			'Alasan' => 'Menulis fungsi dalam class sebelum pembolehubah ditulis',
			),
			array (
			'Aktiviti' => 'Buat pembolehubah',
			'Masa' => '5',
			'Kos (RM)' => kira(5*$a),
			'Alasan' => 'Memastikan semua pembolehubah diambilkira dalam fungsi',
			),
			array (
			'Aktiviti' => 'Buat borang',
			'Masa' => '5',
			'Kos (RM)' => kira(5*$a),
			'Alasan' => 'Memastikan semua borang dibuat mengunakan bootstrap twitter ',
			),
			array (
			'Aktiviti' => 'Ujian sistem',
			'Masa' => '8',
			'Kos (RM)' => kira(8*$a),
			'Alasan' => 'Memastikan semua aplikasi berjalan lancar',
			),
		);

		$jum = $this->kiraJumlahBesar($hasil);
		$hasil = array_merge($hasil, $jum);
		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}
#-------------------------------------------------------------------------------------------------#
	public function contohJadual002($a)
	{
		# ada nilai
		$hasil = array(
			array (
			'Aktiviti' => 'Betulkan DFD',
			'Masa' => '2',
			'Kos (RM)' => kira(2*$a),
			'Alasan' => 'Supaya dapat tentukan saiz aplikasi semula',
			),
			array (
			'Aktiviti' => 'Betulkan ERD',
			'Masa' => '2',
			'Kos (RM)' => kira(2*$a),
			'Alasan' => 'Supaya dapat tentukan berapa table/jadual yang perlu dibetulkan ',
			),
			array (
			'Aktiviti' => 'Betulkan database/table',
			'Masa' => '6',
			'Kos (RM)' => kira(6*$a),
			'Alasan' => 'Memastikan semua table/jadual sudah dibetulkan berdasaran aktiviti no 2',
			),
			array (
			'Aktiviti' => 'Betulkan fail-fail php',
			'Masa' => '6',
			'Kos (RM)' => kira(6*$a),
			'Alasan' => 'Memastikan semua fail asas dibetulkan dahulu sebelum koding ditulis ',
			),
			array (
			'Aktiviti' => 'Betulkan class-class',
			'Masa' => '6',
			'Kos (RM)' => kira(6*$a),
			'Alasan' => 'Menulis semula rangka class sedia ada ',
			),
			array (
			'Aktiviti' => 'Betulkan fungsi/metod',
			'Masa' => '6',
			'Kos (RM)' => kira(6*$a),
			'Alasan' => 'Menulis fungsi dalam class sebelum pembolehubah ditulis ',
			),
			array (
			'Aktiviti' => 'Betulkan pembolehubah',
			'Masa' => '6',
			'Kos (RM)' => kira(6*$a),
			'Alasan' => 'Memastikan semua pembolehubah diambilkira dalam fungsi ',
			),
			array (
			'Aktiviti' => 'Betulkan borang',
			'Masa' => '6',
			'Kos (RM)' => kira(6*$a),
			'Alasan' => 'Memastikan semua borang dibuat mengunakan bootstrap twitter ',
			),
			array (
			'Aktiviti' => 'Ujian sistem',
			'Masa' => '8',
			'Kos (RM)' => kira(8*$a),
			'Alasan' => 'Memastikan semua aplikasi berjalan lancar',
			),
		);

		$jum = $this->kiraJumlahBesar($hasil);
		$hasil = array_merge($hasil, $jum);
		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}
#-------------------------------------------------------------------------------------------------#
	public function medanUbah2($cariID)
	{
		$senaraiMedan = 'no,Nama_Penuh nama,email,nohp';

		return $senaraiMedan; # pulangkan pemboleubah
	}

	public function tatasusunanCariID($jadual, $medan, $cari, $susun)
	{
		# ada nilai
		$hasil = array ( '0' => array (
				'newss' => '000000123654',
				'ssm' => 'fulan@mail.com',
				'nama' => 'Fulan Bin Fulan',
				'operator' => 'Fulan2 Bin Fulan2',
				'alamat' => 'no 1000, ' . "\r" 
					. 'jalan 2000, ' . "\r" 
					. 'taman 3000 ' . "\r" 
					. 'poskod 40000',
				));

		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}

	public function tatasusunanCariMFG($jadual, $medan, $cari, $susun)
	{
		# ada nilai
		$hasil = array ( '0' => array (
				'newss' => '000000123654',
				'ssm' => 'fulan@mail.com',
				'nama' => 'Fulan Bin Fulan',
				'operator' => 'Fulan2 Bin Fulan2',
				'kumpulanIndustri' => 'MFG',
				'terimaProsesan' => 'J001',
				));

		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}

	public function tatasusunanCariPPT($jadual, $medan, $cari, $susun) 
	{
		# ada nilai
		$hasil = array ( '0' => array (
				'newss' => '000000123654',
				'ssm' => 'fulan@mail.com',
				'nama' => 'Fulan Bin Fulan',
				'operator' => 'Fulan2 Bin Fulan2',
				'kumpulanIndustri' => 'PPT',
				'hantar_prosesan' => 'J001',
				));

		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}

	public function tatasusunanUbah2A($jadual, $medan, $cari, $susun)
	{
		# ada nilai - cantum semua tatasusunan dalam satu
		$hasil = array (
			'msic2008' => array (
				0 => array (
						'S' => 'S',
						'msic2000' => '93099p',
						'msic' => '96094',
						'keterangan' => 'Perkhidmatan jagaan haiwan(2)',
						'notakaki' => '(2) Termasuk: penumpangan, perapian, mendudukkan dan melatih binatang peliharaan',
					),
				),
			'msic_v1' => array (
				0 => array (
						'msic' => '96094',
						'kp' => '85',
						'staf' => NULL,
						'keterangan' => 'Perkhidmatan jagaan haiwan',
						'notakaki' => 'Pet care services INCLUDE boarding, grooming, sitting and training pets '
								. 'NOT INCLUDE veterinary activities, see 7500 activities of fitness centres, see 93118',
					),
			),
			'msic_bandingan' => array (
				0 => array (
						'sv_newss' => '332',
						'sv_sidap' => '85',
						'msic2000p' => '93099p',
						'msic2000' => '93099',
						'msic' => '96094',
						'keterangan' => 'Aktiviti Perkhidmatan Persendirian',
						'Sektor' => 'Perkhidmatan (Lain-lain)',
					),
			),
			'msic2000' => array (),
			'msic2000_notakaki' => array (),
		);

		# ada nilai - pecah tatasusunan kepada beberapa bahagian
		$hasil1['satu'] = array ( 
			'0' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1'),
			'1' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1'),
			'2' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1')
			);
		$hasil1['dua'] = array ( 
			'0' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1'),
			'1' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1'),
			'2' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1')
			);
		$hasil1['tiga'] = array ( 
			'0' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1'),
			'1' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1'),
			'2' => array ('kira' => '1', 'A' => 'A1', 'B' => 'B1')
			);

		$hasil2 = array(); # tiada nilai

		return $hasil; # pulangkan pemboleubah
	}

	public function medanUbah($cariID) 
	{ 
		# Set pemboleubah
		# buat link
		$alamat1 = 'http://xxx/crud/ubah2/",kp,"/'.$cariID.'/2010/2015/'; 
		$url1 = '" <a target=_blank href=' . $alamat1 . '>SEMAK 1</a>"';
		$url2 = 'concat("<a target=_blank href=' . $alamat1 . '>SEMAK 2</a>")';
		# Set pemboleubah untuk sql
        $senaraiMedan = 'id,'
			. 'concat_ws("|",nama,operator,' . $url1 . ',' . $url2 . ') nama,'
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," hasil",format(hasil,0)),' . "\r"
			. ' 	concat_ws("="," belanja",format(belanja,0)),' . "\r"
			. ' 	concat_ws("="," gaji",format(gaji,0)),' . "\r"
			. ' 	concat_ws("="," aset",format(aset,0)),' . "\r"
			. ' 	concat_ws("="," staf",format(staf,0)),' . "\r"
			. ' 	concat_ws("="," stok akhir",format(stok,0))' . "\r"
 			. ' ) as data5P,'
			. ' concat_ws("|",' . "\r"
			. ' 	concat_ws("="," tel",tel),' . "\r"
			. ' 	concat_ws("="," fax",fax),' . "\r"
			. ' 	concat_ws("="," orang",orang),' . "\r"
			. ' 	concat_ws("="," notel",notel),' . "\r"
			. ' 	concat_ws("="," nofax",nofax)' . "\r"
 			. ' ) as dataHubungi,'
			. 'concat_ws(" ",alamat1,alamat2,poskod,bandar) as alamat,' . "\r"
			//. 'concat_ws(" ",no,batu,( if (jalan is null, "", concat("JALAN ",jalan) ) ),tmn_kg,poskod,dp_baru) alamat_baru,' . "\r"
			. 'tel,notel,fax,nofax,responden,orang,email,esurat,'
			. 'hasil,belanja,gaji,aset,staf,stok' . "\r" 
			. '';

		# pulangkan pemboleubah
		return $senaraiMedan;
	}
#==========================================================================================
	public function medanKawalan($cariID) 
	{ 
		/*$news1 = 'http://' . $_SERVER['SERVER_NAME'] . '/ekonomi/ckawalan/ubah/' . $cariID;
		$namaS = $cariID . '/2010/2015/cetak/",replace(nama,\' \',\'-\'),"';
		$news2 = 'http://' . $_SERVER['SERVER_NAME'] . '/ekonomi/cprosesan/ubah/",kp,"/' . $namaS;
		$news3 = 'http://' . $_SERVER['SERVER_NAME'] . '/ekonomi/semakan/ubah/",kp,"/' . $cariID . '/2010/2015/';
		$url1 = '" <a target=_blank href=' . $news1 . '>SEMAK 1</a>"';
		//$url2 = '" <a target=_blank href=' . $news2 . '>SEMAK 2</a>"';
		$url2 = 'concat("<a target=_blank href=' . $news2 . '>SEMAK 2</a>")';
		$url3 = 'concat("<a target=_blank href=' . $news3 . '>SEMAK 3</a//*/
        $medanKawalan = 'id,Nama,Tajuk,Mesej,Email,Bayaran,Status,Temujanji,Tarikh,'
			/*. 'concat_ws("|",nama,operator,' . $url1 . ',' . $url2 . ',' . $url3 . ') nama,'
			. ' concat_ws(" ",' . "\r"
			. '		if (orang_a is null, "", concat_ws("="," orang", concat(orang_a," |") ) ),' . "\r"
			. '		if (notel_a is null, "", concat_ws("="," tel", concat(notel_a," |") ) ),' . "\r"
			. '		if (nofax_a is null, "", concat_ws("="," fax", concat(nofax_a," |") ) ),' . "\r"
			. '		if (responden is null, "", concat_ws("="," responden", concat(responden," |") ) ),' . "\r"
			. '		if (notel is null, "", concat_ws("="," notel", concat(notel," |") ) ),' . "\r"
			. '		if (nofax is null, "", concat_ws("="," nofax", concat(nofax," |") ) )' . "\r"
 			. ' ) as dataHubungi,'
			. 'concat_ws(" ",' . "\r"
			. '		if (hasil is null, "", concat_ws("="," hasil", concat(format(hasil,0)," |") ) ),' . "\r"
			. '		if (belanja is null, "", concat_ws("="," belanja", concat(format(belanja,0)," |") ) ),' . "\r"
			. '		if (gaji is null, "", concat_ws("="," gaji", concat(format(gaji,0)," |") ) ),' . "\r"
			. '		if (aset is null, "", concat_ws("="," aset", concat(format(aset,0)," |") ) ),' . "\r"
			. '		if (staf is null, "", concat_ws("="," staf", concat(format(staf,0)," |") ) ),' . "\r"
			. '		if (stok is null, "", concat_ws("="," stok akhir", concat(format(stok,0)," |") ) )' . "\r"
 			. ' ) as data5P,'//*/
			. '';

		# buang koma di akhir string
		$medanKawalan = substr($medanKawalan, 0, -1);
		//$medanKawalan = rtrim($medanKawalan,',');;

		# pulangkan pemboleubah
		return $medanKawalan;
	}

	public function semakPosmen($rangka, $posmen)
	{
		$nilaiRM = array('hasil','belanja','gaji','aset','staf','stok');
		# valid guna gelung foreach
		foreach ($nilaiRM as $keyRM) # $nilaiRM rujuk line 154
		{# kod php untuk formula matematik
			$data = null;
			if(isset($posmen[$rangka][$keyRM])):
				@eval( '$data = (' . $posmen[$rangka][$keyRM] . ');' );
				$posmen[$rangka][$keyRM] = $data;
			endif;
		}//*/
		$nilaiTEKS = array('no','batu','jalan','tmn_kg','respon','posdaftar');
		foreach ($nilaiTEKS as $keyTEKS)
		{# kod php untuk besarkan semua huruf aka uppercase
			if(isset($posmen[$rangka][$keyTEKS])):
				$posmen[$rangka][$keyTEKS] = strtoupper($posmen[$rangka][$keyTEKS]);
			endif;
		}//*/ # valid guna if
		if (isset($posmen[$rangka]['fe']))
		{
			$posmen[$rangka]['fe'] = str_replace(' ', '-', $posmen[$rangka]['fe']);
			$posmen[$rangka]['fe'] = strtolower($posmen[$rangka]['fe']);
		}
		if (isset($posmen[$rangka]['email']))
			$posmen[$rangka]['email'] = strtolower($posmen[$rangka]['email']);
		if (isset($posmen[$rangka]['responden']))
			$posmen[$rangka]['responden'] = mb_convert_case($posmen[$rangka]['responden'], MB_CASE_TITLE);
		/*if (isset($posmen[$rangka]['dp_baru']))
			$posmen[$rangka]['dp_baru']=ucwords(strtolower($posmen[$rangka]['dp_baru']));//*/

		# pulangkan pemboleubah
		return $posmen;
	}
#==================================================================================================
}