# events
New level architecture to keep your project designed-pattern.


### Installation:

    composer require phpooya/events
    
### How to use:

add `EventTrait` to your class as in example and use `$this->trigger()` inside of your code:

    class UserModel extends model
    {
        use phpooya\events\EventTrait;
        
        public $name;
        public $email;
        
        public function find(int $id)
        {
            $this->trigger(new phpooya\events\EventData($this, ['some data.']), "before");
            //do somthing...
            $this->trigger(new phpooya\events\EventData($this, ['some data.']), "after");
        }
        
        public function save()
        {
            $this->trigger(new phpooya\events\EventData($this, ['some data.']), "before");
            //do somthing...
            $this->trigger(new phpooya\events\EventData($this, ['some data.']), "after");
        }
    }
