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
# mula koding daa
include 'diatas001.php';
if ($this->carian=='[tiada id diisi]')
    echo 'data kosong<br>';
elseif(!isset($this->akaun['kes'][0]['id']))
	echo 'data kosong juga<br>';
else # $this->carian=='ada' - mula
{
	//semakPembolehubah($this->syarikat,'syarikat');
	list($namaOrang,$namaSyarikat,$noSSM,$alamat,$notel,$namaBank,$namaAkaunBank)
		= setDataAwal($this->syarikat);
	//semakPembolehubah($this->akaun,'akaun');
	$bilRujukan = $tarikh = $webapa = null;
	$kiraPesanan = count($this->akaun['kes']);
	for($i = 0; $i < $kiraPesanan; $i++):
		list($bilRujukan,$tarikh,$webapa) = setDataAkaun($i, $this->akaun, $kiraPesanan);
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

	<?php
	//semakPembolehubah($this->skop,'skop');
	//semakPembolehubah($this->jadual,'jadual');
	if(isset($this->skop)) ulangJadual($this->skop,'skop');
	if(isset($this->jadual)) ulangJadual($this->jadual,'nombor'); ?>
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