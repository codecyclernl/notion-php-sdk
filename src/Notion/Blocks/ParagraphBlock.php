<?php namespace Notion\Blocks;

use Notion\BlockBase;
use Notion\RichText;

class ParagraphBlock extends BlockBase
{
    public $type = 'paragraph';

    public function __construct(RichText $richText, $checked = false)
    {
        $this->typeConfiguration = [
            'text' => [$richText->get()],
        ];
    }

    public function toHtml()
    {
        return "<p>{$this->plain_text}</p>";
    }
}
