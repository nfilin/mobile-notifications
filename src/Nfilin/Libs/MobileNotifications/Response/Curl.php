<?php

namespace Nfilin\Libs\MobileNotifications\Response;

use Nfilin\Libs\BaseObject;

/**
 * Class Curl
 * @package Nfilin\Libs\MobileNotifications\Response
 */
class Curl extends BaseObject implements ResponseInterface
{
    /**
     * @var int
     */
    public $status = 0;

    /**
     * @param $ch
     * @return static
     */
    public static function fromCurl($ch)
    {
        $resp = new static;
        try {
            $result = json_decode(curl_exec($ch));
        } catch (\Exception $e) {
            $result = null;
        }
        $resp->status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (is_object($result) || is_array($result)) {
            foreach ($result as $key => $value) {
                if (property_exists($resp, $key)) {
                    $resp->$key = $value;
                }
            }
        }
        return $resp;
    }
}