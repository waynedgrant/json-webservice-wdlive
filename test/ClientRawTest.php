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

    public function test_get_outdoor_humidity()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::OUTDOOR_HUMIDITY, "45"));
        $this->assertSame("45", $testee->getOutdoorHumidity()->getPercentage());
    }
        
    public function test_get_surface_pressure()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::SURFACE_PRESSURE, "1021.7"));
        $this->assertSame("1021.7", $testee->getSurfacePressure()->getHectopascals());
    }
    
    public function test_get_daily_rainfall()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_RAINFALL, "10.21"));
        $this->assertSame("10.21", $testee->getDailyRainfall()->getMillimetres());
    }
    
    public function test_get_rainfall_rate_per_minute()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::RAINFALL_RATE_PER_MINUTE, "0.12"));
        $this->assertSame("0.12", $testee->getRainfallRatePerMinute()->getMillimetresPerMinute());
    }
    
    public function test_get_max_rainfall_rate_per_minute()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_MAX_RAINFALL_RATE_PER_MINUTE, "1.05"));
        $this->assertSame("1.05", $testee->getMaxRainfallRatePerMinute()->getMillimetresPerMinute());
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
        
    public function test_get_yesterdays_rainfall()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::YESTERDAYS_RAINFALL, "5.62"));
        $this->assertSame("5.62", $testee->getYesterdaysRainfall()->getMillimetres());
    }

    public function test_get_station_name()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::STATION_NAME, "Clifton,_NJ,_USA-17:45"));
        $this->assertSame("Clifton, NJ, USA", $testee->getStationName());
    }
    
    public function test_get_wind_chill()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::WIND_CHILL, "3.2"));
        $this->assertSame("3.2", $testee->getWindChill()->getCelsius());
    }
        
    public function test_get_humidex()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::HUMIDEX, "24.3"));
        $this->assertSame("24.3", $testee->getHumidex()->getCelsius());
    }
    
    public function test_get_daily_high_outdoor_temperature()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_OUTDOOR_TEMPERATURE, "30.8"));
        $this->assertSame("30.8", $testee->getDailyHighOutdoorTemperature()->getCelsius());
    }
    
    public function test_get_daily_high_outdoor_temperature_when_outdoor_temperature_higher()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_OUTDOOR_TEMPERATURE, "30.8"),
                new Field(ClientRaw::OUTDOOR_TEMPERATURE, "30.9")));
                
        $this->assertSame("30.9", $testee->getDailyHighOutdoorTemperature()->getCelsius());
    }
    
    public function test_get_daily_low_outdoor_temperature()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_OUTDOOR_TEMPERATURE, "-13.3"));
        $this->assertSame("-13.3", $testee->getDailyLowOutdoorTemperature()->getCelsius());
    }
    
    public function test_get_daily_low_outdoor_temperature_when_outdoor_temperature_lower()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_OUTDOOR_TEMPERATURE, "-13.3"),
                new Field(ClientRaw::OUTDOOR_TEMPERATURE, "-13.4")));
                
        $this->assertSame("-13.4", $testee->getDailyLowOutdoorTemperature()->getCelsius());
    }

    public function test_get_maximum_gust_speed()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::MAXIMUM_GUST_SPEED, "15.5"));
        $this->assertSame("15.5", $testee->getMaximumGustSpeed()->getKnots());
    }
        
    public function test_get_dew_point()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DEW_POINT, "2.9"));
        $this->assertSame("2.9", $testee->getDewPoint()->getCelsius());
    }
        
    public function test_get_daily_high_humidex()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_HUMIDEX, "30.3"));
        $this->assertSame("30.3", $testee->getDailyHighHumidex()->getCelsius());
    }
    
    public function test_get_daily_high_humidex_when_humidex_lower()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_HUMIDEX, "30.3"),
                new Field(ClientRaw::HUMIDEX, "30.4")));
                
        $this->assertSame("30.4", $testee->getDailyHighHumidex()->getCelsius());
    }
    
    public function test_get_daily_low_humidex()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_HUMIDEX, "16.4"));
        $this->assertSame("16.4", $testee->getDailyLowHumidex()->getCelsius());
    }
    
    public function test_get_daily_low_humidex_when_humidex_lower()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_HUMIDEX, "16.4"),
                new Field(ClientRaw::HUMIDEX, "16.3")));
                
        $this->assertSame("16.3", $testee->getDailyLowHumidex()->getCelsius());
    }
        
    public function test_get_daily_high_wind_chill()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_WIND_CHILL, "17.6"));
        $this->assertSame("17.6", $testee->getDailyHighWindChill()->getCelsius());
    }
    
    public function test_get_daily_high_wind_chill_when_wind_chill_lower()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_WIND_CHILL, "17.6"),
                new Field(ClientRaw::WIND_CHILL, "17.7")));
                
        $this->assertSame("17.7", $testee->getDailyHighWindChill()->getCelsius());
    }
    
    public function test_get_daily_low_wind_chill()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_WIND_CHILL, "-7.5"));
        $this->assertSame("-7.5", $testee->getDailyLowWindChill()->getCelsius());
    }
    
    public function test_get_daily_low_wind_chill_when_wind_chill_lower()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_WIND_CHILL, "-7.5"),
                new Field(ClientRaw::WIND_CHILL, "-7.6")));
                
        $this->assertSame("-7.6", $testee->getDailyLowWindChill()->getCelsius());
    }
    
    public function test_get_uv()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::UV_INDEX, "9.0"));
        $this->assertSame("9.0", $testee->getUv()->getUvi());
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
    
    public function test_get_daily_high_surface_pressure()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_SURFACE_PRESSURE, "1025.2"));
        $this->assertSame("1025.2", $testee->getDailyHighSurfacePressure()->getHectopascals());
    }
    
    public function test_get_daily_high_surface_pressure_when_surface_pressure_higher()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_SURFACE_PRESSURE, "1025.2"),
                new Field(ClientRaw::SURFACE_PRESSURE, "1025.3")));
                
        $this->assertSame("1025.3", $testee->getDailyHighSurfacePressure()->getHectopascals());
    }
    
    public function test_get_daily_low_surface_pressure()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_SURFACE_PRESSURE, "1019.3"));
        $this->assertSame("1019.3", $testee->getDailyLowSurfacePressure()->getHectopascals());
    }
    
    public function test_get_daily_low_surface_pressure_when_surface_pressure_lower()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_SURFACE_PRESSURE, "1019.3"),
                new Field(ClientRaw::SURFACE_PRESSURE, "1019.2")));
                
        $this->assertSame("1019.2", $testee->getDailyLowSurfacePressure()->getHectopascals());
    }
        
    public function test_get_daily_high_dew_point()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_DEW_POINT, "9.4"));
        $this->assertSame("9.4", $testee->getDailyHighDewPoint()->getCelsius());
    }
    
    public function test_get_daily_high_dew_point_when_dew_point_higher()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_DEW_POINT, "9.4"),
                new Field(ClientRaw::DEW_POINT, "9.5")));
                
        $this->assertSame("9.5", $testee->getDailyHighDewPoint()->getCelsius());
    }
        
    public function test_get_daily_low_dew_point()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_DEW_POINT, "1.5"));
        $this->assertSame("1.5", $testee->getDailyLowDewPoint()->getCelsius());
    }
    
    public function test_get_daily_low_dew_point_when_dew_point_lower()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_DEW_POINT, "1.5"),
                new Field(ClientRaw::DEW_POINT, "1.4")));
                
        $this->assertSame("1.4", $testee->getDailyLowDewPoint()->getCelsius());
    }
    
    public function test_get_outdoor_temperature_trend()
    {        
        $testee = self::createClientRawWithField(new Field(ClientRaw::OUTDOOR_TEMPERATURE_TREND, "1"));
        $this->assertSame("1", $testee->getOutdoorTemperatureTrend()->getTrend());
    }
    
    public function test_get_outdoor_humidity_trend()
    {        
        $testee = self::createClientRawWithField(new Field(ClientRaw::OUTDOOR_HUMIDITY_TREND, "-1"));
        $this->assertSame("-1", $testee->getOutdoorHumidityTrend()->getTrend());
    }
    
    public function test_get_humidex_trend()
    {        
        $testee = self::createClientRawWithField(new Field(ClientRaw::HUMIDEX_TREND, "1"));
        $this->assertSame("1", $testee->getHumidexTrend()->getTrend());        
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
    
    public function test_get_daily_high_outdoor_humidity()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_OUTDOOR_HUMIDITY, "67"));
        $this->assertSame("67", $testee->getDailyHighOutdoorHumidity()->getPercentage());
    }
    
    public function test_get_daily_high_outdoor_humidity_when_outdoor_humidity_higher()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_OUTDOOR_HUMIDITY, "67"),
                new Field(ClientRaw::OUTDOOR_HUMIDITY, "68")));
                
        $this->assertSame("68", $testee->getDailyHighOutdoorHumidity()->getPercentage());
    }    
    
    public function test_get_daily_low_outdoor_humidity()
    {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_OUTDOOR_HUMIDITY, "26"));
        $this->assertSame("26", $testee->getDailyLowOutdoorHumidity()->getPercentage());
    }
    
    public function test_get_daily_low_outdoor_humidity_when_outdoor_humidity_lower()
    {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_OUTDOOR_HUMIDITY, "26"),
                new Field(ClientRaw::OUTDOOR_HUMIDITY, "25")));
                
        $this->assertSame("25", $testee->getDailyLowOutdoorHumidity()->getPercentage());
    }    

    public function test_get_surface_pressure_trend_per_hour()
    {        
        $testee = self::createClientRawWithField(new Field(ClientRaw::SURFACE_PRESSURE_TREND_PER_HOUR, "-1.0"));
        $this->assertSame("-1.0", $testee->getSurfacePressureTrendPerHour()->getHectopascals());
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
        $this->assertNull($testee->getOutdoorHumidity()->getPercentage());
        $this->assertNull($testee->getSurfacePressure()->getHectopascals());
        $this->assertNull($testee->getDailyRainfall()->getMillimetres());
        $this->assertNull($testee->getRainfallRatePerMinute()->getMillimetresPerMinute());
        $this->assertNull($testee->getMaxRainfallRatePerMinute()->getMillimetresPerMinute());        
        $this->assertNull($testee->getIndoorTemperature()->getCelsius());
        $this->assertNull($testee->getIndoorHumidity()->getPercentage());
        $this->assertNull($testee->getYesterdaysRainfall()->getMillimetres());
        $this->assertNull($testee->getStationName());
        $this->assertNull($testee->getWindChill()->getCelsius());
        $this->assertNull($testee->getHumidex()->getCelsius());        
		$this->assertNull($testee->getDailyHighOutdoorTemperature()->getCelsius());
		$this->assertNull($testee->getDailyLowOutdoorTemperature()->getCelsius());
        $this->assertNull($testee->getMaximumGustSpeed()->getKnots());
        $this->assertNull($testee->getDewPoint()->getCelsius());
        $this->assertNull($testee->getDailyHighHumidex()->getCelsius());        
        $this->assertNull($testee->getDailyLowHumidex()->getCelsius());
        $this->assertNull($testee->getDailyHighWindChill()->getCelsius());
        $this->assertNull($testee->getDailyLowWindChill()->getCelsius());
        $this->assertNull($testee->getUv()->getUvi());
        $this->assertNull($testee->getMaximumAverageWindSpeed()->getKnots());
        $this->assertNull($testee->getAverageWindDirection()->getCompassDegrees());
        $this->assertNull($testee->getDailyHighSurfacePressure()->getHectopascals());
        $this->assertNull($testee->getDailyLowSurfacePressure()->getHectopascals());
        $this->assertNull($testee->getDailyHighDewPoint()->getCelsius());
        $this->assertNull($testee->getDailyLowDewPoint()->getCelsius());
	    $this->assertNull($testee->getOutdoorTemperatureTrend()->getTrend());
	    $this->assertNull($testee->getOutdoorHumidityTrend()->getTrend());
	    $this->assertNull($testee->getHumidexTrend()->getTrend());
        $this->assertNull($testee->getLatitude());
        $this->assertNull($testee->getLongitude());
        $this->assertNull($testee->getDailyHighOutdoorHumidity()->getPercentage());
        $this->assertNull($testee->getDailyLowOutdoorHumidity()->getPercentage());
        $this->assertNull($testee->getSurfacePressureTrendPerHour()->getHectopascals());
        $this->assertNull($testee->getWdVersion());

        $this->assertNull($testee->getDateAndTime()->getYear());
        $this->assertNull($testee->getDateAndTime()->getMonth());
        $this->assertNull($testee->getDateAndTime()->getDay());
        $this->assertNull($testee->getDateAndTime()->getHour());
        $this->assertNull($testee->getDateAndTime()->getMinute());
    }
}

?>
