<?php namespace Notion\Resources;

class Database extends Resource
{
    protected $endpoint = 'databases';

    protected $idType = 'database_id';

    public function query()
    {
        $this->method = 'post';
        $this->endpoint = 'databases/' . $this->id . '/query';

        return $this;
    }

    public function ids()
    {
        $response = $this->get()->getJson()->results;

        $ids = [];

        foreach ($response as $database) {
            $ids[$database->id] = $database->title[0]->plain_text;
        }

        return $ids;
    }
}
