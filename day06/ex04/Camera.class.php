<?php
require_once "Matrix.class.php";
class Camera
{
	private $_origin;
	private $_tt;
	private $_tr;
	private $_view;
	private $_proj;
	private $_height;
	private $_width;
	public static $verbose = false;
	public function __construct(array $kw_arg)
	{
		if (!array_key_exists("origin", $kw_arg) ||
			!array_key_exists("orientation", $kw_arg) ||
			!array_key_exists("fov", $kw_arg) ||
			!array_key_exists("near", $kw_arg) ||
			!array_key_exists("far", $kw_arg))
			return false;
		if (array_key_exists("ratio", $kw_arg))
		{
			if (!array_key_exists("width", $kw_arg) &&
				!array_key_exists("height", $kw_arg))
				return false;
			if (!array_key_exists("width", $kw_arg))
				$kw_arg["width"] = $kw_arg["height"] * $kw_arg["ratio"];
			if (!array_key_exists("height", $kw_arg))
				$kw_arg["height"] = $kw_arg["width"] / $kw_arg["ratio"];
			$this->_width = $kw_arg["width"];
			$this->_height = $kw_arg["height"];
		}
		else 
		{
			if (!array_key_exists("width", $kw_arg) ||
				!array_key_exists("height", $kw_arg))
				return false;
			$kw_arg["ratio"] = $kw_arg["width"] / $kw_arg["height"];
		}
		
		$this->_set_origin($kw_arg["origin"]);
		$this->_set_tt();
		$this->_set_tr($kw_arg["orientation"]);
		$this->_set_view();
		$this->_set_proj($kw_arg);
		$this->_set_width($kw_arg["width"]);
		$this->_set_height($kw_arg["height"]);
		if (self::$verbose)
			echo "Camera instance constructed".PHP_EOL;
		return true;
	}
	public function __destruct()
	{
		if (self::$verbose)
			echo "Camera instance destructed".PHP_EOL;
		return true;
	}
	public function __toString()
	{
		return	"Camera( "
			.PHP_EOL."+ Origine: ".$this->get_origin()
			.PHP_EOL."+ tT:".PHP_EOL.$this->get_tt()
			.PHP_EOL."+ tR:".PHP_EOL.$this->get_tr()
			.PHP_EOL."+ tR->mult( tT ):".PHP_EOL.$this->get_view()
			.PHP_EOL."+ Proj:".PHP_EOL.$this->get_proj()
			.PHP_EOL.")";
	}
	
	public function watchVertex(Vertex $worldVertex)
	{
		$v = $this->get_proj()->transformVertex($worldVertex);
		$w = $this->get_width() / 2;
		$h = $this->get_height() / 2;
		return new Vertex(array("x" => $v->get_x() * $w + $w,
								"y" => $v->get_y() * $h + $h,
								"z" => $v->get_z()));
	}
	private function _set_origin(Vertex $origin)
	{
		$this->_origin = $origin;
	}
	private function _set_tt()
	{
		$v = new Vector(array("dest" => $this->_origin));
		$this->_tt = new Matrix(array("preset" => Matrix::TRANSLATION,
										 "vtc" => $v->opposite()));
	}
	private function _set_tr(Matrix $orientation)
	{
		$this->_tr = $orientation->invert();
	}
	private function _set_view()
	{
		$this->_view = $this->_tr->mult($this->_tt); 
	}
	private function _set_proj(array $kw_arg)
	{
		$this->_proj = new Matrix(array("preset" => Matrix::PROJECTION,
									   "ratio" => $kw_arg["ratio"],
									   "fov" => $kw_arg["fov"],
									   "near" => $kw_arg["near"],
									   "far" => $kw_arg["far"]));
	}
	private function _set_width($width)
	{
		$this->_width = $width;
	}
	private function _set_height($height)
	{
		$this->_height = $height;
	}
    public function get_origin() { return $this->_origin; }
	public function get_tt() { return $this->_tt; }
	public function get_tr() { return $this->_tr; }
	public function get_view() { return $this->_view; }
	public function get_proj() { return $this->_proj; }
	public function get_width() { return $this->_width; }
    public function get_height() { return $this->_height; }
    
    public static function doc() 
    {
        return file_get_contents("./Vector.doc.txt");
    }
}
?>