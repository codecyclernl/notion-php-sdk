<?php namespace Notion\Objects;

use Notion\ObjectBase;

class Database extends ObjectBase
{
    public $id;

    public $name;

    protected $properties = [];

    public function newPage()
    {
        return (new Page(null, $this->notion))
            ->setParent('database', $this->id)
            ->initProperties($this->properties)
            ->setContext('create');
    }
}
