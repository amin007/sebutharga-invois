<div class="container">
<hr><h1>Ruangtamu - Untuk Pelawat</h1><hr>
<div class="hero-unit">
<?php butangHantar(); ?>
<a class="btn btn-primary btn-large" href="<?php echo URL ?>ruangtamu/logout">Pergi Lebih Jauh<i class="fa fa-binoculars fa-2x"></i></a>

</div><!-- / class="hero-unit" -->
</div><!-- / class="container" -->

<?php
function butangHantar($_jadual = null, $cariID = 'paid')
{
	$_jadual = 'kursus_php'; 
	$_jadual = 'kursus_php_lama'; 
	$cetakSebutHarga = URL . 'akaun/cetakSebutHarga/' . $_jadual . '/' . $cariID;
	$cetakInvois = URL . 'akaun/cetakInvois/' . $_jadual . '/' . $cariID;
	$_jadual = ''; ?>
	<a target="_blank" href="<?php echo $cetakSebutHarga ?>" class="btn btn-warning btn-large">Cetak Sebut Harga</a>
	<a target="_blank" href="<?php echo $cetakInvois ?>" class="btn btn-success btn-large">Cetak Invois</a>
	<?php
}