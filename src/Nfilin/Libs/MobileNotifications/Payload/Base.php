<?php

namespace Nfilin\Libs\MobileNotifications\Payload;

use Nfilin\Libs\BaseObject;

/**
 * Class Base
 * @package Nfilin\Libs\MobileNotifications\Payload
 */
abstract class Base extends BaseObject implements PayloadInterface
{
    /**
     * @var string
     */
    public $title = '';
    /**
     * @var string
     */
    public $body;
    /**
     * @var int
     */
    public $badge;
    /**
     * @var string
     */
    public $sound;
    /**
     * @var string
     * on iOS corresponds to `category`
     */
    public $click_action;
    /**
     * @var string
     * on iOS corresponds to `loc-key`
     */
    public $body_loc_key;
    /**
     * @var string|array
     * on iOS corresponds to `loc-args`
     */
    public $body_loc_args;
    /**
     * @var string
     */
    public $title_loc_key;
    /**
     * @var array|string
     */
    public $title_loc_args;
    /**
     * @var array
     */
    public $custom_data = [];

    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            } else {
                $this->custom_data[$key] = $value;
            }
        }
    }

    /**
     * @param PayloadInterface $payload
     * @return PayloadInterface|static
     */
    public static function wrap(PayloadInterface $payload)
    {
        if ($payload instanceof static) {
            return $payload;
        }

        $out = new static;
        foreach ($payload as $key => $value) {
            $out->$key = $value;
        }
        return $out;
    }

    /**
     * @return array
     */
    public function getCustomData()
    {
        return $this->custom_data;
    }

}