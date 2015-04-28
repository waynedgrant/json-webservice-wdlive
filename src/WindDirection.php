<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class WindDirection
{
    private $compassDegress;
    private $cardinalDirection;

    public function __construct($compassDegress)
    {
        if ($compassDegress != '-')
        {
            $this->compassDegress = number_format($compassDegress, 0, '.', '');
            $this->cardinalDirection = self::calculateCardinalDirection($compassDegress);
        }
    }

    public function getCompassDegrees()
    {
        return $this->compassDegress;
    }

    public function getCardinalDirection()
    {
        return $this->cardinalDirection;
    }

    private function calculateCardinalDirection($compassDegress)
    {
        $cardinal = array('N','NNE', 'NE', 'ENE', 'E', 'ESE', 'SE', 'SSE', 'S', 'SSW','SW', 'WSW', 'W', 'WNW', 'NW', 'NNW');
        return $cardinal[fmod((($compassDegress + 11) / 22.5), 16)];
    }
}

?>
