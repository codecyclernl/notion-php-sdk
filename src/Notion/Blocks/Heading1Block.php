<?php namespace Notion\Blocks;

use Notion\RichText;
use Notion\BlockBase;

class Heading1Block extends BlockBase
{
    public $type = 'heading_1';

    public function toHtml()
    {
        return "<h1>{$this->plain_text}</h1>";
    }
}
