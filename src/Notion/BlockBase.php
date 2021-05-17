<?php namespace Notion;

class BlockBase
{
    public $object = 'block';

    public $id = '';

    public $type = '';

    public $created_time = '';

    public $last_edited_time = '';

    public $has_children = false;

    public $typeConfiguration = [];

    public function get(): array
    {
        return [
            'object' => $this->object,
            'id' => $this->id,
            'type' => $this->type,
            $this->type => $this->typeConfiguration,
        ];
    }
}
