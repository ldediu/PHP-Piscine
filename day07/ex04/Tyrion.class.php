<?php
    Class Tyrion{
        public function sleepWith($person)
        {
            if ($person instanceof Jaime)
                print("Not even if I'm drunk !");
            else if($person instanceof Sansa)
                print("Let's do this.");
            else if($person instanceof Cersei)
                print("Not even if I'm drunk !");
            print("\n");
        }
    }
?>