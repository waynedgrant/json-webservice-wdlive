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

    public function test_get_monthly_low_outdoor_temperature()
    {
        $testee = self::createClientRawExtraWithField(new Field(ClientRawExtra::MONTHLY_LOW_OUTDOOR_TEMPERATURE, "-5.1"));
        $this->assertSame("-5.1", $testee->getMonthlyLowOutdoorTemperature()->getCelsius());
    }

    public function test_when_fields_are_missing()
    {
        $testee = self::createEmptyClientRawExtra();

        $this->assertNull($testee->getMonthlyHighOutdoorTemperature()->getCelsius());
        $this->assertNull($testee->getMonthlyLowOutdoorTemperature()->getCelsius());
    }
}

?>
