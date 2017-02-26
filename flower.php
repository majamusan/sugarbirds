<?php 
namespace simulation;

class Flower extends Simulation {

	public $nectar;
	private $sleeping;
	function __construct($id){
		parent::__construct();
		$this->id = $id;
		$this->nectar = rand($this->cfg->startingNectarRange[0],$this->cfg->startingNectarRange[1]);
		$this->lastVisit = -1;
	}

	public function onDayStart(){
		echo "Flower-$this->id ($this->nectar)\r\n";
		$this->sleeping = false;
	}

	public function onDayEnd(){
		echo "Flower-$this->id ($this->nectar)\r\n";
		$this->sleeping = true;
	}

	public function giveNectar($hour){
		if($this->nectar > 0 && $hour != $this->lastVisit && !$this->sleeping){
			$this->nectar--;
			$this->lastVisit = $hour;
			return  true;
		}
		return  false;
	}

}
