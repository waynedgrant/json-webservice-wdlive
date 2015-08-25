<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("BaseClientRaw.php");
require_once("DateAndTime.php");
require_once("Temperature.php");

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

    const MONTHLY_MAX_RAINFALL_RATE_PER_MINUTE = 79;
    const MONTHLY_MAX_RAINFALL_RATE_PER_MINUTE_HOUR = 80;
    const MONTHLY_MAX_RAINFALL_RATE_PER_MINUTE_MINUTE = 81;
    const MONTHLY_MAX_RAINFALL_RATE_PER_MINUTE_DAY = 82;
    const MONTHLY_MAX_RAINFALL_RATE_PER_MINUTE_MONTH = 83;
    const MONTHLY_MAX_RAINFALL_RATE_PER_MINUTE_YEAR = 84;

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

    public function getMonthlyMaxRainfallRatePerMinute()
    {
        return new RainfallRate(self::readField(self::MONTHLY_MAX_RAINFALL_RATE_PER_MINUTE));
    }

    public function getMonthlyMaxRainfallRatePerMinuteDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_MAX_RAINFALL_RATE_PER_MINUTE_YEAR),
            self::readField(self::MONTHLY_MAX_RAINFALL_RATE_PER_MINUTE_MONTH),
            self::readField(self::MONTHLY_MAX_RAINFALL_RATE_PER_MINUTE_DAY),
            self::readField(self::MONTHLY_MAX_RAINFALL_RATE_PER_MINUTE_HOUR),
            self::readField(self::MONTHLY_MAX_RAINFALL_RATE_PER_MINUTE_MINUTE));
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
}

?>
