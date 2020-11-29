<?php
#--------------------------------------------------------------------------------------------------
	function debugValue($senarai,$jadual,$p='0')
	{
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '1') var_export($senarai);
		echo '</pre><hr>';//*/
		//debugValue($ujian,'ujian',0);
		//$this->debugValue($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
	}
#--------------------------------------------------------------------------------------------------
	function paparFail($tajuk)
	{
		diatas($tajuk);
		echo "\n" . '<table><tr><td valign="top">';
		echo "\n" . '<ul class="fa-ul">';
		foreach(getWebList() as $file):
			echo "\n<li>" . pautan($file['name'], 'web') . '</li>';
		endforeach;
		foreach(getIdea() as $file2):
			echo "\n<li>" . pautan($file2, 'web') . '</li>';
		endforeach;
		echo "\n</ul></td>\n<td>";
		foreach(dnschanger() as $name => $web):
			echo paparan($web,null);
		endforeach;
		echo "\n</td>" . '<td valign="top"><hr><br><i class="fas fa-user-tie fa-7x"></i>';
		echo "\n</td></tr></table>\n";
		//echo '<pre>'; print_r(getWebList()); echo '</pre>';
		//echo '<pre>'; print_r(getFileList('./')); echo '</pre>';
		dibawah();
	}
#--------------------------------------------------------------------------------------------------
	function pautan($fail, $type)
	{
		$icon = ($type == 'dir') ? '<i class="far fa-folder fa-spin"></i>'
		: '<i class="fas fa-globe-asia fa-spin"></i>';
		$p = ($fail == '&nbsp;') ? '<hr>' : '<span class="fa-li">' . $icon . '</span>'
		. '<a target="_blank" href="' . $fail . '">' . $fail . '</a>';

		return $p;
	}
#--------------------------------------------------------------------------------------------------
	function pautan2($fail, $type)
	{
		$icon = ($type == 'dir') ? '<i class="far fa-folder fa-spin"></i>'
		: '<i class="fas fa-globe-asia fa-spin"></i>';
		$p = ($fail == '&nbsp;') ? '<hr>' : '<span class="fa-li">' . $icon . '</span>'
		. '<a>' . $fail . '</a>';

		return $p;
	}
#--------------------------------------------------------------------------------------------------
	function kiraPaparan()
	{
		$kira[01] = $kira[02] = $kira[03] = 0;
		//$kira[02] = 16;$kira[03] = 16;
		foreach(dnschanger() as $name => $web):
			$data = explode('|', $web);
			//$data0 = strlen($data[0]);
			if(strlen($data[1]) > $kira[01]) $kira[01] = strlen($data[1]);
			if(strlen($data[2]) > $kira[02]) $kira[02] = strlen($data[2]);
			if(strlen($data[3]) > $kira[03]) $kira[03] = strlen($data[3]);
		endforeach;

		return $kira;
	}
#--------------------------------------------------------------------------------------------------
	function paparan($web, $test)
	{
		# set pembolehubah utama
		$p1 = 'pre';#https://www.w3schools.com/tags/tag_var.asp
		$p2 = 'kbd';
		$p3 = 'code';
		$p4 = 'samp';
		$kira = kiraPaparan();
		$data = explode('|', $web);
		$semak01 = ($kira[01] - strlen($data[1]) + 1);
		$semak02 = ($kira[02] - strlen($data[2]) + 1);
		$semak03 = ($kira[03] - strlen($data[3]) + 1);
		# papar
			$p = "\n<$p2>| " . $data[1];
			for($i = 1; $i < $semak01; $i++): $p .= "&nbsp;"; endfor;
			$p .=  "|" . $data[2];
			for($i = 1; $i < $semak02; $i++): $p .= "&nbsp;"; endfor;
			$p .= "|" . $data[3];
			for($i = 1; $i < $semak03; $i++): $p .= "&nbsp;"; endfor;
			$p .= "&nbsp;|</$p2><br>";
		#
		return $p;
	}
#--------------------------------------------------------------------------------------------------
	function getWebList()
	{
		$web[]['name'] = 'https://localhost';
		$web[]['name'] = URL . 'invois/webSebutHarga';
		$web[]['name'] = URL . 'invois/webInvois';
		$web[]['name'] = URL . 'invois/cthSebutHarga';
		$web[]['name'] = URL . 'invois/cthInvois';
		$web[]['name'] = 'https://www.office.com/?auth=1';
		$web[]['name'] = 'http://www.maybank2u.com.my';
		$web[]['name'] = 'http://www.cimbclicks.com.my';
		$web[]['name'] = 'http://www.amin007.org';

		return $web;
	}
#--------------------------------------------------------------------------------------------------
	function getIdea()
	{
		$papar = array(
			'[baris]'=>'===========================',
			'[TM Test]'=>'//speedtest.tm.com.my',
			'[Fast.com]'=>'//fast.com',
			'[Speedtest.net]'=>'https://www.speedtest.net',
			'[Kalendar]'=>'https://www.mysumber.com/cuti-umum.html',
			'[jQuery]'=>'http://jquery.com',
			'[Bootstrap]'=>'http://getbootstrap.com',
			'[animate.css]'=>'https://daneden.github.io/animate.css',
			'[Sweet Alert]'=>'http://t4t5.github.io/sweetalert',
			'[FontAwesome]'=>'http://fortawesome.github.io/Font-Awesome',
			'[backstretch]'=>'http://srobbin.com/jquery-plugins/backstretch',
			'[jQuery.Form]'=>'http://malsup.com/jquery/form',
			'[Pixabay]'=>'https://pixabay.com',
			'[Pexels]'=>'https://pexels.com',
			'[Unslpash]'=>'https://unsplash.com',
			'[7-themes]'=>'http://7-themes.com',
		);

		return $papar;
	}
#--------------------------------------------------------------------------------------------------
	function dnschanger()
	{
		$data['dns01'] = '|Streamyx | 202.188.18.188 | 1.9.1.9';
		$data['dns02'] = '|Google DNS | 8.8.8.8 | 8.8.4.4';
		$data['dns03'] = '|Cloudflare DNS | 1.1.1.1 | 1.0.0.1';
		$data['dns04'] = '|Cloudflare3 DNS | 1.1.1.3 | 1.0.0.3';
		$data['dns05'] = '|OpenDNS | 208.67.222.123 | 208.67.222.220';
		$data['dns06'] = '|OpenDNS Home | 208.67.222.222 | 208.67.220.220';
		$data['dns07'] = '|Quad9 | 9.9.9.9 | 149.112.112.112';
		$data['dns08'] = '|CleanBrowsing | 185.228.168.9 | 185.228.169.9';
		$data['dns09'] = '|Verisign | 64.6.64.6 | 64.6.65.6';
		$data['dns10'] = '|Alternate DNS | 198.101.242.72 | 23.253.163.53';
		$data['dns11'] = '|AdGuard DNS | 176.103.130.130 | 176.103.130.131';
		$data['dns12'] = '|Level 3 | 209.244.0.3 | 209.244.0.3';
		$data['dns13'] = '|Norton ConnectSafe | 199.85.126.10 | 199.85.127.10';
		$data['dns14'] = '|OpenNic | 10.150.40.234 | 50.116.23.211';
		$data['dns15'] = '|DNS Advantage | 156.154.70.1 | 156.154.71.1';
		$data['dns16'] = '|DNS Watch | 84.200.69.80 | 84.200.70.40';
		$data['dns17'] = '|Comodo Secure DNS | 8.26.56.26 | 8.20.247.20';
		$data['dns18'] = '|GreenTeamDNS | 81.218.119.11 | 209.88.198.133';
		$data['dns19'] = '|SafeDNS | 195.46.39.39 | 195.46.39.40';
		$data['dns20'] = '|SmartViper | 208.76.50.50 | 208.76.51.51';
		$data['dns21'] = '|Dyn | 216.146.35.35 | 216.146.36.36';
		//*/
		return $data;
	}
#--------------------------------------------------------------------------------------------------
function diatas($tajuk = 'Cubaan')
{
	?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $tajuk ?></title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
}
#--------------------------------------------------------------------------------------------------
function dibawah()
{
	?>
<!--
# masukkan js dan jquery di bawah ini ########################################################################################### -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"</script>
</body>
</html>
<?php
}
#--------------------------------------------------------------------------------------------------
###################################################################################################
#--------------------------------------------------------------------------------------------------
paparFail('Sebutharga dan Invois');
