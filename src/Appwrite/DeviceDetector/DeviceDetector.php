<?php

namespace Appwrite\DeviceDetector;

use DeviceDetector\DeviceDetector as DeviceDetectorDeviceDetector;
use DeviceDetector\Parser\BotParserAbstract;
use Exception;

class DeviceDetector extends DeviceDetectorDeviceDetector {

    public function parse()
    {

        var_dump($this->getUserAgent());

    }
}