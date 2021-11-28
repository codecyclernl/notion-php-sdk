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

    public $plain_text = '';

    public function __construct($richText)
    {
        $this->plain_text = $richText->plain_text;
    }

    public function get(): array
    {
        $data = [
            'object' => $this->object,
            'type' => $this->type,
            $this->type => $this->typeConfiguration,
        ];

        if ($this->id) {
            $data['id'] = $this->id;
        }

        return $data;
    }
}
