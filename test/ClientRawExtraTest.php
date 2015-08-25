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
    }
}

?>
