<?php namespace Notion;

use Notion\Http\Client;
use Notion\Resources\Database;

class Notion
{
    protected $client;

    public function __construct($token) {
        $this->client = new Client($token);
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function database(): Database
    {
        return new Database($this);
    }
}
