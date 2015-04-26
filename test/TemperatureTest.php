<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class TemperatureTest extends PHPUnit_Framework_TestCase
{
    public function test_temperature_values_are_null_when_celsius_is_empty()
    {
        $testee = new Temperature("-");
        $this->assertNull($testee->getCelsius());
        $this->assertNull($testee->getFahrenheit());
    }

    public function test_temperature_values_are_correct_when_celsius_is_not_empty()
    {
        $testee = new Temperature("-50.5");
        $this->assertEquals("-50.5", $testee->getCelsius());
        $this->assertEquals("-58.9", $testee->getFahrenheit());

        $testee = new Temperature("0.0");
        $this->assertEquals("0.0", $testee->getCelsius());
        $this->assertEquals("32.0", $testee->getFahrenheit());

        $testee = new Temperature("50.5");
        $this->assertEquals("50.5", $testee->getCelsius());
        $this->assertEquals("122.9", $testee->getFahrenheit());
    }
}

?>
