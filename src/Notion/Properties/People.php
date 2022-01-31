<?php namespace Notion\Properties;

use Notion\PropertyBase;

class People extends PropertyBase
{
    public function value()
    {
        if (is_array($this->config->people)) {
            return array_column($this->config->people, 'name');
        }

        return [];
    }
}
