<?php

include '../src/Kmeans.php'; // Load Kmeans

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
$Kmeans->setCentroid([1, 5, 7]); // Choose centroid from array key or left blank will auto fill

// Looping for iteration
$i = 1;
for (; ; ) {
	$Kmeans->setIteration($i);
	$Kmeans->run();
	if ($Kmeans->isDone()) {
		echo '<h1>Result</h1>';

		echo '<h2>Centroid</h2>';
		echo "<pre>";
		print_r (array('centroid_result' => $Kmeans->getCentroid()));
		echo "</pre>";

		echo '<h2>Iteration Total</h2>';
		echo 'Iteration ended on : '.$Kmeans->countIterations();

		echo '<h2>Iteration Logs</h2>';
		echo "<pre>";
		print_r (array('logs' => $Kmeans->catchLogs()));
		echo "</pre>";
		break;
	}

	$i++;
}

echo "<pre>";
print_r ($Kmeans);
echo "</pre>";