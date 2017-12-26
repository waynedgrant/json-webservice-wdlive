<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("ClientRawFileGenerator.php");

class ClientRawTest extends PHPUnit\Framework\TestCase {

    const CLIENT_RAW_PATH = "./clientraw.txt";

    private static $generator;

    public static function setUpBeforeClass() {
        self::$generator = new ClientRawFileGenerator(self::CLIENT_RAW_PATH);
    }

    protected function tearDown() {
        self::$generator->delete();
    }

    private function createEmptyClientRaw() {
        self::$generator->generateEmpty();
        return new ClientRaw(self::CLIENT_RAW_PATH);
    }

    private function createClientRawWithField($field) {
        self::$generator->generateWithField($field);
        return new ClientRaw(self::CLIENT_RAW_PATH);
    }

    private function createClientRawWithFields($fields) {
        self::$generator->generateWithFields($fields);
        return new ClientRaw(self::CLIENT_RAW_PATH);
    }

    public function test_get_average_wind_speed() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::AVERAGE_WIND_SPEED, "4.3"));
        $this->assertSame("4.3", $testee->getAverageWindSpeed()->getKnots());
    }

    public function test_get_gust_speed() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::GUST_SPEED, "5.8"));
        $this->assertSame("5.8", $testee->getGustSpeed()->getKnots());
    }

    public function test_get_wind_direction() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::WIND_DIRECTION, "90"));
        $this->assertSame("90", $testee->getWindDirection()->getCompassDegrees());
    }

    public function test_get_outdoor_temperature() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::OUTDOOR_TEMPERATURE, "16.1"));
        $this->assertSame("16.1", $testee->getOutdoorTemperature()->getCelsius());
    }

    public function test_get_outdoor_humidity() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::OUTDOOR_HUMIDITY, "45"));
        $this->assertSame("45", $testee->getOutdoorHumidity()->getPercentage());
    }

    public function test_get_surface_pressure() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::SURFACE_PRESSURE, "1021.7"));
        $this->assertSame("1021.7", $testee->getSurfacePressure()->getHectopascals());
    }

    public function test_get_daily_rainfall() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_RAINFALL, "10.21"));
        $this->assertSame("10.21", $testee->getDailyRainfall()->getMillimetres());
    }

    public function test_get_monthly_rainfall() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::MONTHLY_RAINFALL, "50.45"));
        $this->assertSame("50.45", $testee->getMonthlyRainfall()->getMillimetres());
    }

    public function test_get_annual_rainfall() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::ANNUAL_RAINFALL, "167.15"));
        $this->assertSame("167.15", $testee->getAnnualRainfall()->getMillimetres());
    }

    public function test_get_rainfall_rate() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::RAINFALL_RATE, "0.12"));
        $this->assertSame("0.12", $testee->getRainfallRate()->getMillimetresPerMinute());
    }

    public function test_get_max_rainfall_rate() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_MAXIMUM_RAINFALL_RATE, "1.05"));
        $this->assertSame("1.05", $testee->getMaximumRainfallRate()->getMillimetresPerMinute());
    }

    public function test_get_indoor_temperature() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::INDOOR_TEMPERATURE, "25.6"));
        $this->assertSame("25.6", $testee->getIndoorTemperature()->getCelsius());
    }

    public function test_get_indoor_humidity() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::INDOOR_HUMIDITY, "45"));
        $this->assertSame("45", $testee->getIndoorHumidity()->getPercentage());
    }

    public function test_get_soil_temperature() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::SOIL_TEMPERATURE, "4.5"));
        $this->assertSame("4.5", $testee->getSoilTemperature()->getCelsius());
    }

    public function test_get_forecast_icon() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::FORECAST_ICON, "22"));
        $this->assertSame("22", $testee->getForecastIcon()->getCode());
    }

    public function test_get_yesterdays_rainfall() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::YESTERDAYS_RAINFALL, "5.62"));
        $this->assertSame("5.62", $testee->getYesterdaysRainfall()->getMillimetres());
    }

    public function test_get_station_name() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::STATION_NAME, "Clifton,_NJ,_USA-17:45"));
        $this->assertSame("Clifton, NJ, USA", $testee->getStationName());
    }

    public function test_get_solar_percentage() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::SOLAR_PERCENTAGE, "56"));
        $this->assertSame("56", $testee->getSolarPercentage());
    }

    public function test_get_wind_chill() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::WIND_CHILL, "3.2"));
        $this->assertSame("3.2", $testee->getWindChill()->getCelsius());
    }

    public function test_get_humidex() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::HUMIDEX, "24.3"));
        $this->assertSame("24.3", $testee->getHumidex()->getCelsius());
    }

    public function test_get_daily_high_outdoor_temperature() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_OUTDOOR_TEMPERATURE, "30.8"));
        $this->assertSame("30.8", $testee->getDailyHighOutdoorTemperature()->getCelsius());
    }

    public function test_get_daily_high_outdoor_temperature_when_outdoor_temperature_higher() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_OUTDOOR_TEMPERATURE, "30.8"),
                new Field(ClientRaw::OUTDOOR_TEMPERATURE, "30.9")));

        $this->assertSame("30.9", $testee->getDailyHighOutdoorTemperature()->getCelsius());
    }

    public function test_get_daily_low_outdoor_temperature() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_OUTDOOR_TEMPERATURE, "-13.3"));
        $this->assertSame("-13.3", $testee->getDailyLowOutdoorTemperature()->getCelsius());
    }

    public function test_get_daily_low_outdoor_temperature_when_outdoor_temperature_lower() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_OUTDOOR_TEMPERATURE, "-13.3"),
                new Field(ClientRaw::OUTDOOR_TEMPERATURE, "-13.4")));

        $this->assertSame("-13.4", $testee->getDailyLowOutdoorTemperature()->getCelsius());
    }

    public function test_get_surface_pressure_trend_per_hour() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::SURFACE_PRESSURE_TREND_PER_HOUR, "-1.0"));
        $this->assertSame("-1.0", $testee->getSurfacePressureTrendPerHour()->getHectopascals());
    }

    public function test_get_maximum_gust_speed() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::MAXIMUM_GUST_SPEED, "15.5"));
        $this->assertSame("15.5", $testee->getMaximumGustSpeed()->getKnots());
    }

    public function test_get_dew_point() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DEW_POINT, "2.9"));
        $this->assertSame("2.9", $testee->getDewPoint()->getCelsius());
    }

    public function test_get_cloud_formation_altitude() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::CLOUD_FORMATION_ALTITUDE, "3251"));
        $this->assertSame("3251", $testee->getCloudFormationAltitude()->getFeet());
    }

    public function test_get_daily_high_humidex() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_HUMIDEX, "30.3"));
        $this->assertSame("30.3", $testee->getDailyHighHumidex()->getCelsius());
    }

    public function test_get_daily_high_humidex_when_humidex_higher() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_HUMIDEX, "30.3"),
                new Field(ClientRaw::HUMIDEX, "30.4")));

        $this->assertSame("30.4", $testee->getDailyHighHumidex()->getCelsius());
    }

    public function test_get_daily_low_humidex() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_HUMIDEX, "16.4"));
        $this->assertSame("16.4", $testee->getDailyLowHumidex()->getCelsius());
    }

    public function test_get_daily_low_humidex_when_humidex_lower() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_HUMIDEX, "16.4"),
                new Field(ClientRaw::HUMIDEX, "16.3")));

        $this->assertSame("16.3", $testee->getDailyLowHumidex()->getCelsius());
    }

    public function test_get_daily_high_wind_chill() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_WIND_CHILL, "17.6"));
        $this->assertSame("17.6", $testee->getDailyHighWindChill()->getCelsius());
    }

    public function test_get_daily_high_wind_chill_when_wind_chill_higher() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_WIND_CHILL, "17.6"),
                new Field(ClientRaw::WIND_CHILL, "17.7")));

        $this->assertSame("17.7", $testee->getDailyHighWindChill()->getCelsius());
    }

    public function test_get_daily_low_wind_chill() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_WIND_CHILL, "-7.5"));
        $this->assertSame("-7.5", $testee->getDailyLowWindChill()->getCelsius());
    }

    public function test_get_daily_low_wind_chill_when_wind_chill_lower() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_WIND_CHILL, "-7.5"),
                new Field(ClientRaw::WIND_CHILL, "-7.6")));

        $this->assertSame("-7.6", $testee->getDailyLowWindChill()->getCelsius());
    }

    public function test_get_uv() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::UV_INDEX, "9.0"));
        $this->assertSame("9.0", $testee->getUv()->getUvi());
    }

    public function test_get_daily_high_heat_index() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_HEAT_INDEX, "32.4"));
        $this->assertSame("32.4", $testee->getDailyHighHeatIndex()->getCelsius());
    }

    public function test_get_daily_high_heat_index_when_heat_index_higher() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_HEAT_INDEX, "32.4"),
                new Field(ClientRaw::HEAT_INDEX, "32.5")));

        $this->assertSame("32.5", $testee->getDailyHighHeatIndex()->getCelsius());
    }

    public function test_get_daily_low_heat_index() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_HEAT_INDEX, "17.3"));
        $this->assertSame("17.3", $testee->getDailyLowHeatIndex()->getCelsius());
    }

    public function test_get_daily_low_heat_index_when_heat_index_lower() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_HEAT_INDEX, "17.3"),
                new Field(ClientRaw::HEAT_INDEX, "17.2")));

        $this->assertSame("17.2", $testee->getDailyLowHeatIndex()->getCelsius());
    }

    public function test_get_heat_index() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::HEAT_INDEX, "25.1"));
        $this->assertSame("25.1", $testee->getHeatIndex()->getCelsius());
    }

    public function test_get_maximum_average_wind_speed() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::MAXIMUM_AVERAGE_WIND_SPEED, "12.3"));
        $this->assertSame("12.3", $testee->getMaximumAverageWindSpeed()->getKnots());
    }

    public function test_get_average_wind_direction() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::AVERAGE_WIND_DIRECTION, "270"));
        $this->assertSame("270", $testee->getAverageWindDirection()->getCompassDegrees());
    }

    public function test_get_solar_irradiance() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::SOLAR_IRRADIANCE, "713"));
        $this->assertSame("713", $testee->getSolarIrradiance()->getWattsPerSquareMetre());
    }

    public function test_get_daily_high_indoor_temperature() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_INDOOR_TEMPERATURE, "28.7"));
        $this->assertSame("28.7", $testee->getDailyHighIndoorTemperature()->getCelsius());
    }

    public function test_get_daily_high_indoor_temperature_when_indoor_temperature_higher() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_INDOOR_TEMPERATURE, "28.7"),
                new Field(ClientRaw::INDOOR_TEMPERATURE, "28.8")));

        $this->assertSame("28.8", $testee->getDailyHighIndoorTemperature()->getCelsius());
    }

    public function test_get_daily_low_indoor_temperature() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_INDOOR_TEMPERATURE, "19.6"));
        $this->assertSame("19.6", $testee->getDailyLowIndoorTemperature()->getCelsius());
    }

    public function test_get_daily_low_indoor_temperature_when_indoor_temperature_lower() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_INDOOR_TEMPERATURE, "19.3"),
                new Field(ClientRaw::INDOOR_TEMPERATURE, "19.2")));

        $this->assertSame("19.2", $testee->getDailyLowIndoorTemperature()->getCelsius());
    }

    public function test_get_apparent_temperature() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::APPARENT_TEMPERATURE, "26.7"));
        $this->assertSame("26.7", $testee->getApparentTemperature()->getCelsius());
    }

    public function test_get_daily_high_surface_pressure() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_SURFACE_PRESSURE, "1025.2"));
        $this->assertSame("1025.2", $testee->getDailyHighSurfacePressure()->getHectopascals());
    }

    public function test_get_daily_high_surface_pressure_when_surface_pressure_higher() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_SURFACE_PRESSURE, "1025.2"),
                new Field(ClientRaw::SURFACE_PRESSURE, "1025.3")));

        $this->assertSame("1025.3", $testee->getDailyHighSurfacePressure()->getHectopascals());
    }

    public function test_get_daily_low_surface_pressure() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_SURFACE_PRESSURE, "1019.3"));
        $this->assertSame("1019.3", $testee->getDailyLowSurfacePressure()->getHectopascals());
    }

    public function test_get_daily_low_surface_pressure_when_surface_pressure_lower() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_SURFACE_PRESSURE, "1019.3"),
                new Field(ClientRaw::SURFACE_PRESSURE, "1019.2")));

        $this->assertSame("1019.2", $testee->getDailyLowSurfacePressure()->getHectopascals());
    }

    public function test_get_daily_high_apparent_temperature() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_APPARENT_TEMPERATURE, "30.0"));
        $this->assertSame("30.0", $testee->getDailyHighApparentTemperature()->getCelsius());
    }

    public function test_get_daily_high_apparent_temperature_when_apparent_temperature_higher() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_APPARENT_TEMPERATURE, "30.0"),
                new Field(ClientRaw::APPARENT_TEMPERATURE, "30.1")));

        $this->assertSame("30.1", $testee->getDailyHighApparentTemperature()->getCelsius());
    }

    public function test_get_daily_low_apparent_temperature() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_APPARENT_TEMPERATURE, "-5.2"));
        $this->assertSame("-5.2", $testee->getDailyLowApparentTemperature()->getCelsius());
    }

    public function test_get_daily_low_apparent_temperature_when_apparent_temperature_lower() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_APPARENT_TEMPERATURE, "-5.2"),
                new Field(ClientRaw::APPARENT_TEMPERATURE, "-5.3")));

        $this->assertSame("-5.3", $testee->getDailyLowApparentTemperature()->getCelsius());
    }

    public function test_get_daily_high_dew_point() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_DEW_POINT, "9.4"));
        $this->assertSame("9.4", $testee->getDailyHighDewPoint()->getCelsius());
    }

    public function test_get_daily_high_dew_point_when_dew_point_higher() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_DEW_POINT, "9.4"),
                new Field(ClientRaw::DEW_POINT, "9.5")));

        $this->assertSame("9.5", $testee->getDailyHighDewPoint()->getCelsius());
    }

    public function test_get_daily_low_dew_point() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_DEW_POINT, "1.5"));
        $this->assertSame("1.5", $testee->getDailyLowDewPoint()->getCelsius());
    }

    public function test_get_daily_low_dew_point_when_dew_point_lower() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_DEW_POINT, "1.5"),
                new Field(ClientRaw::DEW_POINT, "1.4")));

        $this->assertSame("1.4", $testee->getDailyLowDewPoint()->getCelsius());
    }

    public function test_get_outdoor_temperature_trend() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::OUTDOOR_TEMPERATURE_TREND, "1"));
        $this->assertSame("1", $testee->getOutdoorTemperatureTrend()->getTrend());
    }

    public function test_get_outdoor_humidity_trend() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::OUTDOOR_HUMIDITY_TREND, "-1"));
        $this->assertSame("-1", $testee->getOutdoorHumidityTrend()->getTrend());
    }

    public function test_get_humidex_trend() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::HUMIDEX_TREND, "1"));
        $this->assertSame("1", $testee->getHumidexTrend()->getTrend());
    }

    public function test_get_wet_bulb_temperature() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::WET_BULB_TEMPERATURE, "35.7"));
        $this->assertSame("35.7", $testee->getWetBulbTemperature()->getCelsius());
    }

    public function test_get_latitude() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::LATITUDE, "40.874444"));
        $this->assertSame("40.874444", $testee->getLatitude());
    }

    public function test_get_longitude() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::LONGITUDE, "74.16"));
        $this->assertSame("74.16", $testee->getLongitude());
    }

    public function test_get_daily_high_outdoor_humidity() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_HIGH_OUTDOOR_HUMIDITY, "67"));
        $this->assertSame("67", $testee->getDailyHighOutdoorHumidity()->getPercentage());
    }

    public function test_get_daily_high_outdoor_humidity_when_outdoor_humidity_higher() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_HIGH_OUTDOOR_HUMIDITY, "67"),
                new Field(ClientRaw::OUTDOOR_HUMIDITY, "68")));

        $this->assertSame("68", $testee->getDailyHighOutdoorHumidity()->getPercentage());
    }

    public function test_get_daily_low_outdoor_humidity() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::DAILY_LOW_OUTDOOR_HUMIDITY, "26"));
        $this->assertSame("26", $testee->getDailyLowOutdoorHumidity()->getPercentage());
    }

    public function test_get_daily_low_outdoor_humidity_when_outdoor_humidity_lower() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::DAILY_LOW_OUTDOOR_HUMIDITY, "26"),
                new Field(ClientRaw::OUTDOOR_HUMIDITY, "25")));

        $this->assertSame("25", $testee->getDailyLowOutdoorHumidity()->getPercentage());
    }

    public function test_get_extra_temperature_1() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_TEMPERATURE_1, "1.5"));
        $this->assertSame("1.5", $testee->getExtraTemperature1()->getCelsius());
    }

    public function test_get_extra_temperature_2() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_TEMPERATURE_2, "2.5"));
        $this->assertSame("2.5", $testee->getExtraTemperature2()->getCelsius());
    }

    public function test_get_extra_temperature_3() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_TEMPERATURE_3, "3.5"));
        $this->assertSame("3.5", $testee->getExtraTemperature3()->getCelsius());
    }

    public function test_get_extra_temperature_4() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_TEMPERATURE_4, "4.5"));
        $this->assertSame("4.5", $testee->getExtraTemperature4()->getCelsius());
    }

    public function test_get_extra_temperature_5() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_TEMPERATURE_5, "5.5"));
        $this->assertSame("5.5", $testee->getExtraTemperature5()->getCelsius());
    }

    public function test_get_extra_temperature_6() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_TEMPERATURE_6, "6.5"));
        $this->assertSame("6.5", $testee->getExtraTemperature6()->getCelsius());
    }

    public function test_get_extra_temperature_7() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_TEMPERATURE_7, "7.5"));
        $this->assertSame("7.5", $testee->getExtraTemperature7()->getCelsius());
    }

    public function test_get_extra_temperature_8() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_TEMPERATURE_8, "8.5"));
        $this->assertSame("8.5", $testee->getExtraTemperature8()->getCelsius());
    }

    public function test_get_extra_humidity_1() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_HUMIDITY_1, "15"));
        $this->assertSame("15", $testee->getExtraHumidity1()->getPercentage());
    }

    public function test_get_extra_humidity_2() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_HUMIDITY_2, "25"));
        $this->assertSame("25", $testee->getExtraHumidity2()->getPercentage());
    }

    public function test_get_extra_humidity_3() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_HUMIDITY_3, "35"));
        $this->assertSame("35", $testee->getExtraHumidity3()->getPercentage());
    }

    public function test_get_extra_humidity_4() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_HUMIDITY_4, "45"));
        $this->assertSame("45", $testee->getExtraHumidity4()->getPercentage());
    }

    public function test_get_extra_humidity_5() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_HUMIDITY_5, "55"));
        $this->assertSame("55", $testee->getExtraHumidity5()->getPercentage());
    }

    public function test_get_extra_humidity_6() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_HUMIDITY_6, "65"));
        $this->assertSame("65", $testee->getExtraHumidity6()->getPercentage());
    }

    public function test_get_extra_humidity_7() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_HUMIDITY_7, "75"));
        $this->assertSame("75", $testee->getExtraHumidity7()->getPercentage());
    }

    public function test_get_extra_humidity_8() {
        $testee = self::createClientRawWithField(new Field(ClientRaw::EXTRA_HUMIDITY_8, "85"));
        $this->assertSame("85", $testee->getExtraHumidity8()->getPercentage());
    }

    public function test_get_current_date_and_time() {
        $testee = self::createClientRawWithFields(
            array(
                new Field(ClientRaw::YEAR, "2015"),
                new Field(ClientRaw::MONTH, "12"),
                new Field(ClientRaw::DAY, "31"),
                new Field(ClientRaw::HOUR, "23"),
                new Field(ClientRaw::MINUTE, "59")));

        $currentDateAndTime = $testee->getCurrentDateAndTime();

        $this->assertSame("2015", $currentDateAndTime->getYear());
        $this->assertSame("12", $currentDateAndTime->getMonth());
        $this->assertSame("31", $currentDateAndTime->getDay());
        $this->assertSame("23", $currentDateAndTime->getHour());
        $this->assertSame("59", $currentDateAndTime->getMinute());
    }

    public function test_get_wd_version() {
        $testee = self::createClientRawWithField(new Field(167, "!!C10.37Of!!"));
        $this->assertSame("10.37Of", $testee->getWdVersion());
    }

    public function test_when_fields_are_missing() {
        $testee = self::createEmptyClientRaw();

        $this->assertNull($testee->getAverageWindSpeed()->getKnots());
        $this->assertNull($testee->getGustSpeed()->getKnots());
        $this->assertNull($testee->getWindDirection()->getCompassDegrees());
        $this->assertNull($testee->getOutdoorTemperature()->getCelsius());
        $this->assertNull($testee->getOutdoorHumidity()->getPercentage());
        $this->assertNull($testee->getSurfacePressure()->getHectopascals());
        $this->assertNull($testee->getDailyRainfall()->getMillimetres());
        $this->assertNull($testee->getMonthlyRainfall()->getMillimetres());
        $this->assertNull($testee->getAnnualRainfall()->getMillimetres());
        $this->assertNull($testee->getRainfallRate()->getMillimetresPerMinute());
        $this->assertNull($testee->getMaximumRainfallRate()->getMillimetresPerMinute());
        $this->assertNull($testee->getIndoorTemperature()->getCelsius());
        $this->assertNull($testee->getIndoorHumidity()->getPercentage());
        $this->assertNull($testee->getSoilTemperature()->getCelsius());
        $this->assertNull($testee->getForecastIcon()->getCode());
        $this->assertNull($testee->getYesterdaysRainfall()->getMillimetres());
        $this->assertNull($testee->getStationName());
        $this->assertNull($testee->getSolarPercentage());
        $this->assertNull($testee->getWindChill()->getCelsius());
        $this->assertNull($testee->getHumidex()->getCelsius());
        $this->assertNull($testee->getDailyHighOutdoorTemperature()->getCelsius());
        $this->assertNull($testee->getDailyLowOutdoorTemperature()->getCelsius());
        $this->assertNull($testee->getMaximumGustSpeed()->getKnots());
        $this->assertNull($testee->getDewPoint()->getCelsius());
        $this->assertNull($testee->getCloudFormationAltitude()->getFeet());
        $this->assertNull($testee->getDailyHighHumidex()->getCelsius());
        $this->assertNull($testee->getDailyLowHumidex()->getCelsius());
        $this->assertNull($testee->getDailyHighWindChill()->getCelsius());
        $this->assertNull($testee->getDailyLowWindChill()->getCelsius());
        $this->assertNull($testee->getUv()->getUvi());
        $this->assertNull($testee->getDailyHighHeatIndex()->getCelsius());
        $this->assertNull($testee->getDailyLowHeatIndex()->getCelsius());
        $this->assertNull($testee->getHeatIndex()->getCelsius());
        $this->assertNull($testee->getMaximumAverageWindSpeed()->getKnots());
        $this->assertNull($testee->getAverageWindDirection()->getCompassDegrees());
        $this->assertNull($testee->getSolarIrradiance()->getWattsPerSquareMetre());
        $this->assertNull($testee->getDailyHighIndoorTemperature()->getCelsius());
        $this->assertNull($testee->getDailyLowIndoorTemperature()->getCelsius());
        $this->assertNull($testee->getApparentTemperature()->getCelsius());
        $this->assertNull($testee->getDailyHighSurfacePressure()->getHectopascals());
        $this->assertNull($testee->getDailyLowSurfacePressure()->getHectopascals());
        $this->assertNull($testee->getDailyHighApparentTemperature()->getCelsius());
        $this->assertNull($testee->getDailyLowApparentTemperature()->getCelsius());
        $this->assertNull($testee->getDailyHighDewPoint()->getCelsius());
        $this->assertNull($testee->getDailyLowDewPoint()->getCelsius());
        $this->assertNull($testee->getOutdoorTemperatureTrend()->getTrend());
        $this->assertNull($testee->getOutdoorHumidityTrend()->getTrend());
        $this->assertNull($testee->getHumidexTrend()->getTrend());
        $this->assertNull($testee->getWetBulbTemperature()->getCelsius());
        $this->assertNull($testee->getLatitude());
        $this->assertNull($testee->getLongitude());
        $this->assertNull($testee->getDailyHighOutdoorHumidity()->getPercentage());
        $this->assertNull($testee->getDailyLowOutdoorHumidity()->getPercentage());
        $this->assertNull($testee->getSurfacePressureTrendPerHour()->getHectopascals());

        $this->assertNull($testee->getExtraTemperature1()->getCelsius());
        $this->assertNull($testee->getExtraTemperature2()->getCelsius());
        $this->assertNull($testee->getExtraTemperature3()->getCelsius());
        $this->assertNull($testee->getExtraTemperature4()->getCelsius());
        $this->assertNull($testee->getExtraTemperature5()->getCelsius());
        $this->assertNull($testee->getExtraTemperature6()->getCelsius());
        $this->assertNull($testee->getExtraTemperature7()->getCelsius());
        $this->assertNull($testee->getExtraTemperature8()->getCelsius());
        $this->assertNull($testee->getExtraHumidity1()->getPercentage());
        $this->assertNull($testee->getExtraHumidity2()->getPercentage());
        $this->assertNull($testee->getExtraHumidity3()->getPercentage());
        $this->assertNull($testee->getExtraHumidity4()->getPercentage());
        $this->assertNull($testee->getExtraHumidity5()->getPercentage());
        $this->assertNull($testee->getExtraHumidity6()->getPercentage());
        $this->assertNull($testee->getExtraHumidity7()->getPercentage());
        $this->assertNull($testee->getExtraHumidity8()->getPercentage());

        $this->assertNull($testee->getCurrentDateAndTime()->getYear());
        $this->assertNull($testee->getCurrentDateAndTime()->getMonth());
        $this->assertNull($testee->getCurrentDateAndTime()->getDay());
        $this->assertNull($testee->getCurrentDateAndTime()->getHour());
        $this->assertNull($testee->getCurrentDateAndTime()->getMinute());

        $this->assertNull($testee->getWdVersion());
    }
}

?>
