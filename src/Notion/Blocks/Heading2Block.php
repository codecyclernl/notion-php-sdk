<?php namespace Notion\Blocks;

use Notion\RichText;
use Notion\BlockBase;

class Heading2Block extends BlockBase
{
    public $type = 'heading_2';

    public function toHtml()
    {
        return "<h2>{$this->plain_text}</h2>";
    }
}
