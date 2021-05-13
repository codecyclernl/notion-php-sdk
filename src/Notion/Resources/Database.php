<?php namespace Notion\Resources;

class Database extends Resource
{
    protected $endpoint = 'databases';

    public function getIds()
    {
        $response = $this->all()->getJson()->results;

        $ids = [];

        foreach ($response as $database) {
            $ids[$database->id] = $database->title[0]->plain_text;
        }

        return $ids;
    }
}
