<?php 
declare(strict_types=1);
require_once __DIR__.'/../../../../../Controller/PlayerMaleListController.php';
require_once __DIR__.'/../../../../../Model/Api/GetPlayerMaleListService.php';

$playerMaleListService = new \Model\Api\GetPlayerMaleListService();
$PlayerMaleList = new \Controller\PlayerMaleListController($playerMaleListService);
$response = $PlayerMaleList->getList();

echo $response;