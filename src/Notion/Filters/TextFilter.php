<?php namespace Notion\Filters;

class TextFilter extends Filter
{
    protected $type = 'text';

    protected $methods = [
        'equals',
        'does_not_equal',
        'contains',
        'does_not_contain',
        'starts_with',
        'ends_with',
        'is_empty',
        'is_not_empty',
    ];
}
