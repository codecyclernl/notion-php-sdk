<?php namespace Notion\Blocks;

use Notion\RichText;
use Notion\BlockBase;

class Heading1Block extends BlockBase
{
    public $type = 'heading_1';

    public function __construct(RichText $richText)
    {
        $this->typeConfiguration = [
            'text' => [$richText->get()],
        ];
    }
}
