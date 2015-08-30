<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("BaseClientRaw.php");
require_once("DateAndTime.php");
require_once("Pressure.php");
require_once("RainfallRate.php");
require_once("Temperature.php");
require_once("WindDirection.php");
require_once("WindSpeed.php");

class ClientRawExtra extends BaseClientRaw
{
    const MONTHLY_HIGH_OUTDOOR_TEMPERATURE = 61;
    const MONTHLY_HIGH_OUTDOOR_TEMPERATURE_HOUR = 62;
    const MONTHLY_HIGH_OUTDOOR_TEMPERATURE_MINUTE = 63;
    const MONTHLY_HIGH_OUTDOOR_TEMPERATURE_DAY = 64;
    const MONTHLY_HIGH_OUTDOOR_TEMPERATURE_MONTH = 65;
    const MONTHLY_HIGH_OUTDOOR_TEMPERATURE_YEAR = 66;
    const MONTHLY_LOW_OUTDOOR_TEMPERATURE = 67;
    const MONTHLY_LOW_OUTDOOR_TEMPERATURE_HOUR = 68;
    const MONTHLY_LOW_OUTDOOR_TEMPERATURE_MINUTE = 69;
    const MONTHLY_LOW_OUTDOOR_TEMPERATURE_DAY = 70;
    const MONTHLY_LOW_OUTDOOR_TEMPERATURE_MONTH = 71;
    const MONTHLY_LOW_OUTDOOR_TEMPERATURE_YEAR = 72;

    const MONTHLY_MAXIMUM_RAINFALL_RATE = 79;
    const MONTHLY_MAXIMUM_RAINFALL_RATE_HOUR = 80;
    const MONTHLY_MAXIMUM_RAINFALL_RATE_MINUTE = 81;
    const MONTHLY_MAXIMUM_RAINFALL_RATE_DAY = 82;
    const MONTHLY_MAXIMUM_RAINFALL_RATE_MONTH = 83;
    const MONTHLY_MAXIMUM_RAINFALL_RATE_YEAR = 84;

    const MONTHLY_LOW_SURFACE_PRESSURE = 85;
    const MONTHLY_LOW_SURFACE_PRESSURE_HOUR = 86;
    const MONTHLY_LOW_SURFACE_PRESSURE_MINUTE = 87;
    const MONTHLY_LOW_SURFACE_PRESSURE_DAY = 88;
    const MONTHLY_LOW_SURFACE_PRESSURE_MONTH = 89;
    const MONTHLY_LOW_SURFACE_PRESSURE_YEAR = 90;
    const MONTHLY_HIGH_SURFACE_PRESSURE = 91;
    const MONTHLY_HIGH_SURFACE_PRESSURE_HOUR = 92;
    const MONTHLY_HIGH_SURFACE_PRESSURE_MINUTE = 93;
    const MONTHLY_HIGH_SURFACE_PRESSURE_DAY = 94;
    const MONTHLY_HIGH_SURFACE_PRESSURE_MONTH = 95;
    const MONTHLY_HIGH_SURFACE_PRESSURE_YEAR = 96;

    const MONTHLY_MAXIMUM_GUST_SPEED = 73;
    const MONTHLY_MAXIMUM_GUST_SPEED_HOUR = 74;
    const MONTHLY_MAXIMUM_GUST_SPEED_MINUTE = 75;
    const MONTHLY_MAXIMUM_GUST_SPEED_DAY = 76;
    const MONTHLY_MAXIMUM_GUST_SPEED_MONTH = 77;
    const MONTHLY_MAXIMUM_GUST_SPEED_YEAR = 78;

    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED = 109;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_HOUR = 110;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_MINUTE = 111;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_DAY = 112;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_MONTH = 113;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_YEAR = 114;

    const MONTHLY_LOW_WIND_CHILL = 133;
    const MONTHLY_LOW_WIND_CHILL_HOUR = 134;
    const MONTHLY_LOW_WIND_CHILL_MINUTE = 135;
    const MONTHLY_LOW_WIND_CHILL_DAY = 136;
    const MONTHLY_LOW_WIND_CHILL_MONTH = 137;
    const MONTHLY_LOW_WIND_CHILL_YEAR = 138;
    const MONTHLY_MAXIMUM_GUST_SPEED_DIRECTION = 139;

    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION = 145;

    const MONTHLY_HIGH_HEAT_INDEX = 175;
    const MONTHLY_HIGH_HEAT_INDEX_HOUR = 176;
    const MONTHLY_HIGH_HEAT_INDEX_MINUTE = 177;
    const MONTHLY_HIGH_HEAT_INDEX_DAY = 178;
    const MONTHLY_HIGH_HEAT_INDEX_MONTH = 179;
    const MONTHLY_HIGH_HEAT_INDEX_YEAR = 180;

    const MONTHLY_HIGH_DEW_POINT = 729;
    const MONTHLY_HIGH_DEW_POINT_HOUR = 730;
    const MONTHLY_HIGH_DEW_POINT_MINUTE = 731;
    const MONTHLY_HIGH_DEW_POINT_DAY = 732;
    const MONTHLY_HIGH_DEW_POINT_MONTH = 733;
    const MONTHLY_HIGH_DEW_POINT_YEAR = 734;
    const MONTHLY_LOW_DEW_POINT = 735;
    const MONTHLY_LOW_DEW_POINT_HOUR = 736;
    const MONTHLY_LOW_DEW_POINT_MINUTE = 737;
    const MONTHLY_LOW_DEW_POINT_DAY = 738;
    const MONTHLY_LOW_DEW_POINT_MONTH = 739;
    const MONTHLY_LOW_DEW_POINT_YEAR = 740;

    public function getMonthlyHighOutdoorTemperature()
    {
        return new Temperature(self::readField(self::MONTHLY_HIGH_OUTDOOR_TEMPERATURE));
    }

    public function getMonthlyHighOutdoorTemperatureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_HIGH_OUTDOOR_TEMPERATURE_YEAR),
            self::readField(self::MONTHLY_HIGH_OUTDOOR_TEMPERATURE_MONTH),
            self::readField(self::MONTHLY_HIGH_OUTDOOR_TEMPERATURE_DAY),
            self::readField(self::MONTHLY_HIGH_OUTDOOR_TEMPERATURE_HOUR),
            self::readField(self::MONTHLY_HIGH_OUTDOOR_TEMPERATURE_MINUTE));
    }

    public function getMonthlyLowOutdoorTemperature()
    {
        return new Temperature(self::readField(self::MONTHLY_LOW_OUTDOOR_TEMPERATURE));
    }

    public function getMonthlyLowOutdoorTemperatureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_LOW_OUTDOOR_TEMPERATURE_YEAR),
            self::readField(self::MONTHLY_LOW_OUTDOOR_TEMPERATURE_MONTH),
            self::readField(self::MONTHLY_LOW_OUTDOOR_TEMPERATURE_DAY),
            self::readField(self::MONTHLY_LOW_OUTDOOR_TEMPERATURE_HOUR),
            self::readField(self::MONTHLY_LOW_OUTDOOR_TEMPERATURE_MINUTE));
    }

    public function getMonthlyMaximumRainfallRate()
    {
        return new RainfallRate(self::readField(self::MONTHLY_MAXIMUM_RAINFALL_RATE));
    }

    public function getMonthlyMaximumRainfallRateDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_MAXIMUM_RAINFALL_RATE_YEAR),
            self::readField(self::MONTHLY_MAXIMUM_RAINFALL_RATE_MONTH),
            self::readField(self::MONTHLY_MAXIMUM_RAINFALL_RATE_DAY),
            self::readField(self::MONTHLY_MAXIMUM_RAINFALL_RATE_HOUR),
            self::readField(self::MONTHLY_MAXIMUM_RAINFALL_RATE_MINUTE));
    }

    public function getMonthlyLowSurfacePressure()
    {
        return new Pressure(self::readField(self::MONTHLY_LOW_SURFACE_PRESSURE));
    }

    public function getMonthlyLowSurfacePressureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_LOW_SURFACE_PRESSURE_YEAR),
            self::readField(self::MONTHLY_LOW_SURFACE_PRESSURE_MONTH),
            self::readField(self::MONTHLY_LOW_SURFACE_PRESSURE_DAY),
            self::readField(self::MONTHLY_LOW_SURFACE_PRESSURE_HOUR),
            self::readField(self::MONTHLY_LOW_SURFACE_PRESSURE_MINUTE));
    }

    public function getMonthlyHighSurfacePressure()
    {
        return new Pressure(self::readField(self::MONTHLY_HIGH_SURFACE_PRESSURE));
    }

    public function getMonthlyHighSurfacePressureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_HIGH_SURFACE_PRESSURE_YEAR),
            self::readField(self::MONTHLY_HIGH_SURFACE_PRESSURE_MONTH),
            self::readField(self::MONTHLY_HIGH_SURFACE_PRESSURE_DAY),
            self::readField(self::MONTHLY_HIGH_SURFACE_PRESSURE_HOUR),
            self::readField(self::MONTHLY_HIGH_SURFACE_PRESSURE_MINUTE));
    }

    public function getMonthlyMaximumGustSpeed()
    {
        return new WindSpeed(self::readField(self::MONTHLY_MAXIMUM_GUST_SPEED));
    }

    public function getMonthlyMaximumGustSpeedDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_MAXIMUM_GUST_SPEED_YEAR),
            self::readField(self::MONTHLY_MAXIMUM_GUST_SPEED_MONTH),
            self::readField(self::MONTHLY_MAXIMUM_GUST_SPEED_DAY),
            self::readField(self::MONTHLY_MAXIMUM_GUST_SPEED_HOUR),
            self::readField(self::MONTHLY_MAXIMUM_GUST_SPEED_MINUTE));
    }

    public function getMonthlyMaximumAverageWindSpeed()
    {
        return new WindSpeed(self::readField(self::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED));
    }

    public function getMonthlyMaximumAverageWindSpeedDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_YEAR),
            self::readField(self::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_MONTH),
            self::readField(self::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_DAY),
            self::readField(self::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_HOUR),
            self::readField(self::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_MINUTE));
    }

    public function getMonthlyLowWindChill()
    {
        return new Temperature(self::readField(self::MONTHLY_LOW_WIND_CHILL));
    }

    public function getMonthlyLowWindChillDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_LOW_WIND_CHILL_YEAR),
            self::readField(self::MONTHLY_LOW_WIND_CHILL_MONTH),
            self::readField(self::MONTHLY_LOW_WIND_CHILL_DAY),
            self::readField(self::MONTHLY_LOW_WIND_CHILL_HOUR),
            self::readField(self::MONTHLY_LOW_WIND_CHILL_MINUTE));
    }

    public function getMonthlyMaximumGustSpeedDirection()
    {
        return new WindDirection(self::readField(self::MONTHLY_MAXIMUM_GUST_SPEED_DIRECTION));
    }

    public function getMonthlyMaximumAverageWindSpeedDirection()
    {
        return new WindDirection(self::readField(self::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION));
    }

    public function getMonthlyHighHeatIndex()
    {
        return new Temperature(self::readField(self::MONTHLY_HIGH_HEAT_INDEX));
    }

    public function getMonthlyHighHeatIndexDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_HIGH_HEAT_INDEX_YEAR),
            self::readField(self::MONTHLY_HIGH_HEAT_INDEX_MONTH),
            self::readField(self::MONTHLY_HIGH_HEAT_INDEX_DAY),
            self::readField(self::MONTHLY_HIGH_HEAT_INDEX_HOUR),
            self::readField(self::MONTHLY_HIGH_HEAT_INDEX_MINUTE));
    }

    public function getMonthlyHighDewPoint()
    {
        return new Temperature(self::readField(self::MONTHLY_HIGH_DEW_POINT));
    }

    public function getMonthlyHighDewPointDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_HIGH_DEW_POINT_YEAR),
            self::readField(self::MONTHLY_HIGH_DEW_POINT_MONTH),
            self::readField(self::MONTHLY_HIGH_DEW_POINT_DAY),
            self::readField(self::MONTHLY_HIGH_DEW_POINT_HOUR),
            self::readField(self::MONTHLY_HIGH_DEW_POINT_MINUTE));
    }

    public function getMonthlyLowDewPoint()
    {
        return new Temperature(self::readField(self::MONTHLY_LOW_DEW_POINT));
    }

    public function getMonthlyLowDewPointDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_LOW_DEW_POINT_YEAR),
            self::readField(self::MONTHLY_LOW_DEW_POINT_MONTH),
            self::readField(self::MONTHLY_LOW_DEW_POINT_DAY),
            self::readField(self::MONTHLY_LOW_DEW_POINT_HOUR),
            self::readField(self::MONTHLY_LOW_DEW_POINT_MINUTE));
    }
}

?>
