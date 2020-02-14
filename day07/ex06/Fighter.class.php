<?php

abstract class Fighter
{
    private $type_fighter;
    abstract function fight($i);
    public function __construct($type_sol)
    {
        $this->type_fighter = $type_sol;
    }
    public function getType()
    {
        return ($this->type_fighter);
    }
}

?>