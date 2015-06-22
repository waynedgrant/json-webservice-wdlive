<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("Humidity.php");
require_once("Temperature.php");

class ClientRaw
{
	const AVERAGE_WIND_SPEED = 1;
	const GUST_SPEED = 2;
	const WIND_DIRECTION = 3;
    const INDOOR_TEMPERATURE = 12;
    const INDOOR_HUMIDITY = 13;
    const STATION_NAME = 32;
    const MAXIMUM_GUST_SPEED = 71;
    const MAXIMUM_AVERAGE_WIND_SPEED = 113;
    const AVERAGE_WIND_DIRECTION = 117;
    const LATITUDE = 160;
    const LONGITUDE = 161;

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
            // Unescape '_' that represent spaces
            $stationName = str_replace('_', ' ', $stationName);

            // Remove trailing time if included in station name
            $dashPosition = strrpos($stationName, "-");
            if ($dashPosition !== false)
            {
                $stationName = substr($stationName, 0, $dashPosition);
            }
        }

        return $stationName;
    }

    public function getMaximumGustSpeed()
    {
        return new WindSpeed(self::readField(self::MAXIMUM_GUST_SPEED));
    }

    public function getMaximumAverageWindSpeed()
    {
        return new WindSpeed(self::readField(self::MAXIMUM_AVERAGE_WIND_SPEED));
    }

    public function getAverageWindDirection()
    {
        return new WindDirection(self::readField(self::AVERAGE_WIND_DIRECTION));
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
}

?>
