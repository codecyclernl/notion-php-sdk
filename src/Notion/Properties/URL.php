<?php namespace Notion\Properties;

use Notion\PropertyBase;

class URL extends PropertyBase
{
    public function value()
    {
        return $this->config->url;
    }
}
