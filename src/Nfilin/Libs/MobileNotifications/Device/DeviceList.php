<?php

namespace Nfilin\Libs\MobileNotifications\Device;

use Nfilin\Libs\BaseIterator;

/**
 * Class DeviceList
 * @package Nfilin\Libs\MobileNotifications\Device
 */
class DeviceList extends BaseIterator implements DeviceListInterface
{
    const ELEMENT_CLASS = 'Device';

    /**
     * DeviceList constructor.
     * @param array $array
     * @param string $element_class
     * @throws \Exception
     */
    public function __construct($array = [], $element_class = self::ELEMENT_CLASS)
    {
        if (class_exists($element_class)) {
        } elseif (class_exists(__NAMESPACE__ . '\\' . $element_class)) {
            $element_class = __NAMESPACE__ . '\\' . $element_class;
        } else {
            $element_class = Device::className();
        }
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if (is_string($value) || is_array($value)) {
                    $array[$key] = new $element_class($value);
                } elseif (!is_object($value) || !$value instanceof Device) {
                    unset($array[$key]);
                }
            }
        } elseif (is_string($array)) {
            $array = [new $element_class($array)];
        } elseif (!is_object($array)) {
            throw new \Exception("First parameter should contain device information");
        } elseif ($array instanceof $element_class) {
            $array = [$array];
        } elseif ($array instanceof DeviceList) {
            if (!$array instanceof static) {
                $array = $array->getArrayCopy();
            }
        } else {
            throw new \Exception("First parameter should contain device information");
        }
        parent::__construct($array);
    }
}
