<?php namespace Notion\Http;

use Psr\Http\Message\ResponseInterface;
use stdClass;

class Response
{
    private $json;

    private $response;

    public function __construct(ResponseInterface $response)
    {
        $this->setResponse($response);
        $this->decodeJson();
    }

    private function setResponse(ResponseInterface $response): self
    {
        $this->response = $response;

        return $this;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    private function decodeJson(): self
    {
        $json = json_decode($this->getResponse()->getBody());

        return $this->setJson($json);
    }

    public function setJson(stdClass $json = null): self
    {
        $this->json = $json;

        return $this;
    }

    public function getJson(): ?stdClass
    {
        return $this->json;
    }

    public function getData()
    {
        return $this->getJson()->data ?? $this->getJson();
    }

    public function toArray(): array
    {
        return [
            'json' => $this->getJson(),
            'response' => $this->getResponse(),
        ];
    }
}
