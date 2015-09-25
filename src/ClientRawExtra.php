<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

require_once("BaseClientRaw.php");
require_once("DateAndTime.php");
require_once("Pressure.php");
require_once("RainfallRate.php");
require_once("Temperature.php");
require_once("Time.php");
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
    const MONTHLY_MAXIMUM_GUST_SPEED = 73;
    const MONTHLY_MAXIMUM_GUST_SPEED_HOUR = 74;
    const MONTHLY_MAXIMUM_GUST_SPEED_MINUTE = 75;
    const MONTHLY_MAXIMUM_GUST_SPEED_DAY = 76;
    const MONTHLY_MAXIMUM_GUST_SPEED_MONTH = 77;
    const MONTHLY_MAXIMUM_GUST_SPEED_YEAR = 78;
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
    const MONTHLY_HIGHEST_DAILY_RAINFALL = 97;
    const MONTHLY_HIGHEST_DAILY_RAINFALL_HOUR = 98;
    const MONTHLY_HIGHEST_DAILY_RAINFALL_MINUTE = 99;
    const MONTHLY_HIGHEST_DAILY_RAINFALL_DAY = 100;
    const MONTHLY_HIGHEST_DAILY_RAINFALL_MONTH = 101;
    const MONTHLY_HIGHEST_DAILY_RAINFALL_YEAR = 102;
    const MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR = 103;
    const MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_HOUR = 104;
    const MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_MINUTE = 105;
    const MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_DAY = 106;
    const MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_MONTH = 107;
    const MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_YEAR = 108;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED = 109;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_HOUR = 110;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_MINUTE = 111;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_DAY = 112;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_MONTH = 113;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_YEAR = 114;
    const MONTHLY_HIGH_SOIL_TEMPERATURE = 121;
    const MONTHLY_HIGH_SOIL_TEMPERATURE_HOUR = 122;
    const MONTHLY_HIGH_SOIL_TEMPERATURE_MINUTE = 123;
    const MONTHLY_HIGH_SOIL_TEMPERATURE_DAY = 124;
    const MONTHLY_HIGH_SOIL_TEMPERATURE_MONTH = 125;
    const MONTHLY_HIGH_SOIL_TEMPERATURE_YEAR = 126;
    const MONTHLY_LOW_SOIL_TEMPERATURE = 127;
    const MONTHLY_LOW_SOIL_TEMPERATURE_HOUR = 128;
    const MONTHLY_LOW_SOIL_TEMPERATURE_MINUTE = 129;
    const MONTHLY_LOW_SOIL_TEMPERATURE_DAY = 130;
    const MONTHLY_LOW_SOIL_TEMPERATURE_MONTH = 131;
    const MONTHLY_LOW_SOIL_TEMPERATURE_YEAR = 132;
    const MONTHLY_LOW_WIND_CHILL = 133;
    const MONTHLY_LOW_WIND_CHILL_HOUR = 134;
    const MONTHLY_LOW_WIND_CHILL_MINUTE = 135;
    const MONTHLY_LOW_WIND_CHILL_DAY = 136;
    const MONTHLY_LOW_WIND_CHILL_MONTH = 137;
    const MONTHLY_LOW_WIND_CHILL_YEAR = 138;
    const MONTHLY_MAXIMUM_GUST_SPEED_DIRECTION = 139;
    const MONTHLY_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION = 145;
    const MONTHLY_WARMEST_DAY = 151;
    const MONTHLY_WARMEST_DAY_HOUR = 152;
    const MONTHLY_WARMEST_DAY_MINUTE = 153;
    const MONTHLY_WARMEST_DAY_DAY = 154;
    const MONTHLY_WARMEST_DAY_MONTH = 155;
    const MONTHLY_WARMEST_DAY_YEAR = 156;
    const MONTHLY_COLDEST_NIGHT = 157;
    const MONTHLY_COLDEST_NIGHT_HOUR = 158;
    const MONTHLY_COLDEST_NIGHT_MINUTE = 159;
    const MONTHLY_COLDEST_NIGHT_DAY = 160;
    const MONTHLY_COLDEST_NIGHT_MONTH = 161;
    const MONTHLY_COLDEST_NIGHT_YEAR = 162;
    const MONTHLY_COLDEST_DAY = 163;
    const MONTHLY_COLDEST_DAY_HOUR = 164;
    const MONTHLY_COLDEST_DAY_MINUTE = 165;
    const MONTHLY_COLDEST_DAY_DAY = 166;
    const MONTHLY_COLDEST_DAY_MONTH = 167;
    const MONTHLY_COLDEST_DAY_YEAR = 168;
    const MONTHLY_WARMEST_NIGHT = 169;
    const MONTHLY_WARMEST_NIGHT_HOUR = 170;
    const MONTHLY_WARMEST_NIGHT_MINUTE = 171;
    const MONTHLY_WARMEST_NIGHT_DAY = 172;
    const MONTHLY_WARMEST_NIGHT_MONTH = 173;
    const MONTHLY_WARMEST_NIGHT_YEAR = 174;
    const MONTHLY_HIGH_HEAT_INDEX = 175;
    const MONTHLY_HIGH_HEAT_INDEX_HOUR = 176;
    const MONTHLY_HIGH_HEAT_INDEX_MINUTE = 177;
    const MONTHLY_HIGH_HEAT_INDEX_DAY = 178;
    const MONTHLY_HIGH_HEAT_INDEX_MONTH = 179;
    const MONTHLY_HIGH_HEAT_INDEX_YEAR = 180;
    const MONTHLY_HIGH_SOLAR_IRRADIANCE = 660;
    const MONTHLY_HIGH_SOLAR_IRRADIANCE_HOUR = 661;
    const MONTHLY_HIGH_SOLAR_IRRADIANCE_MINUTE = 662;
    const MONTHLY_HIGH_SOLAR_IRRADIANCE_DAY = 663;
    const MONTHLY_HIGH_SOLAR_IRRADIANCE_MONTH = 664;
    const MONTHLY_HIGH_SOLAR_IRRADIANCE_YEAR = 665;
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
    const YEARLY_MAXIMUM_GUST_SPEED = 199;
    const YEARLY_MAXIMUM_GUST_SPEED_HOUR = 200;
    const YEARLY_MAXIMUM_GUST_SPEED_MINUTE = 201;
    const YEARLY_MAXIMUM_GUST_SPEED_DAY = 202;
    const YEARLY_MAXIMUM_GUST_SPEED_MONTH = 203;
    const YEARLY_MAXIMUM_GUST_SPEED_YEAR = 204;
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
    const YEARLY_HIGHEST_DAILY_RAINFALL = 223;
    const YEARLY_HIGHEST_DAILY_RAINFALL_HOUR = 224;
    const YEARLY_HIGHEST_DAILY_RAINFALL_MINUTE = 225;
    const YEARLY_HIGHEST_DAILY_RAINFALL_DAY = 226;
    const YEARLY_HIGHEST_DAILY_RAINFALL_MONTH = 227;
    const YEARLY_HIGHEST_DAILY_RAINFALL_YEAR = 228;
    const YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR = 229;
    const YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_HOUR = 230;
    const YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_MINUTE = 231;
    const YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_DAY = 232;
    const YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_MONTH = 233;
    const YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_YEAR = 234;
    const YEARLY_MAXIMUM_AVERAGE_WIND_SPEED = 235;
    const YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_HOUR = 236;
    const YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_MINUTE = 237;
    const YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_DAY = 238;
    const YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_MONTH = 239;
    const YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_YEAR = 240;
    const YEARLY_HIGH_SOIL_TEMPERATURE = 247;
    const YEARLY_HIGH_SOIL_TEMPERATURE_HOUR = 248;
    const YEARLY_HIGH_SOIL_TEMPERATURE_MINUTE = 249;
    const YEARLY_HIGH_SOIL_TEMPERATURE_DAY = 250;
    const YEARLY_HIGH_SOIL_TEMPERATURE_MONTH = 251;
    const YEARLY_HIGH_SOIL_TEMPERATURE_YEAR = 252;
    const YEARLY_LOW_SOIL_TEMPERATURE = 253;
    const YEARLY_LOW_SOIL_TEMPERATURE_HOUR = 254;
    const YEARLY_LOW_SOIL_TEMPERATURE_MINUTE = 255;
    const YEARLY_LOW_SOIL_TEMPERATURE_DAY = 256;
    const YEARLY_LOW_SOIL_TEMPERATURE_MONTH = 257;
    const YEARLY_LOW_SOIL_TEMPERATURE_YEAR = 258;
    const YEARLY_LOW_WIND_CHILL = 259;
    const YEARLY_LOW_WIND_CHILL_HOUR = 260;
    const YEARLY_LOW_WIND_CHILL_MINUTE = 261;
    const YEARLY_LOW_WIND_CHILL_DAY = 262;
    const YEARLY_LOW_WIND_CHILL_MONTH = 263;
    const YEARLY_LOW_WIND_CHILL_YEAR = 264;
    const YEARLY_MAXIMUM_GUST_SPEED_DIRECTION = 265;
    const YEARLY_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION = 271;
    const YEARLY_WARMEST_DAY = 277;
    const YEARLY_WARMEST_DAY_HOUR = 278;
    const YEARLY_WARMEST_DAY_MINUTE = 279;
    const YEARLY_WARMEST_DAY_DAY = 280;
    const YEARLY_WARMEST_DAY_MONTH = 281;
    const YEARLY_WARMEST_DAY_YEAR = 282;
    const YEARLY_COLDEST_NIGHT = 283;
    const YEARLY_COLDEST_NIGHT_HOUR = 284;
    const YEARLY_COLDEST_NIGHT_MINUTE = 285;
    const YEARLY_COLDEST_NIGHT_DAY = 286;
    const YEARLY_COLDEST_NIGHT_MONTH = 287;
    const YEARLY_COLDEST_NIGHT_YEAR = 288;
    const YEARLY_COLDEST_DAY = 289;
    const YEARLY_COLDEST_DAY_HOUR = 290;
    const YEARLY_COLDEST_DAY_MINUTE = 291;
    const YEARLY_COLDEST_DAY_DAY = 292;
    const YEARLY_COLDEST_DAY_MONTH = 293;
    const YEARLY_COLDEST_DAY_YEAR = 294;
    const YEARLY_WARMEST_NIGHT = 295;
    const YEARLY_WARMEST_NIGHT_HOUR = 296;
    const YEARLY_WARMEST_NIGHT_MINUTE = 297;
    const YEARLY_WARMEST_NIGHT_DAY = 298;
    const YEARLY_WARMEST_NIGHT_MONTH = 299;
    const YEARLY_WARMEST_NIGHT_YEAR = 300;
    const YEARLY_HIGH_HEAT_INDEX = 301;
    const YEARLY_HIGH_HEAT_INDEX_HOUR = 302;
    const YEARLY_HIGH_HEAT_INDEX_MINUTE = 303;
    const YEARLY_HIGH_HEAT_INDEX_DAY = 304;
    const YEARLY_HIGH_HEAT_INDEX_MONTH = 305;
    const YEARLY_HIGH_HEAT_INDEX_YEAR = 306;
    const YEARLY_HIGH_SOLAR_IRRADIANCE = 672;
    const YEARLY_HIGH_SOLAR_IRRADIANCE_HOUR = 673;
    const YEARLY_HIGH_SOLAR_IRRADIANCE_MINUTE = 674;
    const YEARLY_HIGH_SOLAR_IRRADIANCE_DAY = 675;
    const YEARLY_HIGH_SOLAR_IRRADIANCE_MONTH = 676;
    const YEARLY_HIGH_SOLAR_IRRADIANCE_YEAR = 677;
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
    const ALL_TIME_MAXIMUM_GUST_SPEED = 325;
    const ALL_TIME_MAXIMUM_GUST_SPEED_HOUR = 326;
    const ALL_TIME_MAXIMUM_GUST_SPEED_MINUTE = 327;
    const ALL_TIME_MAXIMUM_GUST_SPEED_DAY = 328;
    const ALL_TIME_MAXIMUM_GUST_SPEED_MONTH = 329;
    const ALL_TIME_MAXIMUM_GUST_SPEED_YEAR = 330;
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
    const ALL_TIME_HIGHEST_DAILY_RAINFALL = 349;
    const ALL_TIME_HIGHEST_DAILY_RAINFALL_HOUR = 350;
    const ALL_TIME_HIGHEST_DAILY_RAINFALL_MINUTE = 351;
    const ALL_TIME_HIGHEST_DAILY_RAINFALL_DAY = 352;
    const ALL_TIME_HIGHEST_DAILY_RAINFALL_MONTH = 353;
    const ALL_TIME_HIGHEST_DAILY_RAINFALL_YEAR = 354;
    const ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR = 355;
    const ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_HOUR = 356;
    const ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_MINUTE = 357;
    const ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_DAY = 358;
    const ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_MONTH = 359;
    const ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_YEAR = 360;
    const ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED = 361;
    const ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_HOUR = 362;
    const ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_MINUTE = 363;
    const ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_DAY = 364;
    const ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_MONTH = 365;
    const ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_YEAR = 366;
    const ALL_TIME_HIGH_SOIL_TEMPERATURE = 373;
    const ALL_TIME_HIGH_SOIL_TEMPERATURE_HOUR = 374;
    const ALL_TIME_HIGH_SOIL_TEMPERATURE_MINUTE = 375;
    const ALL_TIME_HIGH_SOIL_TEMPERATURE_DAY = 376;
    const ALL_TIME_HIGH_SOIL_TEMPERATURE_MONTH = 377;
    const ALL_TIME_HIGH_SOIL_TEMPERATURE_YEAR = 378;
    const ALL_TIME_LOW_SOIL_TEMPERATURE = 379;
    const ALL_TIME_LOW_SOIL_TEMPERATURE_HOUR = 380;
    const ALL_TIME_LOW_SOIL_TEMPERATURE_MINUTE = 381;
    const ALL_TIME_LOW_SOIL_TEMPERATURE_DAY = 382;
    const ALL_TIME_LOW_SOIL_TEMPERATURE_MONTH = 383;
    const ALL_TIME_LOW_SOIL_TEMPERATURE_YEAR = 384;
    const ALL_TIME_LOW_WIND_CHILL = 385;
    const ALL_TIME_LOW_WIND_CHILL_HOUR = 386;
    const ALL_TIME_LOW_WIND_CHILL_MINUTE = 387;
    const ALL_TIME_LOW_WIND_CHILL_DAY = 388;
    const ALL_TIME_LOW_WIND_CHILL_MONTH = 389;
    const ALL_TIME_LOW_WIND_CHILL_YEAR = 390;
    const ALL_TIME_MAXIMUM_GUST_SPEED_DIRECTION = 391;
    const ALL_TIME_MAXIMUM_AVERAGE_WIND_SPEED_DIRECTION = 397;
    const ALL_TIME_WARMEST_DAY = 403;
    const ALL_TIME_WARMEST_DAY_HOUR = 404;
    const ALL_TIME_WARMEST_DAY_MINUTE = 405;
    const ALL_TIME_WARMEST_DAY_DAY = 406;
    const ALL_TIME_WARMEST_DAY_MONTH = 407;
    const ALL_TIME_WARMEST_DAY_YEAR = 408;
    const ALL_TIME_COLDEST_NIGHT = 409;
    const ALL_TIME_COLDEST_NIGHT_HOUR = 410;
    const ALL_TIME_COLDEST_NIGHT_MINUTE = 411;
    const ALL_TIME_COLDEST_NIGHT_DAY = 412;
    const ALL_TIME_COLDEST_NIGHT_MONTH = 413;
    const ALL_TIME_COLDEST_NIGHT_YEAR = 414;
    const ALL_TIME_COLDEST_DAY = 415;
    const ALL_TIME_COLDEST_DAY_HOUR = 416;
    const ALL_TIME_COLDEST_DAY_MINUTE = 417;
    const ALL_TIME_COLDEST_DAY_DAY = 418;
    const ALL_TIME_COLDEST_DAY_MONTH = 419;
    const ALL_TIME_COLDEST_DAY_YEAR = 420;
    const ALL_TIME_WARMEST_NIGHT = 421;
    const ALL_TIME_WARMEST_NIGHT_HOUR = 422;
    const ALL_TIME_WARMEST_NIGHT_MINUTE = 423;
    const ALL_TIME_WARMEST_NIGHT_DAY = 424;
    const ALL_TIME_WARMEST_NIGHT_MONTH = 425;
    const ALL_TIME_WARMEST_NIGHT_YEAR = 426;
    const ALL_TIME_HIGH_HEAT_INDEX = 427;
    const ALL_TIME_HIGH_HEAT_INDEX_HOUR = 428;
    const ALL_TIME_HIGH_HEAT_INDEX_MINUTE = 429;
    const ALL_TIME_HIGH_HEAT_INDEX_DAY = 430;
    const ALL_TIME_HIGH_HEAT_INDEX_MONTH = 431;
    const ALL_TIME_HIGH_HEAT_INDEX_YEAR = 432;
    const ALL_TIME_HIGH_SOLAR_IRRADIANCE = 684;
    const ALL_TIME_HIGH_SOLAR_IRRADIANCE_HOUR = 685;
    const ALL_TIME_HIGH_SOLAR_IRRADIANCE_MINUTE = 686;
    const ALL_TIME_HIGH_SOLAR_IRRADIANCE_DAY = 687;
    const ALL_TIME_HIGH_SOLAR_IRRADIANCE_MONTH = 688;
    const ALL_TIME_HIGH_SOLAR_IRRADIANCE_YEAR = 689;
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

    const SUNRISE_TIME = 556;
    const SUNSET_TIME = 557;
    const MOONRISE_TIME = 558;
    const MOONSET_TIME = 559;
    const MOON_PHASE = 560;
    const MOON_AGE = 561;
    const SUNSHINE_HOURS = 696;

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

    public function getMonthlyHighestDailyRainfall()
    {
        return new Rainfall(self::readField(self::MONTHLY_HIGHEST_DAILY_RAINFALL));
    }

    public function getMonthlyHighestDailyRainfallDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_HIGHEST_DAILY_RAINFALL_YEAR),
            self::readField(self::MONTHLY_HIGHEST_DAILY_RAINFALL_MONTH),
            self::readField(self::MONTHLY_HIGHEST_DAILY_RAINFALL_DAY),
            self::readField(self::MONTHLY_HIGHEST_DAILY_RAINFALL_HOUR),
            self::readField(self::MONTHLY_HIGHEST_DAILY_RAINFALL_MINUTE));
    }

    public function getMonthlyHighestRainfallInAnHour()
    {
        return new Rainfall(self::readField(self::MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR));
    }

    public function getMonthlyHighestRainfallInAnHourDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_YEAR),
            self::readField(self::MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_MONTH),
            self::readField(self::MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_DAY),
            self::readField(self::MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_HOUR),
            self::readField(self::MONTHLY_HIGHEST_RAINFALL_IN_AN_HOUR_MINUTE));
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

    public function getMonthlyHighSoilTemperature()
    {
        return new Temperature(self::readField(self::MONTHLY_HIGH_SOIL_TEMPERATURE));
    }

    public function getMonthlyHighSoilTemperatureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_HIGH_SOIL_TEMPERATURE_YEAR),
            self::readField(self::MONTHLY_HIGH_SOIL_TEMPERATURE_MONTH),
            self::readField(self::MONTHLY_HIGH_SOIL_TEMPERATURE_DAY),
            self::readField(self::MONTHLY_HIGH_SOIL_TEMPERATURE_HOUR),
            self::readField(self::MONTHLY_HIGH_SOIL_TEMPERATURE_MINUTE));
    }

    public function getMonthlyLowSoilTemperature()
    {
        return new Temperature(self::readField(self::MONTHLY_LOW_SOIL_TEMPERATURE));
    }

    public function getMonthlyLowSoilTemperatureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_LOW_SOIL_TEMPERATURE_YEAR),
            self::readField(self::MONTHLY_LOW_SOIL_TEMPERATURE_MONTH),
            self::readField(self::MONTHLY_LOW_SOIL_TEMPERATURE_DAY),
            self::readField(self::MONTHLY_LOW_SOIL_TEMPERATURE_HOUR),
            self::readField(self::MONTHLY_LOW_SOIL_TEMPERATURE_MINUTE));
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

    public function getMonthlyWarmestDay()
    {
        return new Temperature(self::readField(self::MONTHLY_WARMEST_DAY));
    }

    public function getMonthlyWarmestDayDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_WARMEST_DAY_YEAR),
            self::readField(self::MONTHLY_WARMEST_DAY_MONTH),
            self::readField(self::MONTHLY_WARMEST_DAY_DAY),
            self::readField(self::MONTHLY_WARMEST_DAY_HOUR),
            self::readField(self::MONTHLY_WARMEST_DAY_MINUTE));
    }

    public function getMonthlyColdestNight()
    {
        return new Temperature(self::readField(self::MONTHLY_COLDEST_NIGHT));
    }

    public function getMonthlyColdestNightDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_COLDEST_NIGHT_YEAR),
            self::readField(self::MONTHLY_COLDEST_NIGHT_MONTH),
            self::readField(self::MONTHLY_COLDEST_NIGHT_DAY),
            self::readField(self::MONTHLY_COLDEST_NIGHT_HOUR),
            self::readField(self::MONTHLY_COLDEST_NIGHT_MINUTE));
    }

    public function getMonthlyColdestDay()
    {
        return new Temperature(self::readField(self::MONTHLY_COLDEST_DAY));
    }

    public function getMonthlyColdestDayDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_COLDEST_DAY_YEAR),
            self::readField(self::MONTHLY_COLDEST_DAY_MONTH),
            self::readField(self::MONTHLY_COLDEST_DAY_DAY),
            self::readField(self::MONTHLY_COLDEST_DAY_HOUR),
            self::readField(self::MONTHLY_COLDEST_DAY_MINUTE));
    }

    public function getMonthlyWarmestNight()
    {
        return new Temperature(self::readField(self::MONTHLY_WARMEST_NIGHT));
    }

    public function getMonthlyWarmestNightDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_WARMEST_NIGHT_YEAR),
            self::readField(self::MONTHLY_WARMEST_NIGHT_MONTH),
            self::readField(self::MONTHLY_WARMEST_NIGHT_DAY),
            self::readField(self::MONTHLY_WARMEST_NIGHT_HOUR),
            self::readField(self::MONTHLY_WARMEST_NIGHT_MINUTE));
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

    public function getMonthlyHighSolarIrradiance()
    {
        return new Irradiance(self::readField(self::MONTHLY_HIGH_SOLAR_IRRADIANCE));
    }

    public function getMonthlyHighSolarIrradianceDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::MONTHLY_HIGH_SOLAR_IRRADIANCE_YEAR),
            self::readField(self::MONTHLY_HIGH_SOLAR_IRRADIANCE_MONTH),
            self::readField(self::MONTHLY_HIGH_SOLAR_IRRADIANCE_DAY),
            self::readField(self::MONTHLY_HIGH_SOLAR_IRRADIANCE_HOUR),
            self::readField(self::MONTHLY_HIGH_SOLAR_IRRADIANCE_MINUTE));
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

    public function getYearlyHighestDailyRainfall()
    {
        return new Rainfall(self::readField(self::YEARLY_HIGHEST_DAILY_RAINFALL));
    }

    public function getYearlyHighestDailyRainfallDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_HIGHEST_DAILY_RAINFALL_YEAR),
            self::readField(self::YEARLY_HIGHEST_DAILY_RAINFALL_MONTH),
            self::readField(self::YEARLY_HIGHEST_DAILY_RAINFALL_DAY),
            self::readField(self::YEARLY_HIGHEST_DAILY_RAINFALL_HOUR),
            self::readField(self::YEARLY_HIGHEST_DAILY_RAINFALL_MINUTE));
    }

    public function getYearlyHighestRainfallInAnHour()
    {
        return new Rainfall(self::readField(self::YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR));
    }

    public function getYearlyHighestRainfallInAnHourDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_YEAR),
            self::readField(self::YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_MONTH),
            self::readField(self::YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_DAY),
            self::readField(self::YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_HOUR),
            self::readField(self::YEARLY_HIGHEST_RAINFALL_IN_AN_HOUR_MINUTE));
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

    public function getYearlyHighSoilTemperature()
    {
        return new Temperature(self::readField(self::YEARLY_HIGH_SOIL_TEMPERATURE));
    }

    public function getYearlyHighSoilTemperatureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_HIGH_SOIL_TEMPERATURE_YEAR),
            self::readField(self::YEARLY_HIGH_SOIL_TEMPERATURE_MONTH),
            self::readField(self::YEARLY_HIGH_SOIL_TEMPERATURE_DAY),
            self::readField(self::YEARLY_HIGH_SOIL_TEMPERATURE_HOUR),
            self::readField(self::YEARLY_HIGH_SOIL_TEMPERATURE_MINUTE));
    }

    public function getYearlyLowSoilTemperature()
    {
        return new Temperature(self::readField(self::YEARLY_LOW_SOIL_TEMPERATURE));
    }

    public function getYearlyLowSoilTemperatureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_LOW_SOIL_TEMPERATURE_YEAR),
            self::readField(self::YEARLY_LOW_SOIL_TEMPERATURE_MONTH),
            self::readField(self::YEARLY_LOW_SOIL_TEMPERATURE_DAY),
            self::readField(self::YEARLY_LOW_SOIL_TEMPERATURE_HOUR),
            self::readField(self::YEARLY_LOW_SOIL_TEMPERATURE_MINUTE));
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

    public function getYearlyHighSolarIrradiance()
    {
        return new Irradiance(self::readField(self::YEARLY_HIGH_SOLAR_IRRADIANCE));
    }

    public function getYearlyHighSolarIrradianceDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::YEARLY_HIGH_SOLAR_IRRADIANCE_YEAR),
            self::readField(self::YEARLY_HIGH_SOLAR_IRRADIANCE_MONTH),
            self::readField(self::YEARLY_HIGH_SOLAR_IRRADIANCE_DAY),
            self::readField(self::YEARLY_HIGH_SOLAR_IRRADIANCE_HOUR),
            self::readField(self::YEARLY_HIGH_SOLAR_IRRADIANCE_MINUTE));
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

    public function getAllTimeHighestDailyRainfall()
    {
        return new Rainfall(self::readField(self::ALL_TIME_HIGHEST_DAILY_RAINFALL));
    }

    public function getAllTimeHighestDailyRainfallDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_HIGHEST_DAILY_RAINFALL_YEAR),
            self::readField(self::ALL_TIME_HIGHEST_DAILY_RAINFALL_MONTH),
            self::readField(self::ALL_TIME_HIGHEST_DAILY_RAINFALL_DAY),
            self::readField(self::ALL_TIME_HIGHEST_DAILY_RAINFALL_HOUR),
            self::readField(self::ALL_TIME_HIGHEST_DAILY_RAINFALL_MINUTE));
    }

    public function getAllTimeHighestRainfallInAnHour()
    {
        return new Rainfall(self::readField(self::ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR));
    }

    public function getAllTimeHighestRainfallInAnHourDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_YEAR),
            self::readField(self::ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_MONTH),
            self::readField(self::ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_DAY),
            self::readField(self::ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_HOUR),
            self::readField(self::ALL_TIME_HIGHEST_RAINFALL_IN_AN_HOUR_MINUTE));
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

    public function getAllTimeHighSoilTemperature()
    {
        return new Temperature(self::readField(self::ALL_TIME_HIGH_SOIL_TEMPERATURE));
    }

    public function getAllTimeHighSoilTemperatureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_HIGH_SOIL_TEMPERATURE_YEAR),
            self::readField(self::ALL_TIME_HIGH_SOIL_TEMPERATURE_MONTH),
            self::readField(self::ALL_TIME_HIGH_SOIL_TEMPERATURE_DAY),
            self::readField(self::ALL_TIME_HIGH_SOIL_TEMPERATURE_HOUR),
            self::readField(self::ALL_TIME_HIGH_SOIL_TEMPERATURE_MINUTE));
    }

    public function getAllTimeLowSoilTemperature()
    {
        return new Temperature(self::readField(self::ALL_TIME_LOW_SOIL_TEMPERATURE));
    }

    public function getAllTimeLowSoilTemperatureDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_LOW_SOIL_TEMPERATURE_YEAR),
            self::readField(self::ALL_TIME_LOW_SOIL_TEMPERATURE_MONTH),
            self::readField(self::ALL_TIME_LOW_SOIL_TEMPERATURE_DAY),
            self::readField(self::ALL_TIME_LOW_SOIL_TEMPERATURE_HOUR),
            self::readField(self::ALL_TIME_LOW_SOIL_TEMPERATURE_MINUTE));
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

    public function getAllTimeHighSolarIrradiance()
    {
        return new Irradiance(self::readField(self::ALL_TIME_HIGH_SOLAR_IRRADIANCE));
    }

    public function getAllTimeHighSolarIrradianceDateAndTime()
    {
        return new DateAndTime(
            self::readField(self::ALL_TIME_HIGH_SOLAR_IRRADIANCE_YEAR),
            self::readField(self::ALL_TIME_HIGH_SOLAR_IRRADIANCE_MONTH),
            self::readField(self::ALL_TIME_HIGH_SOLAR_IRRADIANCE_DAY),
            self::readField(self::ALL_TIME_HIGH_SOLAR_IRRADIANCE_HOUR),
            self::readField(self::ALL_TIME_HIGH_SOLAR_IRRADIANCE_MINUTE));
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

    public function getSunriseTime()
    {
        return new Time(self::readField(self::SUNRISE_TIME));
    }

    public function getSunsetTime()
    {
        return new Time(self::readField(self::SUNSET_TIME));
    }

    public function getMoonriseTime()
    {
        return new Time(self::readField(self::MOONRISE_TIME));
    }

    public function getMoonsetTime()
    {
        return new Time(self::readField(self::MOONSET_TIME));
    }

    public function getMoonPhase()
    {
        $moonPhase = self::readField(self::MOON_PHASE);

        if ($moonPhase == '-')
        {
            $moonPhase = null;
        }
        else
        {
            $moonPhase = number_format($moonPhase, 1, '.', '');
        }

        return $moonPhase;
    }

    public function getMoonAge()
    {
        $moonAge = self::readField(self::MOON_AGE);

        if ($moonAge == '-')
        {
            $moonAge = null;
        }
        else
        {
            $moonAge = number_format($moonAge, 0, '.', '');
        }

        return $moonAge;
    }

    public function getSunshineHours()
    {
        $sunshineHours = self::readField(self::SUNSHINE_HOURS);

        if ($sunshineHours == '-')
        {
            $sunshineHours = null;
        }
        else
        {
            $sunshineHours = number_format($sunshineHours, 1, '.', '');
        }

        return $sunshineHours;
    }
}

?>
