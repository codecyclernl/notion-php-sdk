<?php namespace Notion\Filters;

class DateFilter extends Filter
{
    public $type = 'date';

    public $methods = [
        'equals',
        'before',
        'after',
        'on_or_before',
        'is_empty',
        'is_not_empty',
        'on_or_after',
        'past_week',
        'past_month',
        'past_year',
        'next_week',
        'next_month',
        'next_year',
    ];
}
