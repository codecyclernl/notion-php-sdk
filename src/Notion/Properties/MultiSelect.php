<?php namespace Notion\Properties;

use Notion\PropertyBase;
use Illuminate\Support\Arr;

class MultiSelect extends PropertyBase
{

    public function set($value): void
    {
        if (!isset($this->config->multi_select)) {
            $this->config->multi_select = (object)[];
        }

        if (!is_array($value)) $value = [$value];
        $this->config->multi_select = array_map(fn($el) => (object)['name' => (string)$el], $value);
    }

    public function getValue()
    {
        $withoutOptions = Arr::except((array)$this->config->multi_select, 'options');
        return count($withoutOptions) ? (object)$withoutOptions : null;
    }
}
