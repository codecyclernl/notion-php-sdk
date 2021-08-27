<?php namespace Notion\Traits;

trait Filterable
{
    protected $filter = [];

    public function filter($filters, $type = 'or')
    {
        if (!isset($this->filter[$type])) {
            $this->filter[$type] = [];
        }

        if (!is_array($filters)) {
            $filters = [$filters];
        }

        foreach ($filters as $filter) {
            $this->filter[$type][] = $filter->prepareForRequest();
        }

        return $this;
    }
}
