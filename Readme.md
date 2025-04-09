# PHP K-Means Library

## Installation via [composer](https://getcomposer.org)

```bash
composer require medansoftware/kmeans-algorithm-php
```

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
```

**Refrence :**

- [Code](https://codepad.co/snippet/php-kmeans-library)
- [Article](http://studyshut.blogspot.com/2018/12/contoh-perhitungan-manual-menggunakan.html)
- [Video (Indonesian)](https://www.youtube.com/watch?v=MayK_kwJgv4)

<p align="center"><b>Made with ❤️ + ☕ ~ Agung Dirgantara</b></p>
