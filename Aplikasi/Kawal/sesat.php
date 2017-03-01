<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Sesat extends \Aplikasi\Kitab\Kawal
{
#==================================================================================================================
	function __construct() 
	{
		parent::__construct();
		$this->_tajukAtas = 'Enjin - Sesat';
		$this->_folder = 'sesat';
	}

	function index() 
	{# 1
		$this->papar->mesej = 'Halaman ini tidak wujud';

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/index', $jenis, 0); # $noInclude=0
	}

	function parameter() 
	{# 2
		$this->papar->mesej = 'Class wujud tapi parameter/method/fungsi tidak wujud';

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/index', $jenis, 0); # $noInclude=0
	}

	function classTidakWujud($amaran) 
	{
		$this->papar->mesej = $amaran;
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/index', $jenis, 0); # $noInclude=0
	}

	function methodTanyaTidakWujud($amaran,$class,$method)
	{
		$this->papar->mesej = $amaran
			. "|class=$class|fungsi=$method|";
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/index', $jenis, 0); # $noInclude=0
	}

	function folderPaparTidakWujud() 
	{
		echo $this->papar->mesej = 'folder tidak wujud dalam PAPAR';
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		//$this->papar->bacaTemplate(
		$this->papar->paparTemplate(
			$this->_folder . '/index', $jenis, 0); # $noInclude=0
		//*/
	}

	function failTidakWujud() 
	{
		$this->papar->mesej = 'Fail tidak wujud dalam PAPAR';
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/index', $jenis, 0); # $noInclude=0
	}

	function masalahDB($amaran)
	{
		$this->papar->mesej = $amaran;
		$this->papar->Tajuk_Muka_Surat = $this->_tajukAtas . $this->papar->mesej;

		# pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/index', $jenis, 0); # $noInclude=0
	}
#==================================================================================================================
}