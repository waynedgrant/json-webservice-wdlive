<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class WindDirection
{
    private static $CARDINAL_DIRECTIONS = array('N','NNE', 'NE', 'ENE', 'E', 'ESE', 'SE', 'SSE', 'S', 'SSW','SW', 'WSW', 'W', 'WNW', 'NW', 'NNW');

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
        return self::$CARDINAL_DIRECTIONS[fmod((($compassDegress + 11) / 22.5), 16)];
    }

    public function getAllMeasures()
    {
        return array(
            "cardinal" => $this->getCardinalDirection(),
            "degrees" => $this->getCompassDegrees());
    }
}

?>
