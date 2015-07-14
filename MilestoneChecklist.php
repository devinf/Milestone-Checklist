<?php
require_once(config_get('class_path').'MantisPlugin.class.php');

class MilestoneChecklistPlugin extends MantisPlugin{
	function register(){
		$this->name = 'Milestone CheckList';
		$this->description ='Milestone checklist for development or testing';
		$this->page = 'config';
		$this->version = '1.0';
		$this->requires = array('MantisCore' => '1.2.0',);
		$this->author = 'devinf';
		$this->contact = 'devinxfan@gmail.com';
	}
	
	//create table in mysql for the plugin
	function schema(){
	}

	function init(){
		plugin_event_hook('EVENT_MENU_MAIN', 'MilestoneLink');
	}
	
	function MilestoneLink(){
		$project_id = 0;
		echo '<a href="plugin.php?page=Milestone/milestonechecklist&project_id='.$project_id.'">Milestone</a> | ';
	}

	function hooks(){
		return array();
	}
	
	function config(){
		return array('foo');
	}
}
