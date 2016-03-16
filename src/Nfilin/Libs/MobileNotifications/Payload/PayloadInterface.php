<?php

namespace Nfilin\Libs\MobileNotifications\Payload;

/**
 * Interface PayloadInterface
 * @package Nfilin\Libs\MobileNotifications\Payload
 */
interface PayloadInterface extends \JsonSerializable
{
    /**
     * @param PayloadInterface $payload
     * @return static
     */
    public static function wrap(PayloadInterface $payload);

    /**
     * @return array
     */
    public function getCustomData();
}