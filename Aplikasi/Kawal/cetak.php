<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Cetak extends \Aplikasi\Kitab\Kawal
{
#==================================================================================================
##-------------------------------------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		//\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = 'cetak';
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
	private function debugDaa()
	{
		$this->semakPembolehubah($this->papar->syarikat,'syarikat');
	}
##-------------------------------------------------------------------------------------------------
#==================================================================================================
#--------------------------------------------------------------------------------------------------
	public function akaunmaybank($a = null)
	{
		//echo '<hr>Anda berada di class :' . __METHOD__ . '<hr>';
		# isytihar pembolehubah
		$this->papar->hargaProjek = $a;
		$this->papar->Tajuk_Muka_Surat = 'SebutHarga';
		$this->papar->carian = 'id';
		$this->papar->syarikat = $this->tanya->contohDataSyarikat002();
		//$this->debugDaa(); # semak data

		# pergi papar kandungan
		$f = array('akaunMaybank');
		$this->paparTemplate($f[0]);
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
}