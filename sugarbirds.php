<?php 
namespace simulation; 
require_once 'sugarbird.php';

class SugarBirds extends SugarBird {

	function __construct(){
		parent::__construct();
		for($i=0;$i<$this->cfg->amountOfBirds;$i++) $this->sugarbirds[] = new SugarBird($i);
	}

	public function onDayStart(){
		foreach($this->sugarbirds as $sugarbird) $sugarbird->onDayStart(); 
	}

	public function onDayEnd(){
		foreach($this->sugarbirds as $sugarbird) $sugarbird->onDayEnd(); 
	}

	public function onhourChange($flowers,$hour){
		if($this->sugarbirds[0]->awake){//lets just not wake them up 
			foreach($this->sugarbirds as $bird) $bird->onhourChange($flowers,$hour);
		}
	}

}
