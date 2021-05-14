<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Title extends PropertyBase
{
    public function value()
    {
        return $this->config->title[0]->plain_text;
    }
}
