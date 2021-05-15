<?php namespace Notion;

class PropertyBase
{
    public $name;

    protected $filterType = 'text';

    protected $config;

    public function __construct($name, $config)
    {
        $this->name = $name;
        $this->config = $config;
    }

    public function value()
    {
        return $this->config->{$this->config->type};
    }

    public function set($value): void
    {
        $this->config->{$this->config->type} = $value;
    }

    public function get()
    {
        $value = json_decode(json_encode($this->getValue()), true);

        if (!$value) {
            return null;
        }

        return [
            $this->config->type => $value,
        ];
    }

    public function getValue()
    {
        return null;
    }
}
