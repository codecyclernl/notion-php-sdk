<?php namespace Notion\Objects;

use Notion\ObjectBase;

class Collection extends ObjectBase
{
    public $object = 'list';

    public $pages = [];

    public function handleResponse($data)
    {
        foreach ($data->results as $page) {
            $page = new Page($page);
            $this->pages[] = $page;
        }
    }
}
