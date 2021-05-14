<?php namespace Notion\Resources;

use Notion\Notion;
use Notion\Objects\Page;
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
        $client = $this->notion
            ->getClient();

        //
        $body = [];

        $options = [];

        if (count($this->filter['or']) > 0) {
            $body = [
                'filter' => $this->filter,
            ];
        }

        if ($body) {
            $options = [
                'body' => json_encode($body),
            ];
        }

        if ($this->id && !str_contains($this->endpoint, $this->id)) {
            $response = $client->{$this->method}($this->endpoint . '/' . $this->id, $options);
        } else {
            $response = $client->{$this->method}($this->endpoint, $options);
        }

        // Prepare object
        $data = $response->getJson();

        if ($data->object === 'list') {
            $result = new Collection($data);
        } else {
            $result = new Page($data);
        }

        return $result;
    }
}
