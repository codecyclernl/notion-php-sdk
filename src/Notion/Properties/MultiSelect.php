<?php namespace Notion\Properties;

use Notion\PropertyBase;

class MultiSelect extends PropertyBase
{

    public function value()
    {
        return $this->config->multi_select->selected_values ?? null;
    }


    public function set($value): void
    {
        if (!isset($this->config->multi_select)) {
            $this->config->multi_select = (object)[];
        }

        if(!is_array($value)) $value = [$value];
        $this->config->multi_select->selected_values = $value;
    }

    public function get()
    {
        if (isset($this->getValue()?->selected_values)) {
            return [
                'multi_select' => array_map(fn($el) => ['name' => (string)$el], $this->getValue()?->selected_values)
            ];
        }
        return null;
    }

    public function getValue()
    {
        return $this->config->multi_select;
    }
}
