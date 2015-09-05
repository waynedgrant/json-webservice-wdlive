<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("BaseSource.php");

class IndoorSource extends BaseSource
{
    public function __construct($clientRaw)
    {
        parent::__construct($clientRaw);
    }

    public function create()
    {
        $temperature = $this->clientRaw->getIndoorTemperature()->getAllMeasures();
        $humidity = $this->clientRaw->getIndoorHumidity()->getPercentage();

        $data = $this->createBase();

        $data["indoor"] = array(
            "temperature" => $temperature,
            "humidity" => $humidity);

        return $data;
    }
}

?>