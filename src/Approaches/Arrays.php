<?php

namespace Zero\Approaches;

use Zero\Approaches\ApproachesInterface;
use Zero\Traits\DataProcessor;

class Arrays implements ApproachesInterface
{
    use DataProcessor;

    private $inputs = [];

    public function __construct($formatData)
    {
        $this->inputs = $formatData;
    }

    public function findKeyData($keyName)
    {
        return static::loopArrayKeyData($this->inputs, $keyName);
    }

    public function findValueData($valueName)
    {
        $result = [];

        array_walk_recursive($this->inputs, function ($value, $key) use ($valueName, &$result) {
            if ($value == $valueName)
                $result[] = $value;
        });
        
        return $result;
    }

    public function sortData($sort)
    {
        return static::sortLoopData($this->inputs, strtolower($sort));
    }
}
