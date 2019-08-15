# events
New level architecture to keep your project designed-pattern.


### Installation:

    composer require phpooya/events
    
### How to use:

add `EventTrait` to your class as in example and use `$this->trigger()` inside of your code:

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
    
    UserModel::on('before.find', function($data){ /* do something you want... */ });
    UserModel::on('after.find', function($data){ $data->target->password = "********"; });
    UserModel::on('after.save', function($data){ /* add log for error... */ });