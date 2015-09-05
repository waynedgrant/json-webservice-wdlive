<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("BaseSource.php");

class AlmanacSource extends BaseSource
{
    private $clientRawExtra;

    public function __construct($clientRaw, $clientRawExtra)
    {
        parent::__construct($clientRaw);
        $this->clientRawExtra = $clientRawExtra;
    }

    public function create()
    {
        $data = $this->createBase();

        $data["almanac"] = array(
            "month_to_date" => $this->createMonthToDate(),
            "year_to_date" => $this->createYearToDate(),
            "all_time" => $this->createAllTime());

        return $data;
    }

    private function createMonthToDate()
    {
        $highOutdoorTemperature = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyHighOutdoorTemperature(),
            $this->clientRawExtra->getMonthlyHighOutdoorTemperatureDateAndTime());

        $lowOutdoorTemperature = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyLowOutdoorTemperature(),
            $this->clientRawExtra->getMonthlyLowOutdoorTemperatureDateAndTime());

        $highPressure = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyHighSurfacePressure(),
            $this->clientRawExtra->getMonthlyHighSurfacePressureDateAndTime());

        $lowPressure = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyLowSurfacePressure(),
            $this->clientRawExtra->getMonthlyLowSurfacePressureDateAndTime());

        $maximumRainfallRate = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyMaximumRainfallRate(),
            $this->clientRawExtra->getMonthlyMaximumRainfallRateDateAndTime());

        $maximumAverageWindSpeed = $this->createAlmanacWindMeasurement(
            $this->clientRawExtra->getMonthlyMaximumAverageWindSpeed(),
            $this->clientRawExtra->getMonthlyMaximumAverageWindSpeedDirection(),
            $this->clientRawExtra->getMonthlyMaximumAverageWindSpeedDateAndTime());

        $maximumGustSpeed = $this->createAlmanacWindMeasurement(
            $this->clientRawExtra->getMonthlyMaximumGustSpeed(),
            $this->clientRawExtra->getMonthlyMaximumGustSpeedDirection(),
            $this->clientRawExtra->getMonthlyMaximumGustSpeedDateAndTime());

        $highDewPoint = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyHighDewPoint(),
            $this->clientRawExtra->getMonthlyHighDewPointDateAndTime());

        $lowDewPoint = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyLowDewPoint(),
            $this->clientRawExtra->getMonthlyLowDewPointDateAndTime());

        $lowWindChill = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyLowWindChill(),
            $this->clientRawExtra->getMonthlyLowWindChillDateAndTime());

        $highHeatIndex = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyHighHeatIndex(),
            $this->clientRawExtra->getMonthlyHighHeatIndexDateAndTime());

        $highUv = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyHighUv(),
            $this->clientRawExtra->getMonthlyHighUvDateAndTime());

        $dateAndTime = $this->clientRaw->getCurrentDateAndTime();

        return array(
            "month" => $dateAndTime->getMonth(),
            "year" => $dateAndTime->getYear(),
            "temperature" => array("high" => $highOutdoorTemperature, "low" => $lowOutdoorTemperature),
            "pressure" => array("high" => $highPressure, "low" => $lowPressure),
            "rainfall" => array("max_rate_per_min" => $maximumRainfallRate),
            "wind" => array("max_avg" => $maximumAverageWindSpeed, "max_gust" => $maximumGustSpeed),
            "dew_point" => array("high" => $highDewPoint, "low" => $lowDewPoint),
            "wind_chill" => array("low" => $lowWindChill),
            "heat_index" => array("high" => $highHeatIndex),
            "uv" => array("high" => $highUv));
    }

    private function createYearToDate()
    {
        $highOutdoorTemperature = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyHighOutdoorTemperature(),
            $this->clientRawExtra->getYearlyHighOutdoorTemperatureDateAndTime());

        $lowOutdoorTemperature = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyLowOutdoorTemperature(),
            $this->clientRawExtra->getYearlyLowOutdoorTemperatureDateAndTime());

        $highPressure = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyHighSurfacePressure(),
            $this->clientRawExtra->getYearlyHighSurfacePressureDateAndTime());

        $lowPressure = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyLowSurfacePressure(),
            $this->clientRawExtra->getYearlyLowSurfacePressureDateAndTime());

        $maximumRainfallRate = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyMaximumRainfallRate(),
            $this->clientRawExtra->getYearlyMaximumRainfallRateDateAndTime());

        $maximumAverageWindSpeed = $this->createAlmanacWindMeasurement(
            $this->clientRawExtra->getYearlyMaximumAverageWindSpeed(),
            $this->clientRawExtra->getYearlyMaximumAverageWindSpeedDirection(),
            $this->clientRawExtra->getYearlyMaximumAverageWindSpeedDateAndTime());

        $maximumGustSpeed = $this->createAlmanacWindMeasurement(
            $this->clientRawExtra->getYearlyMaximumGustSpeed(),
            $this->clientRawExtra->getYearlyMaximumGustSpeedDirection(),
            $this->clientRawExtra->getYearlyMaximumGustSpeedDateAndTime());

        $highDewPoint = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyHighDewPoint(),
            $this->clientRawExtra->getYearlyHighDewPointDateAndTime());

        $lowDewPoint = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyLowDewPoint(),
            $this->clientRawExtra->getYearlyLowDewPointDateAndTime());

        $lowWindChill = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyLowWindChill(),
            $this->clientRawExtra->getYearlyLowWindChillDateAndTime());

        $highHeatIndex = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyHighHeatIndex(),
            $this->clientRawExtra->getYearlyHighHeatIndexDateAndTime());

        $highUv = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyHighUv(),
            $this->clientRawExtra->getYearlyHighUvDateAndTime());

        $dateAndTime = $this->clientRaw->getCurrentDateAndTime();

        return array(
            "year" => $dateAndTime->getYear(),
            "temperature" => array("high" => $highOutdoorTemperature, "low" => $lowOutdoorTemperature),
            "pressure" => array("high" => $highPressure, "low" => $lowPressure),
            "rainfall" => array("max_rate_per_min" => $maximumRainfallRate),
            "wind" => array("max_avg" => $maximumAverageWindSpeed, "max_gust" => $maximumGustSpeed),
            "dew_point" => array("high" => $highDewPoint, "low" => $lowDewPoint),
            "wind_chill" => array("low" => $lowWindChill),
            "heat_index" => array("high" => $highHeatIndex),
            "uv" => array("high" => $highUv));
    }

    private function createAllTime()
    {
        $highOutdoorTemperature = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeHighOutdoorTemperature(),
            $this->clientRawExtra->getAllTimeHighOutdoorTemperatureDateAndTime());

        $lowOutdoorTemperature = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeLowOutdoorTemperature(),
            $this->clientRawExtra->getAllTimeLowOutdoorTemperatureDateAndTime());

        $highPressure = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeHighSurfacePressure(),
            $this->clientRawExtra->getAllTimeHighSurfacePressureDateAndTime());

        $lowPressure = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeLowSurfacePressure(),
            $this->clientRawExtra->getAllTimeLowSurfacePressureDateAndTime());

        $maximumRainfallRate = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeMaximumRainfallRate(),
            $this->clientRawExtra->getAllTimeMaximumRainfallRateDateAndTime());

        $maximumAverageWindSpeed = $this->createAlmanacWindMeasurement(
            $this->clientRawExtra->getAllTimeMaximumAverageWindSpeed(),
            $this->clientRawExtra->getAllTimeMaximumAverageWindSpeedDirection(),
            $this->clientRawExtra->getAllTimeMaximumAverageWindSpeedDateAndTime());

        $maximumGustSpeed = $this->createAlmanacWindMeasurement(
            $this->clientRawExtra->getAllTimeMaximumGustSpeed(),
            $this->clientRawExtra->getAllTimeMaximumGustSpeedDirection(),
            $this->clientRawExtra->getAllTimeMaximumGustSpeedDateAndTime());

        $highDewPoint = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeHighDewPoint(),
            $this->clientRawExtra->getAllTimeHighDewPointDateAndTime());

        $lowDewPoint = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeLowDewPoint(),
            $this->clientRawExtra->getAllTimeLowDewPointDateAndTime());

        $lowWindChill = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeLowWindChill(),
            $this->clientRawExtra->getAllTimeLowWindChillDateAndTime());

        $highHeatIndex = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeHighHeatIndex(),
            $this->clientRawExtra->getAllTimeHighHeatIndexDateAndTime());

        $highUv = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeHighUv(),
            $this->clientRawExtra->getAllTimeHighUvDateAndTime());

        return array(
            "temperature" => array("high" => $highOutdoorTemperature, "low" => $lowOutdoorTemperature),
            "pressure" => array("high" => $highPressure, "low" => $lowPressure),
            "rainfall" => array("max_rate_per_min" => $maximumRainfallRate),
            "wind" => array("max_avg" => $maximumAverageWindSpeed, "max_gust" => $maximumGustSpeed),
            "dew_point" => array("high" => $highDewPoint, "low" => $lowDewPoint),
            "wind_chill" => array("low" => $lowWindChill),
            "heat_index" => array("high" => $highHeatIndex),
            "uv" => array("high" => $highUv));
    }

    private function createAlmanacMeasurement($measurement, $measurementTime)
    {
        $almanacMeasurement = $measurement->getAllMeasures();
        $almanacMeasurement['time'] = $measurementTime->getAllValues();

        return $almanacMeasurement;
    }

    private function createAlmanacWindMeasurement($speedMeasurement, $directionMeasurement, $measurementTime)
    {
        return array(
            "speed" => $speedMeasurement->getAllMeasures(),
            "direction" => $directionMeasurement->getAllMeasures(),
            "time" => $measurementTime->getAllValues());
    }
}

?>
