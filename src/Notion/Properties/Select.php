<?php namespace Notion\Properties;

use Notion\PropertyBase;

class Select extends PropertyBase
{
    public function value()
    {
        return $this->config->select->name ?? null;
    }

    public function set($value): void
    {
        if (!isset($this->config->select)) {
            $this->config->select = (object) [];
        }

        $this->config->select->name = $value;
        unset($this->config->select->id, $this->config->select->color);
    }

    public function get()
    {
        return [
            'select' => [
                'name' => $this->config->select->name ?? null,
            ],
        ];
    }

    public function getValue()
    {
        return $this->config->select;
    }
}
