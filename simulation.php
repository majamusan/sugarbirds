<?php 
namespace simulation;

class Simulation {

	//-------------------------------------------------------------------------------------------------------[config]
	public $cfg ;
	function __construct (){
		$this->cfg->amountOfBirds = 12;
		$this->cfg->amountOfFlowers = 10;
		$this->cfg->dailyHunger = 10;
		$this->cfg->startingNectarRange = [810,1020];
		$this->cfg->dayStart = 0;
		$this->cfg->dayEnd = 12;
		$this->cfg->dayReset = 24;

	}

	//-------------------------------------------------------------------------------------------------------[utils]
	public static function orderById($array){
		usort($array, function ($a, $b) {
			if ($a->id == $b->id)  return 0; 
			return ($a->id < $b->id) ? -1 : 1;
		});
		return $array;
	}

}
