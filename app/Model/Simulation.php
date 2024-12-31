<?php
declare(strict_types=1);

namespace Model;

require_once __DIR__.'/../Interface/SimulationInterface.php';

use \Interface\SimulationInterface;

class Simulation implements SimulationInterface
{
    /**
     * Points availables in a regular game at three sets
     */
    const POINTS = 200;

    /**
     * Rounds on the tournment for eight (8) players
     */
    const ROUND = 3;

    /**
     * @var null
     */
    private $absoluteDifference;

    /**
     * @var null
     */
    private $statisticalDifference;

    /**
     * @var null 
     */
    private $sigmaDifference;

    /**
     * @var array
     */
    private $list = [];

    /**
     * @var array
     */
    private $twoPlayers = [];

    /**
     * finals
     * @var array
     */
    private $winners = [];
    
    /**
     * Current key or flag
     * @var string
     */
    private $currentKey;



    /**
     * Play game
     * @return string
     */
    public function play($list) :string
    {        
        //full players
        $this->list = array_values(json_decode($list, true));

        //rounds 
        for($i=0; $i<self::ROUND; $i++) {
            $this->simulation();
        }

        //champ
        return json_encode($this->winners);
    }

    /**
     * Simulate every round in the tournment
     * @return void
     */
    private function simulation() :void
    {
        if (!empty($this->winners)) {
            $this->list = $this->winners;
            $this->winners = null;
        }

        $matches = (count($this->list) / 2);
        for ($i=0; $i < $matches; $i++) {
            $this->twoPlayers = [];
            $this->absoluteDifference = null;
            $this->statisticalDifference = null;
            $this->sigmaDifference = null;
            $this->currentKey = null;
            $this->twoPlayersAtATime();
            $this->oneMatchAtATime();
        }
    }


    /**
     * Get first two players at a time
     * @return void
     */    
    private function twoPlayersAtATime() :void
    {
        $this->currentKey = 0;
        $this->currentKey = array_key_first($this->list);

        for($i=0; $i<=1; $i++) { 
            $this->twoPlayers []= $this->list[$this->currentKey];
            unset($this->list[$this->currentKey]);
            $this->currentKey++;
        }

        $this->currentKey = 0;
    }

    /**
     * Get first two players at a time
     * @return void
     */
    private function oneMatchAtATime() :void
    {
        $this->absoluteDifference($this->twoPlayers[$this->currentKey], $this->twoPlayers[$this->currentKey+1]);
        $this->statisticalDifference($this->twoPlayers[$this->currentKey], $this->twoPlayers[$this->currentKey+1]);
        $this->sigmaDifference();

        if ($this->isSignificantTheDifference()) {
            $max = max($this->twoPlayers[$this->currentKey]['skill_level'], $this->twoPlayers[$this->currentKey+1]['skill_level']);
            $skillWinner = ($max == $this->twoPlayers[$this->currentKey]['skill_level']) ? $this->twoPlayers[$this->currentKey] : $this->twoPlayers[$this->currentKey+1];
            $this->winners []= $skillWinner;

        } else {
            $luckyWinner = $this->twoPlayers[$this->getRandomWinner()];
            $this->winners []= $luckyWinner;
        }
    }

    /**
     * Get absolute diff between two values
     * @return void
     */
    private function absoluteDifference($player0, $player1) :void
    {
        $this->absoluteDifference = abs($player0['skill_level'] - $player1['skill_level']);
    }

    /**
     * Get error marging 
     * @return void
     */
    private function statisticalDifference ($player0, $player1) :void
    {
        $this->statisticalDifference = round(sqrt((100 * ($player0['skill_level'] + $player1['skill_level']) - ($player0['skill_level'] - $player1['skill_level']) * ($player0['skill_level'] - $player1['skill_level'])) / (self::POINTS - 1)), 2);
    }

    /**
     * Get sigma value as high or low probability
     * @return void
     */
    private function sigmaDifference() :void
    {
        $this->sigmaDifference = $this->absoluteDifference / $this->statisticalDifference;
    }

    /**
     * About the result
     * If sigma difference is lower than two (2) then is not probably
     * Otherwise is probably
     * 
     * @return bool
     */
    private function isSignificantTheDifference() :bool
    {
        if ($this->sigmaDifference < 2) {
            return false;
        }

        return true;
    }

    /**
     * Generate random result match in case the difference is not probably as last resource
     * @return int
     */
    private function getRandomWinner() :int
    {
        return rand($this->currentKey+0, $this->currentKey+1);
    }

    
}