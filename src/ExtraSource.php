<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("BaseSource.php");

class ExtraSource extends BaseSource
{
    public function __construct($clientRaw)
    {
        parent::__construct($clientRaw);
    }

    public function create()
    {
        $data = $this->createBase();

        $temperature = array(
            "1" => $this->clientRaw->getExtraTemperature1()->getAllMeasures(),
            "2" => $this->clientRaw->getExtraTemperature2()->getAllMeasures(),
            "3" => $this->clientRaw->getExtraTemperature3()->getAllMeasures(),
            "4" => $this->clientRaw->getExtraTemperature4()->getAllMeasures(),
            "5" => $this->clientRaw->getExtraTemperature5()->getAllMeasures(),
            "6" => $this->clientRaw->getExtraTemperature6()->getAllMeasures(),
            "7" => $this->clientRaw->getExtraTemperature7()->getAllMeasures(),
            "8" => $this->clientRaw->getExtraTemperature8()->getAllMeasures());

        $humidity = array(
            "1" => $this->clientRaw->getExtraHumidity1()->getPercentage(),
            "2" => $this->clientRaw->getExtraHumidity2()->getPercentage(),
            "3" => $this->clientRaw->getExtraHumidity3()->getPercentage(),
            "4" => $this->clientRaw->getExtraHumidity4()->getPercentage(),
            "5" => $this->clientRaw->getExtraHumidity5()->getPercentage(),
            "6" => $this->clientRaw->getExtraHumidity6()->getPercentage(),
            "7" => $this->clientRaw->getExtraHumidity7()->getPercentage(),
            "8" => $this->clientRaw->getExtraHumidity8()->getPercentage());

        $data["extra"] = array(
            "temperature" => $temperature,
            "humidity" => $humidity
        );

        return $data;
    }
}

?>
