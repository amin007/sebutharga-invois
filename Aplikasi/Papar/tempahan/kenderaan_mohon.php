<br>
<div align="center"><table style="border-collapse: collapse; width:95%; ">
<tr><td class="jadual_tebal">
	<h3 align="center">BORANG PERMOHONAN <br> MENGGUNAKAN KENDERAAN JABATAN</h3>
	<?php echo bahagian_pertama(); ?>
</td></tr>
<tr><td class="jadual_tebal">
	<?php echo bahagian_kedua($this->data); ?>
</td></tr>
</table></div>
<style>
.jadual_tebal { width : 60%; border : 3px solid #000; }
.tajuk_tebal  {	border-bottom : 3px solid #000; }
.underline 
{ 
	/* text-decoration : underline; */
	border-bottom : 2px solid #000;
}
</style>

<?php
function bahagian_pertama()
{?>
<!-- bahagian 0 - mula -->
<div class="row">
	<div class="col-md-1 col-xs-1">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nota:
	</div>
	<div class="col-md-7 col-xs-7">
	i) Dua salinan diperlukan.<br>
	ii) Sekurang-kurangnya mesti ditandatangani oleh Penyelia / Ketua Seksyen.&nbsp;<br>
	iii) Permohonan hendaklah dikemukakan 2 hari sebelum tarikh diperlukan.&nbsp;<br>
	</div>
</div>
<br>
<form class="form-horizontal">
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-7">
			<div class="input-group">
				<span class="input-group-addon">UNIT / BAHAGIAN:</span>
				<select name="unit_bahagian" class="form-control input-lg">
				<option value="fng1">Pantas dan Garang 1</option>
				<option value="fng2">Pantas dan Garang 2</option>
				<option value="fng3">Pantas dan Garang 3</option>
				<option value="fng4">Pantas dan Garang 4</option>
				<option value="fng5">Pantas dan Garang 5</option>
				<option value="fng6">Pantas dan Garang 6</option>
				<option value="fng7">Pantas dan Garang 7</option>
				<option value="fng8">Pantas dan Garang 8</option>
				<option value="fng9">Pantas dan Garang 9</option>
				</select>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-7">
			<div class="input-group">
				<span class="input-group-addon"><p class="text-left">TARIKH DIPERLUKAN:</p></span>
				<input type="date" class="form-control" placeholder="x1">
				<span class="input-group-addon"><p class="text-left">MASA DIPERLUKAN:</p></span>
				<input type="time" class="form-control" placeholder="x2">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-7">
			<div class="input-group">
				<span class="input-group-addon"><p class="text-left">TUJUAN:</p></span>
				<input type="text" class="form-control" placeholder="x3">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-7">
			<div class="input-group">
				<span class="input-group-addon"><p class="text-left">KE TEMPAT-TEMPAT : i)</p></span>
				<input type="text" class="form-control" placeholder="x4">
			</div>
			<div class="input-group">
				<span class="input-group-addon"><p class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				ii)</p></span>
				<input type="text" class="form-control" placeholder="x5">
			</div>
			<div class="input-group">
				<span class="input-group-addon"><p class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				iii)</p></span>
				<input type="text" class="form-control" placeholder="x6">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-7">
			<div class="input-group">
				<span class="input-group-addon"><p class="text-left">NAMA-NAMA PENUMPANG : i)</p></span>
				<input type="text" class="form-control" placeholder="tumpang1">
				<span class="input-group-addon"><p class="text-left">&nbsp;iv)</p></span>
				<input type="text" class="form-control" placeholder="tumpang4">
			</div>
			<div class="input-group">
				<span class="input-group-addon"><p class="text-left">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				ii)</p></span>
				<input type="text" class="form-control" placeholder="tumpang2">
				<span class="input-group-addon"><p class="text-left">&nbsp;&nbsp;v)</p></span>
				<input type="text" class="form-control" placeholder="tumpang5">
			</div>
			<div class="input-group">
				<span class="input-group-addon"><p class="text-left">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				iii)</p></span>
				<input type="text" class="form-control" placeholder="tumpang3">
				<span class="input-group-addon"><p class="text-left">&nbsp;vi)</p></span>
				<input type="text" class="form-control" placeholder="tumpang6">
			</div>
		</div>
	</div>
</form>
<!-- bahagian 0 - tamat -->
	<p class="text-center">Tandatangan Penyelia / Ketua Seksyen:</p>
	<p class="text-center">Nama Penandatangan:</p><br><br>
<?php
}

function bahagian_kedua($data)
{?>
	<!-- bahagian 2 - mula -->	
	<h4><span class="tajuk_tebal"> KEGUNAAN BAHAGIAN PENTADBIRAN </span></h4>
	<div class="row">
		<div class="col-md-3">
			Permohonan diluluskan<br><br><br>
		</div>
	</div>
	<br>
	<form class="form-horizontal">	
		<div class="form-group">
			<div class="col-sm-offset-1 col-sm-6">
				<div class="input-group">
					<span class="input-group-addon"><p class="text-center">&nbsp;</p></span>
					<span class="input-group-addon"><p class="text-center">Tarikh</p></span>
					<span class="input-group-addon"><p class="text-center">&nbsp;</p></span>
					<span class="input-group-addon"><p class="text-center">Masa</p></span>
					<span class="input-group-addon"><p class="text-center">&nbsp;</p></span>
					<span class="input-group-addon"><p class="text-center">PENOLONG PENGARAH 
					<br>&nbsp;&nbsp;Cop&nbsp;&nbsp;&nbsp;:&nbsp;</p></span>
				</div>
			</div>
		</div>
	</form>
	<br>
	<table border="0" width="90%">
	<tr><td colspan="6"><br><br>Jenis kenderaan :</td></tr>
	</table>

	<form class="form-horizontal">	
		<div class="form-group">
			<div class="col-sm-offset-1 col-sm-6"><?php 
	$ruang2 = '&nbsp;&nbsp;'
		. '';		
	$ruangX = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
		. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
		. '';		
	$catatan = '* DIINGATKAN PENUMPANG AGAR MENGINGATKAN PEMANDU SUPAYA
	<br>&nbsp;&nbsp;MEMANDU KENDERAAN SECARA BERHEMAH BAGI MENGGELAKKAN
	<br>&nbsp;&nbsp;DARIPADA DISAMAN';
	$kira = 1;
	foreach($data['jenis_kenderaan'] as $papar):
		$jenama  = $papar['jenama'];
		$no_plat = $papar['no_plat'];
		$pemandu = $papar['pemandu'];
		$akhir = ($kira < count($data['jenis_kenderaan'])) ?
			'&nbsp;' : $ruangX;
		echo "\n\t\t\t";
		?><div class="input-group">
				<span class="input-group-addon"><p class="text-left"><?php
			echo $kira++ . '&nbsp;' . $jenama . '&nbsp;' . $no_plat . $akhir ?></p></span>
				<span class="input-group-addon"><p class="text-center">&nbsp;</p></span>
				<span class="input-group-addon"><p class="text-center">&nbsp;</p></span>
				<span class="input-group-addon"><p class="text-center">
					<table class="jadual_tebal"><tr><td>&nbsp;&nbsp;</td></tr></table>
				</span>
				<span class="input-group-addon"><p class="text-left"><table width="50%">
					<tr><td>Pemandu:</td><td>&nbsp;&nbsp;<?php echo $pemandu ?>&nbsp;</td><td><?php echo $ruang2 ?></td></tr>
					<tr><td>&nbsp;&nbsp;</td><td><?php echo $ruang2 ?></td><td><?php echo $ruang2 ?></td></tr>
					<tr><td>&nbsp;&nbsp;</td><td><?php echo $ruang2 ?></td><td><?php echo $ruang2 ?></td></tr>
					</table></span>
			</div><?php
	endforeach; 
	
	echo '<div class="input-group">'
	. '<span class="input-group-addon"><p class="text-left">' . $catatan . '</span>'
	. '</div>';
	?>
			</div>
		</div>
	</form>
	
	<!-- bahagian 2 - tamat -->	

<?php
}
