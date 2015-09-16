<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class Altitude
{
    private $feet;
    private $metres;
    private $yards;

    public function __construct($feet)
    {
        if ($feet != '-')
        {
            $this->feet = number_format($feet, 0, '.', '');
            $this->metres = number_format(($feet * 0.3048), 0, '.', '');
            $this->yards = number_format(($feet * (1 / 3)), 0, '.', '');
        }
    }

    public function getFeet()
    {
        return $this->feet;
    }

    public function getMetres()
    {
        return $this->metres;
    }

    public function getYards()
    {
        return $this->yards;
    }

    public function getAllMeasures()
    {
        return array(
            "ft" => $this->getFeet(),
            "m" => $this->getMetres(),
            "yds" => $this->getYards());
    }
}

?>
