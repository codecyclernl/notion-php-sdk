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
        $ids = [];

        $databases = $this->get()->databases;

        foreach ($databases as $database) {
            $ids[$database->id] = $database->name;
        }

        return $ids;
    }
}
