<?php 
namespace simulation;

require_once 'simulation.php';
require_once 'flowers.php';
require_once 'sugarbirds.php';

class Sun extends Simulation{

	//making the earth;
	public $cfg;
	private $flowers = array();
	private $sugarbirds = array();
	function __construct() {
		parent::__construct();
		$this->flowers = new Flowers();
		$this->sugarbirds = new SugarBirds();
	}

	//running the earth;
	public function doIt(){
		$hour = 0;
		$iteration = 0;
		$dayCounter = 0;
		$startingNector = $this->flowers->checkNector();

		while($this->flowers->checkNector() > 0){

			$this->onhourChange($hour);
			if($hour == $this->cfg->dayStart ){ $this->onDayStart(); }
			if($hour == $this->cfg->dayEnd ){ $this->onDayEnd(); }

			$hour = $hour+1;
			if($hour == $this->cfg->dayReset){
				echo "-----------------------------------------------------------------------------------------------------Earth Rotated($dayCounter)\n\r";
				$dayCounter++;
				$hour = 0;
			}
			$iteration++;
		} 

		//finishing earth;
		return 'Total Hours:'.$iteration.' Total Days:'.$dayCounter.' Starting Nector:'.$startingNector.' Birds:'.$this->cfg->amountOfBirds.' Flowers:'.$this->cfg->amountOfFlowers.' Hunger:'.$this->cfg->dailyHunger;
	}

	//the suns events 
	private function onDayStart(){
		$this->flowers->onDayStart();
		$this->sugarbirds->onDayStart();
	}
	private function onDayEnd(){
		$this->flowers->onDayEnd();
		$this->sugarbirds->onDayEnd();
	}
	private function onHourChange($hour){
		shuffle($this->sugarbirds->sugarbirds);//sugarbirds will feed randomly
		$this->sugarbirds->onHourChange($this->flowers,$hour);
	}
}

