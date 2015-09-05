<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

abstract class BaseSource
{
	const SERVICE_VERSION = 1.4;

    protected $clientRaw;

    public function __construct($clientRaw)
    {
        $this->clientRaw = $clientRaw;
    }

    protected function createBase()
    {
        return array(
            "endpoint" => $this->createEndpoint(),
            "station" => $this->createStation($clientRaw),
            "time" => $this->clientRaw->getCurrentDateAndTime()->getAllValues());
    }

    private function createEndpoint()
    {
        return array(
            "url" => $this->createServiceUrl(),
            "version" => self::SERVICE_VERSION);
    }

    private function createStation()
    {
        return array(
            "name" => $this->clientRaw->getStationName(),
            "latitude" => $this->clientRaw->getLatitude(),
            "longitude" => $this->clientRaw->getLongitude(),
            "wd_version" => $this->clientRaw->getWdVersion());
    }

    private function createServiceUrl()
    {
        return "http".(!empty($_SERVER['HTTPS'])?"s":"")."://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }
}

?>
