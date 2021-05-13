<?php namespace Codecycler\Notion\Resources;

use Codecycler\Notion\Client;

abstract class Resource
{
    private $client;
    private $action;
    private $endpoint;
    private $id;

    public function __construct(Client $client = null, $id = null)
    {
        if ($client) {
            $this->setClient($client);
        }

        if ($id) {
            $this->setId($id);
        }
    }

    public function setId(string $id = null): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setEndpoint(string $endpoint): self
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    public function getEndpoint(): ?string
    {
        return $this->endpoint;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }
}
