<?php
    Class Jaime{
        public function sleepWith($person)
        {
            if ($person instanceof Tyrion)
                print("Not even if I'm drunk !");
            else if($person instanceof Sansa)
                print("Let's do this.");
            else if($person instanceof Cersei)
                print("With pleasure, but only in a tower in Winterfell, then.");
            print("\n");
        }
    }
?>