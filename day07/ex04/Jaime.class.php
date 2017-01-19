<?php
	class Jaime extends Lannister
	{
		public function sleepwith($sb) {
			if (get_parent_class($sb) !== "Lannister")
				print("Let's do this.".PHP_EOL);
			else if (get_class($sb) === "Cersei")
				print("With pleasure, but only in a tower in Winterfell, then.".PHP_EOL);
			else
				print("Not even if I'm drunk !".PHP_EOL);
		}
	}
?>