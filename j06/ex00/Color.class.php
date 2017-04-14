<?php
class Color
{
	public $red;
	public $green;
	public $blue;
	static $verbose = false;

	function __construct(array $kwargs) {
		if (isset($kwargs['rgb'])) {
			$rgb = intval($kwargs['rgb']);
			$this->red = $rgb / 65536 % 256;
			$this->green = $rgb / 256 % 256;
			$this->blue = $rgb % 256;
		} else if (isset($kwargs['red']) && isset($kwargs['green']) && isset($kwargs['blue'])) {
			$this->red = intval($kwargs['red']);
			$this->green = intval($kwargs['green']);
			$this->blue = intval($kwargs['blue']);
		} else {
			if (self::$verbose) {
				echo "ERROR: Bad arguments, cannot construct the class Color\n";
				return ;
			}
		}
		if (self::$verbose) {
			echo "Color( red: " . $this->red . ", green: " . $this->green . ", blue: " . $this->blue . " ) Constructed.\n";
		}
	}

	function __destruct() {
		if (self::$verbose) {
			echo "Color( red: " . $this->red . ", green: " . $this->green . ", blue: " . $this->blue . " ) Destructed.\n";
		}
	}

	static function doc() {
		$str = file_get_contents('Color.doc.txt');
		echo $str;
	}

	function add(Color $instance) {
		return (new Color(['red' => $this->red + $instance->red, 'green' => $this->green + $instance->green, 'blue' => $this->blue + $instance->blue]));
	}

	function sub(Color $instance) {
		return (new Color(['red' => $this->red - $instance->red, 'green' => $this->green - $instance->green, 'blue' => $this->blue - $instance->blue]));
	}

	function mult($mult) {
		return (new Color(['red' => $this->red * $mult, 'green' => $this->green * $mult, 'blue' => $this->blue * $mult]));
	}

	function __toString() {
		return "Color( red: " . $this->red . ", green: " . $this->green . ", blue: " . $this->blue . " )";
	}

}
?>
