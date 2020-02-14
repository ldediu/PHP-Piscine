<?php
require_once 'Color.class.php';
class Vertex {

	private $_x;
	private $_y;
	private $_z;
	private $_w = 1;
	private $_color;
    static $verbose = false;

    public function __construct(array $tab)
    {
        if (isset($tab['x']) && isset($tab['y']) && isset($tab['z']))
        {
            $this->_x = $tab['x'];
            $this->_y = $tab['y'];
            $this->_z = $tab['z'];
            if (isset($tab['w']))
                $this->_w = $tab['w'];
            if (isset($tab['color']) && $tab['color'] instanceof Color)
                $this->_color = $tab['color'];
            else
                $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
        }
        if (self::$verbose)
        {
            printf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, %s ) constructed.\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
        }
    }

    public function getX() { return $this->_x; }
    public function getY() { return $this->_y; }
    public function getZ() { return $this->_z; }
    public function getW() { return $this->_w; }
    public function getColor() { return $this->_color; }

    public function setX($arg) { $this->_x = $arg; }
    public function setY($arg) { $this->_y = $arg; }
    public function setZ($arg) { $this->_z = $arg; }
    public function setW($arg) { $this->_w = $arg; }
    public function setColor($arg) { $this->x = $arg; }

    function __toString()
	{
		if (Vertex::$verbose)
			return sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, %s )",
				$this->_x,
				$this->_y,
				$this->_z,
				$this->_w,
				$this->_color);
		else
			return sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f )",
				$this->_x,
				$this->_y,
				$this->_z,
				$this->_w);
	}

    function __destruct()
	{
		if (Vertex::$verbose)
		{
			printf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, %s ) destructed\n",
				$this->_x,
				$this->_y,
				$this->_z,
				$this->_w,
				$this->_color);
		}
	}

    public static function doc() 
    {
		return file_get_contents("./Vertex.doc.txt");
	}
}
    
?>
