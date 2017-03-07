<!-- menu_atas.php A0 --><?php 
$sesi = \Aplikasi\Kitab\Sesi::init();
//echo '<pre>MENU_ATAS - $_SESSION:', print_r($_SESSION, 1) . '</pre><br>';
# set pembolehubah
$pengguna = \Aplikasi\Kitab\Sesi::get('namaPendek');
$level = \Aplikasi\Kitab\Sesi::get('levelPengguna');

$senaraiPengguna = array('pentadbir','biasa');
$senaraiPentadbir = array('pentadbir','biasa');
if (in_array($level, $senaraiPentadbir)) 
	$paras = '' . $level;
elseif (in_array($level, $senaraiPengguna))
	$paras = '' . $level;
else 
	$paras = null; # untuk pelawat sahaja

echo "\r\r"; 

if ($paras == null): else: ?>
<nav class="navbar navbar-inverse" role="navigation">
<!-- div class="navbar navbar-custom" role="navigation" -->
	<div class="container-fluid">
<!-- menu kiri mula -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<?php for ($iconbar=1; $iconbar < 3; $iconbar++):
			?><span class="icon-bar"></span><?php endfor; ?>
			</button>
			<a class="navbar-brand" href="<?php echo URL ?>"><?php echo Tajuk_Muka_Surat . ':' . $paras ?></a>
			<a class="navbar-brand" href="<?php echo URL ?>ruangtamu/logout">
				<span class="glyphicon glyphicon-off"></span>Keluar</a>
		</div>
<!-- menu kiri tamat -->
<!-- menu kanan mula -->
		<div class="navbar-collapse collapse">
<?php require 'menubar_atas.php'; ?>
			<!-- borang cari kp-->
			<form class="navbar-form navbar-right" action="<?php echo URL ?>cari/idnama" method="POST">
				<input type="submit" class="btn btn-info fa-input" value="&#xf002;">
				<input type="text" name="cari" placeholder="Cari Nama" class="form-control">
			</form>
		</div>
<!-- menu kanan tamat -->
	</div>
</nav>
<?php
//*/
endif;
