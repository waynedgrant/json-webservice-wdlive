<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class ClientRaw
{
	const AVERAGE_WIND_SPEED = 1;
	const GUST_SPEED = 2;
	const WIND_DIRECTION = 3;
    const MAXIMUM_GUST_SPEED = 71;
    const MAXIMUM_AVERAGE_WIND_SPEED = 113;
    const AVERAGE_WIND_DIRECTION = 117;

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
                $fields = explode($fieldDelimiter, trim($clientRawText));
            }
        }

        return $fields;
    }

    function readField($index)
    {
        if ($index >= count($this->fields))
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
}

?>
