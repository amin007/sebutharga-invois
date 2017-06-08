<style>
.underline3
{ 
	width : 25%;
	text-align : left;
	border-bottom : 2px solid #000;
}

.nospace2
{ 
	width : 15%;
	text-align : center;
}

.underline2 
{ 
	width : 15%;
	border-bottom : 2px solid #000;
}

.nospace
{ 
	/* text-decoration : underline; */
	width : 25%;
}

.underline 
{ 
	/* text-decoration : underline; */
	width : 25%;
	border-bottom : 2px solid #000;
}

.jadual_tebal
{
	width : 60%; 
	border : 3px solid #000;
}

.tajuk_tebal
{
	border-bottom : 3px solid #000;
}

</style>
<br>
<div align="center"><table style="border-collapse: collapse; width:90%; ">
<tr><td class="jadual_tebal">
	<h3 align="center">BORANG PERMOHONAN <br> MENGGUNAKAN KENDERAAN JABATAN</h3>
	<?php echo bahagian_pertama($this->data); ?>
</td></tr>
<tr><td class="jadual_tebal">
	<!-- bahagian 2 - mula -->	
	<h4><span class="tajuk_tebal"> KEGUNAAN BAHAGIAN PENTADBIRAN </span></h4>
	<table border="0" width="90%">
	<tr><td colspan="6">Permohonan diluluskan<br><br><br></td></tr>
		<tr>
			<td>&nbsp;</td>
			<td class="underline">&nbsp;<?php echo $this->data['tarikh'][1] ?>&nbsp;</td>
			<td>&nbsp;</td>
			<td class="underline">&nbsp;<?php echo $this->data['masa'][1] ?>&nbsp;</td>
			<td>&nbsp;&nbsp;</td>
			<td class="underline">&nbsp;<?php echo $this->data['boss'] ?>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="center" valign="top">Tarikh</td>
			<td>&nbsp;</td>
			<td align="center" valign="top">Masa</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td align="left">&nbsp;&nbsp;&nbsp;PENOLONG PENGARAH 
				<br>&nbsp;&nbsp;&nbsp;Cop&nbsp;&nbsp;&nbsp;:&nbsp;</td>
		</tr>
	<tr><td colspan="6"><br><br>Jenis kenderaan :</td></tr>
	<?php 
	$ruang5 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	$ruangX = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
		. '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
		. '';
	$catatan = '* DIINGATKAN PENUMPANG AGAR MENGINGATKAN PEMANDU SUPAYA
	<br>&nbsp;&nbsp;MEMANDU KENDERAAN SECARA BERHEMAH BAGI MENGGELAKKAN
	<br>&nbsp;&nbsp;DARIPADA DISAMAN';
	$kira = 1;
	foreach($this->data['jenis_kenderaan'] as $papar):
		$jenama  = $papar['jenama'];
		$no_plat = $papar['no_plat'];
		$pemandu = $papar['pemandu'];
		$akhir = ($kira < count($this->data['jenis_kenderaan'])) ?
			'&nbsp;' : $catatan;

		echo '<tr>'
		. '<td>&nbsp;</td>'
		. '<td valign="top">' . $kira++ . '&nbsp;' . $jenama . '&nbsp;' . $no_plat . '</td>'
		. '<td>&nbsp;</td>'
		. '<td>&nbsp;</td>'
		. '<td valign="top">'
			. '<table class="jadual_tebal"><tr><td>&nbsp;&nbsp;</td></tr></table>'
		. '</td>'
		. '<td><table width="50%">'
			. '<tr><td>Pemandu:</td><td class="underline3">&nbsp;&nbsp;' . $pemandu . '&nbsp;</td><td class="underline3">' . $ruangX . '</td></tr>'
			. '<tr><td>&nbsp;&nbsp;</td><td class="underline3">' . $ruangX . '</td><td class="underline3">' . $ruangX . '</td></tr>'
			. '<tr><td>&nbsp;&nbsp;</td><td class="underline3">' . $ruangX . '</td><td class="underline3">' . $ruangX . '</td></tr>'
		. '</table></td>'
		. '</tr>'
		. '<tr><td colspan="6">' . $akhir . '</td></tr>';

	endforeach; ?>
	</table>
	<!-- bahagian 2 - tamat -->	
</td></tr>
</table></div>
<?php
function bahagian_pertama($data)
{?>
<!-- bahagian 1 - mula -->	
	<table border="0">
	<tr><td align="center">
		<table border="0" width="90%">
		<tr><td>Nota&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td><td> i) Dua salinan diperlukan.</td></tr>
		<tr><td>&nbsp;</td><td>ii) Sekurang-kurangnya mesti ditandatangani oleh Penyelia / Ketua Seksyen.&nbsp;</td></tr>
		<tr><td>&nbsp;</td><td>iii) Permohonan hendaklah dikemukakan 2 hari sebelum tarikh diperlukan.&nbsp;</td></tr>
		</table>
	</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>
		<table border="0" width="90%">
		<tr>
			<td class="nospace">UNIT / BAHAGIAN</td>
			<td colspan="5" class="underline">: <?php echo $data['unit'] ?>&nbsp;</td>
			<!-- td class="underline"> <?php  echo $data['tempat'][3] ?>&nbsp;</td -->
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr><td colspan="6">
			<table><tr>
			<td class="nospace">TARIKH DIPERLUKAN</td>
			<td class="underline2">:<?php echo $data['tarikh'][0] ?></td>
			<td class="nospace2">MASA&nbsp;DIPERLUKAN:</td>
			<td class="underline2"><?php echo $data['masa'][0] ?></td>
			</tr></table>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td class="nospace">TUJUAN</td>
			<td colspan="5" class="underline">:<?php echo $data['tujuan'] ?>&nbsp;</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td class="nospace">KE&nbsp;TEMPAT-TEMPAT&nbsp;</td>
			<td colspan="5" class="underline">: i)<?php echo $data['tempat'][0] ?>&nbsp;</td>
		</tr>
		<tr><td class="nospace">&nbsp;</td>
			<td colspan="5" class="underline">&nbsp;&nbsp;ii)<?php echo $data['tempat'][1] ?>&nbsp;</td>
		</tr>
		<tr><td class="nospace">&nbsp;</td>
			<td colspan="5" class="underline">&nbsp;&nbsp;iii)<?php echo $data['tempat'][2] ?>&nbsp;</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td class="nospace">NAMA-NAMA&nbsp;PENUMPANG&nbsp;&nbsp;</td>
			<td class="underline">:&nbsp;i)<?php echo $data['penumpang'][0] ?>&nbsp;</td>
			<td colspan="3" class="underline"> iv)<?php echo $data['penumpang'][3] ?>&nbsp;</td>
		</tr>
		<tr><td class="nospace">&nbsp;</td>
			<td class="underline">&nbsp;&nbsp;ii)<?php echo $data['penumpang'][1] ?>&nbsp;</td>
			<td colspan="3" class="underline"> v)<?php echo $data['penumpang'][4] ?>&nbsp;</td>
		</tr>
		<tr><td class="nospace">&nbsp;</td>
			<td class="underline">&nbsp;&nbsp;iii)<?php echo $data['penumpang'][2] ?>&nbsp;</td>
			<td colspan="3" class="underline"> vi)<?php echo $data['penumpang'][5] ?>&nbsp;</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td colspan="2" class="nospace2">Tandatangan Penyelia / Ketua Seksyen</td>
			<td colspan="4" class="underline2">:</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		<tr>
			<td colspan="2" class="nospace2">Nama Penandatangan</td>
			<td colspan="4" class="underline2">:</td>
		</tr>
		<tr><td colspan="6">&nbsp;</td></tr>
		</table>

	</td></tr>
	</table>
	<!-- bahagian 1 - tamat -->	
<?php
}