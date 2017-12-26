<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("BaseSource.php");

class ForecastSource extends BaseSource {

    public function __construct($clientRaw, $clientRawExtra) {
        parent::__construct($clientRaw, $clientRawExtra);
    }

    public function create() {
        $data = $this->createBase();

        $forecastIcon = $this->clientRaw->getForecastIcon();
        $davisForecast = $this->clientRawExtra->getDavisForecast();

        $data["forecast"] = array(
            "icon" => $forecastIcon->getAllMeasures(),
            "davis_forecast" => $davisForecast
        );

        return $data;
    }
}

?>
