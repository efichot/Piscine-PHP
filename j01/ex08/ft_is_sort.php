<?php
	function ft_is_sort($tab) {
		$tmp = $tab;
		sort($tab);
		if (empty(array_diff_assoc($tmp, $tab))) {
			return true;
		} else {
			return false;
		}
	}
?>
