<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Formula extends PropertyBase
{
    public function value()
    {
        return $this->config->formula->string;
    }
}
