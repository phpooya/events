<?php
namespace phpooya\events;

trait EventTrait
{
    public static function trigger(EventData $data, string $type = 'before') : void
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $triggerName = $type .".". $trace[1]['function'];

        $thisClass = get_called_class();
        while ($thisClass) {
            $r = new ReflectionClass($thisClass);
            if (!$r->hasMethod($trace[1]['function'])) break;
            $handlers = EventStack::getStack($thisClass, $triggerName);
            if ($handlers) {
                foreach ($handlers as $func) {
                    call_user_func($func, $data);
                }
                break;
            }
            $thisClass = get_parent_class($thisClass);
        }
    }

    public static function on(string $triggerName, callable $func) : void
    {
        EventStack::setStack(get_called_class(), $triggerName, $func);
    }
}