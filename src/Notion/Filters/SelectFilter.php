<?php namespace Notion\Filters;

class SelectFilter extends Filter
{
    protected $type = 'select';

    protected $methods = [
        'equals',
        'does_not_equal',
        'is_empty',
        'is_not_empty',
    ];
}
