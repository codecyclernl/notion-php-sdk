<?php namespace Notion\Traits;

trait Filterable
{
    public $filter = [
        'or' => [],
    ];

    public function where($property, $propertyFilterType, $conditionType, $value)
    {
        $this->filter['or'][] = [
            'property' => $property,
            $propertyFilterType => [
                $conditionType => $value,
            ],
        ];

        return $this;
    }
}
