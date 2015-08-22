<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class Trend
{
    private $trend;

    public function __construct($trend)
    {
        if ($trend != '-')
        {
            $this->celsius = number_format($celsius, 1, '.', '');

			if ($trend > 0)
			{
				$this->trend = "1";
			}
			else if ($trend < 0)
			{
				$this->trend = "-1";
			}
			else
			{
				$this->trend = "0";
			}
        }
    }

    public function getTrend()
    {
        return $this->trend;
    }
}

?>
