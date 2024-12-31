<?php 
declare(strict_types=1);

namespace Interface;

interface SimulationInterface
{
    /**
     * Play a simulate match
     * 
     * @param string $list
     * @return string
     */
    public function play($list) :string;
}