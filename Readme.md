# PHP K-Means Library

## How to use


### Example 1 [Video Refrence](https://www.youtube.com/watch?v=MayK_kwJgv4)

```php
$Kmeans = new \Algorithm\Kmeans;
$Kmeans->setAttributes(array(
	'A', 'B'
));

$Kmeans->setDataFromArgs(1, 1);  // "First Argument" assign to "First Attribute" and "Second Argument" assign to "Second Attribute" etc.
$Kmeans->setDataFromArgs(2, 1);
$Kmeans->setDataFromArgs(4, 3);
$Kmeans->setDataFromArgs(5, 4);

$Kmeans->setClusterCount(2); // Set amount of cluster
$Kmeans->setCentroid(0, 1); // Choose centroid from array key or left blank will auto fill

// Looping for iteration
$i = 1;
for (; ; ) {
	$Kmeans->setIteration($i);
	$Kmeans->run();
	if ($Kmeans->isDone()) {

		echo "<pre>";
		print_r ($Kmeans->getCentroid());
		echo "</pre>";

		echo 'Iteration ended on : '.$Kmeans->countIterations();

		echo "<pre>";
		print_r ($Kmeans->getAllResults());
		echo "</pre>";
		break;
	}
	$i++;
}

echo "<pre>";
print_r ($Kmeans);
echo "</pre>";
```

### Example 2 [Video Refrence](https://www.youtube.com/watch?v=FUwxw9Rv4Ls)

```php
$Kmeans = new \Algorithm\Kmeans;
$Kmeans->setAttributes(array(
	'x'
));

$Kmeans->setDataFromArgs(1);
$Kmeans->setDataFromArgs(2);
$Kmeans->setDataFromArgs(6);
$Kmeans->setDataFromArgs(7);
$Kmeans->setDataFromArgs(8);
$Kmeans->setDataFromArgs(10);
$Kmeans->setDataFromArgs(15);
$Kmeans->setDataFromArgs(17);
$Kmeans->setDataFromArgs(20);

$Kmeans->setClusterCount(3); // Set amount of cluster
$Kmeans->setCentroid(1, 5, 7); // Choose centroid from array key or left blank will auto fill

// Looping for iteration
$i = 1;
for (; ; ) {
	$Kmeans->setIteration($i);
	$Kmeans->run();
	if ($Kmeans->isDone()) {

		echo "<pre>";
		print_r ($Kmeans->getCentroid());
		echo "</pre>";

		echo 'Iteration ended on : '.$Kmeans->countIterations();

		echo "<pre>";
		print_r ($Kmeans->catchLogs());
		echo "</pre>";
		break;
	}
	$i++;
}

echo "<pre>";
print_r ($Kmeans);
echo "</pre>";
```

---

Langkah-langkah & Catatan : 

1.) Hitung jumlah data.
2.) Tentukan jumlah "K" atau cluster (tidak boleh lebih dari jumlah data).
3.) Pilih titik secara acak sebanyak "K", dimana titik ini akan menjadi pusat (centroid) dari masing-masing kelompok (clusters).
4.) Hitung jarak dan alokasikan masing-masing data ke centroid atau rata-rata terdekat.
5.) Tentukan centroid baru / rata-rata yang ada di masing-masing cluster.
6.) Kembali ke step 3, apabila masih ada data yang berpindah cluster atau ada perubahan nilai centroid atau jika tidak ada perubahan maka hentikan proses clustering.

---

**Refrence :**

- [Code](https://codepad.co/snippet/php-kmeans-library)
- [Article](http://studyshut.blogspot.com/2018/12/contoh-perhitungan-manual-menggunakan.html)
- [Video (Indonesian)](https://www.youtube.com/watch?v=MayK_kwJgv4)

---

<p align="center"><img src="https://cdn-images-1.medium.com/max/738/1*G95uyokAH4JC5Ppvx4LmoQ@2x.png" width="280"></p>

[**PATREON**](https://www.patreon.com/agoenks29D)

[**PAYPAL**](https://www.paypal.me/agungdirgantara)

**[ETH](https://www.blockchain.com/eth/address/0x251b36840557cCe9A245f07E1b834bCfb7354FDb) : 0x251b36840557cCe9A245f07E1b834bCfb7354FDb**

**[DOGE](https://dogechain.info/address/DFmES6KZLQXimXduXwKmooykMsjhWmT1tU) : DFmES6KZLQXimXduXwKmooykMsjhWmT1tU**

**[BITCOIN](https://www.blockchain.com/btc/address/1MEqUeg7fXTkBMFWfJZE9yJREsKZ4SUxQM) : 1MEqUeg7fXTkBMFWfJZE9yJREsKZ4SUxQM**

**[BITCOIN CASH](https://www.blockchain.com/bch/address/qzrllcyrjwvpnuur5kpeyp03p246fzsgzvhleswr6f) : qzrllcyrjwvpnuur5kpeyp03p246fzsgzvhleswr6f**

### Social Media : 

<a class="social_link" href="https://fb.me/agoenks29D">
	<img src="https://static.xx.fbcdn.net/rsrc.php/yo/r/iRmz9lCMBD2.ico" width="32" style="margin-bottom: 2px;">
</a>

<a class="social_link" href="https://instragram.com/agoenks29D">
	<img src="https://www.instagram.com/static/images/ico/favicon.ico/36b3ee2d91ed.ico" width="32">
</a>

<a class="social_link" href="https://t.me/agoenks29D">
	<img src="https://web.telegram.org/favicon.ico" width="32">
</a>

<a class="social_link" href="https://api.whatsapp.com/send?phone=6282167368585&text=Hello,i get your contact from github">
	<img src="https://static.whatsapp.net/rsrc.php/v3/yP/r/rYZqPCBaG70.png" width="36">
</a>

<a class="social_link" href="https://www.youtube.com/channel/UCwXyVSMRqAuyyQtXVoMrf2A?view_as=subscriber&sub_cotnfirmation=1">
	<img src="https://s.ytimg.com/yts/img/favicon_48-vflVjB_Qk.png" width="38">
</a> 

<p></p>

<p align="center"><b>Made with ❤️ + ☕ ~ Agung Dirgantara</b></p>