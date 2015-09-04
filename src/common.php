<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

define("SERVICE_VERSION", 1.3);

function getServiceUrl()
{
    return "http".(!empty($_SERVER['HTTPS'])?"s":"")."://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
}

function createEndpoint()
{
    return array(
        "url" => getServiceUrl(),
        "version" => SERVICE_VERSION);
}

function createStation($clientRaw)
{
    return array(
        "name" => $clientRaw->getStationName(),
        "latitude" => $clientRaw->getLatitude(),
        "longitude" => $clientRaw->getLongitude(),
        "wd_version" => $clientRaw->getWdVersion());
}

?>
