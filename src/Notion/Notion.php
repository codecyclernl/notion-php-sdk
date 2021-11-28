<?php namespace Notion;

use Notion\Http\Client;
use Notion\Resources\Page;
use Notion\Resources\Block;
use Notion\Resources\Database;

class Notion
{
    protected $client;

    public function __construct($token)
    {
        $this->client = new Client($token);
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function database($id = null): Database
    {
        return new Database($this, $id);
    }

    public function page($id = null): Page
    {
        return new Page($this, $id);
    }
}
