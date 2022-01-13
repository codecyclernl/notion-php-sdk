<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Date extends PropertyBase
{
    public function value()
    {
        return $this->config->date->start ?? null;
    }

    public function set($value): void
    {
        $this->config->date->start = $value;
        unset($this->config->date->end);
    }

    public function getValue()
    {
        return $this->config->date;
    }
}
