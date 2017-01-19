<?php
	class NightsWatch implements IFighter
	{
		private $members;

		public function recruit($name)
		{
			if ($name instanceof IFighter)
				$this->members[] = $name;
		}

		public function fight()
		{
			foreach ($this->members as $value) {
				$value->fight();
			}
		}
	}
?>