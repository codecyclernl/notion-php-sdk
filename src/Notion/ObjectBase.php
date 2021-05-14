<?php namespace Notion;

class ObjectBase
{
    protected $nextCursor;

    protected $hasMore;

    protected $object;

    public function __construct($data)
    {
        $this->handleResponse($data);
    }

    protected function handleResponse($data)
    {
    }
}
