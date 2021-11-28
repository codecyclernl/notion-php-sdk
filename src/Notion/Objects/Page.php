<?php namespace Notion\Objects;

use Notion\ObjectBase;
use Notion\Http\Response;

class Page extends ObjectBase
{
    protected $endpoint = 'pages';

    protected $properties = [];

    protected $parent;

    protected $children = [];

    public function get(): self
    {
        $client = $this->notion->getClient();

        $response = $client->get('pages/' . $this->id);

        $data = $response->getJson();

        $this->handleResponse($data);

        return $this;
    }

    public function setParent($type, $id): self
    {
        $this->parent[$type . '_id'] = $id;

        return $this;
    }

    // TODO: Implement rich text logic
    public function addBlock($block): self
    {
        $this->children[] = $block;
        return $this;
    }

    public function prepareForRequest()
    {
        $data = [
            'parent' => $this->parent,
            'properties' => [],
        ];

        foreach ($this->properties as $property) {
            $value = $property->get();

            if (!$value) {
                continue;
            }

            $data['properties'][$property->name] = $value;
        }

        if (count($this->children) > 0) {
            $data['children'] = [];

            foreach ($this->children as $child) {
                $data['children'][] = $child->get();
            }
        }

        ray($data);

        return $data;
    }

    public function initProperties($data): self
    {
        $this->properties = $data;

        return $this;
    }

    public function __get($property)
    {
        if (!isset($this->properties[$property])) {
            return $this->$property;
        }

        return $this->properties[$property]
            ->value();
    }

    public function __set($property, $value)
    {
        if (!isset($this->properties[$property])) {
            $this->$property = $value;
            return;
        }

        $this->properties[$property]->set($value);
    }

    public function __isset($property)
    {
        return isset($this->properties[$property]);
    }

    public function save()
    {
        $options = [
            'body' => json_encode($this->prepareForRequest()),
        ];

        if (!$this->id) {
            return $this->notion->getClient()->post('pages', $options);
        }

        return $this->notion->getClient()->patch('pages/' . $this->id, $options);
    }

    public function setContext($context): self
    {
        $this->context = $context;

        return $this;
    }

    public function children()
    {
        $response = $this->notion->getClient()->get('blocks/' . $this->id . '/children');
        $result = new Collection($response->getJson(), $this->notion);
        return $result;
    }
}
