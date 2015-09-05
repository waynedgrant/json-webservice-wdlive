<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class AstronomySource
{
    private $clientRawExtra;

    public function __construct($clientRawExtra)
    {
        $this->clientRawExtra = $clientRawExtra;
    }

    public function create()
    {
        $sun = array(
            "sunrise_time" => $this->clientRawExtra->getSunriseTime()->getAllValues(),
            "sunset_time" => $this->clientRawExtra->getSunsetTime()->getAllValues());

        $moon = array(
            "moonrise_time" => $this->clientRawExtra->getMoonriseTime()->getAllValues(),
            "moonset_time" => $this->clientRawExtra->getMoonsetTime()->getAllValues(),
            "moon_phase" => $this->clientRawExtra->getMoonPhase(),
            "moon_age" => $this->clientRawExtra->getMoonAge());

        return array("sun" => $sun, "moon" => $moon);
    }
}

?>
