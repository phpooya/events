<?php
namespace phpooya\events;

class EventData
{
    public $target;
    public $data = [];

    public function __construct($target, $data = [])
    {
        $this->target = $target;
        $this->data = $data;
    }
}