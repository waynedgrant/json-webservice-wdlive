<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class WindDirection
{
    private $cardinalDirection;
    private $compassDegress;

    public function __construct($compassDegress)
    {
        if ($compassDegress != '-')
        {
            $this->cardinalDirection = self::calculateCardinalDirection($compassDegress);
            $this->compassDegress = number_format($compassDegress, 0, '.', '');
        }
    }

    public function getCardinalDirection()
    {
        return $this->cardinalDirection;
    }

    public function getCompassDegrees()
    {
        return $this->compassDegress;
    }

    private function calculateCardinalDirection($compassDegress)
    {
        $cardinal = array('N','NNE', 'NE', 'ENE', 'E', 'ESE', 'SE', 'SSE', 'S', 'SSW','SW', 'WSW', 'W', 'WNW', 'NW', 'NNW');
        return $cardinal[fmod((($compassDegress + 11) / 22.5), 16)];
    }
}

?>
