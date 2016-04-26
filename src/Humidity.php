<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class Humidity
{
    private $percentage;

    public function __construct($percentage)
    {
        if ($percentage != '-')
        {
            $this->percentage = number_format($percentage, 0, '.', '');
        }
    }

    public function getPercentage()
    {
        return $this->percentage;
    }
}

?>
