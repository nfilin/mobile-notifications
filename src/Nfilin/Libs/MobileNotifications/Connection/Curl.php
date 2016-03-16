<?php
namespace Nfilin\Libs\MobileNotifications\Connection;

use Nfilin\Libs\BaseObject;
use Nfilin\Libs\MobileNotifications\Authorization\AuthorizationInterface;

/**
 * Class Curl
 * @package Nfilin\Libs\MobileNotifications\Connection
 */
abstract class Curl extends BaseObject implements ConnectionInterface
{
    /**
     * @var null|resource
     */
    protected $curl;

    /**
     * Curl constructor.
     * @param AuthorizationInterface $auth
     * @param array $options
     */
    public function __construct(AuthorizationInterface $auth, $options = [])
    {
        $this->curl = null;
        $this->setAuthorization($auth);
    }

    /**
     * @return $this
     */
    public function connect()
    {
        if ($this->curl != null) {
            return $this;
        }
        $ch = curl_init();
        $this->curl = $ch;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        return $this;
    }

    public function close()
    {
        if (!empty($this->curl)) {
            curl_close($this->curl);
            $this->curl = null;
        }
        return $this;
    }
}