<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class IndoorSource
{
    private $clientRaw;

    public function __construct($clientRaw)
    {
        $this->clientRaw = $clientRaw;
    }

    public function create()
    {
        $temperature = $this->clientRaw->getIndoorTemperature()->getAllMeasures();
        $humidity = $this->clientRaw->getIndoorHumidity()->getPercentage();

        return array("temperature" => $temperature, "humidity" => $humidity);
    }
}

?>
