<?php namespace Codecycler\Notion\Resources;

use Codecycler\Notion\Client;
use Codecycler\Notion\Http\Response;

class Page extends Resource
{
    private $endpoint = 'pages';

    public function __construct(Client $client = null, string $id = null)
    {
        parent::__construct($client, $id);

        $this->setEndpoint($this->endpoint);
    }

    public function buildEndpoint(string $path = null): string
    {
        $base = $this->endpoint;

        if ($this->getId()) {
            $base = "{$base}/{$this->getId()}";
        }

        if (! $path) {
            return $base;
        }

        if (strpos($path, '/') === 0) {
            return $base . $path;
        }

        return "{$base}/{$path}";
    }

    public function callApi(string $path = null, string $method = 'get', array $options = []): Response
    {
        return $this->getClient()
            ->makeAPICall($this->buildEndpoint($path), $method, $options);
    }

    public function get(string $id = null): Response
    {
        if ($id) {
            $this->setId($id);
        }

        return $this->callApi();
    }

    public function create($parentType, $parentId, $properties, $children): Response
    {
        $data = [
            'parent' => [
                $parentType . '_id' => $parentId,
            ],
            'properties' => $this->generateProperties($properties),
        ];

        if ($children) {
            $data['children'] = $children;
        }

        $options = [
            'body' => json_stringify($data),
        ];

        return $this->callApi(null, 'post', $options);
    }

    public function generateProperties($properties)
    {
        return [];
    }
}
