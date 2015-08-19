<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class WindSpeed
{
    private $beaufortScale;
	private $kilometresPerHour;
	private $knots;
	private $metresPerSecond;
	private $milesPerHour;

    public function __construct($knots)
    {
        if ($knots != '-')
        {
            $this->beaufortScale = self::calculateBeaufortScale($knots);
            $this->kilometresPerHour = number_format(($knots * 1.852), 1, '.', '');
            $this->knots = number_format($knots, 1, '.', '');
            $this->metresPerSecond = number_format(($knots * 0.514444), 1, '.', '');
            $this->milesPerHour = number_format(($knots * 1.15078), 1, '.', '');
        }
    }

    public function getBeaufortScale()
    {
        return $this->beaufortScale;
    }

    public function getKilometresPerHour()
    {
        return $this->kilometresPerHour;
    }

    public function getKnots()
    {
        return $this->knots;
    }

    public function getMetresPerSecond()
    {
        return $this->metresPerSecond;
    }

    public function getMilesPerHour()
    {
        return $this->milesPerHour;
    }

    private function calculateBeaufortScale($knots)
    {
        $rounded_knots = round($knots, 0, PHP_ROUND_HALF_UP);

        $beaufortScale = 0;

        if ($rounded_knots >= 1 && $rounded_knots <= 3)
	    {
	        $beaufortScale = 1;
	    }
	    elseif ($rounded_knots >= 4 && $rounded_knots <= 6)
	    {
	        $beaufortScale = 2;
	    }
        elseif ($rounded_knots >= 7 && $rounded_knots <= 10)
        {
            $beaufortScale = 3;
        }
        elseif ($rounded_knots >= 11 && $rounded_knots <= 16)
        {
            $beaufortScale = 4;
        }
        elseif ($rounded_knots >= 17 && $rounded_knots <= 21)
        {
            $beaufortScale = 5;
        }
        elseif ($rounded_knots >= 22 && $rounded_knots <= 27)
        {
            $beaufortScale = 6;
        }
        elseif ($rounded_knots >= 28 && $rounded_knots <= 33)
        {
            $beaufortScale = 7;
        }
        elseif ($rounded_knots >= 34 && $rounded_knots <= 40)
        {
            $beaufortScale = 8;
        }
        elseif ($rounded_knots >= 41 && $rounded_knots <= 47)
        {
            $beaufortScale = 9;
        }
        elseif ($rounded_knots >= 48 && $rounded_knots <= 55)
        {
            $beaufortScale = 10;
        }
        elseif ($rounded_knots >= 56 && $rounded_knots <= 63)
        {
            $beaufortScale = 11;
        }
        elseif ($rounded_knots >= 64)
        {
            $beaufortScale = 12;
        }
        
        return number_format($beaufortScale, 0, '.', '');
    }
    
    public function getAllMeasures()
    {
        return array(
            "bft" => $this->getBeaufortScale(),
            "kn" => $this->getKnots(),
            "kmh" => $this->getKilometresPerHour(),
            "mph" => $this->getMilesPerHour(),
            "ms" => $this->getMetresPerSecond());
    }
}

?>
