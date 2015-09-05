<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class WeatherSource
{
    private $clientRaw;

    public function __construct($clientRaw)
    {
        $this->clientRaw = $clientRaw;
    }

    public function create()
    {
        $temperature = array(
            "current" => $this->clientRaw->getOutdoorTemperature()->getAllMeasures(),
            "high" => $this->clientRaw->getDailyHighOutdoorTemperature()->getAllMeasures(),
            "low" => $this->clientRaw->getDailyLowOutdoorTemperature()->getAllMeasures(),
            "trend" => $this->clientRaw->getOutdoorTemperatureTrend()->getTrend());

        $pressure = array(
            "current" => $this->clientRaw->getSurfacePressure()->getAllMeasures(),
            "high" => $this->clientRaw->getDailyHighSurfacePressure()->getAllMeasures(),
            "low" => $this->clientRaw->getDailyLowSurfacePressure()->getAllMeasures(),
            "trend_per_hr" => $this->clientRaw->getSurfacePressureTrendPerHour()->getAllMeasures());

        $rainfall = array(
            "daily" => $this->clientRaw->getDailyRainfall()->getAllMeasures(),
            "rate_per_min" => $this->clientRaw->getRainfallRate()->getAllMeasures(),
            "max_rate_per_min" => $this->clientRaw->getMaximumRainfallRate()->getAllMeasures(),
            "yesterday" => $this->clientRaw->getYesterdaysRainfall()->getAllMeasures());

        $wind = array(
            "direction" => $this->clientRaw->getWindDirection()->getAllMeasures(),
            "avg_direction" => $this->clientRaw->getAverageWindDirection()->getAllMeasures(),
            "avg_speed" => $this->clientRaw->getAverageWindSpeed()->getAllMeasures(),
            "max_avg_speed" => $this->clientRaw->getMaximumAverageWindSpeed()->getAllMeasures(),
            "gust_speed" => $this->clientRaw->getGustSpeed()->getAllMeasures(),
            "max_gust_speed" => $this->clientRaw->getMaximumGustSpeed()->getAllMeasures());

        $humidity = array(
            "current" => $this->clientRaw->getOutdoorHumidity()->getPercentage(),
            "high" => $this->clientRaw->getDailyHighOutdoorHumidity()->getPercentage(),
            "low" => $this->clientRaw->getDailyLowOutdoorHumidity()->getPercentage(),
            "trend" => $this->clientRaw->getOutdoorHumidityTrend()->getTrend());

        $dewPoint = array(
            "current" => $this->clientRaw->getDewPoint()->getAllMeasures(),
            "high" => $this->clientRaw->getDailyHighDewPoint()->getAllMeasures(),
            "low" => $this->clientRaw->getDailyLowDewPoint()->getAllMeasures());

        $windChill = array(
            "current" => $this->clientRaw->getWindChill()->getAllMeasures(),
            "high" => $this->clientRaw->getDailyHighWindChill()->getAllMeasures(),
            "low" => $this->clientRaw->getDailyLowWindChill()->getAllMeasures());

        $humidex = array(
            "current" => $this->clientRaw->getHumidex()->getAllMeasures(),
            "high" => $this->clientRaw->getDailyHighHumidex()->getAllMeasures(),
            "low" => $this->clientRaw->getDailyLowHumidex()->getAllMeasures(),
            "trend" => $this->clientRaw->getHumidexTrend()->getTrend());

        $heatIndex = array(
            "current" => $this->clientRaw->getHeatIndex()->getAllMeasures(),
            "high" => $this->clientRaw->getDailyHighHeatIndex()->getAllMeasures(),
            "low" => $this->clientRaw->getDailyLowHeatIndex()->getAllMeasures());

        return array(
            "temperature" => $temperature,
            "pressure" => $pressure,
            "rainfall" => $rainfall,
            "wind" => $wind,
            "humidity" => $humidity,
            "dew_point" => $dewPoint,
            "wind_chill" => $windChill,
            "humidex" => $humidex,
            "heat_index" => $heatIndex,
            "uv" => $this->clientRaw->getUv()->getAllMeasures());
    }
}

?>
