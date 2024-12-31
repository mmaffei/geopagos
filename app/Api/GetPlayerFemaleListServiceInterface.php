<?php 
declare(strict_types=1);

namespace Api;

interface GetPlayerFemaleListServiceInterface
{
    /**
     * Validate json
     * 
     * @param $json 
     * @return bool
     */    
    public function isValid($json) :bool;
}