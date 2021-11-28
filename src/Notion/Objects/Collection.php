<?php namespace Notion\Objects;

use Notion\RichText;
use Notion\ObjectBase;
use Notion\Blocks\TodoBlock;
use Notion\Blocks\Heading1Block;
use Notion\Blocks\Heading2Block;
use Notion\Blocks\Heading3Block;
use Notion\Blocks\ParagraphBlock;

class Collection extends ObjectBase
{
    public $object = 'list';

    public $pages = [];

    public $databases = [];

    public $blocks = [];

    public $blockTypes = [
        'heading_1',
        'heading_2',
        'heading_3',
        'paragraph',
        'todo',
    ];

    public function handleResponse($data)
    {
        foreach ($data->results as $item) {
            if ($item->object === 'page') {
                $page = new Page($item, $this->notion);
                $this->pages[] = $page;
            }

            if ($item->object === 'database') {
                $database = new Database($item, $this->notion);
                $this->databases[] = $database;
            }

            if ($item->object === 'block' && in_array($item->type, $this->blockTypes)) {
                $richText = $item->{$item->type}->text;

                $richText = new RichText($item->{$item->type}->text);

                switch ($item->type) {
                    case "heading_1":
                        $block = new Heading1Block($richText);
                        break;
                    case "heading_2":
                        $block = new Heading2Block($richText);
                        break;
                    case "heading_3":
                        $block = new Heading3Block($richText);
                        break;
                    case "paragraph":
                        $block = new ParagraphBlock($richText);
                        break;
                    case "todo":
                        $block = new TodoBlock($richText);
                        break;
                }

                $this->blocks[] = $block;
            }
        }
    }
}
