<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Index extends \Aplikasi\Kitab\Kawal
{
#==========================================================================================
	function __construct()
	{
		//echo '<br>class Index extends Kawal';
		parent::__construct();
		\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		$this->_folder = 'index';
	}

	function index()
	{
		# Set pemboleubah utama
		$this->papar->Tajuk_Muka_Surat='Enjin';
		$fail = array('login','mukadepan');
		//$theme = array(0,1,2,3,4);
		//$template = $theme[rand(0, count($theme)-1)];

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail[1],$jenis,1); # $noInclude=0
	}
#==========================================================================================
	function login($user) 
	{
		# Set pemboleubah utama
		$this->papar->nama = $user; # dapatkan nama pengguna
		$this->papar->IP = dpt_ip(); # dapatkan senarai IP yang dibenarkan

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/login',$jenis,0); # $noInclude=0
	}

	function login_automatik($user) 
	{
		# Set pemboleubah utama
		$this->papar->nama = $user; # dapatkan nama pengguna
		$this->papar->IP = dpt_ip(); # dapatkan senarai IP yang dibenarkan

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/login_automatik',$jenis,0); # $noInclude=0
	}

	function keluar() 
	{
		# Set pemboleubah utama
		$this->papar->IP = dpt_ip(); # dapatkan senarai IP yang dibenarkan

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/keluar',$jenis,0); # $noInclude=0
	}	
#==========================================================================================	
	function kaunter()
	{
		# Set pemboleubah utama
		if( isset($this->tanya->dudukmana) ):
			echo 'awek tanya ada'; 
		else:
			//echo 'awek tanya tiada'; 
			\Aplikasi\Kitab\Route::classTanyaTidakWujud('$this->tanya->dudukmana tak wujud');
		endif;
		//*/
	}
#==========================================================================================	
}
