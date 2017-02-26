<?php 
namespace simulation;
require_once 'flower.php';

class Flowers extends flower{

	public $flowers = array();
	function __construct(){
		parent::__construct();
		for($i=0;$i<$this->cfg->amountOfFlowers;$i++) $this->flowers[] = new Flower($i);
	}

	public function onDayStart(){
		echo "- Starting\r\n";
		foreach(Simulation::orderById($this->flowers) as $flower){
			$flower->onDayStart();
		}
	}
	public function onDayEnd(){
		echo "- Ending\r\n";
		foreach(Simulation::orderById($this->flowers) as $flower){
			$flower->onDayEnd();
		}
	}

	public function giveNectar($hour){
		shuffle($this->flowers );//randomly order the flowers for each bird
		foreach($this->flowers as $flower){
			return $flower->giveNectar($hour);
		}
	}

	public function checkNector(){
		$total = 0;
		foreach($this->flowers as $flower){
			$total += $flower->nectar;
		}
		return $total;
	}

}
