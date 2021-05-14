<?php namespace Notion\Objects;

use Notion\ObjectBase;

class Database extends ObjectBase
{
    public $id;

    public $name;

    protected function handleResponse($data)
    {
        $this->setProperties($data);
    }

    protected function setProperties($data)
    {
        $this->id = $data->id;
        $this->name = $data->title[0]->plain_text;
    }
}
