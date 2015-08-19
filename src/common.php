<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

define("SERVICE_VERSION", 1.2);

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

function createTime($clientRaw)
{
    $dateAndTime = $clientRaw->getDateAndTime();

    return array(
        "hour" => $dateAndTime->getHour(),
        "minute" => $dateAndTime->getMinute(),
        "day" => $dateAndTime->getDay(),
        "month" => $dateAndTime->getMonth(),
        "year" => $dateAndTime->getYear(),
        "time" => $dateAndTime->getTime(),
        "date" => $dateAndTime->getDate(),
        "time_date" => $dateAndTime->getTimeAndDate());
}

?>
