<?php namespace Notion\Resources;

use Notion\Notion;

class Resource
{
    protected $notion;

    protected $id;

    protected $endpoint = '';

    public function __construct(Notion $notion, $id = null)
    {
        $this->notion = $notion;

        $this->id = $id;
    }

    public function all()
    {
        return $this->notion
            ->getClient()
            ->get($this->endpoint);
    }
}
