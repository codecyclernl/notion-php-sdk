<?php namespace Notion\Http;

use GuzzleHttp\Client as ApiClient;

class Client
{
    private $http;

    private $url = 'https://api.notion.com/v1/';

    private $version = '2021-08-16';

    private $apiToken;

    public function __construct(string $token = null)
    {
        if ($token) {
            $this->setApiToken($token);
        }
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function setApiToken($token): self
    {
        $this->apiToken = $token;

        $options = [
            'base_uri' => $this->url,
            'http_errors' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Notion-Version' => $this->version,
            ],
        ];

        $this->http = new ApiClient($options);

        return $this;
    }

    public function post(string $url, array $options = []): Response
    {
        return $this->makeCall($url, 'post', $options);
    }

    public function patch(string $url, array $options = []): Response
    {
        return $this->makeCall($url, 'patch', $options);
    }

    public function get(string $url, array $options = []): Response
    {
        return $this->makeCall($url, 'get', $options);
    }

    public function makeCall(string $url, string $method, array $options = []): Response
    {
        $response = $this->http->{$method}($url, $options);

        return new Response($response);
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
