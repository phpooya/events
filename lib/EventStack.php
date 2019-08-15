<?php
namespace phpooya\events;

class EventStack
{
    private static $stack = [];

    public static function setStack(string $className, string $triggerName, callable $func)
    {
        static::$stack[$className][$triggerName][] = $func;
    }

    public static function getStack(string $className, string $triggerName)
    {
        return @ (array) static::$stack[$className][$triggerName];
    }
}