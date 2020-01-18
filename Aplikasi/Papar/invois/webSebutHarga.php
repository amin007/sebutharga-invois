<?php
function tukartarikh($lama)
{
	$baru1 = @date_format($lama, 'j F, Y, g:i a');
	$baru2 = date("j F, Y, g:i a");
	$baru = ($lama == '0000-00-00 00:00:00') ? $baru2 : $baru1;

	return $baru;
}
function pecahTarikhMesej($mesej)
{
	@list($dataAsal, $data) = explode('Tarikh',$mesej);
	//@list($tarikh, $data2) = explode('Masa',$data);
	@list($tarikh, $data2) = explode('Takwim',$data);
	@list($dataPC, $data3) = explode('Mesej',$data2);
	$data4 = (isset($data3)) ? $data3 : '';
	@list($dataMesej, $dataAkhir) = explode('-',$data4);
	$dataMesej = (isset($dataMesej)) ? $dataMesej : '';

	return array($tarikh, $dataMesej);
}
include 'diatas001.php';
if ($this->carian=='[tiada id diisi]')
    echo 'data kosong<br>';
elseif(!isset($this->akaun['kes'][0]['id']))
	echo 'data kosong juga<br>';
else # $this->carian=='ada' - mula
{
	$namaOrang = $this->syarikat[0]['namaOrang'];
	$namaSyarikat = $this->syarikat[0]['namaSyarikat'];
	$noSSM = $this->syarikat[0]['noSSM'];
	$alamat = $this->syarikat[0]['alamat'];
	$notel = $this->syarikat[0]['notel'];
	$namaBank = $this->syarikat[0]['namaBank'];
	$namaAkaunBank = $this->syarikat[0]['namaAkaunBank'];//*/

	$kiraPesanan = count($this->akaun['kes']);
	for($i = 0; $i < $kiraPesanan; $i++):
		list($tarikh,$dataMesej) = pecahTarikhMesej($this->akaun['kes'][$i]['Mesej']);
		# untuk semakan ID
		$bilRujukan =  \Aplikasi\Kitab\RahsiaHash::rahsia('md5', $dataMesej);
		$id = $this->akaun['kes'][0]['id'];
		$bilRujukan = $bilRujukan . '@'. $i . '@' . $id . '/' . $kiraPesanan;
		# untuk semakan email
		$email = ($this->akaun['kes'][$i]['Email']);
		$email = (isset($email)) ? $email : '';
		/*echo '<pre>jumlah data = ' . $kiraPesanan . '</pre>'; # debug data
		echo '<pre>$tarikh '; print_r($tarikh); echo '</pre>';
		echo '<pre>$dataMesej:'; print_r($dataMesej); echo '</pre>';//*/
?>
<br>
<div class="container" style="page-break-before:always">
<div class="jumbotron">

	<div class="row">
		<div class="col-md-9">
			<h4><?php echo $namaSyarikat . $noSSM ?></h4>
			<h4><?php echo $alamat . ' - Tel: ' . $notel ?></h4>
		</div>
		<div class="col-md-3">
			<div class="teksBesar">QUOTE</div>
		</div>
	</div>
	<ul>
	<li><?php echo $this->akaun['kes'][$i]['Nama'] ?></li>
	<li><?php echo $this->akaun['kes'][$i]['Email'] ?></li>
	<li>Note : <?php echo $this->akaun['kes'][$i]['Temujanji'] ?></li>
	<li>Bil Rujukan : <?php echo $bilRujukan ?>/PAID</li>
	<!-- li>100-10 Bangunan Terkemuka,</li -->
	<!-- li>54321 Kuala Lumpur, Malaysia</li -->
	<!-- li>Attn: Ahmad Kasan</li -->
	<!-- li>Ref:	RUJUKAN-2014-01(1/3)</li -->
	<!-- li>Date:	March 10, 2014</li -->
	<li>Date Email <?php echo nl2br($tarikh) ?></li>
	</ul>

	<h2>Tuan Yang Terutama,</h2>

	<P>Sila cari petikan kami untuk produk dan perkhidmatan yang diminta di bawah:</p>

	<table class="table table-condensed">
	<!-- table class="excel" -->
	<tr><th>Item | Harga (RM) | Qty | Jumlah (RM) </th></tr>
	<tr><td>Pengembangan Plugin Custom Wordpress</td></tr>
	<tr><td>Untuk membuat plugin wordpress yang hebat</td></tr>
	<tr><td>untuk melakukan perkara yang mengagumkan di laman web anda | XXXXXX | 1 | XXXXXX |</td></tr>
	<tr><td>TOTAL | XXXXXX |</td></tr>
	</table>

	<strong>Skop projek</strong>
	<p>Untuk membuat yang hebat untuk melakukan perkara-perkara yang mengagumkan di laman web anda</p>

	<strong>Ciri-ciri Termasuk</strong>
	<ul>
	<li>Plugin Wordpress mampu mengeluarkan gula-gula dari udara yang nipis</li>
	<li>Panel pilihan untuk membolehkan pentadbir memilih saiz gula, rasa dan warna gula-gula</li>
	<li>Panel pilihan untuk menjadualkan pembuatan gula-gula</li>
	<li>Pilihan untuk menyimpan konfigurasi penciptaan permen</li>
	</ul>

	<strong>Terma pembayaran:</strong>
	<ul>
	<li>Bayaran 20% diperlukan semasa memulakan projek.</li>
	<li>Satu lagi bayaran 30% diperlukan selepas demo projek pertama.</li>
	<li>Baki yang perlu dibayar sebelum penghantaran penuh kod.</li>
	</ul>

	<strong>Kaedah Pembayaran</strong>
	<ul>
	<li> Cek atau deposit bank langsung. </li>
	<li> Sila beritahu kami jika anda membuat deposit bank langsung. </li>
	<li> Pembayaran boleh dibuat untuk:
		<ul>
		<li> <?php echo $namaSyarikat ?> </li>
		<li> <?php echo $namaBank ?> </li>
		<li> A/C NO.: <?php echo $namaAkaunBank ?> </li>
		</ul>
	</li>
	</ul>

	<strong>Kesahan</strong>
	<p>Kutipan ini sah selama 14 hari dari tarikh dokumen ini.</p>

	<strong>Waranti</strong>
	<p>Waranti 30 hari disediakan untuk memastikan laman web berfungsi dengan baik dan bebas daripada bug. Apa-apa permintaan menetapkan pepijat yang dilaporkan selepas tempoh 30 hari dikenakan. Ini tidak termasuk pembangunan ciri-ciri baru dan peningkatan.</p>

	<strong>Pemilikan</strong>
	<p>Semua karya akan menjadi pemilikan klien kecuali untuk karya pihak ketiga yang digunakan dalam projek seperti dan tidak terhad kepada perpustakaan sumber terbuka, karya seni, perpustakaan komersial yang datang dengan perjanjian lesen mereka sendiri. Pelanggan adalah mematuhi terma lesen dan bertanggungjawab sepenuhnya untuk menggunakannya.</p>

	<strong>Terma lain</strong>
	<p>Petikan ini tidak termasuk caj seperti memperoleh foto stok, memperoleh fon, fotografi profesional, pengeluaran sebelum dan selepas video, bakat dan lain-lain. Caj lain, seperti yang akan disebutkan secara berasingan atas permintaan. Harga yang disebutkan adalah tertakluk kepada perubahan berdasarkan permintaan pelanggan terhadap perkhidmatan lain dan ciri tambahan.</p>

	<p>Kami percaya bahawa anda akan dapati quote di atas memuaskan. Kami berharap dapat bekerja dengan anda. Sila hubungi kami sepatutnya mempunyai sebarang soalan sama sekali.</p>

	<p>Sebarang pertanyaan atau pertanyaan boleh diarahkan kepada <?php echo $namaOrang ?> di nombor <?php
	echo $notel ?></p>

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