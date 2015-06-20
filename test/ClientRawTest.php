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

    public function test_when_fields_are_missing()
    {
        self::$generator->generateEmpty();

        $testee = new ClientRaw(self::CLIENT_RAW_PATH);

        $this->assertNull($testee->getAverageWindSpeed()->getKnots());
        $this->assertNull($testee->getGustSpeed()->getKnots());
        $this->assertNull($testee->getWindDirection()->getCompassDegrees());
        $this->assertNull($testee->getMaximumGustSpeed()->getKnots());
        $this->assertNull($testee->getMaximumAverageWindSpeed()->getKnots());
        $this->assertNull($testee->getAverageWindDirection()->getCompassDegrees());
    }
}

?>
