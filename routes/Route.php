<?php

namespace Router;

class Route
{
    public $path;
    public $action;

    public function __construct($path,$action)
    {
        $this->path = $path;
        $this->action = $action;
    }
}