<?php namespace Notion\Properties;

use Notion\PropertyBase;

class People extends PropertyBase
{
    public function value()
    {
        if (is_array($this->config->people) && isset($this->config->people[0])) {
            return $this->config->people[0]->name;
        }

        return null;
    }
}
