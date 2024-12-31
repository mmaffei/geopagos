<?php 
declare(strict_types=1);

namespace Model\Api;

require_once __DIR__.'/../../Api/GetPlayerMaleListServiceInterface.php';
require_once __DIR__.'/../../Model/Abstract/CurlAbstract.php';

use \Api\GetPlayerMaleListServiceInterface;
use \Model\Abstract\CurlAbstract;

class GetPlayerMaleListService extends CurlAbstract implements GetPlayerMaleListServiceInterface
{
    /**
     * @var string player male path
     */
    const ENDPOINT = 'http://127.0.0.1/web/player-male.json';


    /**
     * Extending shared json calling
     * 
     * @return string
     */    
    public function list() :string
    {
        $curl = $this->curl(self::ENDPOINT);
        if($this->isValid($curl)) {
            return $curl;
        }

        return '{}';
    }

    /**
     * Implement very basic json validation 
     * 
     * @param $json data
     * @return bool
     */
    public function isValid($json) :bool
    {
        return json_validate($json);       
    }
}