<?php
declare(strict_types=1);

namespace Controller;

require_once __DIR__.'/../Model/Api/GetPlayerFemaleListService.php';

use \Model\Api\GetPlayerFemaleListService;

class PlayerFemaleListController
{

    /**
     * @var \Model\Api\GetPlayerFemaleListService;
     */
    protected $playerFemaleListService;


    /**
     * GetPlayerFemaleListService constructor
     * 
     * @param \Model\Api\GetPlayerFemaleListService
     */
    public function __construct(
        GetPlayerFemaleListService $playerFemaleListService
    ){
        $this->playerFemaleListService = $playerFemaleListService;
    }


    /**
     * Get player list
     * 
     * @return string
     */
    public function getList() :string
    {
        return $this->playerFemaleListService->list();
    }
}