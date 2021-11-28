<?php namespace Notion\Blocks;

use Notion\RichText;
use Notion\BlockBase;

class Heading3Block extends BlockBase
{
    public $type = 'heading_3';

    public function toHtml()
    {
        return "<h3>{$this->plain_text}</h3>";
    }
}
