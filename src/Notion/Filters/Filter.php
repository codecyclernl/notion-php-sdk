<?php namespace Notion\Filters;

use Illuminate\Support\Str;

class Filter
{
    protected $type;

    protected $value;

    protected $method;

    protected $methods = [];

    protected $property;

    public function __call($name, $arguments)
    {
        //
        $name = Str::snake($name);

        if (in_array($name, $this->methods)) {
            $this->method = $name;
            $this->property = $arguments[0];
            $this->value = $arguments[1];
            return $this;
        }
    }

    public function prepareForRequest()
    {
        return [
            'property' => $this->property,
            $this->type => [
                $this->method => $this->value,
            ],
        ];
    }
}
