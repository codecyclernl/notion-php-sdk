<?php namespace Notion\Resources;

use Notion\Notion;
use Notion\Objects\Page;
use Notion\Http\Request;
use Notion\Objects\Database;
use Notion\Traits\Filterable;
use Notion\Objects\Collection;

class Resource
{
    use Filterable;

    protected $notion;

    protected $id;

    protected $endpoint = '';

    protected $method = 'get';

    public $created_time;

    public $last_edited_time;

    public $archived = false;

    public $properties = [];

    public $parent_type;

    public $parent_id;

    public function __construct(Notion $notion, $id = null)
    {
        $this->notion = $notion;

        $this->id = $id;
    }

    public function get()
    {
        //
        $result = null;

        //
        $client = $this->notion
            ->getClient();

        //
        $response = (new Request($client))
            ->filter($this->filter)
            ->endpoint($this->endpoint)
            ->method($this->method)
            ->get($this->id);

        if ($response->object === 'list') {
            $result = new Collection($response, $this->notion);
        } else {
            if ($response->object === 'page') {
                $result = new Page($response, $this->notion);
            }

            if ($response->object === 'database') {
                $result = new Database($response, $this->notion);
            }
        }

        return $result;
    }
}
