<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("BaseSource.php");

class AlmanacSource extends BaseSource {

    public function __construct($clientRaw, $clientRawExtra) {
        parent::__construct($clientRaw, $clientRawExtra);
    }

    public function create() {
        $data = $this->createBase();

        $data["almanac"] = array(
            "month_to_date" => $this->createMonthToDate(),
            "year_to_date" => $this->createYearToDate(),
            "all_time" => $this->createAllTime());

        return $data;
    }

    private function createMonthToDate() {
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

        $highestDailyRainfall = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyHighestDailyRainfall(),
            $this->clientRawExtra->getMonthlyHighestDailyRainfallDateAndTime());

        $highestDailyRainfallInAnHour = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyHighestRainfallInAnHour(),
            $this->clientRawExtra->getMonthlyHighestRainfallInAnHourDateAndTime());

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

        $highSoilTemperature = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyHighSoilTemperature(),
            $this->clientRawExtra->getMonthlyHighSoilTemperatureDateAndTime());

        $lowSoilTemperature = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyLowSoilTemperature(),
            $this->clientRawExtra->getMonthlyLowSoilTemperatureDateAndTime());

        $warmestDay = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyWarmestDay(),
            $this->clientRawExtra->getMonthlyWarmestDayDateAndTime());

        $warmestNight = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyWarmestNight(),
            $this->clientRawExtra->getMonthlyWarmestNightDateAndTime());

        $coldestDay = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyColdestDay(),
            $this->clientRawExtra->getMonthlyColdestDayDateAndTime());

        $coldestNight = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyColdestNight(),
            $this->clientRawExtra->getMonthlyColdestNightDateAndTime());

        $highSolar = $this->createAlmanacSolarIrradianceMeasurement(
            $this->clientRawExtra->getMonthlyHighSolarIrradiance(),
            $this->clientRawExtra->getMonthlyHighSolarIrradianceDateAndTime());

        $highUv = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getMonthlyHighUv(),
            $this->clientRawExtra->getMonthlyHighUvDateAndTime());

        $dateAndTime = $this->clientRaw->getCurrentDateAndTime();

        return array(
            "month" => $dateAndTime->getMonth(),
            "year" => $dateAndTime->getYear(),
            "temperature" => array("high" => $highOutdoorTemperature, "low" => $lowOutdoorTemperature),
            "pressure" => array("high" => $highPressure, "low" => $lowPressure),
            "rainfall" => array("max_rate_per_min" => $maximumRainfallRate, "high_daily_rainfall" => $highestDailyRainfall, "high_rainfall_1hr" => $highestDailyRainfallInAnHour),
            "wind" => array("max_avg" => $maximumAverageWindSpeed, "max_gust" => $maximumGustSpeed),
            "dew_point" => array("high" => $highDewPoint, "low" => $lowDewPoint),
            "wind_chill" => array("low" => $lowWindChill),
            "heat_index" => array("high" => $highHeatIndex),
            "soil_temperature" => array("high" => $highSoilTemperature, "low" => $lowSoilTemperature),
            "warmest" => array("day" => $warmestDay, "night" => $warmestNight),
            "coldest" => array("day" => $coldestDay, "night" => $coldestNight),
            "solar" => array("high" => $highSolar),
            "uv" => array("high" => $highUv));
    }

    private function createYearToDate() {
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

        $highestDailyRainfall = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyHighestDailyRainfall(),
            $this->clientRawExtra->getYearlyHighestDailyRainfallDateAndTime());

        $highestDailyRainfallInAnHour = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyHighestRainfallInAnHour(),
            $this->clientRawExtra->getYearlyHighestRainfallInAnHourDateAndTime());

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

        $highSoilTemperature = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyHighSoilTemperature(),
            $this->clientRawExtra->getYearlyHighSoilTemperatureDateAndTime());

        $lowSoilTemperature = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyLowSoilTemperature(),
            $this->clientRawExtra->getYearlyLowSoilTemperatureDateAndTime());

        $warmestDay = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyWarmestDay(),
            $this->clientRawExtra->getYearlyWarmestDayDateAndTime());

        $warmestNight = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyWarmestNight(),
            $this->clientRawExtra->getYearlyWarmestNightDateAndTime());

        $coldestDay = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyColdestDay(),
            $this->clientRawExtra->getYearlyColdestDayDateAndTime());

        $coldestNight = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyColdestNight(),
            $this->clientRawExtra->getYearlyColdestNightDateAndTime());

        $highSolar = $this->createAlmanacSolarIrradianceMeasurement(
            $this->clientRawExtra->getYearlyHighSolarIrradiance(),
            $this->clientRawExtra->getYearlyHighSolarIrradianceDateAndTime());

        $highUv = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getYearlyHighUv(),
            $this->clientRawExtra->getYearlyHighUvDateAndTime());

        $dateAndTime = $this->clientRaw->getCurrentDateAndTime();

        return array(
            "year" => $dateAndTime->getYear(),
            "temperature" => array("high" => $highOutdoorTemperature, "low" => $lowOutdoorTemperature),
            "pressure" => array("high" => $highPressure, "low" => $lowPressure),
            "rainfall" => array("max_rate_per_min" => $maximumRainfallRate, "high_daily_rainfall" => $highestDailyRainfall, "high_rainfall_1hr" => $highestDailyRainfallInAnHour),
            "wind" => array("max_avg" => $maximumAverageWindSpeed, "max_gust" => $maximumGustSpeed),
            "dew_point" => array("high" => $highDewPoint, "low" => $lowDewPoint),
            "wind_chill" => array("low" => $lowWindChill),
            "heat_index" => array("high" => $highHeatIndex),
            "soil_temperature" => array("high" => $highSoilTemperature, "low" => $lowSoilTemperature),
            "warmest" => array("day" => $warmestDay, "night" => $warmestNight),
            "coldest" => array("day" => $coldestDay, "night" => $coldestNight),
            "solar" => array("high" => $highSolar),
            "uv" => array("high" => $highUv));
    }

    private function createAllTime() {
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

        $highestDailyRainfall = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeHighestDailyRainfall(),
            $this->clientRawExtra->getAllTimeHighestDailyRainfallDateAndTime());

        $highestDailyRainfallInAnHour = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeHighestRainfallInAnHour(),
            $this->clientRawExtra->getAllTimeHighestRainfallInAnHourDateAndTime());

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

        $highSoilTemperature = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeHighSoilTemperature(),
            $this->clientRawExtra->getAllTimeHighSoilTemperatureDateAndTime());

        $lowSoilTemperature = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeLowSoilTemperature(),
            $this->clientRawExtra->getAllTimeLowSoilTemperatureDateAndTime());

        $warmestDay = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeWarmestDay(),
            $this->clientRawExtra->getAllTimeWarmestDayDateAndTime());

        $warmestNight = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeWarmestNight(),
            $this->clientRawExtra->getAllTimeWarmestNightDateAndTime());

        $coldestDay = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeColdestDay(),
            $this->clientRawExtra->getAllTimeColdestDayDateAndTime());

        $coldestNight = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeColdestNight(),
            $this->clientRawExtra->getAllTimeColdestNightDateAndTime());

        $highSolar = $this->createAlmanacSolarIrradianceMeasurement(
            $this->clientRawExtra->getAllTimeHighSolarIrradiance(),
            $this->clientRawExtra->getAllTimeHighSolarIrradianceDateAndTime());

        $highUv = $this->createAlmanacMeasurement(
            $this->clientRawExtra->getAllTimeHighUv(),
            $this->clientRawExtra->getAllTimeHighUvDateAndTime());

        return array(
            "temperature" => array("high" => $highOutdoorTemperature, "low" => $lowOutdoorTemperature),
            "pressure" => array("high" => $highPressure, "low" => $lowPressure),
            "rainfall" => array("max_rate_per_min" => $maximumRainfallRate, "high_daily_rainfall" => $highestDailyRainfall, "high_rainfall_1hr" => $highestDailyRainfallInAnHour),
            "wind" => array("max_avg" => $maximumAverageWindSpeed, "max_gust" => $maximumGustSpeed),
            "dew_point" => array("high" => $highDewPoint, "low" => $lowDewPoint),
            "wind_chill" => array("low" => $lowWindChill),
            "heat_index" => array("high" => $highHeatIndex),
            "soil_temperature" => array("high" => $highSoilTemperature, "low" => $lowSoilTemperature),
            "warmest" => array("day" => $warmestDay, "night" => $warmestNight),
            "coldest" => array("day" => $coldestDay, "night" => $coldestNight),
            "solar" => array("high" => $highSolar),
            "uv" => array("high" => $highUv));
    }

    private function createAlmanacMeasurement($measurement, $measurementTime) {
        $almanacMeasurement = $measurement->getAllMeasures();
        $almanacMeasurement['time'] = $measurementTime->getAllValues();

        return $almanacMeasurement;
    }

    private function createAlmanacWindMeasurement($speedMeasurement, $directionMeasurement, $measurementTime) {
        return array(
            "speed" => $speedMeasurement->getAllMeasures(),
            "direction" => $directionMeasurement->getAllMeasures(),
            "time" => $measurementTime->getAllValues());
    }

    private function createAlmanacSolarIrradianceMeasurement($solarIrradianceMeasurement, $measurementTime) {
        return array(
            "irradiance" => $solarIrradianceMeasurement->getAllMeasures(),
            "time" => $measurementTime->getAllValues());
    }
}

?>
