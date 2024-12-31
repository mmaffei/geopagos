<?php 
declare(strict_types=1);

namespace Model\Factory;

require_once __DIR__.'/../../Interface/Factory/CreatePlayerListServiceFactoryInterface.php';
require_once __DIR__.'/../../Model/Api/GetPlayerMaleListService.php';
require_once __DIR__.'/../../Model/Api/GetPlayerFemaleListService.php';

use \Interface\Factory\CreatePlayerListServiceFactoryInterface;
use \Model\Api\GetPlayerMaleListService;
use \Model\Api\GetPlayerFemaleListService;

class CreatePlayerListServiceFactory implements CreatePlayerListServiceFactoryInterface
{

    /**
     * Instance new class by name
     */
    public static function getPlayerServiceByName($name)
    {
        return match ($name) {
            'simulationForMale' => new GetPlayerMaleListService(),
            'simulationForFemale' => new GetPlayerFemaleListService(),            
        };        
    }
}