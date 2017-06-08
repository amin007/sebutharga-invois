<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Tempahan extends \Aplikasi\Kitab\Kawal
{
#==================================================================================================================
	public function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = 'tempahan';
	}

	public function index() { echo '<br>class Tempahan::index() extend Kawal<br>'; }
#==================================================================================================================
#---------------------------------------------------------------------------------------------------
	public function kenderaan($unit = null, $tarikh = null, $masa = null, $tujuan = null) 
	{
		$this->papar->data = $this->tanya->senaraiPencam($unit, $tarikh, $masa, $tujuan);
		# semak pembolehubah $this->papar->data
		//echo '<pre>$this->papar->data:'; print_r($this->papar->data) . '</pre><br>';

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate
		//$this->papar->paparTemplate
			($this->_folder . '/kenderaan',$jenis,1); # $noInclude=0
		//*/
	}
#==================================================================================================================
}