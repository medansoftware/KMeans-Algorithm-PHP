<?php
namespace Algorithm;

/**
 * @package Algorithm
 * @subpackage Kmeans 
 * @category Library
 * @author Agung Dirgantara <agungmasda29@gmail.com>
 */

class Kmeans {

	protected $attributes = array();

	protected $data = array();

	protected $logs = array(
		'iterations' => array(),
		'clusters' => array(),
		'centroids' => array()
	);

	protected $cluster = 3;

	protected $centroids = array();

	protected $result = array();

	protected $success = FALSE;

	protected $iteration = 0;

	/**
	 * Set attributes
	 * 
	 * @param array $attributes
	 */
	public function setAttributes($attributes = array()) {
		$this->attributes = $attributes;
		return $this;
	}

	/**
	 * Set data from arguments
	 */
	public function setDataFromArgs() {

		if (func_num_args() === count($this->attributes)) {

			$data = array();

			foreach ($this->attributes as $key => $attribute) {
				$data[$attribute] = func_get_arg($key);
			}

			array_push($this->data, $data);
		}

		return $this;
	}

	/**
	 * Set cluster count
	 * 
	 * @param integer $cluster
	 */
	public function setClusterCount($cluster = NULL) {

		if (!empty($cluster) AND $cluster <= count($this->data)) {
			$this->cluster = $cluster;
		}

		return $this;
	}

	/**
	 * Generate cluster
	 * 
	 * @return array
	 */
	public function generateCluster() {

		$cluster = array();

		foreach ($this->data as $row) {

			$minValue = 999999;
			$minID = 0;

			for ($i = 0; $i < $this->cluster; $i++) {

				$distance = $this->countDistance($row, $this->centroids[$i]);

				if ($minValue > $distance) {
					$minID = $i;
					$minValue = $distance;
				}
			}

			$cluster[] = $minID;
		}

		return $cluster;
	}

	/**
	 * Set iteration
	 * 
	 * @param integer $iteration
	 */
	public function setIteration($iteration = 0) {
		$this->iteration = $iteration;
		return $this;
	}

	/**
	 * Set centroids
	 * 
	 * @param mixed $centroids
	 * @return \Kmeans
	 */
	public function setCentroid($centroids = NULL) {

		$results = array();

		if (func_num_args() > 1 && func_num_args() == $this->cluster) {
			foreach (func_get_args() as $arg) {
				if (isset($this->data[$arg])) {
					$this->centroids[] = $this->data[$arg];
				}
			}
		} else {
			if (is_array($centroids)) {
				$this->centroids = $centroids;
			} else {
				$this->generateCentroids();
			}
		}

		return $this;
	}

	/**
	 * Generate centroids
	 * 
	 * @return \Kmeans
	 */
	public function generateCentroids() {

		for ($i = 0; $i < $this->cluster; $i++) {

			$this->centroids[] = $this->data[$i];
		}

		return $this;
	}

	/**
	 * Create new centroid
	 * 
	 * @param  array $centroid
	 * @param  array $group
	 * @return array
	 */
	public function newCentroid($centroid, $group) {

		for ($i = 0; $i < $this->cluster; $i++) {

			$num = 0;
			$new_centroid = array();

			foreach ($this->attributes as $attribute) {
				${$attribute} = 0;
			}

			foreach ($group[$i] as $set) {
				$num++;
				foreach ($this->attributes as $attribute) {
					${$attribute} += $set[$attribute];
				}

			}

			foreach ($this->attributes as $attribute) {
				@${$attribute} /= $num;
			}

			foreach ($this->attributes as $attribute) {
				$new_centroid[$attribute] = ${$attribute};
			}

			$centroid[$i] = $new_centroid;
		}

		return $centroid;
	}

	/**
	 * Count distance
	 * 
	 * @param  integer $dataInK    [description]
	 * @param  integer $clusterInK [description]
	 * @return numeric
	 */
	public function countDistance($dataInK, $clusterInK) {

		$results = array();

		foreach ($this->attributes as $attribute) {
			array_push($results, abs($dataInK[$attribute]-$clusterInK[$attribute]));
		}

		return array_sum($results);
	}

	/**
	 * Run Kmeans
	 * 
	 * @param  integer $cluster
	 * @return array
	 */
	public function run() {

		if (empty($this->centroids)) {
			$this->setCentroid();
		}

		for ($iteration = 1; $iteration = $this->iteration; $iteration++) {

			array_push($this->logs['iterations'], $iteration);

			$cluster = $this->generateCluster();

			$group = array();

			for ($i = 0; $i < $this->cluster; $i++) {
				$group[] = array();
			}

			$i = 0;

			foreach ($this->data as $key => $row) {
				$group[$cluster[$i]][$key] = $row;
				$this->logs['clusters']['iteration_'.count($this->logs['iterations'])] = $group;
				$i++;
			}

			$new_centroid = $this->newCentroid($this->centroids, $group);
			$this->success = TRUE;

			$i = 0;

			foreach ($new_centroid as $assign_to_attribute) {

				foreach ($this->attributes as $attribute) {
					if ($this->centroids[$i][$attribute] == $new_centroid[$i][$attribute]) {
						continue;
					} else {
						$this->success = FALSE;
						break;
					}
				}

				$this->logs['centroids']['iteration_'.count($this->logs['iterations'])] = $this->centroids;

				$i++;
			}

			if ($this->success) {
				$this->result = $this->centroids;
				$this->iteration = count($this->logs['iterations']);
				break;
			}

			$i = 0;

			foreach ($new_centroid as $assign_to_attribute) {
				foreach ($this->attributes as $attribute) {
					$this->centroids[$i][$attribute] = $assign_to_attribute[$attribute];
				}

				$i++;
			}
		}

		return $this->resetCentroid();
	}

	/**
	 * Count iterations
	 * 
	 * @return integer
	 */
	public function countIterations() {
		return count($this->logs['iterations']);
	}

	/**
	 * Get attributes;
	 * 
	 * @return array
	 */
	public function getAttributes() {
		return $this->attributes;
	}

	/**
	 * Get data
	 * 
	 * @return array
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * Get last centroid
	 * 
	 * @return array
	 */
	public function getCentroid() {
		return $this->result;
	}

	/**
	 * Get clusters
	 * 
	 * @return array
	 */
	public function getClusters() {
		return $this->logs['clusters'];
	}

	/**
	 * Get logs
	 * 
	 * @param  string $key one of : iterations, clusters, centroids
	 * @return array
	 */
	public function getLogs($key = NULL) {
		if (in_array($key, ['iterations', 'clusters', 'centroids'])) {
			return $this->logs[$key];
		}
	}

	/**
	 * Get all results
	 * 
	 * @return array
	 */
	public function getAllResults() {
		$results = array(
			'iteration' => $this->countIterations(),
			'centroids' => $this->getCentroid(),
			'clusters' => $this->getClusters()
		);

		return $results;
	}

	/**
	 * Catch logs
	 * 
	 * @return array
	 */
	public function catchLogs() {
		return $this->logs;
	}

	/**
	 * Reset centroid data
	 * 
	 * @return \Kmeans
	 */
	public function resetCentroid() {
		$this->centroids = array();
		return $this;
	}

	/**
	 * Check kmeans is success
	 * 
	 * @return boolean
	 */
	public function isDone() {
		return $this->success;
	}
}