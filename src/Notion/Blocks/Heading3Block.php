<?php namespace Notion\Blocks;

use Notion\RichText;
use Notion\BlockBase;

class Heading3Block extends BlockBase
{
    public $type = 'heading_3';

    public function __construct(RichText $richText)
    {
        $this->typeConfiguration = [
            'text' => [$richText->get()],
        ];
    }
}
