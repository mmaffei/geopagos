<?php
declare(strict_types=1);

namespace Controller;

require_once __DIR__.'/../Model/Factory/CreatePlayerListServiceFactory.php';
require_once __DIR__.'/../Model/Simulation.php';

use \Model\Factory\CreatePlayerListServiceFactory;
use \Model\Simulation;

class SimulationController
{
    /**
     * @var object
     */
    private $playerListService;

    /**
     * Get results from simulation
     * @return string
     */
    public function getResults($name) :string
    {
        //at the beginning could check posible cache results
        $this->createPlayerService($name);
        return $this->playSimulation();
    }

    /**
     * Play simulation 
     * @return string
     */
    private function playSimulation() :string
    {
        $simulation = new Simulation();
        return $simulation->play($this->getPlayerListServiceList());
    }

    /**
     * Get player list 
     * @return string
     */
    private function getPlayerListServiceList() :string
    {
        return $this->playerListService->list();
    }

    /**
     * Create player service and return instance
     * @return void
     */
    private function createPlayerService($name) :void
    {
        $this->playerListService = CreatePlayerListServiceFactory::getPlayerServiceByName($name);
    }
    
}