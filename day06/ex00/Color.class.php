<?php
class Color {
    public $red;
    public $green;
    public $blue;
    static $verbose = FALSE;

    public function __construct(array $color)
    {
        if (isset($color['rgb']))
        {
            $this->red = (intval($color['rgb']) >> 16) & 255;
            $this->green = (intval($color['rgb']) >> 8) & 255;
            $this->blue = intval($color['rgb']) & 255;
        }
        else if (isset($color['red']) && isset($color['green']) && isset($color['blue']))
        {
            $this->red = intval($color['red']);
            $this->green = intval($color['green']);
            $this->blue = intval($color['blue']);
        }
		if (self::$verbose) 
		{
			printf($this . " is constructed\n");
		}
	}
	
    public static function doc() 
    {
		return file_get_contents("./Color.doc.txt");
	}

	public function __destruct()
	{
		if (self::$verbose)
			printf($this . " is destructed\n");
	}

	function __toString()
	{
		return (sprintf("Color( red: %3d, green: %3d, blue: %3d )",
			$this->red, $this->green, $this->blue));
	}

	public function add(Color $color)
	{
		$red   = (($this->red + $color->red) > 255) ? 255 : $this->red + $color->red;
		$green = (($this->green + $color->green) > 255) ? 255 : $this->green + $color->green;
		$blue  = (($this->blue + $color->blue) > 255) ? 255 : $this->blue + $color->blue;
		$newcolor = new Color(array('red'=>$red, 'green'=>$green, 'blue'=>$blue));
		return $newcolor;
	}

	public function sub(Color $color)
	{
		$red   = (($this->red - $color->red) < 0) ? 0 : $this->red - $color->red;
		$green = (($this->green - $color->green) < 0) ? 0 : $this->green - $color->green;
		$blue  = (($this->blue - $color->blue) < 0) ? 0 : $this->blue - $color->blue;
		$newcolor = new Color(array('red'=>$red, 'green'=>$green, 'blue'=>$blue));
		return $newcolor;
	}

	public function mult($m)
	{
		$red   = (($this->red * $m) > 255) ? 255 : $this->red * $m;
		$green = (($this->green * $m) > 255) ? 255 : $this->green * $m;
		$blue  = (($this->blue * $m) > 255) ? 255 : $this->blue * $m;
		$newcolor = new Color(array('red'=>$red, 'green'=>$green, 'blue'=>$blue));
		return $newcolor;
	}
}
?>
