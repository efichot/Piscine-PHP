<?php
	class NightsWatch implements IFighter
	{
		private $_tab = [];
		public function recruit($warrior) {
			$this->_tab[] = $warrior;
		}

		public function fight() {
			foreach ($this->_tab as $warrior) {
				if (method_exists(get_class($warrior), 'fight')) {
					$warrior->fight();
				}
			}
		}
	}
?>
