<?php namespace Notion\Objects;

use Notion\ObjectBase;

class Collection extends ObjectBase
{
    public $object = 'list';

    public $pages = [];

    public $databases = [];

    public function handleResponse($data)
    {
        foreach ($data->results as $item) {
            if ($item->object === 'page') {
                $page = new Page($item, $this->notion);
                $this->pages[] = $page;
            }

            if ($item->object === 'database') {
                $database = new Database($item, $this->notion);
                $this->databases[] = $database;
            }
        }
    }
}
