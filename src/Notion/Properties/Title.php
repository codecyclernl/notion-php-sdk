<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Title extends PropertyBase
{
    public function value()
    {
        if (!is_array($this->config->title)) {
            return '';
        }

        return $this->config->title[0]->text->content;
    }

    public function set($value): void
    {
        if (!is_array($this->config->title)) {
            $this->config->title = [];

            $this->config->title[] = (object) [
                'text' => (object) [
                    'content' => $value,
                ],
            ];

            return;
        }

        $this->config->title[0]->text->content = $value;
    }

    public function getValue()
    {
        return $this->config->title;
    }
}
