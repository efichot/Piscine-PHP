<?php
	class Vector
	{
		private $_x;
		private $_y;
		private $_z;
		private $_w = 0.0;
		static $verbose;

		function __construct(array $kwargs) {
			if (!isset($kwargs['dest']) || !($kwargs['dest'] instanceof Vertex)) {
				if (self::$verbose) {
					echo "ERROR: bad arguments impossible to construct the class.";
				}
				return ;
			if (!isset($kwargs['orig'])) {
				$orig = new Vertex(['x' => 0, 'y' => 0, 'z' => 0]);
			} else {
				$orig = $kwargs['orig'];
			}
			$dest = $kwargs['dest'];
			$this->_x = $dest->getX() - $orig->getX();
			$this->_y = $dest->getY() - $orig->getY();
			$this->_z = $dest->getZ() - $orig->getZ();
			if (self::$verbose) {
				echo "Vector( x:" . $this->getX() . ", y:" . $this->getY() . ", z:" . $this->getZ() . ", w:" . $this->getW() . " ) constructed\n";
			}
			}
		}

		function __destruct() {
			if (self::$verbose) {
				echo "Vector( x:" . $this->getX() . ", y:" . $this->getY() . ", z:" . $this->getZ() . ", w:" . $this->getW() . " ) destructed\n";
			}
		}

		static function doc() {
			$str = file_get_contents('Vector.doc.txt');
			return $str;
		}

		function magnitude() {
			return (float)sqrt(($this->getX() * $this->getX()) + ($this->getY() * $this->getY()) + ($this->getZ() * $this->getZ()));
		}

		function normalize() {
			$norme = $this->magnitude();
			if ($norme === 1) {
				return clone $this;
			}
			//divide all coord by the norme
			return new Vector(['dest' => new Vertex(['x' => $this->getX() / $norme, 'y' => $this->getY() / $norme, 'z' => $this->getZ() / $norme])]);
		}

		function add(Vector $rhs) {
			return new Vector(['dest' => new Vertex(['x' => $this->getX() + $rhs->getX(), 'y' => $this->getY() + $rhs->getY(), 'z' => $this->getZ() + $rhs->getZ()])]);
		}

		function sub(Vector $rhs) {
			return new Vector(['dest' => new Vertex(['x' => $this->getX() - $rhs->getX(), 'y' => $this->getY() - $rhs->getY(), 'z' => $this->getZ() - $rhs->getZ()])]);
		}

		function opposite() {
			return new Vector(['dest' => new Vertex(['x' => $this->getX() * -1, 'y' => $this->getY() * -1, 'z' => $this->getZ() * -1])]);
		}

		function scalarProduct($k) {
			return new Vector(['dest' => new Vertex(['x' => $this->getX() * $k, 'y' => $this->getY() * $k, 'z' => $this->getZ() * $k])]);
		}

		function dotProduct(Vector $rhs) {
			return (float)$this->getX() * $rhs->getX() + $this->getY() * $rhs->getY() + $this->getZ() * $rhs->getZ();
		}

		function cos(Vector $rhs) {
			return (float)$this->dotProduct($rhs) / sqrt(pow($this->magnitude(), 2));
		}

		function crossProduct(Vector $rhs) {
			return new Vector(['dest' => new Vertex(['x' => $this->getY() * $rhs->getZ() - $this->getY() * $rhs->getZ(),
													'y' => $this->getZ() * $rhs->getX() - $this->getX() * $rhs->getZ(),
													 'z' => $this->getX() * $rhs->getY() - $this->getX() * $rhs->getY()])]);
		}

		function __toString() {
			return "Vector( x:" . $this->getX() . ", y:" . $this->getY() . ", z:" . $this->getZ() . ", w:" . $this->getW() . " )";
		}

		function getX() {
			return number_format($this->_x, 2);
		}

		function getY() {
			return number_format($this->_y, 2);
		}

		function getZ() {
			return number_format($this->_z, 2);
		}

		function getW() {
			return number_format($this->_w, 2);
		}
	}
?>
