<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("BaseSource.php");

class ForecastSource extends BaseSource
{
    public function __construct($clientRaw, $clientRawExtra)
    {
        parent::__construct($clientRaw, $clientRawExtra);
    }

    public function create()
    {
        $data = $this->createBase();

        $forecastIcon = $this->clientRaw->getForecast();

        $data["forecast"] = array(
            "code" => $forecastIcon->getCode(),
            "text" => $forecastIcon->getText()
        );

        return $data;
    }
}

?>
