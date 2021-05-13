<?php

namespace Codecycler\Notion;

use Codecycler\Notion\Http\Response;
use Codecycler\Notion\Resources\Page;
use Exception;
use GuzzleHttp\Client as ApiClient;

class Client
{
    private $guzzle;

    private $url = 'https://api.notion.com/v1/';

    private $version = '2021-05-13';

    private $apiToken;

    public function __construct(string $token = null)
    {
        if ($token) {
            $this->setApiToken($token);
        }
    }

    public function setApiToken($token): self
    {
        $this->apiToken = $token;

        $this->guzzle = new ApiClient([
            'base_uri' => $this->url,
            'http_errors' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->getApiToken(),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Notion-Version' => $this->version,
            ],
        ]);

        return $this;
    }

    public function getApiToken(): string
    {
        return $this->apiToken;
    }

    public function makeAPICall(string $url, string $method = 'get', array $options = []): Response
    {
        if (! in_array($method, ['get', 'post', 'path', 'delete'])) {
            throw new Exception('Invalid method type');
        }

        $response = $this->guzzle->{$method}($url, $options);

        /*swtich ($response->getStatusCode()) {
            case 401:
                throw new Exception($response->body);
            case 404:
                throw new Exception();
        }*/

        return new Response($response);
    }

    public function pages(string $id = null): Page
    {
        return new Page($this, $id);
    }
}
