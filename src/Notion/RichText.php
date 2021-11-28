<?php namespace Notion;

class RichText
{
    public $plain_text;

    public $href;

    public $annotations = [
        'color' => 'default',
    ];

    public $type;

    public $typeConfiguration = [];

    public static $colorOptions = [
        'default',
        'gray',
        'brown',
        'orange',
        'yellow',
        'green',
        'blue',
        'purple',
        'pink',
        'red',
        'gray_background',
        'brown_background',
        'orange_background',
        'yellow_background',
        'green_background',
        'blue_background',
        'purple_background',
        'pink_background',
        'red_background',
    ];

    public function __construct($config = null)
    {
        if ($config) {
            $this->parse($config);
        }
    }

    public function get()
    {
        return [
            'annotations' => $this->annotations,
            $this->type => $this->typeConfiguration,
            'plain_text' => $this->plain_text,
        ];
    }

    public function text($content, $link = null): self
    {
        $this->type = 'text';
        $this->plain_text = $content;
        $this->typeConfiguration['content'] = $content;

        if ($link) {
            $this->typeConfiguration['link'] = [
                'type' => 'url',
                'url' => $link,
            ];
        }

        return $this;
    }

    public function mention($type, $config = null): self
    {
        $this->type = 'mention';
        $this->typeConfiguration['type'] = $type;

        if ($type === 'user') {
            $this->typeConfiguration['user'] = [
                'object' => 'user',
                'id' => $config,
            ];
        }

        if ($type === 'page') {
            $this->typeConfiguration['page'] = [
                'id' => $config,
            ];
        }

        if ($type === 'database') {
            $this->typeConfiguration['database'] = [
                'id' => $config,
            ];
        }

        if ($type === 'date') {
            // Todo: Handle date
        }

        return $this;
    }

    public function equation($expression): self
    {
        $this->type = 'equation';
        $this->typeConfiguration['expression'] = $expression;
        return $this;
    }

    public function bold($setting = true): self
    {
        $this->annotations['bold'] = $setting;
        return $this;
    }

    public function italic($setting = true): self
    {
        $this->annotations['italic'] = $setting;
        return $this;
    }

    public function strikethrough($setting = true): self
    {
        $this->annotations['strikethrough'] = $setting;
        return $this;
    }

    public function underline($setting = true): self
    {
        $this->annotations['underline'] = $setting;
        return $this;
    }

    public function code($setting = true): self
    {
        $this->annotations['code'] = $setting;
        return $this;
    }

    public function color($setting = 'default'): self
    {
        $this->annotations['color'] = $setting;
        return $this;
    }

    public function parse($config): self
    {
        if (is_array($config) && count($config) === 1) {
            $config = (object)$config[0];
        } else {
            return $this;
        }

        //
        $this->plain_text = $config->plain_text;

        //
        $this->type = $config->type;

        //
        $this->annotations = (array) $config->annotations;

        //
        $this->href = $config->href;

        return $this;
    }
}
