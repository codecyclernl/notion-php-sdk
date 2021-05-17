<?php namespace Notion\Blocks;

use Notion\RichText;
use Notion\BlockBase;

class TodoBlock extends BlockBase
{
    public $type = 'to_do';

    public function __construct(RichText $richText, $checked = false)
    {
        $this->typeConfiguration = [
            'text' => [$richText->get()],
            'checked' => $checked,
        ];
    }
}
