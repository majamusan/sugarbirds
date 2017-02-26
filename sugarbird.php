<?php 
namespace simulation; 

class SugarBird extends Simulation{

	public $id;
	public $awake;
	private $hunger;

	function __construct($id){
		parent::__construct();
		$this->hunger = $this->cfg->dailyHunger;
		$this->id = $id;
	}

	public function onDayStart(){ 
		$this->hunger = $this->cfg->dailyHunger; 
		$this->awake = true;
	}

	public function onDayEnd(){ 
		$this->awake = false;
		//echo "bird($this->id)-$this->hunger\r\n";
	}

	public function onHourChange($flowers,$hour){ 
		if($this->hunger > 0 && $this->awake){
			if($flowers->giveNectar($hour)){
				$this->hunger--;
			}
		}
	}

}
