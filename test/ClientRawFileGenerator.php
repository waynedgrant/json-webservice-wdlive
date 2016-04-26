<?php

# Copyright 2016 Wayne D Grant (www.waynedgrant.com)
# Licensed under the MIT License

class ClientRawFileGenerator
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function generateEmpty()
    {
        self::generateWithFields(array());
    }

    public function generateWithField($field)
    {
        self::generateWithFields(array($field));
    }

    public function generateWithFields($fields)
    {
        $fieldArray = $this->createFieldArray($fields);
        $fieldArrayCount = count($fieldArray);

        $file = fopen($this->path, "w");

        for ($i=0; $i < $fieldArrayCount; $i++)
        {
            fwrite($file, $fieldArray[$i]);

            if ($i+1 < $fieldArrayCount)
            {
                fwrite($file, ' ');
            }
        }

        fclose($file);
    }

    private function createFieldArray($fields)
    {
        $highestPosition = $this->getHighestFieldPosition($fields);

        if ($highestPosition >= 0)
        {
            $fieldArray = array_fill(0, $highestPosition+1, '-');
        }

        foreach ($fields as &$field)
        {
            $fieldArray[$field->getPosition()] = $field->getValue();
        }

        return $fieldArray;
    }

    private function getHighestFieldPosition($fields)
    {
        $highestPosition = -1;

        foreach ($fields as &$field)
        {
            if ($field->getPosition() > $highestPosition)
            {
                $highestPosition = $field->getPosition();
            }
        }

        return $highestPosition;
    }

    public function delete()
    {
        unlink($this->path);
    }
}

class Field
{
    private $position;
    private $value;

    public function __construct($position, $value)
    {
        $this->position = $position;
        $this->value = $value;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getValue()
    {
        return $this->value;
    }
}

?>
