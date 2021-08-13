<?php namespace Notion\Properties;

use Notion\PropertyBase;

class RichText extends PropertyBase
{
    public function value()
    {
        if (!empty($this->config->rich_text)) {
            return $this->config->rich_text[0]->text->content;
        } else {
            return '';
        }
    }

    public function set($value): void
    {
        if (!is_array($this->config->rich_text)) {
            $this->config->rich_text = [];

            $this->config->rich_text[] = (object) [
                'type' => 'text',
                'text' => (object) [
                    'content' => $value,
                ],
            ];

            return;
        }

        $this->config->rich_text[0]->text->content = $value;
    }

    public function getValue()
    {
        return $this->config->rich_text;
    }
}
