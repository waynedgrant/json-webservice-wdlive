<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class Irradiance
{
    private $wattsPerSquareMetre;

    public function __construct($wattsPerSquareMetre)
    {
        if ($wattsPerSquareMetre != '-')
        {
            $this->wattsPerSquareMetre = number_format($wattsPerSquareMetre, 0, '.', '');
        }
    }

    public function getWattsPerSquareMetre()
    {
        return $this->wattsPerSquareMetre;
    }
}

?>
