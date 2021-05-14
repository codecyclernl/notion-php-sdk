<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Number extends PropertyBase
{
    public function value()
    {
        return $this->config->number;
    }
}
