<?php namespace Notion\Properties;

use Notion\PropertyBase;

class URL extends PropertyBase
{
    public function value()
    {
        return $this->config->url;
    }

    public function set($value): void
    {
        $this->config->url = $value;
    }

    public function getValue()
    {
        return $this->config->url;
    }
}
