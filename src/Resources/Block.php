<?php namespace Codecycler\Notion\Resources;

use Ramsey\Uuid\Uuid;

class Block extends Resource
{
    /**
     * @var string
     */
    public $object = 'block';

    /**
     * @var Uuid v4
     */
    public $id = null;

    /**
     * @var string Based on type options
     */
    public $type = null;

    /**
     * @var string ISO 8601
     */
    public $created_time;

    public $last_edited_time;

    public $has_children;

    static $typeOptions = [
        'paragraph',
        'heading_1',
        'heading_2',
        'heading_3',
        'bulleted_list_item',
        'numbered_list_item',
        'to_do',
        'toggle',
        'child_page',
        'unsupported',
    ];
}
