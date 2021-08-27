<?php namespace Notion\Http;

class Request
{
    protected $client;

    protected $body;

    protected $result;

    protected $options = [];

    protected $endpoint;

    protected $method = 'get';

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function filter($filter)
    {
        if (!empty($filter)) {
            $this->body['filter'] = [];
        }

        if (isset($filter['and'])) {
            $this->body['filter']['and'] = $filter['and'];
        }

        if (isset($filter['or'])) {
            $this->body['filter']['or'] = $filter['or'];
        }

        return $this;
    }

    public function endpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    public function method($method)
    {
        $this->method = $method;
        return $this;
    }

    public function get($id = null)
    {
        if ($this->body) {
            $this->options = [
                'body' => json_encode($this->body),
            ];
        }

        if ($id && !str_contains($this->endpoint, $id)) {
            $this->endpoint .= '/' . $id;
        }

        $response = $this->client->{$this->method}($this->endpoint, $this->options);

        return $response->getJson();
    }
}
