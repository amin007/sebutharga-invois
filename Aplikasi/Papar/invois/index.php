<?php
function diatas($title = 'List Folder')
{
print <<<END
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>$title</title>
<link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<style type="text/css">
table.excel {
	border-style:ridge;
	border-width:1;
	border-collapse:collapse;
	font-family:sans-serif;
	font-size:11px;
}
table.excel thead th, table.excel tbody th {
	background:#cccccc;
	border-style:ridge;
	border-width:1;
	text-align: center;
	vertical-align: top;
}
table.excel tbody th { text-align:center; vertical-align: top; }
table.excel tbody td { vertical-align:bottom; }
table.excel tbody td
{
	padding: 0 3px; border: 1px solid #aaaaaa;
	background:#ffffff;
}
</style>
</head>
<body>

END;
}
#-------------------------------------------------------------------------------------------------------------
function dibawah()
{
	print <<<END

<!-- Footer
=============================================================================================== -->
<!-- footer class="footer">
	<div class="container">
		<span class="label label-info">
		&copy; Hak Cipta Terperihara 2016. Theme Asal Bootstrap Twitter
		</span>
	</div>
</footer -->

<!-- khas untuk jquery dan js2 lain
=============================================================================================== -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script -->
</body>
</html>
END;
}
#-------------------------------------------------------------------------------------------------------------
diatas($this->Tajuk_Muka_Surat);
?>
<!-- ============================================================================================ -->
<div class="container">
<div class="row">
	<div class="col-12"><h1>Sebutharga / Invois</h1></div>
</div>
<!-- ============================================================================================ -->
<form class="form" enctype="multipart/form-data" method="POST"
action="<?php echo URL ?>invois/pilihTugas" auto-complete="off">
<div class="form-row">
	<div class="form-group">
		<label for="harga">Harga Projek</label>
		<input type="number" name="harga" id="harga" 
		placeholder="Masukkan Harga" required class="form-control" />
	</div><!-- / class="form-group" -->
</div><!-- / class="form-row" -->
<div class="form-row">
	<div class="form-group">
		<label for="kadar">Kadar Sejam</label>
		<input type="number" name="kadar" id="kadar" 
		placeholder="Masukkan Kadar" required class="form-control" />
	</div><!-- / class="form-group" -->
</div><!-- / class="form-row" -->
<div class="form-row">
	<div class="form-group">
		<label for="action">Tugas</label>
			<select name="tugas" id="tugas" required class="form-control">
			<option value="cthSebutHarga">SebutHarga</option>
			<option value="cthInvois">Invois</option>
			</select>
	</div><!-- / class="form-group" -->
</div><!-- / class="form-row" -->
<div class="form-row">
	<input type="submit" class="btn btn-primary" value="Hantar"
	onclick="setTimeout('document.form1.reset();',1000)">
	<input type="reset" class="btn btn-reset" value="Reset">
</div><!-- / class="form-row" -->
</form>
<!-- ============================================================================================ -->
</div><!-- / class="container" -->
<!-- ============================================================================================ -->
<?php
dibawah();