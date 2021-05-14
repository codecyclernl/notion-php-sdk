<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Checkbox extends PropertyBase
{
    public function value()
    {
        return $this->config->checkbox;
    }
}
