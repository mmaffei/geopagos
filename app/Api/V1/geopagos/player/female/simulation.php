<?php 
declare(strict_types=1);
require_once __DIR__.'/../../../../../Controller/SimulationController.php';

$simulation = new \Controller\SimulationController();
$response = $simulation->getResults('simulationForFemale');

echo $response;