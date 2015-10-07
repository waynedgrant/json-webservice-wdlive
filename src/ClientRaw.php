<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("Altitude.php");
require_once("BaseClientRaw.php");
require_once("DateAndTime.php");
require_once("ForecastIcon.php");
require_once("Humidity.php");
require_once("Irradiance.php");
require_once("Pressure.php");
require_once("Rainfall.php");
require_once("RainfallRate.php");
require_once("Temperature.php");
require_once("Trend.php");
require_once("Uv.php");
require_once("WindDirection.php");
require_once("WindSpeed.php");

class ClientRaw extends BaseClientRaw
{
    const AVERAGE_WIND_SPEED = 1;
    const GUST_SPEED = 2;
    const WIND_DIRECTION = 3;
    const OUTDOOR_TEMPERATURE = 4;
    const OUTDOOR_HUMIDITY = 5;
	const SURFACE_PRESSURE = 6;
	const DAILY_RAINFALL = 7;
    const MONTHLY_RAINFALL = 8;
    const ANNUAL_RAINFALL = 9;
	const RAINFALL_RATE = 10;
    const DAILY_MAXIMUM_RAINFALL_RATE = 11;
    const INDOOR_TEMPERATURE = 12;
    const INDOOR_HUMIDITY = 13;
    const SOIL_TEMPERATURE = 14;
    const FORECAST_ICON = 15;
    const YESTERDAYS_RAINFALL = 19;
    const STATION_NAME = 32;
    const SOLAR_PERCENTAGE = 34;
    const WIND_CHILL = 44;
    const HUMIDEX = 45;
    const DAILY_HIGH_OUTDOOR_TEMPERATURE = 46;
    const DAILY_LOW_OUTDOOR_TEMPERATURE = 47;
	const SURFACE_PRESSURE_TREND_PER_HOUR = 50;
    const MAXIMUM_GUST_SPEED = 71;
	const DEW_POINT = 72;
    const CLOUD_FORMATION_ALTITUDE = 73;
    const DAILY_HIGH_HUMIDEX = 75;
    const DAILY_LOW_HUMIDEX = 76;
    const DAILY_HIGH_WIND_CHILL = 77;
    const DAILY_LOW_WIND_CHILL = 78;
    const UV_INDEX = 79;
    const DAILY_HIGH_HEAT_INDEX = 110;
    const DAILY_LOW_HEAT_INDEX = 111;
    const HEAT_INDEX = 112;
    const MAXIMUM_AVERAGE_WIND_SPEED = 113;
    const AVERAGE_WIND_DIRECTION = 117;
    const SOLAR_IRRADIANCE = 127;
    const DAILY_HIGH_INDOOR_TEMPERATURE = 128;
    const DAILY_LOW_INDOOR_TEMPERATURE = 129;
    const APPARENT_TEMPERATURE = 130;
    const DAILY_HIGH_SURFACE_PRESSURE = 131;
    const DAILY_LOW_SURFACE_PRESSURE = 132;
    const DAILY_HIGH_APPARENT_TEMPERATURE = 136;
    const DAILY_LOW_APPARENT_TEMPERATURE = 137;
    const DAILY_HIGH_DEW_POINT= 138;
    const DAILY_LOW_DEW_POINT = 139;
    const OUTDOOR_TEMPERATURE_TREND = 143;
	const OUTDOOR_HUMIDITY_TREND = 144;
    const HUMIDEX_TREND = 145;
    const WET_BULB_TEMPERATURE = 159;
    const LATITUDE = 160;
    const LONGITUDE = 161;
    const DAILY_HIGH_OUTDOOR_HUMIDITY = 163;
    const DAILY_LOW_OUTDOOR_HUMIDITY = 164;

    const YEAR = 141;
    const MONTH = 36;
    const DAY = 35;
    const HOUR = 29;
    const MINUTE = 30;

    public function getAverageWindSpeed()
    {
        return new WindSpeed(self::readField(self::AVERAGE_WIND_SPEED));
    }

    public function getGustSpeed()
    {
        return new WindSpeed(self::readField(self::GUST_SPEED));
    }

    public function getWindDirection()
    {
        return new WindDirection(self::readField(self::WIND_DIRECTION));
    }

    public function getOutdoorTemperature()
    {
        return new Temperature(self::readField(self::OUTDOOR_TEMPERATURE));
    }

    public function getOutdoorHumidity()
    {
        return new Humidity(self::readField(self::OUTDOOR_HUMIDITY));
    }

    public function getSurfacePressure()
    {
        return new Pressure(self::readField(self::SURFACE_PRESSURE));
    }

    public function getDailyRainfall()
    {
        return new Rainfall(self::readField(self::DAILY_RAINFALL));
    }

    public function getMonthlyRainfall()
    {
        return new Rainfall(self::readField(self::MONTHLY_RAINFALL));
    }

    public function getAnnualRainfall()
    {
        return new Rainfall(self::readField(self::ANNUAL_RAINFALL));
    }

    public function getRainfallRate()
    {
        return new RainfallRate(self::readField(self::RAINFALL_RATE));
    }

    public function getMaximumRainfallRate()
    {
        return new RainfallRate(self::readField(self::DAILY_MAXIMUM_RAINFALL_RATE));
    }

    public function getIndoorTemperature()
    {
        return new Temperature(self::readField(self::INDOOR_TEMPERATURE));
    }

    public function getIndoorHumidity()
    {
        return new Humidity(self::readField(self::INDOOR_HUMIDITY));
    }

    public function getSoilTemperature()
    {
        return new Temperature(self::readField(self::SOIL_TEMPERATURE));
    }

    public function getForecastIcon()
    {
        return new ForecastIcon(self::readField(self::FORECAST_ICON));
    }

    public function getYesterdaysRainfall()
    {
        return new Rainfall(self::readField(self::YESTERDAYS_RAINFALL));
    }

    public function getStationName()
    {
        $stationName = self::readField(self::STATION_NAME);

        if ($stationName == '-')
        {
            $stationName = null;
        }
        else
        {
            $stationName = str_replace('_', ' ', $stationName); // Unescape '_' that represent spaces
            $dashPosition = strrpos($stationName, "-"); // Remove trailing time if included in station name

            if ($dashPosition !== false)
            {
                $stationName = substr($stationName, 0, $dashPosition);
            }
        }

        return $stationName;
    }

    public function getSolarPercentage()
    {
        $solarPercentage = self::readField(self::SOLAR_PERCENTAGE);

        if ($solarPercentage == '-')
        {
            $solarPercentage = null;
        }
        else
        {
            $solarPercentage = number_format($solarPercentage, 0, '.', '');
        }

        return $solarPercentage;
    }

    public function getWindChill()
    {
        return new Temperature(self::readField(self::WIND_CHILL));
    }

    public function getHumidex()
    {
        return new Temperature(self::readField(self::HUMIDEX));
    }

    public function getDailyHighOutdoorTemperature()
    {
        $dailyHighOutdoorTemperature = new Temperature(self::readField(self::DAILY_HIGH_OUTDOOR_TEMPERATURE));
        $outdoorTemperature = self::getOutdoorTemperature();

        if (!is_null($outdoorTemperature->getCelsius()) &&
            !is_null($dailyHighOutdoorTemperature->getCelsius()) &&
            $outdoorTemperature->getCelsius() > $dailyHighOutdoorTemperature->getCelsius())
        {
            $dailyHighOutdoorTemperature = $outdoorTemperature;
        }

        return $dailyHighOutdoorTemperature;
    }

    public function getDailyLowOutdoorTemperature()
    {
        $dailyLowOutdoorTemperature = new Temperature(self::readField(self::DAILY_LOW_OUTDOOR_TEMPERATURE));
        $outdoorTemperature = self::getOutdoorTemperature();

        if (!is_null($outdoorTemperature->getCelsius()) &&
            !is_null($dailyLowOutdoorTemperature->getCelsius()) &&
            $outdoorTemperature->getCelsius() < $dailyLowOutdoorTemperature->getCelsius())
        {
            $dailyLowOutdoorTemperature = $outdoorTemperature;
        }

        return $dailyLowOutdoorTemperature;
    }

    public function getMaximumGustSpeed()
    {
        return new WindSpeed(self::readField(self::MAXIMUM_GUST_SPEED));
    }

    public function getDewPoint()
    {
        return new Temperature(self::readField(self::DEW_POINT));
    }

    public function getCloudFormationAltitude()
    {
        return new Altitude(self::readField(self::CLOUD_FORMATION_ALTITUDE));
    }

    public function getDailyHighHumidex()
    {
        $dailyHighHumidex = new Temperature(self::readField(self::DAILY_HIGH_HUMIDEX));
        $humidex = self::getHumidex();

        if (!is_null($humidex->getCelsius()) &&
            !is_null($dailyHighHumidex->getCelsius()) &&
            $humidex->getCelsius() > $dailyHighHumidex->getCelsius())
        {
            $dailyHighHumidex = $humidex;
        }

        return $dailyHighHumidex;
    }

    public function getDailyLowHumidex()
    {
        $dailyLowHumidex = new Temperature(self::readField(self::DAILY_LOW_HUMIDEX));
        $humidex = self::getHumidex();

        if (!is_null($humidex->getCelsius()) &&
            !is_null($dailyLowHumidex->getCelsius()) &&
            $humidex->getCelsius() < $dailyLowHumidex->getCelsius())
        {
            $dailyLowHumidex = $humidex;
        }

        return $dailyLowHumidex;
    }

    public function getDailyHighWindChill()
    {
        $dailyHighWindChill = new Temperature(self::readField(self::DAILY_HIGH_WIND_CHILL));
        $windChill = self::getWindChill();

        if (!is_null($windChill->getCelsius()) &&
            !is_null($dailyHighWindChill->getCelsius()) &&
            $windChill->getCelsius() > $dailyHighWindChill->getCelsius())
        {
            $dailyHighWindChill = $windChill;
        }

        return $dailyHighWindChill;
    }

    public function getDailyLowWindChill()
    {
        $dailyLowWindChill = new Temperature(self::readField(self::DAILY_LOW_WIND_CHILL));
        $windChill = self::getWindChill();

        if (!is_null($windChill->getCelsius()) &&
            !is_null($dailyLowWindChill->getCelsius()) &&
            $windChill->getCelsius() < $dailyLowWindChill->getCelsius())
        {
            $dailyLowWindChill = $windChill;
        }

        return $dailyLowWindChill;
    }

    public function getUV()
    {
        return new Uv(self::readField(self::UV_INDEX));
    }

    public function getDailyHighHeatIndex()
    {
        $dailyHighHeatIndex = new Temperature(self::readField(self::DAILY_HIGH_HEAT_INDEX));
        $heatIndex = self::getHeatIndex();

        if (!is_null($heatIndex->getCelsius()) &&
            !is_null($dailyHighHeatIndex->getCelsius()) &&
            $heatIndex->getCelsius() > $dailyHighHeatIndex->getCelsius())
        {
            $dailyHighHeatIndex = $heatIndex;
        }

        return $dailyHighHeatIndex;
    }

    public function getDailyLowHeatIndex()
    {
        $dailyLowHeatIndex = new Temperature(self::readField(self::DAILY_LOW_HEAT_INDEX));
        $heatIndex = self::getHeatIndex();

        if (!is_null($heatIndex->getCelsius()) &&
            !is_null($dailyLowHeatIndex->getCelsius()) &&
            $heatIndex->getCelsius() < $dailyLowHeatIndex->getCelsius())
        {
            $dailyLowHeatIndex = $heatIndex;
        }

        return $dailyLowHeatIndex;
    }

    public function getHeatIndex()
    {
        return new Temperature(self::readField(self::HEAT_INDEX));
    }

    public function getMaximumAverageWindSpeed()
    {
        return new WindSpeed(self::readField(self::MAXIMUM_AVERAGE_WIND_SPEED));
    }

    public function getAverageWindDirection()
    {
        return new WindDirection(self::readField(self::AVERAGE_WIND_DIRECTION));
    }

    public function getSolarIrradiance()
    {
        return new Irradiance(self::readField(self::SOLAR_IRRADIANCE));
    }

    public function getDailyHighIndoorTemperature()
    {
        $dailyHighIndoorTemperature = new Temperature(self::readField(self::DAILY_HIGH_INDOOR_TEMPERATURE));
        $indoorTemperature = self::getIndoorTemperature();

        if (!is_null($indoorTemperature->getCelsius()) &&
            !is_null($dailyHighIndoorTemperature->getCelsius()) &&
            $indoorTemperature->getCelsius() > $dailyHighIndoorTemperature->getCelsius())
        {
            $dailyHighIndoorTemperature = $indoorTemperature;
        }

        return $dailyHighIndoorTemperature;
    }

    public function getDailyLowIndoorTemperature()
    {
        $dailyLowIndoorTemperature = new Temperature(self::readField(self::DAILY_LOW_INDOOR_TEMPERATURE));
        $indoorTemperature = self::getIndoorTemperature();

        if (!is_null($indoorTemperature->getCelsius()) &&
            !is_null($dailyLowIndoorTemperature->getCelsius()) &&
            $indoorTemperature->getCelsius() < $dailyLowIndoorTemperature->getCelsius())
        {
            $dailyLowIndoorTemperature = $indoorTemperature;
        }

        return $dailyLowIndoorTemperature;
    }

    public function getApparentTemperature()
    {
        return new Temperature(self::readField(self::APPARENT_TEMPERATURE));
    }

    public function getDailyHighSurfacePressure()
    {
        $dailyHighSurfacePressure = new Pressure(self::readField(self::DAILY_HIGH_SURFACE_PRESSURE));
        $surfacePressure = self::getSurfacePressure();

        if (!is_null($surfacePressure->getHectopascals()) &&
            !is_null($dailyHighSurfacePressure->getHectopascals()) &&
            $surfacePressure->getHectopascals() > $dailyHighSurfacePressure->getHectopascals())
        {
            $dailyHighSurfacePressure = $surfacePressure;
        }

        return $dailyHighSurfacePressure;
    }

    public function getDailyLowSurfacePressure()
    {
        $dailyLowSurfacePressure = new Pressure(self::readField(self::DAILY_LOW_SURFACE_PRESSURE));
        $surfacePressure = self::getSurfacePressure();

        if (!is_null($surfacePressure->getHectopascals()) &&
            !is_null($dailyLowSurfacePressure->getHectopascals()) &&
            $surfacePressure->getHectopascals() < $dailyLowSurfacePressure->getHectopascals())
        {
            $dailyLowSurfacePressure = $surfacePressure;
        }

        return $dailyLowSurfacePressure;
    }

    public function getDailyHighApparentTemperature()
    {
        $dailyHighApparentTemperature = new Temperature(self::readField(self::DAILY_HIGH_APPARENT_TEMPERATURE));
        $apparentTemperature = self::getApparentTemperature();

        if (!is_null($apparentTemperature->getCelsius()) &&
            !is_null($dailyHighApparentTemperature->getCelsius()) &&
            $apparentTemperature->getCelsius() > $dailyHighApparentTemperature->getCelsius())
        {
            $dailyHighApparentTemperature = $apparentTemperature;
        }

        return $dailyHighApparentTemperature;
    }

    public function getDailyLowApparentTemperature()
    {
        $dailyLowApparentTemperature = new Temperature(self::readField(self::DAILY_LOW_APPARENT_TEMPERATURE));
        $apparentTemperature = self::getApparentTemperature();

        if (!is_null($apparentTemperature->getCelsius()) &&
            !is_null($dailyLowApparentTemperature->getCelsius()) &&
            $apparentTemperature->getCelsius() < $dailyLowApparentTemperature->getCelsius())
        {
            $dailyLowApparentTemperature = $apparentTemperature;
        }

        return $dailyLowApparentTemperature;
    }

    public function getDailyHighDewPoint()
    {
        $dailyHighDewPoint = new Temperature(self::readField(self::DAILY_HIGH_DEW_POINT));
        $dewPoint = self::getDewPoint();

        if (!is_null($dewPoint->getCelsius()) &&
            !is_null($dailyHighDewPoint->getCelsius()) &&
            $dewPoint->getCelsius() > $dailyHighDewPoint->getCelsius())
        {
            $dailyHighDewPoint = $dewPoint;
        }

        return $dailyHighDewPoint;
    }

    public function getDailyLowDewPoint()
    {
        $dailyLowDewPoint = new Temperature(self::readField(self::DAILY_LOW_DEW_POINT));
        $dewPoint = self::getDewPoint();

        if (!is_null($dewPoint->getCelsius()) &&
            !is_null($dailyLowDewPoint->getCelsius()) &&
            $dewPoint->getCelsius() < $dailyLowDewPoint->getCelsius())
        {
            $dailyLowDewPoint = $dewPoint;
        }

        return $dailyLowDewPoint;
    }

    public function getOutdoorTemperatureTrend()
    {
        return new Trend(self::readField(self::OUTDOOR_TEMPERATURE_TREND));
    }

    public function getOutdoorHumidityTrend()
    {
        return new Trend(self::readField(self::OUTDOOR_HUMIDITY_TREND));
    }

    public function getHumidexTrend()
    {
        return new Trend(self::readField(self::HUMIDEX_TREND));
    }

    public function getWetBulbTemperature()
    {
        return new Temperature(self::readField(self::WET_BULB_TEMPERATURE));
    }

    public function getLatitude()
    {
        $latitude = self::readField(self::LATITUDE);

        if ($latitude == '-')
        {
            $latitude = null;
        }

        return $latitude;
    }

    public function getLongitude()
    {
        $longitude = self::readField(self::LONGITUDE);

        if ($longitude == '-')
        {
            $longitude = null;
        }

        return $longitude;
    }

    public function getDailyHighOutdoorHumidity()
    {
        $dailyHighOutdoorHumidity = new Humidity(self::readField(self::DAILY_HIGH_OUTDOOR_HUMIDITY));
        $outdoorHumidity = self::getOutdoorHumidity();

        if (!is_null($outdoorHumidity->getPercentage()) &&
            !is_null($dailyHighOutdoorHumidity->getPercentage()) &&
            $outdoorHumidity->getPercentage() > $dailyHighOutdoorHumidity->getPercentage())
        {
            $dailyHighOutdoorHumidity = $outdoorHumidity;
        }

        return $dailyHighOutdoorHumidity;
    }

    public function getDailyLowOutdoorHumidity()
    {
        $dailyLowOutdoorHumidity = new Humidity(self::readField(self::DAILY_LOW_OUTDOOR_HUMIDITY));
        $outdoorHumidity = self::getOutdoorHumidity();

        if (!is_null($outdoorHumidity->getPercentage()) &&
            !is_null($dailyLowOutdoorHumidity->getPercentage()) &&
            $outdoorHumidity->getPercentage() < $dailyLowOutdoorHumidity->getPercentage())
        {
            $dailyLowOutdoorHumidity = $outdoorHumidity;
        }

        return $dailyLowOutdoorHumidity;
    }

    public function getSurfacePressureTrendPerHour()
    {
        return new Pressure(self::readField(self::SURFACE_PRESSURE_TREND_PER_HOUR));
    }

    public function getWdVersion()
    {
        $wdVersion = self::readField(self::fieldCount() - 1);

        if ($wdVersion == '-')
        {
            $wdVersion = null;
        }
        else
        {
            // Remove leading and trailing '!!' from version
            $wdVersion = str_replace('!!C', '', $wdVersion);
            $wdVersion = str_replace('!!', '', $wdVersion);
        }

        return $wdVersion;
    }

    public function getCurrentDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEAR),
            self::readField(self::MONTH),
            self::readField(self::DAY),
            self::readField(self::HOUR),
            self::readField(self::MINUTE));
    }
}

?>
