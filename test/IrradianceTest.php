<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class IrradianceTest extends PHPUnit\Framework\TestCase {

    public function test_irradiance_value_is_null_when_watts_per_square_metre_is_empty() {
        $testee = new Irradiance("-");
        $this->assertNull($testee->getKilowattsPerSquareMetre());
        $this->assertNull($testee->getWattsPerSquareCentimetre());
        $this->assertNull($testee->getWattsPerSquareMetre());
    }

    public function test_all_measures_values_are_null_when_watts_per_square_metre_is_empty() {
        $testee = new Irradiance("-");
        $this->assertNull($testee->getAllMeasures()["kwm2"]);
        $this->assertNull($testee->getAllMeasures()["wcm2"]);
        $this->assertNull($testee->getAllMeasures()["wm2"]);
    }

    public function test_irradiance_value_is_correct_when_watts_per_square_metre_is_not_empty() {
        $testee = new Irradiance("0");
        $this->assertSame("0.000", $testee->getKilowattsPerSquareMetre());
        $this->assertSame("0.00", $testee->getWattsPerSquareCentimetre());
        $this->assertSame("0", $testee->getWattsPerSquareMetre());

        $testee = new Irradiance("713");
        $this->assertSame("0.713", $testee->getKilowattsPerSquareMetre());
        $this->assertSame("7.13", $testee->getWattsPerSquareCentimetre());
        $this->assertSame("713", $testee->getWattsPerSquareMetre());

        $testee = new Irradiance("1359");
        $this->assertSame("1.359", $testee->getKilowattsPerSquareMetre());
        $this->assertSame("13.59", $testee->getWattsPerSquareCentimetre());
        $this->assertSame("1359", $testee->getWattsPerSquareMetre());
    }

    public function test_all_measures_values_are_correct_when_watts_per_square_metre_is_not_empty() {
        $testee = new Irradiance("0");
        $this->assertSame("0.000", $testee->getAllMeasures()["kwm2"]);
        $this->assertSame("0.00", $testee->getAllMeasures()["wcm2"]);
        $this->assertSame("0", $testee->getAllMeasures()["wm2"]);

        $testee = new Irradiance("713");
        $this->assertSame("0.713", $testee->getAllMeasures()["kwm2"]);
        $this->assertSame("7.13", $testee->getAllMeasures()["wcm2"]);
        $this->assertSame("713", $testee->getAllMeasures()["wm2"]);

        $testee = new Irradiance("1359");
        $this->assertSame("1.359", $testee->getAllMeasures()["kwm2"]);
        $this->assertSame("13.59", $testee->getAllMeasures()["wcm2"]);
        $this->assertSame("1359", $testee->getAllMeasures()["wm2"]);
    }
}

?>
