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
    
    private function createEmptyClientRaw()
    {
        self::$generator->generateEmpty();
        return new ClientRaw(self::CLIENT_RAW_PATH);
    }
    
    private function createClientRawWithField($field)
    {
        self::$generator->generateWithField($field);
        return new ClientRaw(self::CLIENT_RAW_PATH);
    }
    
    private function createClientRawWithFields($fields)
    {
        self::$generator->generateWithFields($fields);
        return new ClientRaw(self::CLIENT_RAW_PATH);
    }

    public function test_get_average_wind_speed()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::AVERAGE_WIND_SPEED, "4.3"));
        $this->assertSame("4.3", $testee->getAverageWindSpeed()->getKnots());
    }

    public function test_get_gust_speed()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::GUST_SPEED, "5.8"));
        $this->assertSame("5.8", $testee->getGustSpeed()->getKnots());
    }

    public function test_get_wind_direction()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::WIND_DIRECTION, "90"));
        $this->assertSame("90", $testee->getWindDirection()->getCompassDegrees());
    }
    
    public function test_get_outdoor_temperature()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::OUTDOOR_TEMPERATURE, "16.1"));
        $this->assertSame("16.1", $testee->getOutdoorTemperature()->getCelsius());
    }

    public function test_get_indoor_temperature()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::INDOOR_TEMPERATURE, "25.6"));
        $this->assertSame("25.6", $testee->getIndoorTemperature()->getCelsius());
    }

    public function test_get_indoor_humidity()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::INDOOR_HUMIDITY, "45"));
        $this->assertSame("45", $testee->getIndoorHumidity()->getPercentage());
    }

    public function test_get_station_name()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::STATION_NAME, "Clifton,_NJ,_USA-17:45"));
        $this->assertSame("Clifton, NJ, USA", $testee->getStationName());
    }
    
    public function test_get_daily_max_outdoor_temperature()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_MAX_OUTDOOR_TEMPERATURE, "30.8"));
        $this->assertSame("30.8", $testee->getDailyMaxOutdoorTemperature()->getCelsius());
    }
    
    public function test_get_daily_max_outdoor_temperature_when_outdoor_temperature_higher()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_MAX_OUTDOOR_TEMPERATURE, "30.8"),
                new Field(ClientRaw::OUTDOOR_TEMPERATURE, "30.9")));
                
        $this->assertSame("30.9", $testee->getDailyMaxOutdoorTemperature()->getCelsius());
    }
    
    public function test_get_daily_min_outdoor_temperature()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_MIN_OUTDOOR_TEMPERATURE, "-13.3"));
        $this->assertSame("-13.3", $testee->getDailyMinOutdoorTemperature()->getCelsius());
    }
    
    public function test_get_daily_min_outdoor_temperature_when_outdoor_temperature_lower()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_MIN_OUTDOOR_TEMPERATURE, "-13.3"),
                new Field(ClientRaw::OUTDOOR_TEMPERATURE, "-13.4")));
                
        $this->assertSame("-13.4", $testee->getDailyMinOutdoorTemperature()->getCelsius());
    }

    public function test_get_maximum_gust_speed()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::MAXIMUM_GUST_SPEED, "15.5"));
        $this->assertSame("15.5", $testee->getMaximumGustSpeed()->getKnots());
    }

    public function test_get_maximum_average_wind_speed()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::MAXIMUM_AVERAGE_WIND_SPEED, "12.3"));
        $this->assertSame("12.3", $testee->getMaximumAverageWindSpeed()->getKnots());
    }

    public function test_get_average_wind_direction()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::AVERAGE_WIND_DIRECTION, "270"));
        $this->assertSame("270", $testee->getAverageWindDirection()->getCompassDegrees());
    }
    
    public function test_get_outdoor_temperature_trend()
    {        
        $testee = self::createClientRawWithField(new Field(ClientRaw::OUTDOOR_TEMPERATURE_TREND, "1"));
        $this->assertSame("1", $testee->getOutdoorTemperatureTrend()->getTrend());
    }

    public function test_get_latitude()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::LATITUDE, "40.874444"));
        $this->assertSame("40.874444", $testee->getLatitude());
    }

    public function test_get_longitude()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::LONGITUDE, "74.16"));
        $this->assertSame("74.16", $testee->getLongitude());
    }

    public function test_get_wd_version()
    {
        $testee = self::createClientRawWithField(new Field(167, "!!C10.37Of!!"));
        $this->assertSame("C10.37Of", $testee->getWdVersion());
    }

    public function test_get_date_and_time()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::YEAR, "2015"),
                new Field(ClientRaw::MONTH, "12"),
                new Field(ClientRaw::DAY, "31"),
                new Field(ClientRaw::HOUR, "23"),
                new Field(ClientRaw::MINUTE, "59")));

        $dateAndTime = $testee->getDateAndTime();

        $this->assertSame("2015", $dateAndTime->getYear());
        $this->assertSame("12", $dateAndTime->getMonth());
        $this->assertSame("31", $dateAndTime->getDay());
        $this->assertSame("23", $dateAndTime->getHour());
        $this->assertSame("59", $dateAndTime->getMinute());
    }

    public function test_when_fields_are_missing()
    {
        $testee = self::createEmptyClientRaw();

        $this->assertNull($testee->getAverageWindSpeed()->getKnots());
        $this->assertNull($testee->getGustSpeed()->getKnots());
        $this->assertNull($testee->getWindDirection()->getCompassDegrees());
        $this->assertNull($testee->getOutdoorTemperature()->getCelsius());
        $this->assertNull($testee->getIndoorTemperature()->getCelsius());
        $this->assertNull($testee->getIndoorHumidity()->getPercentage());
        $this->assertNull($testee->getStationName());
		$this->assertNull($testee->getDailyMaxOutdoorTemperature()->getCelsius());
		$this->assertNull($testee->getDailyMinOutdoorTemperature()->getCelsius());
        $this->assertNull($testee->getMaximumGustSpeed()->getKnots());
        $this->assertNull($testee->getMaximumAverageWindSpeed()->getKnots());
        $this->assertNull($testee->getAverageWindDirection()->getCompassDegrees());
	    $this->assertNull($testee->getOutdoorTemperatureTrend()->getTrend());
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
