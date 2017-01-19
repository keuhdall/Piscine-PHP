<?php
	class Tyrion extends Lannister
	{
		public function sleepwith($sb) {
			if (get_parent_class($sb) !== "Lannister")
				print("Let's do this.".PHP_EOL);
			else
				print("Not even if I'm drunk !".PHP_EOL);
		}
	}
?>