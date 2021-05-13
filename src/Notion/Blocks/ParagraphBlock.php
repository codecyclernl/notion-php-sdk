<?php namespace Codecycler\Notion\Notion\Blocks;

use Codecycler\Notion\RichText;
use Codecycler\Notion\BlockBase;

class ParagraphBlock extends BlockBase
{
    public $type = 'paragraph';

    public $text = [];

    public $children = [];

    public function __construct()
    {
        $this->text = new RichText();
    }
}
