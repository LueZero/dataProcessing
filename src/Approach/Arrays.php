<?php

namespace Zero\DataHandling\Approach;

use Zero\DataHandling\Approach\DataProcessing;
use Zero\DataHandling\Interfaces\DataHandingInterface;
use Zero\DataHandling\Helper\DataLogic;

class Arrays implements DataHandingInterface
{
    use DataLogic;

    public $input = [];

    public function __construct($formatData)
    {
        $this->input = $formatData;
    }

    public function findKeyData($keyName)
    {
        return static::loopArrayKeyData($this->input, $keyName);
    }

    public function findValueData($valueName)
    {
        $result = [];
        array_walk_recursive($this->input, function ($value, $key) use ($valueName, &$result) {
            if ($value == $valueName)
                $result[] = $value;
        });
        return $result;
    }
}
