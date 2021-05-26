<?php namespace Notion\Objects;

use Notion\RichText;
use Notion\ObjectBase;

class Database extends ObjectBase
{
    public $id;

    public $name;

    protected $properties = [];

    protected function handleResponse($data): void
    {
        $this->setProperties($data);

        $title = new RichText($data->title);

        $this->name = $title->plain_text;
    }

    public function newPage()
    {
        return (new Page(null, $this->notion))
            ->setParent('database', $this->id)
            ->initProperties($this->properties);
    }
}
