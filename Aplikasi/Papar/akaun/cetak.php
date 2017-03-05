<?php 
include 'diatas.php';
/*echo '<pre>';
echo '$this->akaun:<br>'; print_r($this->akaun); 
echo '<br>$this->carian:'; print_r($this->carian); 
echo '<br>$this->cariID:'; print_r($this->cariID); 
echo '</pre>'; //*/

if(isset($this->akaun['kes'][0]['id'])):
	# set pembolehubah
	$mencari = URL . 'akaun/ubahCari/';
	$carian = $this->cariID;
	$mesej = ''; //$carian .' ada dalam ' . $this->_jadual;
else: # set pembolehubah
	$mencari = URL . 'akaun/ubahCari/';
	$carian = null;
	$mesej = '::' . $this->cariID . ' tiada dalam ' . $this->_jadual;
endif;
//echo '<div align="center">' . $mencari . '</div>'; ?><?php 
/*
$this->akaun['kes'][0]['id'] 
$this->akaun['kes'][0]['Nama'] 
$this->akaun['kes'][0]['Tajuk']
$this->akaun['kes'][0]['Mesej'] 
$this->akaun['kes'][0]['Email'] 
$this->akaun['kes'][0]['Bayaran']
$this->akaun['kes'][0]['Status'] 
$this->akaun['kes'][0]['Temujanji']	
*/

if ($this->carian=='[tiada id diisi]')
    echo 'data kosong<br>';
elseif(!isset($this->akaun['kes'][0]['id']))
	echo 'data kosong juga<br>';
else # $this->carian=='ada' - mula 
{
	/*$namaSyarikat = '';
	$alamat = '';
	$notel = '';
	$namaBank = '';
	$namaAkaunBank = '';
	//*/
	$namaSyarikat = 'My Awesome Company Name';
	$alamat = '200 Jalan Lurus, Taman Bunga Orchid, 53300 Kuala Lumpur';
	$notel = '012-222 4455';
	$namaBank = 'CIMB BANK';
	$namaAkaunBank = '8000522622';
?>
<div class="container">
<div class="jumbotron">

	<h4><?php echo $namaSyarikat ?></h4>
	<h4><?php echo $alamat . ' - Tel: ' . $notel ?></h4>
	<h1 align="right">INVOICE</h1>

	<ul>
	<li><?php echo $this->akaun['kes'][0]['Nama'] ?></li>
	<li><?php echo $this->akaun['kes'][0]['Email'] ?></li>
	<li><?php echo $this->akaun['kes'][0]['Temujanji'] ?></li>
	<!-- li>100-10 Bangunan Terkemuka,</li -->
	<!-- li>54321 Kuala Lumpur, Malaysia</li -->
	<!-- li>Attn: Ahmad Kasan</li -->
	<li>Ref:	RUJUKAN-2014-01(1/3)</li>
	<li>Date:	March 10, 2014</li>
	</ul>

	<h4>Please find the invoice below for the services rendered:</h4><hr>

	<div class="row">
		<div class="col-md-2"> <strong>Subjek :</strong> <?php 
			echo nl2br($this->akaun['kes'][0]['Tajuk']); ?></div>
		<div class="col-md-10"> <strong>Mesej  :</strong> <?php 
			echo nl2br($this->akaun['kes'][0]['Mesej']); ?></div>
	</div><hr>
	<table class="table table-condensed">
	<!-- table class="excel" -->
	<tr>
		<td> Items </td><td> Price (RM) </td><td> Qty </td><td> Total (RM) </td>
	</tr>
	<tr>
		<td> 1 </td><td> 500 </td><td> 1 </td><td> 500 </td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td><td> All Total (RM) </td><td> 500 </td>
	</tr>
	</table><hr>

<?php
} # $this->carian=='ada' - tamat 
//*/
?>
	<h4>Cheque or direct bank deposit. <br> 
	Please notify us if you made any direct bank deposits. <br>
	Payments can be made to:</h4>
	<ul>
	<li> <?php echo $namaSyarikat ?> </li>
	<li> <?php echo $namaBank ?> </li>
	<li> A/C NO.: <?php echo $namaAkaunBank ?> </li>
	</ul>

	<h4>Any questions or inquiries can be directed to Khairil Iszuddin at the number <?php echo $notel ?></h4>
	<h4> Regards, </h4>

	<ul>
	<li> Khairil Iszuddin Ismail </li>
	<li> Web Programmer </li>
	<li> <?php echo $namaSyarikat ?> </li>
	</ul>

</div><!-- / class="jumbotron" -->
</div><!-- / class="container" -->
<?php
include 'dibawah.php';