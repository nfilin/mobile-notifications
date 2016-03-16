<?php
namespace Nfilin\Libs\MobileNotifications\Device;

use Nfilin\Libs\BaseObject;

/**
 * Class Device
 * @package Nfilin\Libs\MobileNotifications\Device
 */
class Base extends BaseObject implements DeviceInterface
{
    const TYPE_APNS = 'APNS';
    const TYPE_GCM = 'GCM';
    const TYPE_NONE = 'NONE';

    /**
     * @var string
     */
    public $token;
    /**
     * @var string
     */
    public $type;

    /**
     * Device constructor.
     * @param string|array|DeviceInterface $token
     * @param string $type
     */
    public function __construct($token, $type = self::TYPE_NONE)
    {
        if (is_string($token)) {
            $this->token = $token;
            $this->type = $type;
        } elseif (is_array($token)) {
            $this->token = array_key_exists('token', $token) ? $token : $token[0];
            $this->type = array_key_exists('type', $token) ? $token : (array_key_exists(1, $token) ? $token[1] : $type);
        } elseif ($token instanceof DeviceInterface) {
            $this->token = $token->token;
            $this->type = $token->type;
        }
    }
}