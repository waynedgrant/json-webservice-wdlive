<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("BaseSource.php");

class WeatherSource extends BaseSource
{
    public function __construct($clientRaw, $clientRawExtra)
    {
        parent::__construct($clientRaw, $clientRawExtra);
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
            "monthly" => $this->clientRaw->getMonthlyRainfall()->getAllMeasures(),
            "annual" => $this->clientRaw->getAnnualRainfall()->getAllMeasures(),
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

        $apparentTemperature = array(
            "current" => $this->clientRaw->getApparentTemperature()->getAllMeasures(),
            "high" => $this->clientRaw->getDailyHighApparentTemperature()->getAllMeasures(),
            "low" => $this->clientRaw->getDailyLowApparentTemperature()->getAllMeasures());

        $wetBulbTemperature = $this->clientRaw->getWetBulbTemperature()->getAllMeasures();

        $soilTmperature = $this->clientRaw->getSoilTemperature()->getAllMeasures();

        $solar = array(
            "irradiance" => $this->clientRaw->getSolarIrradiance()->getWattsPerSquareMetre(),
            "sunshine_hours" => $this->clientRawExtra->getSunshineHours());

        $uv = $this->clientRaw->getUv()->getAllMeasures();

        $data = $this->createBase();

        $data["weather"] = array(
            "temperature" => $temperature,
            "pressure" => $pressure,
            "rainfall" => $rainfall,
            "wind" => $wind,
            "humidity" => $humidity,
            "dew_point" => $dewPoint,
            "wind_chill" => $windChill,
            "humidex" => $humidex,
            "heat_index" => $heatIndex,
            "apparent_temperature" => $apparentTemperature,
            "wet_bulb_temperature" => $wetBulbTemperature,
            "soil_temperature" => $soilTmperature,
            "solar" => $solar,
            "uv" => $uv);

        return $data;
    }
}

?>
