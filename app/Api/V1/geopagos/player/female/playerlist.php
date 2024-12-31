<?php 
declare(strict_types=1);
require_once __DIR__.'/../../../../../Controller/PlayerFemaleListController.php';
require_once __DIR__.'/../../../../../Model/Api/GetPlayerFemaleListService.php';

$playerFemaleListService = new \Model\Api\GetPlayerFemaleListService();
$playerFemaleList = new \Controller\PlayerFemaleListController($playerFemaleListService);
$response = $playerFemaleList->getList();

echo $response;