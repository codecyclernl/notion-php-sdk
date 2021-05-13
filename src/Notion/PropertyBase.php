<?php namespace Notion;

class PropertyBase
{
    protected $name;

    protected $filterType = 'text';

    public function __construct($name)
    {
        $this->name = $name;
    }
}
