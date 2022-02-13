<?php namespace Notion\Objects;

use Illuminate\Support\Str;
use Notion\ObjectBase;
use Notion\Http\Response;

class Page extends ObjectBase
{
    protected $endpoint = 'pages';

    protected $properties = [];

    protected $propertiesCamelCaseAliases = [];

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

        if (function_exists('ray')) ray($data);

        return $data;
    }

    public function initProperties($data): self
    {
        $this->properties = $data;

        // generate aliases for camelCase properties
        foreach ($data as $sha1key => $property) {
            $this->propertiesCamelCaseAliases[Str::camel($property->name)] = sha1($property->name);
        }

        return $this;
    }

    public function __get($property)
    {
        // search propery by sha1 key
        if (isset($this->properties[sha1($property)])) {
            return $this->properties[sha1($property)]->value();
        }

        // fallback for camelCase alias
        if(isset($this->propertiesCamelCaseAliases[$property]) && isset($this->properties[$this->propertiesCamelCaseAliases[$property]])) {
            return $this->properties[$this->propertiesCamelCaseAliases[$property]]->value();
        }

        // other cases- return class propery
        return $this->$property;
    }

    public function __set($property, $value)
    {
        // if we have this property in our sha1-keyed array
        if (isset($this->properties[sha1($property)])) {
            $this->properties[sha1($property)]->set($value);
            return;
        }

        // else check if it is camelCase alias
        if(isset($this->propertiesCamelCaseAliases[$property]) && isset($this->properties[$this->propertiesCamelCaseAliases[$property]])) {
            $this->properties[$this->propertiesCamelCaseAliases[$property]]->set($value);
            return;
        }

        // set class property in other cases
        $this->$property = $value;
    }

    public function __isset($property)
    {
        return isset($this->properties[sha1($property)]) || (isset($this->propertiesCamelCaseAliases[$property]) && isset($this->properties[$this->propertiesCamelCaseAliases[$property]]));
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
