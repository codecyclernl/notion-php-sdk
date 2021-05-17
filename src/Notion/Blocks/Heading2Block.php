<?php namespace Notion\Blocks;

use Notion\RichText;
use Notion\BlockBase;

class Heading2Block extends BlockBase
{
    public $type = 'heading_2';

    public function __construct(RichText $richText)
    {
        $this->typeConfiguration = [
            'text' => [$richText->get()],
        ];
    }
}
