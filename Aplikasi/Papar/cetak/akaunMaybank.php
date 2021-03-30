<?php
#--------------------------------------------------------------------------------------------------
function semakPembolehubah($senarai,$jadual,$p='0')
{
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '1') var_export($senarai);
		echo '</pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
}
#--------------------------------------------------------------------------------------------------
function setDataAwal($syarikat)
{
	$namaOrang = $syarikat[0]['namaOrang'];
	$namaSyarikat = $syarikat[0]['namaSyarikat'];
	$noSSM = ' (' . $syarikat[0]['noSSM'] . ')';
	$alamat = $syarikat[0]['alamat'];
	$notel = $syarikat[0]['notel'];
	$namaBank = $syarikat[0]['namaBank'];
	$namaAkaunBank = $syarikat[0]['namaAkaunBank'];//*/

	return array($namaOrang,$namaSyarikat,$noSSM,$alamat,$notel,$namaBank,$namaAkaunBank);
}
#--------------------------------------------------------------------------------------------------
function setDataAkaun($i, $akaun, $kiraPesanan)
{
	# untuk semakan ID
	$id = $akaun['kes'][0]['id'];
	$bilRujukan = 'YBK@00' . $id . '/' . $kiraPesanan;
	# semak tarikh
	$tarikh = ($akaun['kes'][$i]['Tarikh']);
	$webapa = ($akaun['kes'][$i]['webapa']);
	//semakPembolehubah($kiraPesanan,'kiraPesanan');
	//semakPembolehubah($tarikh,'tarikh');
	//semakPembolehubah($webapa,'webapa');

	return array($bilRujukan,$tarikh,$webapa);
}
#--------------------------------------------------------------------------------------------------
	function ulangJadual($senarai,$pilih)
	{
		foreach ($senarai as $myTable => $row)
		{
			if ( count($row)==0 ) echo '';
			else
			{
				echo "<!-- Jadual $myTable ###########################################"
				. " -->";

				if($pilih=='nombor') bentukJadualNombor($myTable,$row);
				else bentukJadualBiasa($myTable,$row);

				echo "\n<!-- Jadual $myTable ###########################################"
				. " -->\n\n";
			}// if ( count($row)==0 )
		}
		#
	}
#--------------------------------------------------------------------------------------------------
	function bentukJadualBiasa($myTable,$row)
	{
		//echo "\n" . '<table border="1" class="excel" id="example">';
		echo "\n\t" . '<table border="1" class="table table-sm table-bordered">';
		//echo "\n" . '<h3>'. $myTable . '</h3>';
		$printed_headers = false; # mula bina jadual
		#-----------------------------------------------------------------
		for ($kira=0; $kira < count($row); $kira++)
		{
			if ( !$printed_headers ) # papar tajuk medan sekali sahaja:
			{
				echo "\n\t" . '<thead class="thead-dark"><tr>';
				foreach ( array_keys($row[$kira]) as $tajuk )
				{
					echo "\n\t<th>$tajuk</th>";
				}
				echo "\n\t</tr></thead>\n\t<tbody>";
				$printed_headers = true;
			}
		# papar data $row ------------------------------------------------
		echo "\n\t" . '<tr>';
			foreach ( $row[$kira] as $key=>$data )
			{
				echo "\n\t<td>$data</td>";
			}
			echo "\n\t" . '</tr>';
		}#-----------------------------------------------------------------
		echo "\n\t" . '</tbody></table>';
	}
#--------------------------------------------------------------------------------------------------
	function bentukJadualNombor($myTable,$row)
	{
		//echo "\n" . '<table border="1" class="excel" id="example">';
		echo "\n\t" . '<table border="1" class="table table-sm table-bordered">';
		//echo "\n" . '<h3>'. $myTable . '</h3>';
		$printed_headers = false; # mula bina jadual
		#-----------------------------------------------------------------
		for ($kira=0; $kira < count($row); $kira++)
		{
			if ( !$printed_headers ) # papar tajuk medan sekali sahaja:
			{
				echo "\n\t" . '<thead class="thead-dark"><tr><th>#</th>';
				foreach ( array_keys($row[$kira]) as $tajuk )
				{
					echo "\n\t<th>$tajuk</th>";
				}
				echo "\n\t</tr></thead>\n\t<tbody>";
				$printed_headers = true;
			}
		# papar data $row ------------------------------------------------
		echo "\n\t" . '<tr><td align="center">' . ($kira+1) . '</td>';
			foreach ( $row[$kira] as $key=>$data )
			{
				echo "\n<td>$data</td>";
			}
			echo "\n\t" . '</tr>';
		}#-----------------------------------------------------------------
		echo "\n\t" . '</tbody></table>';
	}
#--------------------------------------------------------------------------------------------------
?><?php
# mula koding daa -
include 'diatas001.php';
//semakPembolehubah($this->syarikat,'syarikat');
list($namaOrang,$namaSyarikat,$noSSM,$alamat,$notel,$namaBank,$namaAkaunBank)
	= setDataAwal($this->syarikat);
?>
<table class="table">
	<?php
	echo '<tr>';
	for($bulan = 1; $bulan <= 36; $bulan++):
		echo '<td><img height="50" src="' . URL . 'sumber/fail/gambar/maybankislamic.svg"><br>'
		. $namaSyarikat . '<br>Akaun Bank : ' . $namaAkaunBank . '</td>';
		echo ($bulan % 3 == 0) ? '</tr><tr>':'';
	endfor;
?>
</table>
