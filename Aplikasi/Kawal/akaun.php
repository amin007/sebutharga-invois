<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Akaun extends \Aplikasi\Kitab\Kawal
{
#==================================================================================================================
	public function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = 'akaun';

		$this->papar->js = array(
		/*'bootstrap-transition.js','bootstrap-alert.js','bootstrap-modal.js','bootstrap-dropdown.js',
			'bootstrap-scrollspy.js','bootstrap-tab.js','bootstrap-tooltip.js','bootstrap-popover.js',
			'bootstrap-button.js','bootstrap-collapse.js','bootstrap-carousel.js','bootstrap-typeahead.js',
			'bootstrap-affix.js',*/
			'bootstrap-datepicker.js','bootstrap-datepicker.min.js',
			'bootstrap-datepicker.ms.js','bootstrap-editable.min.js');
		$this->papar->css = array(
			'bootstrap-datepicker.css',
			'bootstrap-editable.css');
	}

	public function index() { echo '<br>class Akaun::index() extend Kawal<br>'; }
#==================================================================================================================
#---------------------------------------------------------------------------------------------------
	public function cetakSebutHarga($jadual = null, $cariID = null) 
	{
		$cariID = 'spam';
		if (!empty($cariID))
		{
			# senaraikan tatasusunan jadual dan setkan pembolehubah
			$this->papar->_jadual = $jadual;
			$this->papar->carian = 'id';
			$cari[] = array('fix'=>'x%like%','atau'=>'WHERE','medan'=>'status','apa'=>$cariID);

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

		# isytihar pemboleubah
		$this->papar->Tajuk_Muka_Surat = 'SebutHarga';

		/*echo '<pre>'; # semak data
		echo '$this->papar->akaun:<br>'; print_r($this->papar->akaun);
		echo '<br>$this->papar->carian:'; print_r($this->papar->carian);
		echo '</pre>'; //*/

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate
		//$this->papar->paparTemplate
			($this->_folder . '/cetakSebutHarga',$jenis,1); # $noInclude=0
		//*/
	}

#---------------------------------------------------------------------------------------------------
	public function cetakInvois($jadual = null, $cariID = null) 
	{
		$cariID = 'spam';
		if (!empty($cariID))
		{
			# senaraikan tatasusunan jadual dan setkan pembolehubah
			$this->papar->_jadual = $jadual;
			$this->papar->carian = 'id';
			$cari[] = array('fix'=>'x%like%','atau'=>'WHERE','medan'=>'status','apa'=>$cariID);

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

		# isytihar pemboleubah
		$this->papar->Tajuk_Muka_Surat = 'Invois';


		/*echo '<pre>'; # semak data
		echo '$this->papar->akaun:<br>'; print_r($this->papar->akaun);
		echo '<br>$this->papar->carian:'; print_r($this->papar->carian);
		echo '</pre>'; //*/

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate
		//$this->papar->paparTemplate
			($this->_folder . '/cetak',$jenis,1); # $noInclude=0
		//*/
	}
#---------------------------------------------------------------------------------------------------
	public function ubah($jadual = null, $cariID = null) 
	{//echo '<br>Anda berada di class Imej extends Kawal:ubah($cari)<br>';

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

		# isytihar pemboleubah
		$this->papar->lokasi = 'Akaun - Ubah';
		$this->papar->cariID = $cariID;

		/*echo '<pre>'; # semak data
		echo '$this->papar->akaun:<br>'; print_r($this->papar->akaun);
		echo '<br>$this->papar->carian:'; print_r($this->papar->carian);
		echo '</pre>'; //*/

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate
		//$this->papar->paparTemplate
			($this->_folder . '/ubah',$jenis,0); # $noInclude=0
		//*/
	}
#---------------------------------------------------------------------------------------------------
	public function ubahCari()
	{
		//echo '<pre>$_GET->', print_r($_GET, 1) . '</pre>';
		# bersihkan data $_POST
		$input = bersih($_GET['cari']);
		$dataID = str_pad($input, 12, "0", STR_PAD_LEFT);

		# Set pemboleubah utama
		$this->papar->pegawai = senarai_kakitangan();
		$this->papar->lokasi = Tajuk_Muka_Surat . ' - Ubah';

		# pergi papar kandungan
		//echo '<br>location: ' . URL . 'akaun/ubah/' . $dataID . '';
		header('location: ' . URL . 'akaun/ubah/' . $dataID);
	}
#---------------------------------------------------------------------------------------------------
	public function ubahSimpan($dataID)
	{
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
		$this->papar->baca('akaun/buang', 1);

	}
#==================================================================================================================
}
