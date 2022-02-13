<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Number extends PropertyBase
{
    public function value()
    {
        return $this->config->number;
    }

    public function set($value): void
    {

        $this->config->number = ($value === (int)$value) ? (int)$value : (float)$value;
    }

    public function getValue()
    {
        return $this->config->number;
    }
}
