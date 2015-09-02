<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("BaseClientRaw.php");
require_once("DateAndTime.php");
require_once("Pressure.php");
require_once("RainfallRate.php");
require_once("Temperature.php");
require_once("Uv.php");
require_once("WindDirection.php");
require_once("WindSpeed.php");

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
    const MONTHLY_MAXIMUM_RAINFALL_RATE = 79;
    const MONTHLY_MAXIMUM_RAINFALL_RATE_HOUR = 80;
    const MONTHLY_MAXIMUM_RAINFALL_RATE_MINUTE = 81;
    const MONTHLY_MAXIMUM_RAINFALL_RATE_DAY = 82;
    const MONTHLY_MAXIMUM_RAINFALL_RATE_MONTH = 83;
    const MONTHLY_MAXIMUM_RAINFALL_RATE_YEAR = 84;
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
    const MONTHLY_MAXIMUM_GUST_SPEED = 73;
    const MONTHLY_MAXIMUM_GUST_SPEED_HOUR = 74;
    const MONTHLY_MAXIMUM_GUST_SPEED_MINUTE = 75;
    const MONTHLY_MAXIMUM_GUST_SPEED_DAY = 76;
    const MONTHLY_MAXIMUM_GUST_SPEED_MONTH = 77;
    const MONTHLY_MAXIMUM_GUST_SPEED_YEAR = 78;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED = 109;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_HOUR = 110;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_MINUTE = 111;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_DAY = 112;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_MONTH = 113;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_YEAR = 114;
    const MONTHLY_LOW_WIND_CHILL = 133;
    const MONTHLY_LOW_WIND_CHILL_HOUR = 134;
    const MONTHLY_LOW_WIND_CHILL_MINUTE = 135;
    const MONTHLY_LOW_WIND_CHILL_DAY = 136;
    const MONTHLY_LOW_WIND_CHILL_MONTH = 137;
    const MONTHLY_LOW_WIND_CHILL_YEAR = 138;
    const MONTHLY_MAXIMUM_GUST_SPEED_DIRECTION = 139;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION = 145;
    const MONTHLY_HIGH_HEAT_INDEX = 175;
    const MONTHLY_HIGH_HEAT_INDEX_HOUR = 176;
    const MONTHLY_HIGH_HEAT_INDEX_MINUTE = 177;
    const MONTHLY_HIGH_HEAT_INDEX_DAY = 178;
    const MONTHLY_HIGH_HEAT_INDEX_MONTH = 179;
    const MONTHLY_HIGH_HEAT_INDEX_YEAR = 180;
    const MONTHLY_HIGH_UV = 666;
    const MONTHLY_HIGH_UV_HOUR = 667;
    const MONTHLY_HIGH_UV_MINUTE = 668;
    const MONTHLY_HIGH_UV_DAY = 669;
    const MONTHLY_HIGH_UV_MONTH = 670;
    const MONTHLY_HIGH_UV_YEAR = 671;
    const MONTHLY_HIGH_DEW_POINT = 729;
    const MONTHLY_HIGH_DEW_POINT_HOUR = 730;
    const MONTHLY_HIGH_DEW_POINT_MINUTE = 731;
    const MONTHLY_HIGH_DEW_POINT_DAY = 732;
    const MONTHLY_HIGH_DEW_POINT_MONTH = 733;
    const MONTHLY_HIGH_DEW_POINT_YEAR = 734;
    const MONTHLY_LOW_DEW_POINT = 735;
    const MONTHLY_LOW_DEW_POINT_HOUR = 736;
    const MONTHLY_LOW_DEW_POINT_MINUTE = 737;
    const MONTHLY_LOW_DEW_POINT_DAY = 738;
    const MONTHLY_LOW_DEW_POINT_MONTH = 739;
    const MONTHLY_LOW_DEW_POINT_YEAR = 740;

    const YEARLY_HIGH_OUTDOOR_TEMPERATURE = 187;
    const YEARLY_HIGH_OUTDOOR_TEMPERATURE_HOUR = 188;
    const YEARLY_HIGH_OUTDOOR_TEMPERATURE_MINUTE = 189;
    const YEARLY_HIGH_OUTDOOR_TEMPERATURE_DAY = 190;
    const YEARLY_HIGH_OUTDOOR_TEMPERATURE_MONTH = 191;
    const YEARLY_HIGH_OUTDOOR_TEMPERATURE_YEAR = 192;
    const YEARLY_LOW_OUTDOOR_TEMPERATURE = 193;
    const YEARLY_LOW_OUTDOOR_TEMPERATURE_HOUR = 194;
    const YEARLY_LOW_OUTDOOR_TEMPERATURE_MINUTE = 195;
    const YEARLY_LOW_OUTDOOR_TEMPERATURE_DAY = 196;
    const YEARLY_LOW_OUTDOOR_TEMPERATURE_MONTH = 197;
    const YEARLY_LOW_OUTDOOR_TEMPERATURE_YEAR = 198;
    const YEARLY_MAXIMUM_RAINFALL_RATE = 205;
    const YEARLY_MAXIMUM_RAINFALL_RATE_HOUR = 206;
    const YEARLY_MAXIMUM_RAINFALL_RATE_MINUTE = 207;
    const YEARLY_MAXIMUM_RAINFALL_RATE_DAY = 208;
    const YEARLY_MAXIMUM_RAINFALL_RATE_MONTH = 209;
    const YEARLY_MAXIMUM_RAINFALL_RATE_YEAR = 210;
    const YEARLY_LOW_SURFACE_PRESSURE = 211;
    const YEARLY_LOW_SURFACE_PRESSURE_HOUR = 212;
    const YEARLY_LOW_SURFACE_PRESSURE_MINUTE = 213;
    const YEARLY_LOW_SURFACE_PRESSURE_DAY = 214;
    const YEARLY_LOW_SURFACE_PRESSURE_MONTH = 215;
    const YEARLY_LOW_SURFACE_PRESSURE_YEAR = 216;
    const YEARLY_HIGH_SURFACE_PRESSURE = 217;
    const YEARLY_HIGH_SURFACE_PRESSURE_HOUR = 218;
    const YEARLY_HIGH_SURFACE_PRESSURE_MINUTE = 219;
    const YEARLY_HIGH_SURFACE_PRESSURE_DAY = 220;
    const YEARLY_HIGH_SURFACE_PRESSURE_MONTH = 221;
    const YEARLY_HIGH_SURFACE_PRESSURE_YEAR = 222;
    const YEARLY_MAXIMUM_GUST_SPEED = 199;
    const YEARLY_MAXIMUM_GUST_SPEED_HOUR = 200;
    const YEARLY_MAXIMUM_GUST_SPEED_MINUTE = 201;
    const YEARLY_MAXIMUM_GUST_SPEED_DAY = 202;
    const YEARLY_MAXIMUM_GUST_SPEED_MONTH = 203;
    const YEARLY_MAXIMUM_GUST_SPEED_YEAR = 204;
    const YEARLY_MAXIMUM_AVERAGE_WIND_SPEED = 235;
    const YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_HOUR = 236;
    const YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_MINUTE = 237;
    const YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_DAY = 238;
    const YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_MONTH = 239;
    const YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_YEAR = 240;
    const YEARLY_LOW_WIND_CHILL = 259;
    const YEARLY_LOW_WIND_CHILL_HOUR = 260;
    const YEARLY_LOW_WIND_CHILL_MINUTE = 261;
    const YEARLY_LOW_WIND_CHILL_DAY = 262;
    const YEARLY_LOW_WIND_CHILL_MONTH = 263;
    const YEARLY_LOW_WIND_CHILL_YEAR = 264;
    const YEARLY_MAXIMUM_GUST_SPEED_DIRECTION = 265;
    const YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION = 271;
    const YEARLY_HIGH_HEAT_INDEX = 301;
    const YEARLY_HIGH_HEAT_INDEX_HOUR = 302;
    const YEARLY_HIGH_HEAT_INDEX_MINUTE = 303;
    const YEARLY_HIGH_HEAT_INDEX_DAY = 304;
    const YEARLY_HIGH_HEAT_INDEX_MONTH = 305;
    const YEARLY_HIGH_HEAT_INDEX_YEAR = 306;
    const YEARLY_HIGH_UV = 678;
    const YEARLY_HIGH_UV_HOUR = 679;
    const YEARLY_HIGH_UV_MINUTE = 680;
    const YEARLY_HIGH_UV_DAY = 681;
    const YEARLY_HIGH_UV_MONTH = 682;
    const YEARLY_HIGH_UV_YEAR = 683;
    const YEARLY_HIGH_DEW_POINT = 741;
    const YEARLY_HIGH_DEW_POINT_HOUR = 742;
    const YEARLY_HIGH_DEW_POINT_MINUTE = 743;
    const YEARLY_HIGH_DEW_POINT_DAY = 744;
    const YEARLY_HIGH_DEW_POINT_MONTH = 745;
    const YEARLY_HIGH_DEW_POINT_YEAR = 746;
    const YEARLY_LOW_DEW_POINT = 747;
    const YEARLY_LOW_DEW_POINT_HOUR = 748;
    const YEARLY_LOW_DEW_POINT_MINUTE = 749;
    const YEARLY_LOW_DEW_POINT_DAY = 750;
    const YEARLY_LOW_DEW_POINT_MONTH = 751;
    const YEARLY_LOW_DEW_POINT_YEAR = 752;

    const ALL_TIME_HIGH_OUTDOOR_TEMPERATURE = 313;
    const ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_HOUR = 314;
    const ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_MINUTE = 315;
    const ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_DAY = 316;
    const ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_MONTH = 317;
    const ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_YEAR = 318;
    const ALL_TIME_LOW_OUTDOOR_TEMPERATURE = 319;
    const ALL_TIME_LOW_OUTDOOR_TEMPERATURE_HOUR = 320;
    const ALL_TIME_LOW_OUTDOOR_TEMPERATURE_MINUTE = 321;
    const ALL_TIME_LOW_OUTDOOR_TEMPERATURE_DAY = 322;
    const ALL_TIME_LOW_OUTDOOR_TEMPERATURE_MONTH = 323;
    const ALL_TIME_LOW_OUTDOOR_TEMPERATURE_YEAR = 324;
    const ALL_TIME_MAXIMUM_RAINFALL_RATE = 331;
    const ALL_TIME_MAXIMUM_RAINFALL_RATE_HOUR = 332;
    const ALL_TIME_MAXIMUM_RAINFALL_RATE_MINUTE = 333;
    const ALL_TIME_MAXIMUM_RAINFALL_RATE_DAY = 334;
    const ALL_TIME_MAXIMUM_RAINFALL_RATE_MONTH = 335;
    const ALL_TIME_MAXIMUM_RAINFALL_RATE_YEAR = 336;
    const ALL_TIME_LOW_SURFACE_PRESSURE = 337;
    const ALL_TIME_LOW_SURFACE_PRESSURE_HOUR = 338;
    const ALL_TIME_LOW_SURFACE_PRESSURE_MINUTE = 339;
    const ALL_TIME_LOW_SURFACE_PRESSURE_DAY = 340;
    const ALL_TIME_LOW_SURFACE_PRESSURE_MONTH = 341;
    const ALL_TIME_LOW_SURFACE_PRESSURE_YEAR = 342;
    const ALL_TIME_HIGH_SURFACE_PRESSURE = 343;
    const ALL_TIME_HIGH_SURFACE_PRESSURE_HOUR = 344;
    const ALL_TIME_HIGH_SURFACE_PRESSURE_MINUTE = 345;
    const ALL_TIME_HIGH_SURFACE_PRESSURE_DAY = 346;
    const ALL_TIME_HIGH_SURFACE_PRESSURE_MONTH = 347;
    const ALL_TIME_HIGH_SURFACE_PRESSURE_YEAR = 348;
    const ALL_TIME_MAXIMUM_GUST_SPEED = 325;
    const ALL_TIME_MAXIMUM_GUST_SPEED_HOUR = 326;
    const ALL_TIME_MAXIMUM_GUST_SPEED_MINUTE = 327;
    const ALL_TIME_MAXIMUM_GUST_SPEED_DAY = 328;
    const ALL_TIME_MAXIMUM_GUST_SPEED_MONTH = 329;
    const ALL_TIME_MAXIMUM_GUST_SPEED_YEAR = 330;
    const ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED = 361;
    const ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_HOUR = 362;
    const ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_MINUTE = 363;
    const ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_DAY = 364;
    const ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_MONTH = 365;
    const ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_YEAR = 366;
    const ALL_TIME_LOW_WIND_CHILL = 385;
    const ALL_TIME_LOW_WIND_CHILL_HOUR = 386;
    const ALL_TIME_LOW_WIND_CHILL_MINUTE = 387;
    const ALL_TIME_LOW_WIND_CHILL_DAY = 388;
    const ALL_TIME_LOW_WIND_CHILL_MONTH = 389;
    const ALL_TIME_LOW_WIND_CHILL_YEAR = 390;
    const ALL_TIME_MAXIMUM_GUST_SPEED_DIRECTION = 391;
    const ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION = 397;
    const ALL_TIME_HIGH_HEAT_INDEX = 427;
    const ALL_TIME_HIGH_HEAT_INDEX_HOUR = 428;
    const ALL_TIME_HIGH_HEAT_INDEX_MINUTE = 429;
    const ALL_TIME_HIGH_HEAT_INDEX_DAY = 430;
    const ALL_TIME_HIGH_HEAT_INDEX_MONTH = 431;
    const ALL_TIME_HIGH_HEAT_INDEX_YEAR = 432;
    const ALL_TIME_HIGH_UV = 690;
    const ALL_TIME_HIGH_UV_HOUR = 691;
    const ALL_TIME_HIGH_UV_MINUTE = 692;
    const ALL_TIME_HIGH_UV_DAY = 693;
    const ALL_TIME_HIGH_UV_MONTH = 694;
    const ALL_TIME_HIGH_UV_YEAR = 695;
    const ALL_TIME_HIGH_DEW_POINT = 753;
    const ALL_TIME_HIGH_DEW_POINT_HOUR = 754;
    const ALL_TIME_HIGH_DEW_POINT_MINUTE = 755;
    const ALL_TIME_HIGH_DEW_POINT_DAY = 756;
    const ALL_TIME_HIGH_DEW_POINT_MONTH = 757;
    const ALL_TIME_HIGH_DEW_POINT_YEAR = 758;
    const ALL_TIME_LOW_DEW_POINT = 759;
    const ALL_TIME_LOW_DEW_POINT_HOUR = 760;
    const ALL_TIME_LOW_DEW_POINT_MINUTE = 761;
    const ALL_TIME_LOW_DEW_POINT_DAY = 762;
    const ALL_TIME_LOW_DEW_POINT_MONTH = 763;
    const ALL_TIME_LOW_DEW_POINT_YEAR = 764;

    const SUNRISE = 556;
    const SUNSET = 557;
    const MOONRISE = 558;
    const MOONSET = 559;
    const MOON_PHASE = 560;
    const MOON_AGE = 561;

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

    public function getMonthlyMaximumRainfallRate()
    {
        return new RainfallRate(self::readField(self::MONTHLY_MAXIMUM_RAINFALL_RATE));
    }

    public function getMonthlyMaximumRainfallRateDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_MAXIMUM_RAINFALL_RATE_YEAR),
            self::readField(self::MONTHLY_MAXIMUM_RAINFALL_RATE_MONTH),
            self::readField(self::MONTHLY_MAXIMUM_RAINFALL_RATE_DAY),
            self::readField(self::MONTHLY_MAXIMUM_RAINFALL_RATE_HOUR),
            self::readField(self::MONTHLY_MAXIMUM_RAINFALL_RATE_MINUTE));
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

    public function getMonthlyMaximumGustSpeed()
    {
        return new WindSpeed(self::readField(self::MONTHLY_MAXIMUM_GUST_SPEED));
    }

    public function getMonthlyMaximumGustSpeedDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_MAXIMUM_GUST_SPEED_YEAR),
            self::readField(self::MONTHLY_MAXIMUM_GUST_SPEED_MONTH),
            self::readField(self::MONTHLY_MAXIMUM_GUST_SPEED_DAY),
            self::readField(self::MONTHLY_MAXIMUM_GUST_SPEED_HOUR),
            self::readField(self::MONTHLY_MAXIMUM_GUST_SPEED_MINUTE));
    }

    public function getMonthlyMaximumAverageWindSpeed()
    {
        return new WindSpeed(self::readField(self::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED));
    }

    public function getMonthlyMaximumAverageWindSpeedDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_YEAR),
            self::readField(self::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_MONTH),
            self::readField(self::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_DAY),
            self::readField(self::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_HOUR),
            self::readField(self::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_MINUTE));
    }

    public function getMonthlyLowWindChill()
    {
        return new Temperature(self::readField(self::MONTHLY_LOW_WIND_CHILL));
    }

    public function getMonthlyLowWindChillDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_LOW_WIND_CHILL_YEAR),
            self::readField(self::MONTHLY_LOW_WIND_CHILL_MONTH),
            self::readField(self::MONTHLY_LOW_WIND_CHILL_DAY),
            self::readField(self::MONTHLY_LOW_WIND_CHILL_HOUR),
            self::readField(self::MONTHLY_LOW_WIND_CHILL_MINUTE));
    }

    public function getMonthlyMaximumGustSpeedDirection()
    {
        return new WindDirection(self::readField(self::MONTHLY_MAXIMUM_GUST_SPEED_DIRECTION));
    }

    public function getMonthlyMaximumAverageWindSpeedDirection()
    {
        return new WindDirection(self::readField(self::MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION));
    }

    public function getMonthlyHighHeatIndex()
    {
        return new Temperature(self::readField(self::MONTHLY_HIGH_HEAT_INDEX));
    }

    public function getMonthlyHighHeatIndexDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_HIGH_HEAT_INDEX_YEAR),
            self::readField(self::MONTHLY_HIGH_HEAT_INDEX_MONTH),
            self::readField(self::MONTHLY_HIGH_HEAT_INDEX_DAY),
            self::readField(self::MONTHLY_HIGH_HEAT_INDEX_HOUR),
            self::readField(self::MONTHLY_HIGH_HEAT_INDEX_MINUTE));
    }

    public function getMonthlyHighUv()
    {
        return new Uv(self::readField(self::MONTHLY_HIGH_UV));
    }

    public function getMonthlyHighUvDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_HIGH_UV_YEAR),
            self::readField(self::MONTHLY_HIGH_UV_MONTH),
            self::readField(self::MONTHLY_HIGH_UV_DAY),
            self::readField(self::MONTHLY_HIGH_UV_HOUR),
            self::readField(self::MONTHLY_HIGH_UV_MINUTE));
    }

    public function getMonthlyHighDewPoint()
    {
        return new Temperature(self::readField(self::MONTHLY_HIGH_DEW_POINT));
    }

    public function getMonthlyHighDewPointDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_HIGH_DEW_POINT_YEAR),
            self::readField(self::MONTHLY_HIGH_DEW_POINT_MONTH),
            self::readField(self::MONTHLY_HIGH_DEW_POINT_DAY),
            self::readField(self::MONTHLY_HIGH_DEW_POINT_HOUR),
            self::readField(self::MONTHLY_HIGH_DEW_POINT_MINUTE));
    }

    public function getMonthlyLowDewPoint()
    {
        return new Temperature(self::readField(self::MONTHLY_LOW_DEW_POINT));
    }

    public function getMonthlyLowDewPointDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_LOW_DEW_POINT_YEAR),
            self::readField(self::MONTHLY_LOW_DEW_POINT_MONTH),
            self::readField(self::MONTHLY_LOW_DEW_POINT_DAY),
            self::readField(self::MONTHLY_LOW_DEW_POINT_HOUR),
            self::readField(self::MONTHLY_LOW_DEW_POINT_MINUTE));
    }

    public function getYearlyHighOutdoorTemperature()
    {
        return new Temperature(self::readField(self::YEARLY_HIGH_OUTDOOR_TEMPERATURE));
    }

    public function getYearlyHighOutdoorTemperatureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_HIGH_OUTDOOR_TEMPERATURE_YEAR),
            self::readField(self::YEARLY_HIGH_OUTDOOR_TEMPERATURE_MONTH),
            self::readField(self::YEARLY_HIGH_OUTDOOR_TEMPERATURE_DAY),
            self::readField(self::YEARLY_HIGH_OUTDOOR_TEMPERATURE_HOUR),
            self::readField(self::YEARLY_HIGH_OUTDOOR_TEMPERATURE_MINUTE));
    }

    public function getYearlyLowOutdoorTemperature()
    {
        return new Temperature(self::readField(self::YEARLY_LOW_OUTDOOR_TEMPERATURE));
    }

    public function getYearlyLowOutdoorTemperatureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_LOW_OUTDOOR_TEMPERATURE_YEAR),
            self::readField(self::YEARLY_LOW_OUTDOOR_TEMPERATURE_MONTH),
            self::readField(self::YEARLY_LOW_OUTDOOR_TEMPERATURE_DAY),
            self::readField(self::YEARLY_LOW_OUTDOOR_TEMPERATURE_HOUR),
            self::readField(self::YEARLY_LOW_OUTDOOR_TEMPERATURE_MINUTE));
    }

    public function getYearlyMaximumRainfallRate()
    {
        return new RainfallRate(self::readField(self::YEARLY_MAXIMUM_RAINFALL_RATE));
    }

    public function getYearlyMaximumRainfallRateDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_MAXIMUM_RAINFALL_RATE_YEAR),
            self::readField(self::YEARLY_MAXIMUM_RAINFALL_RATE_MONTH),
            self::readField(self::YEARLY_MAXIMUM_RAINFALL_RATE_DAY),
            self::readField(self::YEARLY_MAXIMUM_RAINFALL_RATE_HOUR),
            self::readField(self::YEARLY_MAXIMUM_RAINFALL_RATE_MINUTE));
    }

    public function getYearlyLowSurfacePressure()
    {
        return new Pressure(self::readField(self::YEARLY_LOW_SURFACE_PRESSURE));
    }

    public function getYearlyLowSurfacePressureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_LOW_SURFACE_PRESSURE_YEAR),
            self::readField(self::YEARLY_LOW_SURFACE_PRESSURE_MONTH),
            self::readField(self::YEARLY_LOW_SURFACE_PRESSURE_DAY),
            self::readField(self::YEARLY_LOW_SURFACE_PRESSURE_HOUR),
            self::readField(self::YEARLY_LOW_SURFACE_PRESSURE_MINUTE));
    }

    public function getYearlyHighSurfacePressure()
    {
        return new Pressure(self::readField(self::YEARLY_HIGH_SURFACE_PRESSURE));
    }

    public function getYearlyHighSurfacePressureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_HIGH_SURFACE_PRESSURE_YEAR),
            self::readField(self::YEARLY_HIGH_SURFACE_PRESSURE_MONTH),
            self::readField(self::YEARLY_HIGH_SURFACE_PRESSURE_DAY),
            self::readField(self::YEARLY_HIGH_SURFACE_PRESSURE_HOUR),
            self::readField(self::YEARLY_HIGH_SURFACE_PRESSURE_MINUTE));
    }

    public function getYearlyMaximumGustSpeed()
    {
        return new WindSpeed(self::readField(self::YEARLY_MAXIMUM_GUST_SPEED));
    }

    public function getYearlyMaximumGustSpeedDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_MAXIMUM_GUST_SPEED_YEAR),
            self::readField(self::YEARLY_MAXIMUM_GUST_SPEED_MONTH),
            self::readField(self::YEARLY_MAXIMUM_GUST_SPEED_DAY),
            self::readField(self::YEARLY_MAXIMUM_GUST_SPEED_HOUR),
            self::readField(self::YEARLY_MAXIMUM_GUST_SPEED_MINUTE));
    }

    public function getYearlyMaximumAverageWindSpeed()
    {
        return new WindSpeed(self::readField(self::YEARLY_MAXIMUM_AVERAGE_WIND_SPEED));
    }

    public function getYearlyMaximumAverageWindSpeedDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_YEAR),
            self::readField(self::YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_MONTH),
            self::readField(self::YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_DAY),
            self::readField(self::YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_HOUR),
            self::readField(self::YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_MINUTE));
    }

    public function getYearlyLowWindChill()
    {
        return new Temperature(self::readField(self::YEARLY_LOW_WIND_CHILL));
    }

    public function getYearlyLowWindChillDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_LOW_WIND_CHILL_YEAR),
            self::readField(self::YEARLY_LOW_WIND_CHILL_MONTH),
            self::readField(self::YEARLY_LOW_WIND_CHILL_DAY),
            self::readField(self::YEARLY_LOW_WIND_CHILL_HOUR),
            self::readField(self::YEARLY_LOW_WIND_CHILL_MINUTE));
    }

    public function getYearlyMaximumGustSpeedDirection()
    {
        return new WindDirection(self::readField(self::YEARLY_MAXIMUM_GUST_SPEED_DIRECTION));
    }

    public function getYearlyMaximumAverageWindSpeedDirection()
    {
        return new WindDirection(self::readField(self::YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION));
    }

    public function getYearlyHighHeatIndex()
    {
        return new Temperature(self::readField(self::YEARLY_HIGH_HEAT_INDEX));
    }

    public function getYearlyHighHeatIndexDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_HIGH_HEAT_INDEX_YEAR),
            self::readField(self::YEARLY_HIGH_HEAT_INDEX_MONTH),
            self::readField(self::YEARLY_HIGH_HEAT_INDEX_DAY),
            self::readField(self::YEARLY_HIGH_HEAT_INDEX_HOUR),
            self::readField(self::YEARLY_HIGH_HEAT_INDEX_MINUTE));
    }

    public function getYearlyHighUv()
    {
        return new Uv(self::readField(self::YEARLY_HIGH_UV));
    }

    public function getYearlyHighUvDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_HIGH_UV_YEAR),
            self::readField(self::YEARLY_HIGH_UV_MONTH),
            self::readField(self::YEARLY_HIGH_UV_DAY),
            self::readField(self::YEARLY_HIGH_UV_HOUR),
            self::readField(self::YEARLY_HIGH_UV_MINUTE));
    }

    public function getYearlyHighDewPoint()
    {
        return new Temperature(self::readField(self::YEARLY_HIGH_DEW_POINT));
    }

    public function getYearlyHighDewPointDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_HIGH_DEW_POINT_YEAR),
            self::readField(self::YEARLY_HIGH_DEW_POINT_MONTH),
            self::readField(self::YEARLY_HIGH_DEW_POINT_DAY),
            self::readField(self::YEARLY_HIGH_DEW_POINT_HOUR),
            self::readField(self::YEARLY_HIGH_DEW_POINT_MINUTE));
    }

    public function getYearlyLowDewPoint()
    {
        return new Temperature(self::readField(self::YEARLY_LOW_DEW_POINT));
    }

    public function getYearlyLowDewPointDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_LOW_DEW_POINT_YEAR),
            self::readField(self::YEARLY_LOW_DEW_POINT_MONTH),
            self::readField(self::YEARLY_LOW_DEW_POINT_DAY),
            self::readField(self::YEARLY_LOW_DEW_POINT_HOUR),
            self::readField(self::YEARLY_LOW_DEW_POINT_MINUTE));
    }

    public function getAllTimeHighOutdoorTemperature()
    {
        return new Temperature(self::readField(self::ALL_TIME_HIGH_OUTDOOR_TEMPERATURE));
    }

    public function getAllTimeHighOutdoorTemperatureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_YEAR),
            self::readField(self::ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_MONTH),
            self::readField(self::ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_DAY),
            self::readField(self::ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_HOUR),
            self::readField(self::ALL_TIME_HIGH_OUTDOOR_TEMPERATURE_MINUTE));
    }

    public function getAllTimeLowOutdoorTemperature()
    {
        return new Temperature(self::readField(self::ALL_TIME_LOW_OUTDOOR_TEMPERATURE));
    }

    public function getAllTimeLowOutdoorTemperatureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_LOW_OUTDOOR_TEMPERATURE_YEAR),
            self::readField(self::ALL_TIME_LOW_OUTDOOR_TEMPERATURE_MONTH),
            self::readField(self::ALL_TIME_LOW_OUTDOOR_TEMPERATURE_DAY),
            self::readField(self::ALL_TIME_LOW_OUTDOOR_TEMPERATURE_HOUR),
            self::readField(self::ALL_TIME_LOW_OUTDOOR_TEMPERATURE_MINUTE));
    }

    public function getAllTimeMaximumRainfallRate()
    {
        return new RainfallRate(self::readField(self::ALL_TIME_MAXIMUM_RAINFALL_RATE));
    }

    public function getAllTimeMaximumRainfallRateDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_MAXIMUM_RAINFALL_RATE_YEAR),
            self::readField(self::ALL_TIME_MAXIMUM_RAINFALL_RATE_MONTH),
            self::readField(self::ALL_TIME_MAXIMUM_RAINFALL_RATE_DAY),
            self::readField(self::ALL_TIME_MAXIMUM_RAINFALL_RATE_HOUR),
            self::readField(self::ALL_TIME_MAXIMUM_RAINFALL_RATE_MINUTE));
    }

    public function getAllTimeLowSurfacePressure()
    {
        return new Pressure(self::readField(self::ALL_TIME_LOW_SURFACE_PRESSURE));
    }

    public function getAllTimeLowSurfacePressureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_LOW_SURFACE_PRESSURE_YEAR),
            self::readField(self::ALL_TIME_LOW_SURFACE_PRESSURE_MONTH),
            self::readField(self::ALL_TIME_LOW_SURFACE_PRESSURE_DAY),
            self::readField(self::ALL_TIME_LOW_SURFACE_PRESSURE_HOUR),
            self::readField(self::ALL_TIME_LOW_SURFACE_PRESSURE_MINUTE));
    }

    public function getAllTimeHighSurfacePressure()
    {
        return new Pressure(self::readField(self::ALL_TIME_HIGH_SURFACE_PRESSURE));
    }

    public function getAllTimeHighSurfacePressureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_HIGH_SURFACE_PRESSURE_YEAR),
            self::readField(self::ALL_TIME_HIGH_SURFACE_PRESSURE_MONTH),
            self::readField(self::ALL_TIME_HIGH_SURFACE_PRESSURE_DAY),
            self::readField(self::ALL_TIME_HIGH_SURFACE_PRESSURE_HOUR),
            self::readField(self::ALL_TIME_HIGH_SURFACE_PRESSURE_MINUTE));
    }

    public function getAllTimeMaximumGustSpeed()
    {
        return new WindSpeed(self::readField(self::ALL_TIME_MAXIMUM_GUST_SPEED));
    }

    public function getAllTimeMaximumGustSpeedDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_MAXIMUM_GUST_SPEED_YEAR),
            self::readField(self::ALL_TIME_MAXIMUM_GUST_SPEED_MONTH),
            self::readField(self::ALL_TIME_MAXIMUM_GUST_SPEED_DAY),
            self::readField(self::ALL_TIME_MAXIMUM_GUST_SPEED_HOUR),
            self::readField(self::ALL_TIME_MAXIMUM_GUST_SPEED_MINUTE));
    }

    public function getAllTimeMaximumAverageWindSpeed()
    {
        return new WindSpeed(self::readField(self::ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED));
    }

    public function getAllTimeMaximumAverageWindSpeedDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_YEAR),
            self::readField(self::ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_MONTH),
            self::readField(self::ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_DAY),
            self::readField(self::ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_HOUR),
            self::readField(self::ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_MINUTE));
    }

    public function getAllTimeLowWindChill()
    {
        return new Temperature(self::readField(self::ALL_TIME_LOW_WIND_CHILL));
    }

    public function getAllTimeLowWindChillDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_LOW_WIND_CHILL_YEAR),
            self::readField(self::ALL_TIME_LOW_WIND_CHILL_MONTH),
            self::readField(self::ALL_TIME_LOW_WIND_CHILL_DAY),
            self::readField(self::ALL_TIME_LOW_WIND_CHILL_HOUR),
            self::readField(self::ALL_TIME_LOW_WIND_CHILL_MINUTE));
    }

    public function getAllTimeMaximumGustSpeedDirection()
    {
        return new WindDirection(self::readField(self::ALL_TIME_MAXIMUM_GUST_SPEED_DIRECTION));
    }

    public function getAllTimeMaximumAverageWindSpeedDirection()
    {
        return new WindDirection(self::readField(self::ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION));
    }

    public function getAllTimeHighHeatIndex()
    {
        return new Temperature(self::readField(self::ALL_TIME_HIGH_HEAT_INDEX));
    }

    public function getAllTimeHighHeatIndexDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_HIGH_HEAT_INDEX_YEAR),
            self::readField(self::ALL_TIME_HIGH_HEAT_INDEX_MONTH),
            self::readField(self::ALL_TIME_HIGH_HEAT_INDEX_DAY),
            self::readField(self::ALL_TIME_HIGH_HEAT_INDEX_HOUR),
            self::readField(self::ALL_TIME_HIGH_HEAT_INDEX_MINUTE));
    }

    public function getAllTimeHighUv()
    {
        return new Uv(self::readField(self::ALL_TIME_HIGH_UV));
    }

    public function getAllTimeHighUvDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_HIGH_UV_YEAR),
            self::readField(self::ALL_TIME_HIGH_UV_MONTH),
            self::readField(self::ALL_TIME_HIGH_UV_DAY),
            self::readField(self::ALL_TIME_HIGH_UV_HOUR),
            self::readField(self::ALL_TIME_HIGH_UV_MINUTE));
    }

    public function getAllTimeHighDewPoint()
    {
        return new Temperature(self::readField(self::ALL_TIME_HIGH_DEW_POINT));
    }

    public function getAllTimeHighDewPointDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_HIGH_DEW_POINT_YEAR),
            self::readField(self::ALL_TIME_HIGH_DEW_POINT_MONTH),
            self::readField(self::ALL_TIME_HIGH_DEW_POINT_DAY),
            self::readField(self::ALL_TIME_HIGH_DEW_POINT_HOUR),
            self::readField(self::ALL_TIME_HIGH_DEW_POINT_MINUTE));
    }

    public function getAllTimeLowDewPoint()
    {
        return new Temperature(self::readField(self::ALL_TIME_LOW_DEW_POINT));
    }

    public function getAllTimeLowDewPointDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_LOW_DEW_POINT_YEAR),
            self::readField(self::ALL_TIME_LOW_DEW_POINT_MONTH),
            self::readField(self::ALL_TIME_LOW_DEW_POINT_DAY),
            self::readField(self::ALL_TIME_LOW_DEW_POINT_HOUR),
            self::readField(self::ALL_TIME_LOW_DEW_POINT_MINUTE));
    }

    public function getSunrise()
    {
        return self::readField(self::SUNRISE);
    }

    public function getSunset()
    {
        return self::readField(self::SUNSET);
    }

    public function getMoonrise()
    {
        return self::readField(self::MOONRISE);
    }

    public function getMoonset()
    {
        return self::readField(self::MOONSET);
    }

    public function getMoonPhase()
    {
        return self::readField(self::MOON_PHASE);
    }

    public function getMoonAge()
    {
        return self::readField(self::MOON_AGE);
    }
}

?>
