<?php
declare(strict_types=1);

namespace Controller;

require_once __DIR__.'/../Model/Api/GetPlayerMaleListService.php';

use \Model\Api\GetPlayerMaleListService;

class PlayerMaleListController
{

    /**
     * @var \Model\Api\GetPlayerMaleListService;
     */
    protected $playerMaleListService;


    /**
     * GetPlayerMaleListService constructor
     * 
     * @param \Model\Api\GetPlayerMaleListService
     */
    public function __construct(
        GetPlayerMaleListService $playerMaleListService
    ){
        $this->playerMaleListService = $playerMaleListService;
    }


    /**
     * Get player list
     * 
     * @return string
     */
    public function getList() :string
    {
        return $this->playerMaleListService->list();
    }
}