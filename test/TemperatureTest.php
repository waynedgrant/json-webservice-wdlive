<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class TemperatureTest extends PHPUnit\Framework\TestCase {

    public function test_temperature_values_are_null_when_celsius_is_empty() {
        $testee = new Temperature("-");
        $this->assertNull($testee->getCelsius());
        $this->assertNull($testee->getFahrenheit());
    }

    public function test_all_measures_values_are_null_when_celsius_is_empty() {
        $testee = new Temperature("-");
        $this->assertNull($testee->getAllMeasures()["c"]);
        $this->assertNull($testee->getAllMeasures()["f"]);
    }

    public function test_temperature_values_are_correct_when_celsius_is_not_empty() {
        $testee = new Temperature("-50.5");
        $this->assertSame("-50.5", $testee->getCelsius());
        $this->assertSame("-58.9", $testee->getFahrenheit());

        $testee = new Temperature("0.0");
        $this->assertSame("0.0", $testee->getCelsius());
        $this->assertSame("32.0", $testee->getFahrenheit());

        $testee = new Temperature("50.5");
        $this->assertSame("50.5", $testee->getCelsius());
        $this->assertSame("122.9", $testee->getFahrenheit());
    }

    public function test_all_measures_values_are_correct_when_celsius_is_not_empty() {
        $testee = new Temperature("-50.5");
        $this->assertSame("-50.5", $testee->getAllMeasures()["c"]);
        $this->assertSame("-58.9", $testee->getAllMeasures()["f"]);

        $testee = new Temperature("0.0");
        $this->assertSame("0.0", $testee->getAllMeasures()["c"]);
        $this->assertSame("32.0", $testee->getAllMeasures()["f"]);

        $testee = new Temperature("50.5");
        $this->assertSame("50.5", $testee->getAllMeasures()["c"]);
        $this->assertSame("122.9", $testee->getAllMeasures()["f"]);
    }
}

?>
