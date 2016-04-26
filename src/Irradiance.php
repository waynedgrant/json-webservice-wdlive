<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class Irradiance
{
    private $kilowattsPerSquareMetre;
    private $wattsPerSquareCentimetre;
    private $wattsPerSquareMetre;

    public function __construct($wattsPerSquareMetre)
    {
        if ($wattsPerSquareMetre != '-')
        {
            $this->kilowattsPerSquareMetre = number_format(($wattsPerSquareMetre / 1000), 3, '.', '');
            $this->wattsPerSquareCentimetre = number_format(($wattsPerSquareMetre / 100), 2, '.', '');
            $this->wattsPerSquareMetre = number_format($wattsPerSquareMetre, 0, '.', '');
        }
    }

    public function getKilowattsPerSquareMetre()
    {
        return $this->kilowattsPerSquareMetre;
    }

    public function getWattsPerSquareCentimetre()
    {
        return $this->wattsPerSquareCentimetre;
    }

    public function getWattsPerSquareMetre()
    {
        return $this->wattsPerSquareMetre;
    }

    public function getAllMeasures()
    {
        return array(
            "kwm2" => $this->getKilowattsPerSquareMetre(),
            "wcm2" => $this->getWattsPerSquareCentimetre(),
            "wm2" => $this->getWattsPerSquareMetre());
    }
}

?>
