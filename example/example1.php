<?php

include '../src/Kmeans.php'; // Load Kmeans

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

// $Kmeans->generateCentroids(); // Generate random centroid

// initialized centroid
echo "<pre>";
print_r (array('initial_centroid' => $Kmeans->getInitialCentroid()));
echo "</pre>";

// Looping for iteration
$i = 1;
for (; ; ) {
	$Kmeans->setIteration($i);
	$Kmeans->run();
	if ($Kmeans->isDone()) {
		echo '<h1>Result</h1>';
		echo '<hr>';

		echo '<h2>Centroid</h2>';
		echo "<pre>";
		print_r ($Kmeans->getCentroid());
		echo "</pre>";

		echo '<h2>Iteration Total</h2>';
		echo 'Iteration ended on : '.$Kmeans->countIterations();

		echo '<h2>Iteration Logs</h2>';
		echo "<pre>";
		print_r (array('logs' => $Kmeans->catchLogs()));
		echo "</pre>";

		echo '<h2>All Result</h2>';
		echo "<pre>";
		print_r ($Kmeans->getAllResults());
		echo "</pre>";
		break;
	}

	$i++;
}