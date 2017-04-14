<?php
class Tyrion extends Lannister
{
	public function sleepWith($inst) {
		if ($inst instanceof Jaime) {
			print("Not even if I'm drunk !" . PHP_EOL);
		} else if ($inst instanceof Sansa) {
			print("Let's do this." . PHP_EOL);
		} else if ($inst instanceof Cersei) {
			print("Not even if I'm drunk !" . PHP_EOL);
		}
	}
}
?>
