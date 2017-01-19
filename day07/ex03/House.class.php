<?php
	class House
	{		
		public function introduce()
		{
			print ("House ".$this->getHouseName());
			print (" of ".$this->getHouseSeat());
			print (" : \"".$this->getHouseSeat()."\"".PHP_EOL);
		}
	}
?>