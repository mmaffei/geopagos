<?php 
declare(strict_types=1);

namespace Interface\Factory;

interface CreatePlayerListServiceFactoryInterface
{
    /**
     * Get service by name
     * 
     * @param $name 
     */
    public static function getPlayerServiceByName($name);
}