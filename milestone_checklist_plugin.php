<?php
class milestone_checklist_plugin extends MantisPlugin{
	function register(){
		$this->name = 'Milestone CheckList';
		$this->description ='Milestone checklist for development or testing';
		$this->page = '';
		$this->version = '1.0';
		$this->requires = array('MantisCore' => '1.2.0, <= 1.2.0');
		$this->author = 'devinf';
	}
}
?>
