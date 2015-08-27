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

    public function test_get_monthly_maximum_average_wind_speed_direction()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION, "180"));
        $this->assertSame("180", $testee->getMonthlyMaximumAverageWindSpeedDirection()->getCompassDegrees());
    }

    public function test_when_fields_are_missing()
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

        $this->assertNull($testee->getMonthlyMaximumAverageWindSpeed()->getKnots());
        $this->assertNull($testee->getMonthlyMaximumAverageWindSpeedDateAndTime()->getYear());
        $this->assertNull($testee->getMonthlyMaximumAverageWindSpeedDateAndTime()->getMonth());
        $this->assertNull($testee->getMonthlyMaximumAverageWindSpeedDateAndTime()->getDay());
        $this->assertNull($testee->getMonthlyMaximumAverageWindSpeedDateAndTime()->getHour());
        $this->assertNull($testee->getMonthlyMaximumAverageWindSpeedDateAndTime()->getMinute());
        $this->assertNull($testee->getMonthlyMaximumAverageWindSpeedDirection()->getCompassDegrees());
    }
}

?>
