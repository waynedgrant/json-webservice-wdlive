<?php

# Copyright 2015 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

abstract class BaseClientRaw
{
    private $fields;

    public function __construct($path)
    {
        $this->fields = self::getFieldsFromPath($path);
    }

    private function getFieldsFromPath($path)
    {
        $fieldDelimiter = ' ';
        $fields = array();

        if (is_readable($path))
        {
            $clientRawFile = fopen($path, 'r');

            if ($clientRawFile)
            {
                $clientRawText = '';

                while (!feof($clientRawFile))
                {
                    $clientRawText .= fread($clientRawFile, 8192);
                }

                fclose($clientRawFile);

                if (strlen($clientRawText) != 0)
                {
                    $fields = explode($fieldDelimiter, trim($clientRawText));
                }
            }
        }

        return $fields;
    }

    protected function readField($index)
    {
        if ($index < 0 or $index >= count($this->fields))
        {
            return '-';
        }

        return trim($this->fields[$index]);
    }

    protected function fieldCount()
    {
        return count($this->fields);
    }
}

?>
