<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Select extends PropertyBase
{
    public function value()
    {
        return $this->config->select->name;
    }
}
