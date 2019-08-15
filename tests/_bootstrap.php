<?php
use phpooya\events\EventTrait;
use phpooya\events\EventData;

class UserModel
{
    use EventTrait;

    public $name;
    public $email;
    public $password;

    public function find() : array
    {
        $eventData = new EventData($this);
        $this->trigger($eventData, "before");

        $returnData = []; //retrieve data from DB...

        $this->trigger($eventData, "after");
        return $returnData;
    }

    public function save() : bool
    {
        $eventData = new EventData($this);
        $this->trigger($eventData, "before");

        $returnData = true; //save data in DB...

        $this->trigger($eventData, "after");
        return $returnData;
    }
}