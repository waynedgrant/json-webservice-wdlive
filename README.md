# json-webservice-wdlive

Copyright © 2015 Wayne D Grant

Licensed under the MIT License

JSON formatted Web Service API to expose [Weather Display Live](http://www.weather-display.com/wdlive.php) data. Written in PHP.

## Overview

json-webservice-wdlive exposes much of a weather station's Weather Display Live (WD Live) data as a simple JSON formatted Web Service API.

It does this via several URLs:

* __weather.json__ Current weather conditions including Temperature, Pressure, Rainfall, Wind, Humidity, Dew Point, Wind Chill, Humidex, Heat Index, Solar and UV.
* __forecast.json__ Weather forecasts.
* __almanac.json__ Weather almanac for Month-to-Date, Year-to-Date and All Time records.
* __astronomy.json__ Astronomical information covering times for sunrise, sunset, moonrise and moonset as well as moon phase and age.
* __indoor.json__ Current indoor conditions including Temperature and Humidity.
* __everything.json__ A combination of the content of all other endpoints available in one hit.

Besides exposing the data in the default units found in clientraw the responses also contain many alternative units. For example, clientraw files store wind speeds in knots. The Web Service responses, on the other hand, respond with Bft, knots, km/h, mph, and m/s.

![alt tag](json-webservice-wdlive.png)

## Requirements

1. [Weather Display](http://www.weather-display.com) (or equivalent such as [MeteoHub](http://wiki.meteohub.de)) configured to periodically upload WDL clientraw files to a web server
2. PHP5 installed on the web server

## Installation

* Download the source code for the [latest release](https://github.com/waynedgrant/json-webservice-wdlive/releases) and unzip it

* Upload all **.php** and **.json** files in **json-webservice-wdlive/src** to the same directory as the clientraw files are hosted on your web server

* If you plan to host the **json-webservice-wdlive** in a different directory from the clientraw files then edit the **CLIENT_RAW_DIRECTORY** constant in the **config.php** file supplying the appropriate relative path.

* Modify your web server to process **.json** files using PHP. For example, for Apache add the following to your **.htaccess** file:

```
AddHandler application/x-httpd-php5 .json
```

## Execution

Hit the URL of your deployed .json files using a web browser or other REST client. Both JSON and JSONP are supported.

For example:

**Current Weather URL - weather.json**

* JSON: [http://www.waynedgrant.com/weather/api/weather.json](http://www.waynedgrant.com/weather/api/weather.json)
* JSONP: [http://www.waynedgrant.com/weather/api/weather.json?callback=weatherCallback](http://www.waynedgrant.com/weather/api/weather.json?callback=weatherCallback)

**Weather Forecasr URL - forecast.json**

* JSON: [http://www.waynedgrant.com/weather/api/forecast.json](http://www.waynedgrant.com/weather/api/forecast.json)
* JSONP: [http://www.waynedgrant.com/weather/api/forecast.json?callback=weatherCallback](http://www.waynedgrant.com/weather/api/forecast.json?callback=weatherCallback)

**Weather Almanac URL - almanac.json**

* JSON: [http://www.waynedgrant.com/weather/api/almanac.json](http://www.waynedgrant.com/weather/api/almanac.json)
* JSONP: [http://www.waynedgrant.com/weather/api/almanac.json?callback=weatherCallback](http://www.waynedgrant.com/weather/api/almanac.json?callback=weatherCallback)

**Astronomy URL - astronomy.json**

* JSON: [http://www.waynedgrant.com/weather/api/astronomy.json](http://www.waynedgrant.com/weather/api/astronomy.json)
* JSONP: [http://www.waynedgrant.com/weather/api/astronomy.json?callback=weatherCallback](http://www.waynedgrant.com/weather/api/astronomy.json?callback=weatherCallback)

**Current Indoor Conditions URL - indoor.json**

* JSON: [http://www.waynedgrant.com/weather/api/indoor.json](http://www.waynedgrant.com/weather/api/indoor.json)
* JSONP: [http://www.waynedgrant.com/weather/api/indoor.json?callback=weatherCallback](http://www.waynedgrant.com/weather/api/indoor.json?callback=weatherCallback)

**Everything URL - everything.json**

* JSON: [http://www.waynedgrant.com/weather/api/everything.json](http://www.waynedgrant.com/weather/api/everything.json)
* JSONP: [http://www.waynedgrant.com/weather/api/everything.json?callback=weatherCallback](http://www.waynedgrant.com/weather/api/everything.json?callback=weatherCallback)

## API Documentation

For details of Web Service response fields see Web Service API page at [Wayne's Weather](http://www.waynedgrant.com/weather/api.html).

## Unit Testing

This project utilizes [PHPUnit](https://phpunit.de/) for unit testing.

* Install [PHPUnit](https://phpunit.de/)
* cd json-webservice-wdlive
* phpunit --bootstrap bootstrap.php test/
