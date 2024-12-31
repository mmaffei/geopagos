<?php 
declare(strict_types=1);

namespace Model\Abstract;

/**
 * Common curl code
 */
abstract class CurlAbstract
{
    
    /**
     * Generic call by curl
     * 
     * @param string endpoint
     * @param string query
     * @return string
     */
    protected function curl($endpoint, $query = null) :string
    {
        try {
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_URL, $endpoint . $query);
            curl_setopt($curl, CURLOPT_HEADER, 0);
            $result = curl_exec($curl);
            curl_close($curl);
    
            if (false == $result) {
                return '{}';
            }
    
            return $result;

        } catch (\Exception $e) {
            error_log($e->getMessage());
        }

        return '{}';
    }
}