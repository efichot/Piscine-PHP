<?php
	class UnholyFactory
	{
		private $_tab = [];

		function absorb($inst) {
			if ($inst instanceof Fighter) {
				if (isset($_tab[$inst->name])) {
					print("(Factory already absorbed a fighter of type " . $inst->name . ")" . PHP_EOL);
				} else {
					print("(Factory absorbed a fighter of type " . $inst->name . ")" . PHP_EOL);
					$this->_tab[$inst->name] = $inst;
				}
			} else {
				print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
			}
		}

		function fabricate($warrior) {
			if (array_key_exists($warrior, $this->_tab)) {
				print("(Factory fabricates a fighter of type " . $warrior . ")" . PHP_EOL);
				return (clone $this->_tab[$warrior]);
			} else {
				print("(Factory hasn't absorbed any fighter of type " . $warrior . ")" . PHP_EOL);
				return null;
			}
		}
	}
?>
