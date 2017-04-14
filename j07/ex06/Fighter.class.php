<?php
	abstract class Fighter
	{
		public $name;
		function __construct($warrior) {
			$this->name = $warrior;
		}
		abstract function fight($target);
	}
?>
