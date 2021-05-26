<?php namespace Notion\Properties;

use Notion\PropertyBase;

class RichText extends PropertyBase
{
    public function value()
    {
        if (!empty($this->config->rich_text)) {
            return $this->config->rich_text[0]->plain_text;
        } else {
            return '';
        }
    }
}
