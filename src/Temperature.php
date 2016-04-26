<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class Temperature
{
    private $celsius;
    private $fahrenheit;

    public function __construct($celsius)
    {
        if ($celsius != '-')
        {
            $this->celsius = number_format($celsius, 1, '.', '');
            $this->fahrenheit = number_format((($celsius * 1.8) + 32), 1, '.', '');
        }
    }

    public function getCelsius()
    {
        return $this->celsius;
    }

    public function getFahrenheit()
    {
        return $this->fahrenheit;
    }

    public function getAllMeasures()
    {
        return array(
            "c" => $this->getCelsius(),
            "f" => $this->getFahrenheit());
    }
}

?>
