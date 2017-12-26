<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("BaseSource.php");

class ExtraSource extends BaseSource {

    public function __construct($clientRaw) {
        parent::__construct($clientRaw);
    }

    public function create() {
        $data = $this->createBase();

        $temperature = array(
            $this->clientRaw->getExtraTemperature1()->getAllMeasures(),
            $this->clientRaw->getExtraTemperature2()->getAllMeasures(),
            $this->clientRaw->getExtraTemperature3()->getAllMeasures(),
            $this->clientRaw->getExtraTemperature4()->getAllMeasures(),
            $this->clientRaw->getExtraTemperature5()->getAllMeasures(),
            $this->clientRaw->getExtraTemperature6()->getAllMeasures(),
            $this->clientRaw->getExtraTemperature7()->getAllMeasures(),
            $this->clientRaw->getExtraTemperature8()->getAllMeasures());

        $humidity = array(
            $this->clientRaw->getExtraHumidity1()->getPercentage(),
            $this->clientRaw->getExtraHumidity2()->getPercentage(),
            $this->clientRaw->getExtraHumidity3()->getPercentage(),
            $this->clientRaw->getExtraHumidity4()->getPercentage(),
            $this->clientRaw->getExtraHumidity5()->getPercentage(),
            $this->clientRaw->getExtraHumidity6()->getPercentage(),
            $this->clientRaw->getExtraHumidity7()->getPercentage(),
            $this->clientRaw->getExtraHumidity8()->getPercentage());

        $data["extra"] = array(
            "temperature" => $temperature,
            "humidity" => $humidity
        );

        return $data;
    }
}

?>
