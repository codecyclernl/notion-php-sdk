<?php namespace Notion;

class PropertyBase
{
    protected $name;

    protected $filterType = 'text';

    protected $config;

    public function __construct($name, $config)
    {
        $this->name = $name;
        $this->config = $config;

        ray($config);
    }

    public function value()
    {
    }
}
