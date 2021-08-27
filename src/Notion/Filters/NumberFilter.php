<?php namespace Notion\Filters;

class NumberFilter extends Filter
{
    protected $type = 'text';

    protected $methods = [
        'equals',
        'does_not_equal',
        'greater_than',
        'less_than',
        'greater_than_or_equal_to',
        'less_than_or_equal_to',
        'is_empty',
        'is_not_equal',
    ];
}
