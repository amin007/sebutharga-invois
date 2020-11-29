<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Invois extends \Aplikasi\Kitab\Kawal
{
#==================================================================================================
##-------------------------------------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		//\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = 'invois';
	}
##-------------------------------------------------------------------------------------------------
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
##-------------------------------------------------------------------------------------------------
	public function index()
	{
		//echo '<hr>Anda berada di class :' . __METHOD__ . '<hr>';
		# isytihar pembolehubah
		$this->papar->Tajuk_Muka_Surat = $this->_folder;

		# pergi papar kandungan
		$f = array('index','index1');
		$this->paparTemplate($f[0]);
	}
##-------------------------------------------------------------------------------------------------
	public function paparTemplate($f)
	{
		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate
		//$this->papar->paparTemplate
			($this->_folder . '/' . $f,$jenis,1); # $noInclude=0
		//*/
	}
##-------------------------------------------------------------------------------------------------
#==================================================================================================
#--------------------------------------------------------------------------------------------------
	private function debugDaa()
	{
		$this->semakPembolehubah($this->papar->Tajuk_Muka_Surat,'Tajuk_Muka_Surat');
		$this->semakPembolehubah($this->papar->carian,'carian');
		$this->semakPembolehubah($this->papar->syarikat,'syarikat');
		$this->semakPembolehubah($this->papar->akaun,'akaun');
		$senarai = array('jadual001'=>$this->papar->jadual001,
			'jadual002'=>$this->papar->jadual002);
		$this->semakPembolehubah($senarai,'senarai');
		$this->ulangJadual($senarai);
	}
#--------------------------------------------------------------------------------------------------
	public function pilihTugas()
	{
		# bersihkan data $_POST
		//$this->semakPembolehubah($_POST,'_POST');

		# set pembolehubah
		$harga = bersih($_POST['harga']);
		$kadar = bersih($_POST['kadar']);
		$tugas = bersih($_POST['tugas']);

		# pergi papar kandungan
		//echo '<br>location: ' . URL . "$this->_folder/$tugas/$harga/$kadar";
		header('location: ' . URL . "$this->_folder/$tugas/$harga/$kadar");
	}
#--------------------------------------------------------------------------------------------------
	public function webKertasCadangan($a = 3500, $b = 100)
	{
		//echo '<hr>Anda berada di class :' . __METHOD__ . '<hr>';
		# isytihar pembolehubah
		$this->papar->hargaProjek[] = $a;
		$this->papar->Tajuk_Muka_Surat = 'SebutHarga';
		$this->papar->carian = 'id';
		$this->papar->syarikat = $this->tanya->contohDataSyarikat002();
		$this->papar->akaun['kes'] = $this->tanya->contohSebutHarga002();
		$this->papar->skop['s001'] = $this->tanya->jadualSkopProjek(WEB_APA, $a);
		$this->papar->skop['s002'] = $this->tanya->contohJadual000($b);
		$this->papar->jadual['j001'] = $this->tanya->contohJadual001($b);
		//$this->papar->jadual['j002'] = $this->tanya->contohJadual002($b);
		//$this->debugDaa(); # semak data

		# pergi papar kandungan
		$f = array('cetakKertasCadangan','webKertasCadangan');
		$this->paparTemplate($f[1]);
	}
#--------------------------------------------------------------------------------------------------
	public function cthSebutHarga($a = 3500, $b = 100)
	{
		//echo '<hr>Anda berada di class :' . __METHOD__ . '<hr>';
		# isytihar pembolehubah
		$this->papar->hargaProjek[] = $a;
		$this->papar->hargaProjek20 = 'RM ' . kira(0.2 * $a);
		$this->papar->hargaProjek30 = 'RM ' . kira(0.3 * $a);
		$this->papar->Tajuk_Muka_Surat = 'SebutHarga';
		$this->papar->carian = 'id';
		$this->papar->syarikat = $this->tanya->contohDataSyarikat002();
		$this->papar->akaun['kes'] = $this->tanya->contohSebutHarga002();
		$this->papar->skop['s001'] = $this->tanya->jadualSkopProjek(WEB_APA, $a);
		//$this->papar->skop['s002'] = $this->tanya->contohJadual000($b);
		$this->papar->jadual['j001'] = $this->tanya->contohJadual001($b);
		//$this->papar->jadual['j002'] = $this->tanya->contohJadual002($b);
		//$this->debugDaa(); # semak data

		# pergi papar kandungan
		$f = array('cetakSebutHarga','webSebutHarga');
		$this->paparTemplate($f[1]);
	}
#--------------------------------------------------------------------------------------------------
	public function webSebutHarga($a = 3500)
	{
		# isytihar pemboleubah
		$this->papar->hargaProjek[] = $a;
		$this->papar->Tajuk_Muka_Surat = 'SebutHarga';
		$this->papar->carian = 'id';
		$this->papar->syarikat = $this->tanya->contohDataSyarikat002();
		$this->papar->akaun['kes'] = $this->tanya->contohSebutHarga002();
		//$this->debugDaa(); # semak data

		# pergi papar kandungan
		$f = array('cetakSebutHarga','webSebutHarga');
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate
		//$this->papar->paparTemplate
			($this->_folder . '/' . $f[0],$jenis,1); # $noInclude=0
		//*/
	}
#--------------------------------------------------------------------------------------------------
	public function cthInvois($a = 3500)
	{
		//echo '<hr>Anda berada di class :' . __METHOD__ . '<hr>';
		# isytihar pembolehubah
		$this->papar->hargaProjek[] = $a;
		$this->papar->Tajuk_Muka_Surat = 'SebutHarga';
		$this->papar->carian = 'id';
		$this->papar->syarikat = $this->tanya->contohDataSyarikat002();
		$this->papar->akaun['kes'] = $this->tanya->contohSebutHarga002();
		$this->papar->skop['s001'] = $this->tanya->jadualPeratusBayar(WEB_APA, $a);
		//$this->debugDaa(); # semak data

		# pergi papar kandungan
		$f = array('cetakInvois','webInvois');
		$this->paparTemplate($f[1]);
	}
#--------------------------------------------------------------------------------------------------
	public function webInvois($a = 3500)
	{
		# isytihar pemboleubah
		$this->papar->hargaProjek[] = $a;
		$this->papar->Tajuk_Muka_Surat = 'SebutHarga';
		$this->papar->carian = 'id';
		$this->papar->syarikat = $this->tanya->contohDataSyarikat002();
		$this->papar->akaun['kes'] = $this->tanya->contohSebutHarga002();
		//$this->debugDaa(); # semak data

		# pergi papar kandungan
		$f = array('cetakInvois','webInvois');
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate
		//$this->papar->paparTemplate
			($this->_folder . '/' . $f[0],$jenis,1); # $noInclude=0
		//*/
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
#--------------------------------------------------------------------------------------------------
	public function cetakSebutHarga($jadual = null, $cariID = null) 
	{
		//echo '<hr>Anda berada di class :' . __METHOD__ . '<hr>';
		$jadual = 'kursus_php';
		$cariID = '3';
		if (!empty($cariID))
		{
			# senaraikan tatasusunan jadual dan setkan pembolehubah
			$this->papar->_jadual = $jadual;
			$this->papar->carian = 'id';
			$cari[] = array('fix'=>'x%like%','atau'=>'WHERE','medan'=>'status','apa'=>'spam');
			$cari[] = array('fix'=>'x=','atau'=>'AND','medan'=>'id','apa'=>$cariID);

			# 1. mula semak dalam pangkalan data
			$this->papar->akaun['kes'] = $this->tanya->//cariSql
				cariSemuaData
				($this->papar->_jadual, $this->tanya->medanKawalan($cariID), 
				$cari, $susun = null);
		}
		else
		{
			$this->papar->carian = '[tiada id diisi]';
			$this->papar->_jadual = $jadual;
		}

		# isytihar pembolehubah
		$this->papar->Tajuk_Muka_Surat = 'SebutHarga';
		//$this->debugDaa(); # semak data

		# pergi papar kandungan
		$f = array('cetakSebutHarga','webSebutHarga');
		$this->paparTemplate($f[0]);
	}
#--------------------------------------------------------------------------------------------------
	public function cetakInvois($jadual = null, $cariID = null) 
	{
		//echo '<hr>Anda berada di class :' . __METHOD__ . '<hr>';
		$jadual = 'kursus_php';
		$cariID = '3';
		if (!empty($cariID))
		{
			# senaraikan tatasusunan jadual dan setkan pembolehubah
			$this->papar->_jadual = $jadual;
			$this->papar->carian = 'id';
			$cari[] = array('fix'=>'x%like%','atau'=>'WHERE','medan'=>'status','apa'=>'spam');
			$cari[] = array('fix'=>'x=','atau'=>'AND','medan'=>'id','apa'=>$cariID);

			# 1. mula semak dalam pangkalan data
			$this->papar->akaun['kes'] = $this->tanya->//cariSql
				cariSemuaData
				($this->papar->_jadual, $this->tanya->medanKawalan($cariID), 
				$cari, $susun = null);
		}
		else
		{
			$this->papar->carian = '[tiada id diisi]';
			$this->papar->_jadual = $jadual;
		}

		# isytihar pembolehubah
		$this->papar->Tajuk_Muka_Surat = 'Invois';
		//$this->debugDaa(); # semak data

		# pergi papar kandungan
		$f = array('cetakInvois','webInvois');
		$this->paparTemplate($f[0]);
	}
#--------------------------------------------------------------------------------------------------
	public function ubah($jadual = null, $cariID = null) 
	{
		//echo '<hr>Anda berada di class :' . __METHOD__ . '<hr>';
		if (!empty($cariID)) 
		{
			# senaraikan tatasusunan jadual dan setkan pembolehubah
			$this->papar->_jadual = $jadual;
			$this->papar->carian = 'id';
			$cari[] = array('fix'=>'like','atau'=>'WHERE','medan'=>'id','apa'=>$cariID);

			# 1. mula semak dalam rangka 
			$this->papar->akaun['kes'] = $this->tanya->//cariSql
				cariSemuaData
				($this->papar->_jadual, $this->tanya->medanKawalan($cariID), 
				$cari, $susun = null);
		}
		else
		{
			$this->papar->carian = '[tiada id diisi]';
			$this->papar->_jadual = 'be16_kawal';
		}

		# isytihar pembolehubah
		$this->papar->lokasi = 'Akaun - Ubah';
		$this->papar->cariID = $cariID;
		// $this->debug($this->papar->akaun, $this->papar->carian); # semak data

		# pergi papar kandungan
		$f = array('ubah','buang');
		$this->paparTemplate($f[0]);
	}
#--------------------------------------------------------------------------------------------------
	public function ubahCari()
	{
		//echo '<hr>Anda berada di class :' . __METHOD__ . '<hr>';
		//echo '<pre>$_GET->', print_r($_GET, 1) . '</pre>';
		# bersihkan data $_POST
		$input = bersih($_GET['cari']);
		$dataID = str_pad($input, 12, "0", STR_PAD_LEFT);

		# Set pembolehubah utama
		$this->papar->pegawai = senarai_kakitangan();
		$this->papar->lokasi = Tajuk_Muka_Surat . ' - Ubah';

		# pergi papar kandungan
		//echo '<br>location: ' . URL . 'akaun/ubah/' . $dataID . '';
		header('location: ' . URL . 'akaun/ubah/' . $dataID);
	}
#--------------------------------------------------------------------------------------------------
	public function ubahSimpan($dataID)
	{
		//echo '<hr>Anda berada di class :' . __METHOD__ . '<hr>';
		$posmen = array();
		$medanID = 'id';
		//$senaraiJadual = array('kursus_php');
		$senaraiJadual = array('kursus_php_lama');

		foreach ($_POST as $myTable => $value)
			if ( in_array($myTable,$senaraiJadual) )
			{	foreach ($value as $kekunci => $papar)
					$posmen[$myTable][$kekunci] = bersih($papar);
				$posmen[$myTable][$medanID] = $dataID;
			}

		# ubahsuai $posmen
		//$posmen = $this->pecah5P($senaraiJadual[0], $posmen);
		$posmen = $this->tanya->semakPosmen($senaraiJadual[0], $posmen);
		//echo '<br>$dataID=' . $dataID . '<br>';
		//echo '<pre>$_POST='; print_r($_POST) . '</pre>';
		//echo '<pre>$posmen='; print_r($posmen) . '</pre>';

		# mula ulang $senaraiJadual
		foreach ($senaraiJadual as $kunci => $jadual)
		{# mula ulang table
			$this->tanya->//ubahSqlSimpan
			ubahSimpan
			($posmen[$jadual], $jadual, $medanID);
			$paparID = $jadual . '/' . $dataID;
		}# tamat ulang table

		# pergi papar kandungan
		//echo 'location: ' . URL . 'akaun/ubah/' . $paparID;
		header('location: ' . URL . 'akaun/ubah/' . $paparID); //*/
	}

	function pecah5P($myTable, $posmen) 
	{
		$pecah5P = $posmen[$myTable]['pecah5P']; 

		if (!empty($pecah5P))
		{
			$pos = explode(" ", $pecah5P);
			  $posmen[$myTable]['hasil'] = str_replace( ',', '', bersih($pos[0]) );
			$posmen[$myTable]['belanja'] = str_replace( ',', '', bersih($pos[1]) );
			   $posmen[$myTable]['gaji'] = str_replace( ',', '', bersih($pos[2]) );
			   $posmen[$myTable]['aset'] = str_replace( ',', '', bersih($pos[3]) );
			   $posmen[$myTable]['staf'] = str_replace( ',', '', bersih($pos[4]) );
			   $posmen[$myTable]['stok'] = str_replace( ',', '', bersih($pos[5]) );
		}
		else
		{
			foreach ($posmen as $jadual => $value)
			foreach ($value as $kekunci => $papar)
				$posmen[$myTable][$kekunci]= 
					( in_array($kekunci,array('hasil','belanja','gaji','aset','staf','stok')) ) ?
					str_replace( ',', '', bersih($papar) )# buang koma
					: bersih($papar);
		}

		unset($posmen[$myTable]['pecah5P']);

		/*# debug
		echo '<pre>$hasil='; print_r($hasil); echo '</pre>';
		echo '<pre>$pos='; print_r($pos); echo '</pre>';
		echo '<pre>$posmen2='; print_r($posmen); echo '</pre>';//*/

		return $posmen; # pulangkan nilai
	}

	function buang($id) 
	{
		//echo '<hr>Anda berada di class :' . __METHOD__ . '<hr>';
		if (!empty($id)) 
		{
			#mula cari $cariID dalam $bulanan
			foreach ($bulanan as $key => $myTable)
			{# mula ulang table
				$this->papar->kesID[$myTable] =
				$this->tanya->cariSemuaMedan($sv . $myTable,
				$medanData, $cari);
			}# tamat ulang table
		}
		else
		{
			$this->papar->carian='[tiada id diisi]';
		}

		# pergi papar kandungan
		$f = array('ubah','buang');
		$this->paparTemplate($f[1]);
	}
#==================================================================================================
#--------------------------------------------------------------------------------------------------
	function ulangJadual($senarai)
	{
		foreach ($senarai as $myTable => $row)
		{
			if ( count($row)==0 ) echo '';
			else
			{
				echo "\n<!-- Jadual $myTable "
				. '########################################### -->';
				$this->bentukJadual($myTable,$row);
				echo "\n<!-- Jadual $myTable "
				. '########################################### -->';
			} // if ( count($row)==0 )
		}
		#
	}
#--------------------------------------------------------------------------------------------------
	function bentukJadual($myTable,$row)
	{
		echo "\n" . '<table border="1" class="excel" id="example">';
		echo "\n" . '<h3>'. $myTable . '</h3>';
		$printed_headers = false; # mula bina jadual
		#-----------------------------------------------------------------
		for ($kira=0; $kira < count($row); $kira++)
		{
			if ( !$printed_headers ) # papar tajuk medan sekali sahaja:
			{
				echo "\n" . '<thead><tr><th>#</th>';
				foreach ( array_keys($row[$kira]) as $tajuk )
				{
					echo "\n<th>$tajuk</th>";
				}
				echo "\n" . '</tr></thead>';
				$printed_headers = true;
			}
		# papar data $row ------------------------------------------------
		echo "\n" . '<tr><td align="center">' . ($kira+1) . '</td>';
			foreach ( $row[$kira] as $key=>$data )
			{
				echo "\n<td>$data</td>";
			}
			echo "\n" . '</tr>';
		}#-----------------------------------------------------------------
		echo "\n" . '</table>';
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
}