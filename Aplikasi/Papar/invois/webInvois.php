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
				echo "\n<!-- Jadual $myTable ########################################### -->";

				if($pilih=='nombor') bentukJadualNombor($myTable,$row);
				else bentukJadualBiasa($myTable,$row);

				echo "\n<!-- Jadual $myTable ########################################### -->";
			} // if ( count($row)==0 )
		}
		#
	}
#--------------------------------------------------------------------------------------------------
	function bentukJadualBiasa($myTable,$row)
	{
		//echo "\n" . '<table border="1" class="excel" id="example">';
		echo "\n" . '<table border="1" class="table table-sm table-bordered">';
		//echo "\n" . '<h3>'. $myTable . '</h3>';
		$printed_headers = false; # mula bina jadual
		#-----------------------------------------------------------------
		for ($kira=0; $kira < count($row); $kira++)
		{
			if ( !$printed_headers ) # papar tajuk medan sekali sahaja:
			{
				echo "\n" . '<thead class="thead-dark"><tr>';
				foreach ( array_keys($row[$kira]) as $tajuk )
				{
					echo "\n<th>$tajuk</th>";
				}
				echo "\n</tr></thead>\n<tbody>";
				$printed_headers = true;
			}
		# papar data $row ------------------------------------------------
		echo "\n" . '<tr>';
			foreach ( $row[$kira] as $key=>$data )
			{
				echo "\n<td>$data</td>";
			}
			echo "\n" . '</tr>';
		}#-----------------------------------------------------------------
		echo "\n" . '</tbody></table>';
	}
#--------------------------------------------------------------------------------------------------
	function bentukJadualNombor($myTable,$row)
	{
		//echo "\n" . '<table border="1" class="excel" id="example">';
		echo "\n" . '<table border="1" class="table table-sm table-bordered">';
		//echo "\n" . '<h3>'. $myTable . '</h3>';
		$printed_headers = false; # mula bina jadual
		#-----------------------------------------------------------------
		for ($kira=0; $kira < count($row); $kira++)
		{
			if ( !$printed_headers ) # papar tajuk medan sekali sahaja:
			{
				echo "\n" . '<thead class="thead-dark"><tr><th>#</th>';
				foreach ( array_keys($row[$kira]) as $tajuk )
				{
					echo "\n<th>$tajuk</th>";
				}
				echo "\n</tr></thead>\n<tbody>";
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
		echo "\n" . '</tbody></table>';
	}
#--------------------------------------------------------------------------------------------------
?><?php
# mula koding daa
include 'diatas001.php';
if ($this->carian=='[tiada id diisi]')
    echo 'data kosong<br>';
elseif(!isset($this->akaun['kes'][0]['id']))
	echo 'data kosong juga<br>';
else # $this->carian=='ada' - mula
{
	//semakPembolehubah($this->akaun,'akaun');
	$namaOrang = $this->syarikat[0]['namaOrang'];
	$namaSyarikat = $this->syarikat[0]['namaSyarikat'];
	$noSSM = $this->syarikat[0]['noSSM'];
	$alamat = $this->syarikat[0]['alamat'];
	$notel = $this->syarikat[0]['notel'];
	$namaBank = $this->syarikat[0]['namaBank'];
	$namaAkaunBank = $this->syarikat[0]['namaAkaunBank'];//*/

	$kiraPesanan = count($this->akaun['kes']);
	for($i = 0; $i < $kiraPesanan; $i++):
		# untuk semakan ID
		$id = $this->akaun['kes'][0]['id'];
		//$bilRujukan = $bilRujukan . '@'. $i . '@' . $id . '/' . $kiraPesanan;
		$bilRujukan = 'YBK@00' . $id . '/' . $kiraPesanan;
		# untuk semakan email
		$email = ($this->akaun['kes'][$i]['Email']);
		$email = (isset($email)) ? $email : '';
		# semak tarikh
		$tarikh = ($this->akaun['kes'][$i]['Tarikh']);
		$webapa = ($this->akaun['kes'][$i]['webapa']);
?>
<div class="container">
<div style="padding: 1rem 1rem;
margin-bottom: 2rem;
background-color: #e9ecef;
border-radius: 0.3rem;">

	<div class="row">
		<div class="col-md-9">
			<h4><?php echo $namaSyarikat . $noSSM ?></h4>
			<small><?php echo $alamat . ' - Tel: ' . $notel ?></small>
		</div>
		<div class="col-md-3">
			<div class="teksBesar">INVOIS</div>
		</div>
	</div>

	<hr><h3>Kepada:</h3>
	<ul>
	<li><?php echo $this->akaun['kes'][$i]['Nama'] ?></li>
	<li><?php echo $this->akaun['kes'][$i]['Alamat'] ?></li>
	<li>Untuk Perhatian: <?php echo $this->akaun['kes'][$i]['UP'] ?></li>
	<li>Bil Rujukan : <?php echo $bilRujukan ?>/PAID</li>
	<li>Tarikh: <?php echo nl2br($tarikh) ?></li>
	</ul>

	<h5>Tuan Yang Terutama,</h5>

	<P>Sila lihat invois kami untuk produk dan perkhidmatan yang diminta di bawah:</p>

	<table border="1" class="table table-sm table-bordered">
	<!-- table class="excel" -->
	<thead class="thead-dark">
	<tr><th>Skop projek</th><th>Peratus</th><th>Kuantiti</th><th>Jumlah (RM)</th></tr>
	</thead>
	<tbody>
	<tr><td>
		Untuk membuat website <?php echo $webapa ?> yang menggunakan gateway epayment billplz
		</td>
		<td align="center">100%</td>
		<td align="center">1</td>
		<td align="center"><?php echo $this->hargaProjek[0] ?></td></tr>
	<tr><td>
		Pembayaran pertama sebanyak 20% - projek bermula
		</td>
		<td align="center">20%</td>
		<td align="center">1</td>
		<td align="center"><?php echo (0.2 * $this->hargaProjek[0]) ?></td></tr>
	<tr><td>
		Pembayaran kedua sebanyak 30% - selepas demo projek pertama
		</td>
		<td align="center">30%</td>
		<td align="center">1</td>
		<td align="center"><?php echo (0.3 * $this->hargaProjek[0]) ?></td></tr>
	<tr><td>
		Pembayaran ketiga sebanyak 50% - Baki yang perlu dibayar
		</td>
		<td align="center">50%</td>
		<td align="center">1</td>
		<td align="center"><?php echo (0.5 * $this->hargaProjek[0]) ?></td></tr>
	<tr><td colspan="3" align="right">JUMLAH</td>
		<td align="center"><?php echo $this->hargaProjek[0] ?></td></tr>
	</tbody>
	</table>

	<strong>Kaedah Pembayaran</strong>
	<ul>
	<li> Cek atau deposit bank langsung. </li>
	<li> Sila beritahu kami jika anda membuat deposit bank langsung. </li>
	<li> Pembayaran boleh dibuat untuk:
		<ul>
		<li> <?php echo $namaSyarikat ?> </li>
		<li> <?php echo $namaBank ?> </li>
		<li> No. Akaun Bank: <?php echo $namaAkaunBank ?> </li>
		</ul>
	</li>
	</ul>


	<p>Sebarang pertanyaan atau pertanyaan boleh diarahkan kepada <?php echo $namaOrang
	?> di nombor <?php echo $notel ?></p>

	<p>Sekian kami suka,</p>

	<ul>
	<li> <?php echo $namaOrang ?> </li>
	<li> Web Programmer </li>
	<li> <?php echo $namaSyarikat . $noSSM?> </li>
	</ul>

</div><!-- / class="jumbotron" -->
</div><!-- / class="container" -->

<?php
	endfor; # endfor
} # $this->carian=='ada' - tamat
//*/

include 'dibawah001.php';