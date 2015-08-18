<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("DateAndTime.php");
require_once("Humidity.php");
require_once("Pressure.php");
require_once("Temperature.php");
require_once("Trend.php");
require_once("Uv.php");
require_once("WindDirection.php");
require_once("WindSpeed.php");

class ClientRaw
{
    const AVERAGE_WIND_SPEED = 1;
    const GUST_SPEED = 2;
    const WIND_DIRECTION = 3;
    const OUTDOOR_TEMPERATURE = 4;
    const OUTDOOR_HUMIDITY = 5;
	const SURFACE_PRESSURE = 6;    

    const INDOOR_TEMPERATURE = 12;
    const INDOOR_HUMIDITY = 13;
    
    const STATION_NAME = 32;
    
    const DAILY_HIGH_OUTDOOR_TEMPERATURE = 46;
    const DAILY_LOW_OUTDOOR_TEMPERATURE = 47;
    
	const SURFACE_PRESSURE_TREND_PER_HOUR = 50;
    
    const MAXIMUM_GUST_SPEED = 71;
    
    const UV_INDEX = 79;
    
    const MAXIMUM_AVERAGE_WIND_SPEED = 113;
    
    const AVERAGE_WIND_DIRECTION = 117;
    
    const DAILY_HIGH_SURFACE_PRESSURE = 131;
    const DAILY_LOW_SURFACE_PRESSURE = 132;
    
    const OUTDOOR_TEMPERATURE_TREND = 143;
	const OUTDOOR_HUMIDITY_TREND = 144;
    
    const LATITUDE = 160;
    const LONGITUDE = 161;
    
    const DAILY_HIGH_OUTDOOR_HUMIDITY = 163;
    const DAILY_LOW_OUTDOOR_HUMIDITY = 164;

    const YEAR = 141;
    const MONTH = 36;
    const DAY = 35;
    const HOUR = 29;
    const MINUTE = 30;
    
    private $fields;

    public function __construct($path)
    {
        $this->fields = self::getFieldsFromPath($path);
    }

    private function getFieldsFromPath($path)
    {
        $fieldDelimiter = ' ';
        $fields = array();

        if (is_readable($path))
        {
            $clientRawFile = fopen($path, 'r');

            if ($clientRawFile)
            {
                $clientRawText = '';

                while (!feof($clientRawFile))
                {
                    $clientRawText .= fread($clientRawFile, 8192);
                }

                fclose($clientRawFile);

                if (strlen($clientRawText) != 0)
                {
                    $fields = explode($fieldDelimiter, trim($clientRawText));
                }
            }
        }

        return $fields;
    }

    function readField($index)
    {
        if ($index < 0 or $index >= count($this->fields))
        {
            return '-';
        }

        return trim($this->fields[$index]);
    }

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

    public function getIndoorTemperature()
    {
        return new Temperature(self::readField(self::INDOOR_TEMPERATURE));
    }

    public function getIndoorHumidity()
    {
        return new Humidity(self::readField(self::INDOOR_HUMIDITY));
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
    
    public function getUV()
    {
        return new Uv(self::readField(self::UV_INDEX));
    }

    public function getMaximumAverageWindSpeed()
    {
        return new WindSpeed(self::readField(self::MAXIMUM_AVERAGE_WIND_SPEED));
    }

    public function getAverageWindDirection()
    {
        return new WindDirection(self::readField(self::AVERAGE_WIND_DIRECTION));
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
    
    public function getOutdoorTemperatureTrend()
    {
        return new Trend(self::readField(self::OUTDOOR_TEMPERATURE_TREND));
    }
    
    public function getOutdoorHumidityTrend()
    {
        return new Trend(self::readField(self::OUTDOOR_HUMIDITY_TREND));
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
        $wdVersion = self::readField(count($this->fields) - 1);

        if ($wdVersion == '-')
        {
            $wdVersion = null;
        }
        else
        {
            // Remove leading and trailing '!!' from version
            $wdVersion = str_replace('!!', '', $wdVersion);
        }

        return $wdVersion;
    }

    public function getDateAndTime()
    {
        $year = self::readField(self::YEAR);
        $month = self::readField(self::MONTH);
        $day = self::readField(self::DAY);
        $hour = self::readField(self::HOUR);
        $minute = self::readField(self::MINUTE);

        return new DateAndTime($year, $month, $day, $hour, $minute, $second);
    }
}

?>