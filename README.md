# sample-kertascadangan-sebutharga-invois
Bismillah. Contoh sistem dalam mvc-melayu untuk contoh kepada freelancer

1. kertas-cadangan
2. sebut-harga
3. invois

#konsep-asal 
Ikutkan untuk memenuhi keperluan pihak GHL untuk bukti yang kita ini buat bisnes training dalam bidang komputer.

Google di internet terjumpa cerita iszuddin ismail aka dino yang berbicara tentang kertas cadangan, sebut harga dan invois.

Memandangkan mvc-melayu ada kemaskini yang baru, maka kita akan buat dari kosong secara atas talian sahaja.

# Standard
http://www.php-fig.org/psr/psr-4/

# Sumber ilham dari 
http://iszuddinismail.com/freelancer-kertas-cadangan-sebut-harga-dan-invois-contoh/

___
# Php Version

```php
//phpinfo();
//echo PHPVERSION() . '<br>';
echo PHP_VERSION . '<br>';
echo PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '.' . PHP_RELEASE_VERSION . '<br>';
echo '<pre>'; print_r($_SERVER); echo '</pre>';
```

```php
	function pautan($name,$web)
	{
		$icon1 = '<i class="fas fa-globe-asia fa-spin"></i>';
		$icon2 = '<i class="far fa-folder fa-spin"></i>';
		$icon = ($name != $web) ? $icon1 : $icon2;
		$link = ($web == null) ? $name : '<a target="_blank" href="' . $web
		. '">' . $name . '</a>';
		return '&nbsp;&nbsp;' . $icon . $link . '<hr>';
	}
```

```php
	function getIdea()
	{
		$papar = array(
			'[TM Test]'=>'//speedtest.tm.com.my',
			'[Fast.com]'=>'//fast.com',
			'[Speedtest.net]'=>'https://www.speedtest.net',
			'[Kalendar]'=>'https://www.mysumber.com/cuti-umum.html',
			'[jQuery]'=>'http://jquery.com',
			'[Bootstrap]'=>'http://getbootstrap.com',
			'[animate.css]'=>'https://daneden.github.io/animate.css',
			'[Sweet Alert]'=>'http://t4t5.github.io/sweetalert',
			'[FontAwesome]'=>'http://fortawesome.github.io/Font-Awesome',
			'[backstretch]'=>'http://srobbin.com/jquery-plugins/backstretch',
			'[jQuery.Form]'=>'http://malsup.com/jquery/form',
			'[Pixabay]'=>'https://pixabay.com',
			'[Pexels]'=>'https://pexels.com',
			'[Unslpash]'=>'https://unsplash.com',
			'[7-themes]'=>'http://7-themes.com',
		);

		return $papar;
	}
```
___
# Sumber ilham kawan-kawan
* Stylesheet
  * [Bootstrap](http://getbootstrap.com)
  * [Bootstrap.Themes](http://bootstrap.themes.guide)
  * [AdminLTE](https://adminlte.io/themes/AdminLTE)
  * [animate.css](https://daneden.github.io/animate.css)
  * [Sweet Alert](http://t4t5.github.io/sweetalert)
  * [FontAwesome](http://fortawesome.github.io/Font-Awesome)
  * [Enjoy Css](https://enjoycss.com)
* Javascript
  * [jQuery](http://jquery.com)
  * [jQuery.Form](http://malsup.com/jquery/form)
  * [backstretch](http://srobbin.com/jquery-plugins/backstretch)
* Gambar Percuma
  * [7-themes](http://7-themes.com)
  * [Pexels](https://pexels.com)
  * [Pixabay](https://pixabay.com)
  * [Unslpash](https://unsplash.com)
* Lain-lain
  * [markdown-cheatsheet](https://guides.github.com/pdfs/markdown-cheatsheet-online.pdf)
