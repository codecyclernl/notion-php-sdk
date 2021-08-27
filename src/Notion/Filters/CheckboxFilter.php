<?php namespace Notion\Filters;

class CheckboxFilter extends Filter
{
    protected $type = 'checkbox';

    protected $methods = [
        'equals',
        'does_not_equal',
    ];
}
