<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("ClientRawFileGenerator.php");

class ClientRawTest extends PHPUnit_Framework_TestCase
{
    const CLIENT_RAW_PATH = "./clientraw.txt";
    private static $generator;

    public static function setUpBeforeClass()
    {
        self::$generator = new ClientRawFileGenerator(self::CLIENT_RAW_PATH);
    }

    protected function tearDown()
    {
        self::$generator->delete();
    }

    public function test_get_average_wind_speed()
    {
        self::$generator->generateWithField(new Field(ClientRaw::AVERAGE_WIND_SPEED, "4.3"));

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $this->assertSame("4.3", $testee->getAverageWindSpeed()->getKnots());
    }

    public function test_get_gust_speed()
    {
        self::$generator->generateWithField(new Field(ClientRaw::GUST_SPEED, "5.8"));

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $this->assertSame("5.8", $testee->getGustSpeed()->getKnots());
    }

    public function test_get_wind_direction()
    {
        self::$generator->generateWithField(new Field(ClientRaw::WIND_DIRECTION, "90"));

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $this->assertSame("90", $testee->getWindDirection()->getCompassDegrees());
    }

    public function test_get_indoor_temperature()
    {
        self::$generator->generateWithField(new Field(ClientRaw::INDOOR_TEMPERATURE, "25.6"));

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $this->assertSame("25.6", $testee->getIndoorTemperature()->getCelsius());
    }

    public function test_get_indoor_humidity()
    {
        self::$generator->generateWithField(new Field(ClientRaw::INDOOR_HUMIDITY, "45"));

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $this->assertSame("45", $testee->getIndoorHumidity()->getPercentage());
    }

    public function test_get_station_name()
    {
        self::$generator->generateWithField(new Field(ClientRaw::STATION_NAME, "Clifton,_NJ,_USA-17:45"));

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $this->assertSame("Clifton, NJ, USA", $testee->getStationName());
    }

    public function test_get_maximum_gust_speed()
    {
        self::$generator->generateWithField(new Field(ClientRaw::MAXIMUM_GUST_SPEED, "15.5"));

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $this->assertSame("15.5", $testee->getMaximumGustSpeed()->getKnots());
    }

    public function test_get_maximum_average_wind_speed()
    {
        self::$generator->generateWithField(new Field(ClientRaw::MAXIMUM_AVERAGE_WIND_SPEED, "12.3"));

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $this->assertSame("12.3", $testee->getMaximumAverageWindSpeed()->getKnots());
    }

    public function test_get_average_wind_direction()
    {
        self::$generator->generateWithField(new Field(ClientRaw::AVERAGE_WIND_DIRECTION, "270"));

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $this->assertSame("270", $testee->getAverageWindDirection()->getCompassDegrees());
    }

    public function test_get_latitude()
    {
        self::$generator->generateWithField(new Field(ClientRaw::LATITUDE, "40.874444"));

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $this->assertSame("40.874444", $testee->getLatitude());
    }

    public function test_get_longitude()
    {
        self::$generator->generateWithField(new Field(ClientRaw::LONGITUDE, "74.16"));

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $this->assertSame("74.16", $testee->getLongitude());
    }

    public function test_get_wd_version()
    {
        self::$generator->generateWithField(new Field(167, "!!C10.37Of!!"));

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $this->assertSame("C10.37Of", $testee->getWdVersion());
    }

    public function test_get_date_and_time()
    {
        self::$generator->generateWithFields(
            array(
                new Field(ClientRaw::YEAR, "2015"),
                new Field(ClientRaw::MONTH, "12"),
                new Field(ClientRaw::DAY, "31"),
                new Field(ClientRaw::HOUR, "23"),
                new Field(ClientRaw::MINUTE, "59")));

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $dateAndTime = $testee->getDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_when_fields_are_missing()
    {
        self::$generator->generateEmpty();

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $this->assertNull($testee->getAverageWindSpeed()->getKnots());
        $this->assertNull($testee->getGustSpeed()->getKnots());
        $this->assertNull($testee->getWindDirection()->getCompassDegrees());
        $this->assertNull($testee->getIndoorTemperature()->getCelsius());
        $this->assertNull($testee->getIndoorHumidity()->getPercentage());
        $this->assertNull($testee->getStationName());
        $this->assertNull($testee->getMaximumGustSpeed()->getKnots());
        $this->assertNull($testee->getMaximumAverageWindSpeed()->getKnots());
        $this->assertNull($testee->getAverageWindDirection()->getCompassDegrees());
        $this->assertNull($testee->getLatitude());
        $this->assertNull($testee->getLongitude());
        $this->assertNull($testee->getWdVersion());

        $this->assertNull($testee->getDateAndTime()->getYear());
        $this->assertNull($testee->getDateAndTime()->getMonth());
        $this->assertNull($testee->getDateAndTime()->getDay());
        $this->assertNull($testee->getDateAndTime()->getHour());
        $this->assertNull($testee->getDateAndTime()->getMinute());
    }
}

?>
