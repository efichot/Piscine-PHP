<?php
	class Vertex
	{
		private $_x;
		private $_y;
		private $_z;
		private $_w = 1.0;
		private $_color;
		static $verbose = false;


		function __construct(array $kwargs) {
			if (isset($kwargs['x']) && isset($kwargs['y']) && isset($kwargs['z'])) {
				$this->_x = $kwargs['x'];
				$this->_y = $kwargs['y'];
				$this->_z = $kwargs['z'];
				if (isset($kwargs['w'])) {
					$this->_w = $kwargs['w'];
				}
				if (isset($kwargs['color']) && $kwargs['color'] instanceof Color) {
					$this->_color = $kwargs['color'];
				} else {
					$this->_color = new Color(['red' => 255, 'green' => 255, 'blue' => 255]);
				}
				if (self::$verbose) {
					echo "Vertex( x: " . $this->getX() . ", y: " . $this->getY() . ", z:" . $this->getZ() . ", w:" . $this->getW() . ", " . $this->getColor() . " ) constructed\n";
				}
			} else {
				if (self::$verbose) {
					echo "ERROR: bad arguments, impossible to construct the class Vertex\n";
				}
			}
		}

		function __destruct() {
			if (self::$verbose) {
				echo "Vertex( x: " . $this->getX() . ", y: " . $this->getY() . ", z:" . $this->getZ() . ", w:" . $this->getW() . ", " . $this->getColor() . " ) destructed\n";
			}
		}

		function __toString() {
			if (self::$verbose) {
				return "Vertex( x: " . $this->getX() . ", y: " . $this->getY() . ", z:" . $this->getZ() . ", w:" . $this->getW() . ", " . $this->getColor() . " )";
			} else {
				return "Vertex( x: " . $this->getX() . ", y: " . $this->getY() . ", z:" . $this->getZ() . ", w:" . $this->getW() . " )";
			}
		}

		static function doc() {
			$str = file_get_contents('Vertex.doc.txt');
			return $str;
		}

		function getX() {
			return number_format($this->_x, 2);
		}

		function setX($v) {
			$this->_x = $v;
		}

		function getY() {
			return number_format($this->_y, 2);
		}

		function setY($v) {
			$this->_y = $v;
		}

		function getZ() {
			return number_format($this->_z, 2);
		}

		function setZ($v) {
			$this->_z = $v;
		}

		function getW() {
			return number_format($this->_w, 2);
		}

		function setW($v) {
			$this->_w = $v;
		}

		function getColor() {
			return "Color( red: " . $this->_color->red . ", green: " . $this->_color->green . ", blue: " . $this->_color->blue . " )";
		}

		function setColor($v) {
			$this->_color = $v;
		}
	}
 ?>
