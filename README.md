# json-webservice-wdlive

Copyright © 2016 Wayne D Grant

Licensed under the MIT License

JSON formatted Web Service API to expose [Weather Display Live](http://www.weather-display.com/wdlive.php) data. Written in PHP.

## Overview

json-webservice-wdlive exposes much of a weather station's Weather Display Live (WD Live) data as a simple JSON formatted Web Service API.

It does this via several URLs:

* __weather.json__ Current weather conditions including Temperature, Pressure, Rainfall, Wind, Humidity, Dew Point, Wind Chill, Humidex, Heat Index, Solar and UV.
* __forecast.json__ Weather forecasts.
* __almanac.json__ Weather almanac for Month-to-Date, Year-to-Date and All Time records.
* __astronomy.json__ Astronomical information covering times for sunrise, sunset, moonrise and moonset as well as moon phase and age.
* __extra.json__ Up to eight extra Temperature and Humidity sensors.
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

**Weather Forecast URL - forecast.json**

* JSON: [http://www.waynedgrant.com/weather/api/forecast.json](http://www.waynedgrant.com/weather/api/forecast.json)
* JSONP: [http://www.waynedgrant.com/weather/api/forecast.json?callback=weatherCallback](http://www.waynedgrant.com/weather/api/forecast.json?callback=weatherCallback)

**Weather Almanac URL - almanac.json**

* JSON: [http://www.waynedgrant.com/weather/api/almanac.json](http://www.waynedgrant.com/weather/api/almanac.json)
* JSONP: [http://www.waynedgrant.com/weather/api/almanac.json?callback=weatherCallback](http://www.waynedgrant.com/weather/api/almanac.json?callback=weatherCallback)

**Astronomy URL - astronomy.json**

* JSON: [http://www.waynedgrant.com/weather/api/astronomy.json](http://www.waynedgrant.com/weather/api/astronomy.json)
* JSONP: [http://www.waynedgrant.com/weather/api/astronomy.json?callback=weatherCallback](http://www.waynedgrant.com/weather/api/astronomy.json?callback=weatherCallback)

**Extra Sensors URL - extra.json**

* JSON: [http://www.waynedgrant.com/weather/api/extra.json](http://www.waynedgrant.com/weather/api/extra.json)
* JSONP: [http://www.waynedgrant.com/weather/api/extra.json?callback=weatherCallback](http://www.waynedgrant.com/weather/api/extra.json?callback=weatherCallback)

**Current Indoor Conditions URL - indoor.json**

* JSON: [http://www.waynedgrant.com/weather/api/indoor.json](http://www.waynedgrant.com/weather/api/indoor.json)
* JSONP: [http://www.waynedgrant.com/weather/api/indoor.json?callback=weatherCallback](http://www.waynedgrant.com/weather/api/indoor.json?callback=weatherCallback)

**Everything URL - everything.json**

* JSON: [http://www.waynedgrant.com/weather/api/everything.json](http://www.waynedgrant.com/weather/api/everything.json)
* JSONP: [http://www.waynedgrant.com/weather/api/everything.json?callback=weatherCallback](http://www.waynedgrant.com/weather/api/everything.json?callback=weatherCallback)

## Response Fields

**General Notes**

* All field values are of type String.
* Field values that are unavailable on any given call are returned as **null**.

|                          | Response Field               | Description                                                     | Formatting                                             |
|--------------------------|------------------------------|-----------------------------------------------------------------|--------------------------------------------------------|
| Endpoint                 |                              |                                                                 |                                                        |
|                          | endpoint.url                 | Web Service endpoint's URL                                      |                                                        |
|                          | endpoint.version             | Web Service endpoint's version                                  |                                                        |
| Station                  |                              |                                                                 |                                                        |
|                          | station.name                 | Weather station's name                                          |                                                        |
|                          | station.latitude             | Weather station's latitude                                      | Decimal degrees, negative South of Equator             |
|                          | station.longitude            | Weather station's longitude                                     | Decimal degrees, negative East of Prime Meridian (GMT) |
|                          | station.wdversion            | Weather Display Software Version                                |                                                        |
| Time                     |                              |                                                                 |                                                        |
|                          | time.hour                    | Local hour of day, 24 hour clock                                | '0' padded to two digits                               |
|                          | time.minute                  | Local minutes past the hour                                     | '0' padded to two digits                               |
|                          | time.day                     | Local day of month                                              | '0' padded to two digits                               |
|                          | time.month                   | Local month of year                                             | '0' padded to two digits                               |
|                          | time.year                    | Local year                                                      | Four digits                                            |
|                          | time.time                    | Local time, 24 hour clock                                       | HH:MM                                                  |
|                          | time.date                    | Local date                                                      | DD/MM/YYYY                                             |
|                          | time.time_date               | Local time and date                                             | HH:MM DD/MM/YYYY                                       |
| Temperature              |                              |                                                                 |                                                        |
|                          | c                            | Temperature in celsius                                          | To one decimal digit                                   |
|                          | f                            | Temperature in fahrenheit                                       | To one decimal digit                                   |
|                          | trend                        | Temperature trend                                               | Falling: -1, Steady: 0, Rising: 1                      |
| Pressure                 |                              |                                                                 |                                                        |
|                          | hpa                          | Surface pressure in hectopascals                                | To one decimal digit                                   |
|                          | inhg                         | Surface pressure in inches of mercury                           | To two decimal digits                                  |
|                          | kpa                          | Surface pressure in kilopascals                                 | To two decimal digits                                  |
|                          | mb                           | Surface pressure in millibars                                   | To one decimal digit                                   |
|                          | mmhg                         | Surface pressure in millimetres of mercury                      | To one decimal digit                                   |
| Pressure Trend           |                              |                                                                 |                                                        |
|                          | trend_per_hr.hpa             | Surface pressure trend per hour in hectopascals                 | To one decimal digit                                   |
|                          | trend_per_hr.inhg            | Surface pressure trend per hour in inches of mercury            | To two decimal digits                                  |
|                          | trend_per_hr.kpa             | Surface pressure trend per hour in kilopascals                  | To two decimal digits                                  |
|                          | trend_per_hr.mb              | Surface pressure trend per hour in millibars                    | To one decimal digit                                   |
|                          | trend_per_hr.mmhg            | Surface pressure trend per hour in millimetres of mercury       | To one decimal digit                                   |
| Rainfall                 |                              |                                                                 |                                                        |
|                          | in                           | Rainfall in inches                                              | To two decimal digits                                  |
|                          | mm                           | Rainfall in millimetres                                         | To two decimal digits                                  |
| Rainfall Rate            |                              |                                                                 |                                                        |
|                          | in                           | Rainfall rate in inches per minute                              | To three decimal digits                                |
|                          | mm                           | Rainfall rate in millimetres per minute                         | To two decimal digits                                  |
| Wind Direction           |                              |                                                                 |                                                        |
|                          | cardinal                     | Wind direction using cardinal direction                         | 'N','NNE', 'NE', 'ENE', 'E', 'ESE', 'SE', 'SSE', 'S', 'SSW','SW', 'WSW', 'W', 'WNW', 'NW', 'NNW' |
|                          | degrees                      | Wind direction in degrees                                       | 0 - 359, whole number                                  |
| Wind Speed               |                              |                                                                 |                                                        |
|                          | bft                          | Wind speed in the beaufort scale                                | 0 - 12, whole number                                   |
|                          | kn                           | Wind speed in knots                                             | To one decimal digit                                   |
|                          | kmh                          | Wind speed in kilometres per hour                               | To one decimal digit                                   |
|                          | mph                          | Wind speed in miles per hour                                    | To one decimal digit                                   |
|                          | ms                           | Wind speed in metres per second                                 | To one decimal digit                                   |
| Humidity                 |                              |                                                                 |                                                        |
|                          | humidity                     | Relative humidity percentage                                    | 0 - 100, whole number                                  |
|                          | trend                        | Humidity trend                                                  | Falling: -1, Steady: 0, Rising: 1                      |
| Solar                    |                              |                                                                 |                                                        |
|                          | solar.irradiance.kwm2        | Solar irradience in kilowatts per metre squared (kW/m2)         | To three decimal digits                                |
|                          | solar.irradiance.wcm2        | Solar irradience in watts per centimetre squared (W/cm2)        | To two decimal digits                                  |
|                          | solar.irradiance.wm2         | Solar irradience in watts per metre squared (W/m2)              | Whole number                                           |
|                          | solar.percentage             | Percentage of possible maximum solar irradience for time of day | 0 - 100, whole number                                  |
|                          | solar.sunshine_hours         | Sunshine hours today                                            | To one decimal digit                                   |
| UV                       |                              |                                                                 |                                                        |
|                          | uv.uvi                       | UV index                                                        | To one decimal digit                                   |
|                          | uv.description               | UV index description                                            | 'low', 'moderate', 'high', 'very high', 'extreme'      |
| Cloud Formation Altitude |                              |                                                                 |                                                        |
|                          | cloud_formation_altitude.ft  | Cloud formation altitude in feet                                | Whole number                                           |
|                          | cloud_formation_altitude.m   | Cloud formation altitude in metres                              | Whole number                                           |
|                          | cloud_formation_altitude.yds | Cloud formation altitude in yards                               | Whole number                                           |
| Forecast                 |                              |                                                                 |                                                        |
|                          | forecast.icon.code           | Forecast icon code                                              | 0 - 35
|                          | forecast.icon.text           | Forecast text for code                                          | 'Sunny', 'Clear Night', 'Cloudy', 'Mainly Fine', 'Cloudy Night', 'Dry', 'Fog', 'Hazy', 'Heavy Rain', 'Mainly Fine', 'Mist', 'Night Fog', 'Night Heavy Rain', 'Night Overcast', 'Night Rain', 'Night Showers', 'Night Snow', 'Night Thunder', 'Overcast', 'Mainly Cloudy', 'Rain', 'Light Rain', 'Showers', 'Sleet', 'Sleet Showers', 'Snow', 'Snow Melt', 'Snow Showers', 'Sunny', 'Thunder Showers', 'Thunder Showers', 'Thunderstorms', 'Tornado', 'Windy', 'Stopped Raining', 'Windy Rain' |
|                          | forecast.davis_forecast      | Davis Vantage Pro forecast text                                 |                                                        |
| Sun                      |                              |                                                                 |                                                        |
|                          | sun.sunrise_time             | Sunrise time                                                    | Comprises time.hour, time.minute, time.time            |
|                          | sun.sunset_time              | Sunset time                                                     | Comprises time.hour, time.minute, time.time            |
| Moon                     |                              |                                                                 |                                                        |
|                          | moon.moonrise_time           | Moonrise time                                                   | Comprises time.hour, time.minute, time.time            |
|                          | moon.moonset_time            | Moonset time                                                    | Comprises time.hour, time.minute, time.time            |
|                          | moon.moon_phase              | Moon Phase percentage                                           | To one decimal digit                                   |
|                          | moon.moon_age                | Moon Age in days                                                | 1 - 29, whole number                                   |

## Unit Testing

This project utilizes [PHPUnit](https://phpunit.de/) for unit testing.

* Install [PHPUnit](https://phpunit.de/)
* cd json-webservice-wdlive
* phpunit --bootstrap bootstrap.php test/
