<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("AlmanacSource.php");
require_once("BaseSource.php");
require_once("AstronomySource.php");
require_once("IndoorSource.php");
require_once("WeatherSource.php");

class EverythingSource extends BaseSource
{
    private $clientRawExtra;

    public function __construct($clientRaw, $clientRawExtra)
    {
        parent::__construct($clientRaw);
        $this->clientRawExtra = $clientRawExtra;
    }

    public function create()
    {
        $almanacSource = new AlmanacSource($this->clientRaw, $this->clientRawExtra);
        $astronomySource = new AstronomySource($this->clientRaw, $this->clientRawExtra);
        $indoorSource = new IndoorSource($this->clientRaw);
        $weatherSource = new WeatherSource($this->clientRaw);

        $data = $this->createBase();

        $data["everything"] = array(
            "almanac" => $almanacSource->create()["almanac"],
            "astronomy" => $astronomySource->create()["astronomy"],
            "indoor" => $indoorSource->create()["indoor"],
            "weather" => $weatherSource->create()["weather"]);

        return $data;
    }
}

?>
