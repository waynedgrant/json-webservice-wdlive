<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("BaseSource.php");

class AstronomySource extends BaseSource
{
    public function __construct($clientRaw, $clientRawExtra)
    {
        parent::__construct($clientRaw, $clientRawExtra);
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

        $data = $this->createBase();

        $data["astronomy"] = array(
            "sun" => $sun,
            "moon" => $moon);

        return $data;
    }
}

?>
