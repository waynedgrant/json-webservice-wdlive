<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("ClientRawFileGenerator.php");

class ClientRawExtraTest extends PHPUnit_Framework_TestCase
{
    const CLIENT_RAW_EXTRA_PATH = "./clientrawextra.txt";

    private static $generator;

    public static function setUpBeforeClass()
    {
        self::$generator = new ClientRawFileGenerator(self::CLIENT_RAW_EXTRA_PATH);
    }

    protected function tearDown()
    {
        self::$generator->delete();
    }

    private function createEmptyClientRawExtra()
    {
        self::$generator->generateEmpty();
        return new ClientRawExtra(self::CLIENT_RAW_EXTRA_PATH);
    }

    private function createClientRawExtraWithField($field)
    {
        self::$generator->generateWithField($field);
        return new ClientRawExtra(self::CLIENT_RAW_EXTRA_PATH);
    }

    private function createClientRawExtraWithFields($fields)
    {
        self::$generator->generateWithFields($fields);
        return new ClientRawExtra(self::CLIENT_RAW_EXTRA_PATH);
    }

    public function test_get_monthly_high_outdoor_temperature()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_HIGH_OUTDOOR_TEMPERATURE, "25.2"));
        $this->assertSame("25.2", $testee->getMonthlyHighOutdoorTemperature()->getCelsius());
    }

    public function test_get_monthly_high_outdoor_temperature_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_HIGH_OUTDOOR_TEMPERATURE_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_HIGH_OUTDOOR_TEMPERATURE_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_HIGH_OUTDOOR_TEMPERATURE_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_HIGH_OUTDOOR_TEMPERATURE_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_HIGH_OUTDOOR_TEMPERATURE_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyHighOutdoorTemperatureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_low_outdoor_temperature()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_LOW_OUTDOOR_TEMPERATURE, "-5.1"));
        $this->assertSame("-5.1", $testee->getMonthlyLowOutdoorTemperature()->getCelsius());
    }

    public function test_get_monthly_low_outdoor_temperature_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_LOW_OUTDOOR_TEMPERATURE_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_LOW_OUTDOOR_TEMPERATURE_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_LOW_OUTDOOR_TEMPERATURE_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_LOW_OUTDOOR_TEMPERATURE_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_LOW_OUTDOOR_TEMPERATURE_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyLowOutdoorTemperatureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_maximum_gust_speed()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_MAXIMUM_GUST_SPEED, "30.7"));
        $this->assertSame("30.7", $testee->getMonthlyMaximumGustSpeed()->getKnots());
    }

    public function test_get_monthly_maximum_gust_speed_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_GUST_SPEED_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_GUST_SPEED_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_GUST_SPEED_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_GUST_SPEED_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_GUST_SPEED_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyMaximumGustSpeedDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_maximum_rainfall_rate()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_MAXIMUM_RAINFALL_RATE, "2.06"));
        $this->assertSame("2.06", $testee->getMonthlyMaximumRainfallRate()->getMillimetresPerMinute());
    }

    public function test_get_monthly_maximum_rainfall_rate_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_RAINFALL_RATE_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_RAINFALL_RATE_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_RAINFALL_RATE_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_RAINFALL_RATE_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_RAINFALL_RATE_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyMaximumRainfallRateDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_low_surface_pressure()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_LOW_SURFACE_PRESSURE, "1001.5"));
        $this->assertSame("1001.5", $testee->getMonthlyLowSurfacePressure()->getHectopascals());
    }

    public function test_get_monthly_low_surface_pressure_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_LOW_SURFACE_PRESSURE_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_LOW_SURFACE_PRESSURE_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_LOW_SURFACE_PRESSURE_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_LOW_SURFACE_PRESSURE_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_LOW_SURFACE_PRESSURE_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyLowSurfacePressureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_high_surface_pressure()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_HIGH_SURFACE_PRESSURE, "1017.6"));
        $this->assertSame("1017.6", $testee->getMonthlyHighSurfacePressure()->getHectopascals());
    }

    public function test_get_monthly_high_surface_pressure_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_HIGH_SURFACE_PRESSURE_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_HIGH_SURFACE_PRESSURE_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_HIGH_SURFACE_PRESSURE_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_HIGH_SURFACE_PRESSURE_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_HIGH_SURFACE_PRESSURE_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyHighSurfacePressureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_highest_daily_rainfall()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_HIGHEST_DAILY_RAINFALL, "10.56"));
        $this->assertSame("10.56", $testee->getMonthlyHighestDailyRainfall()->getMillimetres());
    }

    public function test_get_monthly_highest_daily_rainfall_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_HIGHEST_DAILY_RAINFALL_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_HIGHEST_DAILY_RAINFALL_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_HIGHEST_DAILY_RAINFALL_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_HIGHEST_DAILY_RAINFALL_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_HIGHEST_DAILY_RAINFALL_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyHighestDailyRainfallDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_highest_rainfall_in_an_hour()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR, "3.41"));
        $this->assertSame("3.41", $testee->getMonthlyHighestRainfallInAnHour()->getMillimetres());
    }

    public function test_get_monthly_highest_rainfall_in_an_hour_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyHighestRainfallInAnHourDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_maximum_average_wind_speed()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED, "26.4"));
        $this->assertSame("26.4", $testee->getMonthlyMaximumAverageWindSpeed()->getKnots());
    }

    public function test_get_monthly_maximum_average_wind_speed_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyMaximumAverageWindSpeedDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_high_soil_temperature()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_HIGH_SOIL_TEMPERATURE, "17.9"));
        $this->assertSame("17.9", $testee->getMonthlyHighSoilTemperature()->getCelsius());
    }

    public function test_get_monthly_high_soil_temperature_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_HIGH_SOIL_TEMPERATURE_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_HIGH_SOIL_TEMPERATURE_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_HIGH_SOIL_TEMPERATURE_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_HIGH_SOIL_TEMPERATURE_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_HIGH_SOIL_TEMPERATURE_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyHighSoilTemperatureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_low_soil_temperature()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_LOW_SOIL_TEMPERATURE, "-7.2"));
        $this->assertSame("-7.2", $testee->getMonthlyLowSoilTemperature()->getCelsius());
    }

    public function test_get_monthly_low_soil_temperature_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_LOW_SOIL_TEMPERATURE_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_LOW_SOIL_TEMPERATURE_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_LOW_SOIL_TEMPERATURE_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_LOW_SOIL_TEMPERATURE_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_LOW_SOIL_TEMPERATURE_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyLowSoilTemperatureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_low_wind_chill()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_LOW_WIND_CHILL, "-17.9"));
        $this->assertSame("-17.9", $testee->getMonthlyLowWindChill()->getCelsius());
    }

    public function test_get_monthly_low_wind_chill_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_LOW_WIND_CHILL_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_LOW_WIND_CHILL_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_LOW_WIND_CHILL_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_LOW_WIND_CHILL_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_LOW_WIND_CHILL_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyLowWindChillDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_maximum_gust_speed_direction()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_MAXIMUM_GUST_SPEED_DIRECTION, "90"));
        $this->assertSame("90", $testee->getMonthlyMaximumGustSpeedDirection()->getCompassDegrees());
    }

    public function test_get_monthly_maximum_average_wind_speed_direction()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION, "180"));
        $this->assertSame("180", $testee->getMonthlyMaximumAverageWindSpeedDirection()->getCompassDegrees());
    }

    public function test_get_monthly_warmest_day()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_WARMEST_DAY, "25.2"));
        $this->assertSame("25.2", $testee->getMonthlyWarmestDay()->getCelsius());
    }

    public function test_get_monthly_warmest_day_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_WARMEST_DAY_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_WARMEST_DAY_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_WARMEST_DAY_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_WARMEST_DAY_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_WARMEST_DAY_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyWarmestDayDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_coldest_night()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_COLDEST_NIGHT, "5.1"));
        $this->assertSame("5.1", $testee->getMonthlyColdestNight()->getCelsius());
    }

    public function test_get_monthly_coldest_night_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_COLDEST_NIGHT_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_COLDEST_NIGHT_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_COLDEST_NIGHT_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_COLDEST_NIGHT_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_COLDEST_NIGHT_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyColdestNightDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_coldest_day()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_COLDEST_DAY, "1.3"));
        $this->assertSame("1.3", $testee->getMonthlyColdestDay()->getCelsius());
    }

    public function test_get_monthly_coldest_day_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_COLDEST_DAY_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_COLDEST_DAY_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_COLDEST_DAY_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_COLDEST_DAY_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_COLDEST_DAY_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyColdestDayDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_warmest_night()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_WARMEST_NIGHT, "25.3"));
        $this->assertSame("25.3", $testee->getMonthlyWarmestNight()->getCelsius());
    }

    public function test_get_monthly_warmest_night_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_WARMEST_NIGHT_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_WARMEST_NIGHT_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_WARMEST_NIGHT_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_WARMEST_NIGHT_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_WARMEST_NIGHT_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyWarmestNightDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_high_heat_index()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_HIGH_HEAT_INDEX, "35.7"));
        $this->assertSame("35.7", $testee->getMonthlyHighHeatIndex()->getCelsius());
    }

    public function test_get_monthly_high_heat_index_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_HIGH_HEAT_INDEX_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_HIGH_HEAT_INDEX_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_HIGH_HEAT_INDEX_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_HIGH_HEAT_INDEX_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_HIGH_HEAT_INDEX_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyHighHeatIndexDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_high_solar_irradiance()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_HIGH_SOLAR_IRRADIANCE, "817"));
        $this->assertSame("817", $testee->getMonthlyHighSolarIrradiance()->getWattsPerSquareMetre());
    }

    public function test_get_monthly_high_solar_irradiance_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_HIGH_SOLAR_IRRADIANCE_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_HIGH_SOLAR_IRRADIANCE_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_HIGH_SOLAR_IRRADIANCE_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_HIGH_SOLAR_IRRADIANCE_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_HIGH_SOLAR_IRRADIANCE_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyHighSolarIrradianceDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_high_uv()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_HIGH_UV, "9.4"));
        $this->assertSame("9.4", $testee->getMonthlyHighUv()->getUvi());
    }

    public function test_get_monthly_high_uv_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_HIGH_UV_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_HIGH_UV_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_HIGH_UV_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_HIGH_UV_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_HIGH_UV_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyHighUvDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_high_dew_point()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_HIGH_DEW_POINT, "22.1"));
        $this->assertSame("22.1", $testee->getMonthlyHighDewPoint()->getCelsius());
    }

    public function test_get_monthly_high_dew_point_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_HIGH_DEW_POINT_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_HIGH_DEW_POINT_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_HIGH_DEW_POINT_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_HIGH_DEW_POINT_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_HIGH_DEW_POINT_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyHighDewPointDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_monthly_low_dew_point()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_LOW_DEW_POINT, "1.3"));
        $this->assertSame("1.3", $testee->getMonthlyLowDewPoint()->getCelsius());
    }

    public function test_get_monthly_low_dew_point_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::MONTHLY_LOW_DEW_POINT_YEAR, "2015"),
                new Field(ClientRawExtra::MONTHLY_LOW_DEW_POINT_MONTH, "12"),
                new Field(ClientRawExtra::MONTHLY_LOW_DEW_POINT_DAY, "31"),
                new Field(ClientRawExtra::MONTHLY_LOW_DEW_POINT_HOUR, "23"),
                new Field(ClientRawExtra::MONTHLY_LOW_DEW_POINT_MINUTE, "59")));

        $dateAndTime = $testee->getMonthlyLowDewPointDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_when_monthly_fields_are_missing()
    {
        $testee = self::createEmptyClientRawExtra();

        $this->assertNull($testee->getMonthlyHighOutdoorTemperature()->getCelsius());
        $this->assertNull($testee->getMonthlyHighOutdoorTemperatureDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyHighOutdoorTemperatureDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyHighOutdoorTemperatureDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyHighOutdoorTemperatureDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyHighOutdoorTemperatureDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyLowOutdoorTemperature()->getCelsius());
        $this->assertNull($testee->getMonthlyLowOutdoorTemperatureDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyLowOutdoorTemperatureDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyLowOutdoorTemperatureDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyLowOutdoorTemperatureDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyLowOutdoorTemperatureDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyMaximumGustSpeed()->getKnots());
        $this->assertNull($testee->getMonthlyMaximumGustSpeedDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyMaximumGustSpeedDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyMaximumGustSpeedDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyMaximumGustSpeedDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyMaximumGustSpeedDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyMaximumRainfallRate()->getMillimetresPerMinute());
        $this->assertNull($testee->getMonthlyMaximumRainfallRateDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyMaximumRainfallRateDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyMaximumRainfallRateDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyMaximumRainfallRateDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyMaximumRainfallRateDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyLowSurfacePressure()->getHectopascals());
        $this->assertNull($testee->getMonthlyLowSurfacePressureDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyLowSurfacePressureDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyLowSurfacePressureDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyLowSurfacePressureDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyLowSurfacePressureDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyHighSurfacePressure()->getHectopascals());
        $this->assertNull($testee->getMonthlyHighSurfacePressureDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyHighSurfacePressureDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyHighSurfacePressureDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyHighSurfacePressureDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyHighSurfacePressureDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyHighestDailyRainfall()->getMillimetres());
        $this->assertNull($testee->getMonthlyHighestDailyRainfallDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyHighestDailyRainfallDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyHighestDailyRainfallDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyHighestDailyRainfallDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyHighestDailyRainfallDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyHighestRainfallInAnHour()->getMillimetres());
        $this->assertNull($testee->getMonthlyHighestRainfallInAnHourDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyHighestRainfallInAnHourDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyHighestRainfallInAnHourDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyHighestRainfallInAnHourDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyHighestRainfallInAnHourDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyMaximumAverageWindSpeed()->getKnots());
        $this->assertNull($testee->getMonthlyMaximumAverageWindSpeedDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyMaximumAverageWindSpeedDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyMaximumAverageWindSpeedDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyMaximumAverageWindSpeedDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyMaximumAverageWindSpeedDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyHighSoilTemperature()->getCelsius());
        $this->assertNull($testee->getMonthlyHighSoilTemperatureDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyHighSoilTemperatureDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyHighSoilTemperatureDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyHighSoilTemperatureDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyHighSoilTemperatureDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyLowSoilTemperature()->getCelsius());
        $this->assertNull($testee->getMonthlyLowSoilTemperatureDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyLowSoilTemperatureDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyLowSoilTemperatureDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyLowSoilTemperatureDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyLowSoilTemperatureDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyLowWindChill()->getCelsius());
        $this->assertNull($testee->getMonthlyLowWindChillDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyLowWindChillDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyLowWindChillDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyLowWindChillDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyLowWindChillDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyMaximumGustSpeedDirection()->getCompassDegrees());

        $this->assertNull($testee->getMonthlyMaximumAverageWindSpeedDirection()->getCompassDegrees());

        $this->assertNull($testee->getMonthlyWarmestDay()->getCelsius());
        $this->assertNull($testee->getMonthlyWarmestDayDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyWarmestDayDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyWarmestDayDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyWarmestDayDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyWarmestDayDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyColdestNight()->getCelsius());
        $this->assertNull($testee->getMonthlyColdestNightDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyColdestNightDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyColdestNightDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyColdestNightDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyColdestNightDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyColdestDay()->getCelsius());
        $this->assertNull($testee->getMonthlyColdestDayDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyColdestDayDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyColdestDayDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyColdestDayDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyColdestDayDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyWarmestNight()->getCelsius());
        $this->assertNull($testee->getMonthlyWarmestNightDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyWarmestNightDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyWarmestNightDateAndTime()->getday());
        $this->assertNull($testee->getMonthlyWarmestNightDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyWarmestNightDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyHighHeatIndex()->getCelsius());
        $this->assertNull($testee->getMonthlyHighHeatIndexDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyHighHeatIndexDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyHighHeatIndexDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyHighHeatIndexDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyHighHeatIndexDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyHighSolarIrradiance()->getWattsPerSquareMetre());
        $this->assertNull($testee->getMonthlyHighSolarIrradianceDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyHighSolarIrradianceDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyHighSolarIrradianceDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyHighSolarIrradianceDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyHighSolarIrradianceDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyHighUv()->getUvi());
        $this->assertNull($testee->getMonthlyHighUvDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyHighUvDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyHighUvDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyHighUvDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyHighUvDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyHighDewPoint()->getCelsius());
        $this->assertNull($testee->getMonthlyHighDewPointDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyHighDewPointDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyHighDewPointDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyHighDewPointDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyHighDewPointDateAndTime()->getMinute());

        $this->assertNull($testee->getMonthlyLowDewPoint()->getCelsius());
        $this->assertNull($testee->getMonthlyLowDewPointDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyLowDewPointDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyLowDewPointDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyLowDewPointDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyLowDewPointDateAndTime()->getMinute());
    }

    public function test_get_yearly_high_outdoor_temperature()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_HIGH_OUTDOOR_TEMPERATURE, "25.2"));
        $this->assertSame("25.2", $testee->getYearlyHighOutdoorTemperature()->getCelsius());
    }

    public function test_get_yearly_high_outdoor_temperature_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_HIGH_OUTDOOR_TEMPERATURE_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_HIGH_OUTDOOR_TEMPERATURE_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_HIGH_OUTDOOR_TEMPERATURE_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_HIGH_OUTDOOR_TEMPERATURE_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_HIGH_OUTDOOR_TEMPERATURE_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyHighOutdoorTemperatureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_low_outdoor_temperature()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_LOW_OUTDOOR_TEMPERATURE, "-5.1"));
        $this->assertSame("-5.1", $testee->getYearlyLowOutdoorTemperature()->getCelsius());
    }

    public function test_get_yearly_low_outdoor_temperature_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_LOW_OUTDOOR_TEMPERATURE_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_LOW_OUTDOOR_TEMPERATURE_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_LOW_OUTDOOR_TEMPERATURE_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_LOW_OUTDOOR_TEMPERATURE_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_LOW_OUTDOOR_TEMPERATURE_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyLowOutdoorTemperatureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_maximum_gust_speed()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_MAXIMUM_GUST_SPEED, "30.7"));
        $this->assertSame("30.7", $testee->getYearlyMaximumGustSpeed()->getKnots());
    }

    public function test_get_yearly_maximum_gust_speed_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_MAXIMUM_GUST_SPEED_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_MAXIMUM_GUST_SPEED_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_MAXIMUM_GUST_SPEED_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_MAXIMUM_GUST_SPEED_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_MAXIMUM_GUST_SPEED_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyMaximumGustSpeedDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_maximum_rainfall_rate()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_MAXIMUM_RAINFALL_RATE, "2.06"));
        $this->assertSame("2.06", $testee->getYearlyMaximumRainfallRate()->getMillimetresPerMinute());
    }

    public function test_get_yearly_maximum_rainfall_rate_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_MAXIMUM_RAINFALL_RATE_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_MAXIMUM_RAINFALL_RATE_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_MAXIMUM_RAINFALL_RATE_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_MAXIMUM_RAINFALL_RATE_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_MAXIMUM_RAINFALL_RATE_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyMaximumRainfallRateDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_low_surface_pressure()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_LOW_SURFACE_PRESSURE, "1001.5"));
        $this->assertSame("1001.5", $testee->getYearlyLowSurfacePressure()->getHectopascals());
    }

    public function test_get_yearly_low_surface_pressure_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_LOW_SURFACE_PRESSURE_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_LOW_SURFACE_PRESSURE_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_LOW_SURFACE_PRESSURE_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_LOW_SURFACE_PRESSURE_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_LOW_SURFACE_PRESSURE_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyLowSurfacePressureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_high_surface_pressure()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_HIGH_SURFACE_PRESSURE, "1017.6"));
        $this->assertSame("1017.6", $testee->getYearlyHighSurfacePressure()->getHectopascals());
    }

    public function test_get_yearly_high_surface_pressure_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_HIGH_SURFACE_PRESSURE_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_HIGH_SURFACE_PRESSURE_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_HIGH_SURFACE_PRESSURE_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_HIGH_SURFACE_PRESSURE_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_HIGH_SURFACE_PRESSURE_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyHighSurfacePressureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_highest_daily_rainfall()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_HIGHEST_DAILY_RAINFALL, "22.12"));
        $this->assertSame("22.12", $testee->getYearlyHighestDailyRainfall()->getMillimetres());
    }

    public function test_get_yearly_highest_daily_rainfall_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_HIGHEST_DAILY_RAINFALL_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_HIGHEST_DAILY_RAINFALL_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_HIGHEST_DAILY_RAINFALL_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_HIGHEST_DAILY_RAINFALL_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_HIGHEST_DAILY_RAINFALL_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyHighestDailyRainfallDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_highest_rainfall_in_an_hour()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR, "8.97"));
        $this->assertSame("8.97", $testee->getYearlyHighestRainfallInAnHour()->getMillimetres());
    }

    public function test_get_yearly_highest_rainfall_in_an_hour_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyHighestRainfallInAnHourDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_maximum_average_wind_speed()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_MAXIMUM_AVERAGE_WIND_SPEED, "26.4"));
        $this->assertSame("26.4", $testee->getYearlyMaximumAverageWindSpeed()->getKnots());
    }

    public function test_get_yearly_maximum_average_wind_speed_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyMaximumAverageWindSpeedDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_high_soil_temperature()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_HIGH_SOIL_TEMPERATURE, "19.2"));
        $this->assertSame("19.2", $testee->getYearlyHighSoilTemperature()->getCelsius());
    }

    public function test_get_yearly_high_soil_temperature_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_HIGH_SOIL_TEMPERATURE_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_HIGH_SOIL_TEMPERATURE_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_HIGH_SOIL_TEMPERATURE_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_HIGH_SOIL_TEMPERATURE_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_HIGH_SOIL_TEMPERATURE_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyHighSoilTemperatureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_low_soil_temperature()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_LOW_SOIL_TEMPERATURE, "-8.6"));
        $this->assertSame("-8.6", $testee->getYearlyLowSoilTemperature()->getCelsius());
    }

    public function test_get_yearly_low_soil_temperature_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_LOW_SOIL_TEMPERATURE_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_LOW_SOIL_TEMPERATURE_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_LOW_SOIL_TEMPERATURE_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_LOW_SOIL_TEMPERATURE_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_LOW_SOIL_TEMPERATURE_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyLowSoilTemperatureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_low_wind_chill()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_LOW_WIND_CHILL, "-17.9"));
        $this->assertSame("-17.9", $testee->getYearlyLowWindChill()->getCelsius());
    }

    public function test_get_yearly_low_wind_chill_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_LOW_WIND_CHILL_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_LOW_WIND_CHILL_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_LOW_WIND_CHILL_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_LOW_WIND_CHILL_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_LOW_WIND_CHILL_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyLowWindChillDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_maximum_gust_speed_direction()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_MAXIMUM_GUST_SPEED_DIRECTION, "90"));
        $this->assertSame("90", $testee->getYearlyMaximumGustSpeedDirection()->getCompassDegrees());
    }

    public function test_get_yearly_maximum_average_wind_speed_direction()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION, "180"));
        $this->assertSame("180", $testee->getYearlyMaximumAverageWindSpeedDirection()->getCompassDegrees());
    }

    public function test_get_yearly_warmest_day()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_WARMEST_DAY, "27.5"));
        $this->assertSame("27.5", $testee->getYearlyWarmestDay()->getCelsius());
    }

    public function test_get_yearly_warmest_day_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_WARMEST_DAY_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_WARMEST_DAY_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_WARMEST_DAY_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_WARMEST_DAY_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_WARMEST_DAY_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyWarmestDayDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_coldest_night()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_COLDEST_NIGHT, "3.2"));
        $this->assertSame("3.2", $testee->getYearlyColdestNight()->getCelsius());
    }

    public function test_get_yearly_coldest_night_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_COLDEST_NIGHT_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_COLDEST_NIGHT_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_COLDEST_NIGHT_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_COLDEST_NIGHT_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_COLDEST_NIGHT_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyColdestNightDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_coldest_day()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_COLDEST_DAY, "-0.4"));
        $this->assertSame("-0.4", $testee->getYearlyColdestDay()->getCelsius());
    }

    public function test_get_yearly_coldest_day_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_COLDEST_DAY_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_COLDEST_DAY_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_COLDEST_DAY_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_COLDEST_DAY_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_COLDEST_DAY_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyColdestDayDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_warmest_night()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_WARMEST_NIGHT, "26.1"));
        $this->assertSame("26.1", $testee->getYearlyWarmestNight()->getCelsius());
    }

    public function test_get_yearly_warmest_night_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_WARMEST_NIGHT_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_WARMEST_NIGHT_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_WARMEST_NIGHT_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_WARMEST_NIGHT_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_WARMEST_NIGHT_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyWarmestNightDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_high_heat_index()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_HIGH_HEAT_INDEX, "35.7"));
        $this->assertSame("35.7", $testee->getYearlyHighHeatIndex()->getCelsius());
    }

    public function test_get_yearly_high_heat_index_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_HIGH_HEAT_INDEX_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_HIGH_HEAT_INDEX_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_HIGH_HEAT_INDEX_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_HIGH_HEAT_INDEX_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_HIGH_HEAT_INDEX_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyHighHeatIndexDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_high_solar_irradiance()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_HIGH_SOLAR_IRRADIANCE, "987"));
        $this->assertSame("987", $testee->getYearlyHighSolarIrradiance()->getWattsPerSquareMetre());
    }

    public function test_get_yearly_high_solar_irradiance_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_HIGH_SOLAR_IRRADIANCE_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_HIGH_SOLAR_IRRADIANCE_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_HIGH_SOLAR_IRRADIANCE_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_HIGH_SOLAR_IRRADIANCE_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_HIGH_SOLAR_IRRADIANCE_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyHighSolarIrradianceDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_high_uv()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_HIGH_UV, "9.4"));
        $this->assertSame("9.4", $testee->getYearlyHighUv()->getUvi());
    }

    public function test_get_yearly_high_uv_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_HIGH_UV_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_HIGH_UV_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_HIGH_UV_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_HIGH_UV_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_HIGH_UV_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyHighUvDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_high_dew_point()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_HIGH_DEW_POINT, "22.1"));
        $this->assertSame("22.1", $testee->getYearlyHighDewPoint()->getCelsius());
    }

    public function test_get_yearly_high_dew_point_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_HIGH_DEW_POINT_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_HIGH_DEW_POINT_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_HIGH_DEW_POINT_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_HIGH_DEW_POINT_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_HIGH_DEW_POINT_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyHighDewPointDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_yearly_low_dew_point()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::YEARLY_LOW_DEW_POINT, "1.3"));
        $this->assertSame("1.3", $testee->getYearlyLowDewPoint()->getCelsius());
    }

    public function test_get_yearly_low_dew_point_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::YEARLY_LOW_DEW_POINT_YEAR, "2015"),
                new Field(ClientRawExtra::YEARLY_LOW_DEW_POINT_MONTH, "12"),
                new Field(ClientRawExtra::YEARLY_LOW_DEW_POINT_DAY, "31"),
                new Field(ClientRawExtra::YEARLY_LOW_DEW_POINT_HOUR, "23"),
                new Field(ClientRawExtra::YEARLY_LOW_DEW_POINT_MINUTE, "59")));

        $dateAndTime = $testee->getYearlyLowDewPointDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_when_yearly_fields_are_missing()
    {
        $testee = self::createEmptyClientRawExtra();

        $this->assertNull($testee->getYearlyHighOutdoorTemperature()->getCelsius());
        $this->assertNull($testee->getYearlyHighOutdoorTemperatureDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyHighOutdoorTemperatureDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyHighOutdoorTemperatureDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyHighOutdoorTemperatureDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyHighOutdoorTemperatureDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyLowOutdoorTemperature()->getCelsius());
        $this->assertNull($testee->getYearlyLowOutdoorTemperatureDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyLowOutdoorTemperatureDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyLowOutdoorTemperatureDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyLowOutdoorTemperatureDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyLowOutdoorTemperatureDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyMaximumGustSpeed()->getKnots());
        $this->assertNull($testee->getYearlyMaximumGustSpeedDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyMaximumGustSpeedDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyMaximumGustSpeedDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyMaximumGustSpeedDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyMaximumGustSpeedDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyMaximumRainfallRate()->getMillimetresPerMinute());
        $this->assertNull($testee->getYearlyMaximumRainfallRateDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyMaximumRainfallRateDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyMaximumRainfallRateDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyMaximumRainfallRateDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyMaximumRainfallRateDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyLowSurfacePressure()->getHectopascals());
        $this->assertNull($testee->getYearlyLowSurfacePressureDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyLowSurfacePressureDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyLowSurfacePressureDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyLowSurfacePressureDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyLowSurfacePressureDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyHighSurfacePressure()->getHectopascals());
        $this->assertNull($testee->getYearlyHighSurfacePressureDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyHighSurfacePressureDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyHighSurfacePressureDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyHighSurfacePressureDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyHighSurfacePressureDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyHighestDailyRainfall()->getMillimetres());
        $this->assertNull($testee->getYearlyHighestDailyRainfallDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyHighestDailyRainfallDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyHighestDailyRainfallDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyHighestDailyRainfallDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyHighestDailyRainfallDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyHighestRainfallInAnHour()->getMillimetres());
        $this->assertNull($testee->getYearlyHighestRainfallInAnHourDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyHighestRainfallInAnHourDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyHighestRainfallInAnHourDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyHighestRainfallInAnHourDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyHighestRainfallInAnHourDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyMaximumAverageWindSpeed()->getKnots());
        $this->assertNull($testee->getYearlyMaximumAverageWindSpeedDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyMaximumAverageWindSpeedDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyMaximumAverageWindSpeedDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyMaximumAverageWindSpeedDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyMaximumAverageWindSpeedDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyHighSoilTemperature()->getCelsius());
        $this->assertNull($testee->getYearlyHighSoilTemperatureDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyHighSoilTemperatureDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyHighSoilTemperatureDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyHighSoilTemperatureDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyHighSoilTemperatureDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyLowSoilTemperature()->getCelsius());
        $this->assertNull($testee->getYearlyLowSoilTemperatureDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyLowSoilTemperatureDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyLowSoilTemperatureDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyLowSoilTemperatureDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyLowSoilTemperatureDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyLowWindChill()->getCelsius());
        $this->assertNull($testee->getYearlyLowWindChillDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyLowWindChillDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyLowWindChillDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyLowWindChillDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyLowWindChillDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyMaximumGustSpeedDirection()->getCompassDegrees());

        $this->assertNull($testee->getYearlyMaximumAverageWindSpeedDirection()->getCompassDegrees());

        $this->assertNull($testee->getYearlyWarmestDay()->getCelsius());
        $this->assertNull($testee->getYearlyWarmestDayDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyWarmestDayDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyWarmestDayDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyWarmestDayDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyWarmestDayDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyColdestNight()->getCelsius());
        $this->assertNull($testee->getYearlyColdestNightDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyColdestNightDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyColdestNightDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyColdestNightDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyColdestNightDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyColdestDay()->getCelsius());
        $this->assertNull($testee->getYearlyColdestDayDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyColdestDayDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyColdestDayDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyColdestDayDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyColdestDayDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyWarmestNight()->getCelsius());
        $this->assertNull($testee->getYearlyWarmestNightDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyWarmestNightDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyWarmestNightDateAndTime()->getday());
        $this->assertNull($testee->getYearlyWarmestNightDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyWarmestNightDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyHighHeatIndex()->getCelsius());
        $this->assertNull($testee->getYearlyHighHeatIndexDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyHighHeatIndexDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyHighHeatIndexDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyHighHeatIndexDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyHighHeatIndexDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyHighSolarIrradiance()->getWattsPerSquareMetre());
        $this->assertNull($testee->getYearlyHighSolarIrradianceDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyHighSolarIrradianceDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyHighSolarIrradianceDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyHighSolarIrradianceDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyHighSolarIrradianceDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyHighUv()->getUvi());
        $this->assertNull($testee->getYearlyHighUvDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyHighUvDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyHighUvDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyHighUvDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyHighUvDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyHighDewPoint()->getCelsius());
        $this->assertNull($testee->getYearlyHighDewPointDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyHighDewPointDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyHighDewPointDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyHighDewPointDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyHighDewPointDateAndTime()->getMinute());

        $this->assertNull($testee->getYearlyLowDewPoint()->getCelsius());
        $this->assertNull($testee->getYearlyLowDewPointDateAndTime()->getYear());
        $this->assertNull($testee->getYearlyLowDewPointDateAndTime()->getMonth());
        $this->assertNull($testee->getYearlyLowDewPointDateAndTime()->getDay());
        $this->assertNull($testee->getYearlyLowDewPointDateAndTime()->getHour());
        $this->assertNull($testee->getYearlyLowDewPointDateAndTime()->getMinute());
    }

    public function test_get_all_time_high_outdoor_temperature()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_HIGH_OUTDOOR_TEMPERATURE, "25.2"));
        $this->assertSame("25.2", $testee->getAllTimeHighOutdoorTemperature()->getCelsius());
    }

    public function test_get_all_time_high_outdoor_temperature_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeHighOutdoorTemperatureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_low_outdoor_temperature()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_LOW_OUTDOOR_TEMPERATURE, "-5.1"));
        $this->assertSame("-5.1", $testee->getAllTimeLowOutdoorTemperature()->getCelsius());
    }

    public function test_get_all_time_low_outdoor_temperature_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_LOW_OUTDOOR_TEMPERATURE_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_LOW_OUTDOOR_TEMPERATURE_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_LOW_OUTDOOR_TEMPERATURE_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_LOW_OUTDOOR_TEMPERATURE_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_LOW_OUTDOOR_TEMPERATURE_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeLowOutdoorTemperatureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_maximum_gust_speed()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_MAXIMUM_GUST_SPEED, "30.7"));
        $this->assertSame("30.7", $testee->getAllTimeMaximumGustSpeed()->getKnots());
    }

    public function test_get_all_time_maximum_gust_speed_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_GUST_SPEED_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_GUST_SPEED_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_GUST_SPEED_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_GUST_SPEED_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_GUST_SPEED_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeMaximumGustSpeedDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_maximum_rainfall_rate()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_MAXIMUM_RAINFALL_RATE, "2.06"));
        $this->assertSame("2.06", $testee->getAllTimeMaximumRainfallRate()->getMillimetresPerMinute());
    }

    public function test_get_all_time_maximum_rainfall_rate_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_RAINFALL_RATE_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_RAINFALL_RATE_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_RAINFALL_RATE_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_RAINFALL_RATE_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_RAINFALL_RATE_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeMaximumRainfallRateDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_low_surface_pressure()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_LOW_SURFACE_PRESSURE, "1001.5"));
        $this->assertSame("1001.5", $testee->getAllTimeLowSurfacePressure()->getHectopascals());
    }

    public function test_get_all_time_low_surface_pressure_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_LOW_SURFACE_PRESSURE_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_LOW_SURFACE_PRESSURE_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_LOW_SURFACE_PRESSURE_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_LOW_SURFACE_PRESSURE_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_LOW_SURFACE_PRESSURE_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeLowSurfacePressureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_high_surface_pressure()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_HIGH_SURFACE_PRESSURE, "1017.6"));
        $this->assertSame("1017.6", $testee->getAllTimeHighSurfacePressure()->getHectopascals());
    }

    public function test_get_all_time_high_surface_pressure_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_HIGH_SURFACE_PRESSURE_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_SURFACE_PRESSURE_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_SURFACE_PRESSURE_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_SURFACE_PRESSURE_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_SURFACE_PRESSURE_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeHighSurfacePressureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_highest_daily_rainfall()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_HIGHEST_DAILY_RAINFALL, "35.67"));
        $this->assertSame("35.67", $testee->getAllTimeHighestDailyRainfall()->getMillimetres());
    }

    public function test_get_all_time_highest_daily_rainfall_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_HIGHEST_DAILY_RAINFALL_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_HIGHEST_DAILY_RAINFALL_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_HIGHEST_DAILY_RAINFALL_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_HIGHEST_DAILY_RAINFALL_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_HIGHEST_DAILY_RAINFALL_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeHighestDailyRainfallDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_highest_rainfall_in_an_hour()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR, "12.41"));
        $this->assertSame("12.41", $testee->getAllTimeHighestRainfallInAnHour()->getMillimetres());
    }

    public function test_get_all_time_highest_rainfall_in_an_hour_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeHighestRainfallInAnHourDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_maximum_average_wind_speed()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED, "26.4"));
        $this->assertSame("26.4", $testee->getAllTimeMaximumAverageWindSpeed()->getKnots());
    }

    public function test_get_all_time_maximum_average_wind_speed_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeMaximumAverageWindSpeedDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_high_soil_temperature()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_HIGH_SOIL_TEMPERATURE, "19.2"));
        $this->assertSame("19.2", $testee->getAllTimeHighSoilTemperature()->getCelsius());
    }

    public function test_get_all_time_high_soil_temperature_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_HIGH_SOIL_TEMPERATURE_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_SOIL_TEMPERATURE_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_SOIL_TEMPERATURE_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_SOIL_TEMPERATURE_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_SOIL_TEMPERATURE_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeHighSoilTemperatureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_low_soil_temperature()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_LOW_SOIL_TEMPERATURE, "-8.6"));
        $this->assertSame("-8.6", $testee->getAllTimeLowSoilTemperature()->getCelsius());
    }

    public function test_get_all_time_low_soil_temperature_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_LOW_SOIL_TEMPERATURE_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_LOW_SOIL_TEMPERATURE_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_LOW_SOIL_TEMPERATURE_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_LOW_SOIL_TEMPERATURE_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_LOW_SOIL_TEMPERATURE_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeLowSoilTemperatureDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_low_wind_chill()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_LOW_WIND_CHILL, "-17.9"));
        $this->assertSame("-17.9", $testee->getAllTimeLowWindChill()->getCelsius());
    }

    public function test_get_all_time_low_wind_chill_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_LOW_WIND_CHILL_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_LOW_WIND_CHILL_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_LOW_WIND_CHILL_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_LOW_WIND_CHILL_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_LOW_WIND_CHILL_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeLowWindChillDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_maximum_gust_speed_direction()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_MAXIMUM_GUST_SPEED_DIRECTION, "90"));
        $this->assertSame("90", $testee->getAllTimeMaximumGustSpeedDirection()->getCompassDegrees());
    }

    public function test_get_all_time_maximum_average_wind_speed_direction()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION, "180"));
        $this->assertSame("180", $testee->getAllTimeMaximumAverageWindSpeedDirection()->getCompassDegrees());
    }

    public function test_get_all_time_warmest_day()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_WARMEST_DAY, "30.8"));
        $this->assertSame("30.8", $testee->getAllTimeWarmestDay()->getCelsius());
    }

    public function test_get_all_time_warmest_day_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_WARMEST_DAY_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_WARMEST_DAY_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_WARMEST_DAY_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_WARMEST_DAY_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_WARMEST_DAY_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeWarmestDayDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_coldest_night()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_COLDEST_NIGHT, "-5.4"));
        $this->assertSame("-5.4", $testee->getAllTimeColdestNight()->getCelsius());
    }

    public function test_get_all_time_coldest_night_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_COLDEST_NIGHT_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_COLDEST_NIGHT_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_COLDEST_NIGHT_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_COLDEST_NIGHT_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_COLDEST_NIGHT_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeColdestNightDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_coldest_day()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_COLDEST_DAY, "-2.1"));
        $this->assertSame("-2.1", $testee->getAllTimeColdestDay()->getCelsius());
    }

    public function test_get_all_time_coldest_day_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_COLDEST_DAY_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_COLDEST_DAY_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_COLDEST_DAY_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_COLDEST_DAY_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_COLDEST_DAY_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeColdestDayDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_warmest_night()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_WARMEST_NIGHT, "29.3"));
        $this->assertSame("29.3", $testee->getAllTimeWarmestNight()->getCelsius());
    }

    public function test_get_all_time_warmest_night_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_WARMEST_NIGHT_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_WARMEST_NIGHT_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_WARMEST_NIGHT_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_WARMEST_NIGHT_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_WARMEST_NIGHT_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeWarmestNightDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }


    public function test_get_all_time_high_heat_index()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_HIGH_HEAT_INDEX, "35.7"));
        $this->assertSame("35.7", $testee->getAllTimeHighHeatIndex()->getCelsius());
    }

    public function test_get_all_time_high_heat_index_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_HIGH_HEAT_INDEX_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_HEAT_INDEX_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_HEAT_INDEX_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_HEAT_INDEX_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_HEAT_INDEX_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeHighHeatIndexDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_high_solar_irradiance()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_HIGH_SOLAR_IRRADIANCE, "1399"));
        $this->assertSame("1399", $testee->getAllTimeHighSolarIrradiance()->getWattsPerSquareMetre());
    }

    public function test_get_all_time_high_solar_irradiance_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_HIGH_SOLAR_IRRADIANCE_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_SOLAR_IRRADIANCE_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_SOLAR_IRRADIANCE_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_SOLAR_IRRADIANCE_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_SOLAR_IRRADIANCE_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeHighSolarIrradianceDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_high_uv()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_HIGH_UV, "9.4"));
        $this->assertSame("9.4", $testee->getAllTimeHighUv()->getUvi());
    }

    public function test_get_all_time_high_uv_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_HIGH_UV_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_UV_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_UV_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_UV_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_UV_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeHighUvDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_high_dew_point()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_HIGH_DEW_POINT, "22.1"));
        $this->assertSame("22.1", $testee->getAllTimeHighDewPoint()->getCelsius());
    }

    public function test_get_all_time_high_dew_point_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_HIGH_DEW_POINT_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_DEW_POINT_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_DEW_POINT_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_DEW_POINT_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_HIGH_DEW_POINT_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeHighDewPointDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_all_time_low_dew_point()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::ALL_TIME_LOW_DEW_POINT, "1.3"));
        $this->assertSame("1.3", $testee->getAllTimeLowDewPoint()->getCelsius());
    }

    public function test_get_all_time_low_dew_point_date_and_time()
    {
        $testee = self::createClientRawExtraWithFields(
            array(
                new Field(ClientRawExtra::ALL_TIME_LOW_DEW_POINT_YEAR, "2015"),
                new Field(ClientRawExtra::ALL_TIME_LOW_DEW_POINT_MONTH, "12"),
                new Field(ClientRawExtra::ALL_TIME_LOW_DEW_POINT_DAY, "31"),
                new Field(ClientRawExtra::ALL_TIME_LOW_DEW_POINT_HOUR, "23"),
                new Field(ClientRawExtra::ALL_TIME_LOW_DEW_POINT_MINUTE, "59")));

        $dateAndTime = $testee->getAllTimeLowDewPointDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_get_sunrise_time()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::SUNRISE_TIME, "06:21"));
        $this->assertSame("06:21", $testee->getSunriseTime()->getTime());
    }

    public function test_get_sunset_time()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::SUNSET_TIME, "20:09"));
        $this->assertSame("20:09", $testee->getSunsetTime()->getTime());
    }

    public function test_get_moonrise_time()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MOONRISE_TIME, "21:45"));
        $this->assertSame("21:45", $testee->getMoonriseTime()->getTime());
    }

    public function test_get_moon_phase()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MOON_PHASE, "87.2"));
        $this->assertSame("87.2", $testee->getMoonPhase());
    }

    public function test_get_moon_age()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MOON_AGE, "18"));
        $this->assertSame("18", $testee->getMoonAge());
    }

    public function test_get_sunshine_hours()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::SUNSHINE_HOURS, "5.1"));
        $this->assertSame("5.1", $testee->getSunshineHours());
    }

    public function test_when_all_time_fields_are_missing()
    {
        $testee = self::createEmptyClientRawExtra();

        $this->assertNull($testee->getAllTimeHighOutdoorTemperature()->getCelsius());
        $this->assertNull($testee->getAllTimeHighOutdoorTemperatureDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeHighOutdoorTemperatureDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeHighOutdoorTemperatureDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeHighOutdoorTemperatureDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeHighOutdoorTemperatureDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeLowOutdoorTemperature()->getCelsius());
        $this->assertNull($testee->getAllTimeLowOutdoorTemperatureDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeLowOutdoorTemperatureDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeLowOutdoorTemperatureDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeLowOutdoorTemperatureDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeLowOutdoorTemperatureDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeMaximumGustSpeed()->getKnots());
        $this->assertNull($testee->getAllTimeMaximumGustSpeedDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeMaximumGustSpeedDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeMaximumGustSpeedDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeMaximumGustSpeedDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeMaximumGustSpeedDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeMaximumRainfallRate()->getMillimetresPerMinute());
        $this->assertNull($testee->getAllTimeMaximumRainfallRateDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeMaximumRainfallRateDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeMaximumRainfallRateDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeMaximumRainfallRateDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeMaximumRainfallRateDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeLowSurfacePressure()->getHectopascals());
        $this->assertNull($testee->getAllTimeLowSurfacePressureDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeLowSurfacePressureDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeLowSurfacePressureDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeLowSurfacePressureDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeLowSurfacePressureDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeHighSurfacePressure()->getHectopascals());
        $this->assertNull($testee->getAllTimeHighSurfacePressureDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeHighSurfacePressureDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeHighSurfacePressureDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeHighSurfacePressureDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeHighSurfacePressureDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeHighestDailyRainfall()->getMillimetres());
        $this->assertNull($testee->getAllTimeHighestDailyRainfallDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeHighestDailyRainfallDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeHighestDailyRainfallDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeHighestDailyRainfallDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeHighestDailyRainfallDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeHighestRainfallInAnHour()->getMillimetres());
        $this->assertNull($testee->getAllTimeHighestRainfallInAnHourDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeHighestRainfallInAnHourDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeHighestRainfallInAnHourDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeHighestRainfallInAnHourDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeHighestRainfallInAnHourDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeMaximumAverageWindSpeed()->getKnots());
        $this->assertNull($testee->getAllTimeMaximumAverageWindSpeedDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeMaximumAverageWindSpeedDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeMaximumAverageWindSpeedDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeMaximumAverageWindSpeedDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeMaximumAverageWindSpeedDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeHighSoilTemperature()->getCelsius());
        $this->assertNull($testee->getAllTimeHighSoilTemperatureDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeHighSoilTemperatureDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeHighSoilTemperatureDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeHighSoilTemperatureDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeHighSoilTemperatureDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeLowSoilTemperature()->getCelsius());
        $this->assertNull($testee->getAllTimeLowSoilTemperatureDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeLowSoilTemperatureDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeLowSoilTemperatureDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeLowSoilTemperatureDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeLowSoilTemperatureDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeLowWindChill()->getCelsius());
        $this->assertNull($testee->getAllTimeLowWindChillDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeLowWindChillDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeLowWindChillDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeLowWindChillDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeLowWindChillDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeMaximumGustSpeedDirection()->getCompassDegrees());

        $this->assertNull($testee->getAllTimeMaximumAverageWindSpeedDirection()->getCompassDegrees());

        $this->assertNull($testee->getAllTimeWarmestDay()->getCelsius());
        $this->assertNull($testee->getAllTimeWarmestDayDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeWarmestDayDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeWarmestDayDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeWarmestDayDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeWarmestDayDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeColdestNight()->getCelsius());
        $this->assertNull($testee->getAllTimeColdestNightDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeColdestNightDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeColdestNightDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeColdestNightDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeColdestNightDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeColdestDay()->getCelsius());
        $this->assertNull($testee->getAllTimeColdestDayDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeColdestDayDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeColdestDayDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeColdestDayDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeColdestDayDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeWarmestNight()->getCelsius());
        $this->assertNull($testee->getAllTimeWarmestNightDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeWarmestNightDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeWarmestNightDateAndTime()->getday());
        $this->assertNull($testee->getAllTimeWarmestNightDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeWarmestNightDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeHighHeatIndex()->getCelsius());
        $this->assertNull($testee->getAllTimeHighHeatIndexDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeHighHeatIndexDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeHighHeatIndexDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeHighHeatIndexDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeHighHeatIndexDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeHighSolarIrradiance()->getWattsPerSquareMetre());
        $this->assertNull($testee->getAllTimeHighSolarIrradianceDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeHighSolarIrradianceDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeHighSolarIrradianceDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeHighSolarIrradianceDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeHighSolarIrradianceDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeHighUv()->getUvi());
        $this->assertNull($testee->getAllTimeHighUvDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeHighUvDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeHighUvDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeHighUvDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeHighUvDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeHighDewPoint()->getCelsius());
        $this->assertNull($testee->getAllTimeHighDewPointDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeHighDewPointDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeHighDewPointDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeHighDewPointDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeHighDewPointDateAndTime()->getMinute());

        $this->assertNull($testee->getAllTimeLowDewPoint()->getCelsius());
        $this->assertNull($testee->getAllTimeLowDewPointDateAndTime()->getYear());
        $this->assertNull($testee->getAllTimeLowDewPointDateAndTime()->getMonth());
        $this->assertNull($testee->getAllTimeLowDewPointDateAndTime()->getDay());
        $this->assertNull($testee->getAllTimeLowDewPointDateAndTime()->getHour());
        $this->assertNull($testee->getAllTimeLowDewPointDateAndTime()->getMinute());

        $this->assertNull($testee->getSunriseTime()->getTime());
        $this->assertNull($testee->getSunsetTime()->getTime());
        $this->assertNull($testee->getMoonriseTime()->getTime());
        $this->assertNull($testee->getMoonsetTime()->getTime());
        $this->assertNull($testee->getMoonPhase());
        $this->assertNull($testee->getMoonAge());
        $this->assertNull($testee->getSunshineHours());
    }
}

?>
