<?php
    class NightsWatch implements IFighter
    {
        private $arr;
        public function recruit($s)
        {
            $this->arr[] = $s;
        }
        function fight()
        {
            foreach ($this->arr as $s) {
                if (method_exists(get_class($s), 'fight'))
                    $s->fight();
            }
        }
    }
?>