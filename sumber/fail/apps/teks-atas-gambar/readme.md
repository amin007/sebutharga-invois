# Bismillah. Tindih teks atas pdf.

Ikutkan tengah godek macam mana dokumen sedia ada diubah sedikit ayatnya.

Adalah baik dokumen yang hendak diubah kita scanner dalam format pdf.

Mula2 cari fail tcpdf dan fpdi dan include dalam sistem seperti contoh di bawah.

```php
$folder = 'sumber/aplikasi/kitab/vendor/pdf/';
require($folder . 'tcpdf/181/fpdf.php');
require($folder . 'fpdi/1.6.1/fpdi.php');
```

lepas itu isytihar ``` $pdf = new FPDI(); ```

Jika borang asal warna putih putih melati, kita setkan nilai 
``` $pdf->SetXY() ```

Terpaksa teka graf yang betul pada persamaan titik x & y.

Lepas itu guna ```$pdf->Write()``` untuk tulis perkataan.

Namun jika kita mahu tutup perkataan asal dan tukar perkataan baru, 

maka latarbelakang warna kena set jadi putih putih melati atau merah merah delima

bergantung kepada latarbelakang dokumen tersebut.

Gunakan method ```$pdf->SetFillColor(r,g,b)``` yang mana
```
r = merah merah delima, 
g = ku lihat hijau, 
b = biru mata hitamku.
```

Lepas setkan ```$pdf->SetXY()```, kita guna ```$pdf->Cell()``` untuk tindih perkataan baru dalam perkataan asal.

Yang susah guna ```$pdf->Cell()``` adalah meneka tinggi dan lebar perkataan tersebut.

Disyorkan baik tutup semua satu baris ayat.
