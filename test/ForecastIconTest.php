<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class ForecastIconTest extends PHPUnit\Framework\TestCase {

    public function test_forecast_icon_values_are_null_when_code_is_empty() {
        $testee = new ForecastIcon("-");
        $this->assertNull($testee->getCode());
        $this->assertNull($testee->getText());
    }

    public function test_all_measures_values_are_null_when_code_is_empty() {
        $testee = new ForecastIcon("-");
        $this->assertNull($testee->getAllMeasures()["code"]);
        $this->assertNull($testee->getAllMeasures()["text"]);
    }

    public function test_forecast_icon_values_are_correct_when_code_is_not_empty() {
        $testee = new ForecastIcon("0");
        $this->assertSame("0", $testee->getCode());
        $this->assertSame("Sunny", $testee->getText());
    }

    public function test_all_measurements_values_are_correct_when_code_is_not_empty() {
        $testee = new ForecastIcon("0");
        $this->assertSame("0", $testee->getAllMeasures()["code"]);
        $this->assertSame("Sunny", $testee->getAllMeasures()["text"]);
    }
}

?>
