<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class Pressure
{
    private $hectopascals;
    private $inchesOfMercury;
    private $kilopascals;
    private $millibars;
    private $millimetresOfMercury;

    public function __construct($hectopascals)
    {
        if ($hectopascals != '-')
        {
            $this->hectopascals = number_format($hectopascals, 1, '.', '');
            $this->inchesOfMercury = number_format(($hectopascals * 0.02953), 2, '.', '');
            $this->kilopascals = number_format(($hectopascals / 10), 2, '.', '');
            $this->millibars = number_format($hectopascals, 1, '.', '');
            $this->millimetresOfMercury = number_format(($hectopascals * 0.750062), 1, '.', '');
        }
    }

    public function getHectopascals()
    {
        return $this->hectopascals;
    }

    public function getInchesOfMercury()
    {
        return $this->inchesOfMercury;
    }

    public function getKilopascals()
    {
        return $this->kilopascals;
    }

    public function getMillibars()
    {
        return $this->millibars;
    }

    public function getMillimetresOfMercury()
    {
        return $this->millimetresOfMercury;
    }
}

?>
