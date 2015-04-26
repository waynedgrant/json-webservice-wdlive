<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class Uv
{
    private $uvi;
    private $uviDescription;

    public function __construct($uvi)
    {
        if ($uvi != '-')
        {
            $this->uvi = number_format($uvi, 1, '.', '');

            if ($uvi < 3)
            {
                $this->uviDescription = 'low';
            }
            elseif ($uvi < 6)
            {
                $this->uviDescription = 'moderate';
            }
            elseif ($uvi < 8)
            {
                $this->uviDescription = 'high';
            }
            elseif ($uvi < 11)
            {
                $this->uviDescription = 'very high';
            }
            else
            {
                $this->uviDescription = 'extreme';
            }
        }
    }

    public function getUvi()
    {
        return $this->uvi;
    }

    public function getUviDescription()
    {
        return $this->uviDescription;
    }
}

?>
