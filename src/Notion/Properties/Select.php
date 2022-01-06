<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Select extends PropertyBase
{
    public function value()
    {
        return $this->config->select->name;
    }

    public function set($value): void
    {
        if (!isset($this->config->select)) {
            $this->config->select = new \stdClass();
        }

        $this->config->select->name = $value;
        unset($this->config->select->id, $this->config->select->color);
    }

    public function get()
    {
        return [
            'select' => [
                'name' => $this->config->select->name,
            ],
        ];
    }

    public function getValue()
    {
        return $this->config->select;
    }
}
