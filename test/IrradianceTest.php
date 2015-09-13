<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class IrradianceTest extends PHPUnit_Framework_TestCase
{
    public function test_irradiance_value_is_null_when_watts_per_square_metre_is_empty()
    {
        $testee = new Irradiance("-");
        $this->assertNull($testee->getWattsPerSquareMetre());
    }

    public function test_irradiance_value_is_correct_when_watts_per_square_metre_is_not_empty()
    {
        $testee = new Irradiance("0");
        $this->assertSame("0", $testee->getWattsPerSquareMetre());

        $testee = new Irradiance("700");
        $this->assertSame("700", $testee->getWattsPerSquareMetre());

        $testee = new Irradiance("1400");
        $this->assertSame("1400", $testee->getWattsPerSquareMetre());
    }
}

?>
