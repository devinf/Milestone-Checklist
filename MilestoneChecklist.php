<?php
require_once(config_get('class_path').'MantisPlugin.class.php');

class MilestoneChecklistPlugin extends MantisPlugin{
	function register(){
		$this->name = 'Milestone CheckList';
		$this->description = 'Milestone checklist for development or testing';
		$this->page = 'config';
		$this->version = '1.0';
		$this->requires = array('MantisCore' => '1.2.0',);
		$this->author = 'devinf';
		$this->contact = 'devinxfan@gmail.com';
		$this->url = '';
	}
	
	function schema() {
		return array(
			array('CreateTableSQL', array( plugin_table( 'milestone' ), "
				id I NOTNULL UNSIGNED AUTOINCREMENT PRIMARY,
				name C(128) NOTNULL,
				description Text NOTNULL
				")),
			array('CreateTableSQL', array( plugin_table( 'milesstone_categories' ), "
				id I NOTNULL UNSIGNED AUTOINCREMENT PRIMARY,
				name C(128) NOTNULL
				")),
			array('CreateTableSQL', array( plugin_table( 'mile_cat_relation' ), "
				mile_cat_id I NOTNULL,
				milestone_id I NOTNULL,
				id I NOTNULL UNSIGNED AUTOINCREMENT PRIMARY
				")),
			array('CreateTableSQL', array( plugin_table( 'milestones' ), "
				mile_cat_id I NOTNULL,
				milestone_id I NOTNULL,
				project_id I NOTNULL,
				id I NOTNULL UNSIGNED AUTOINCREMENT PRIMARY
				")),
		);
	}
	
	function init(){
		plugin_event_hook('EVENT_MENU_MAIN', 'MilestoneLink');
	}
	
	//link on the menu	
	function MilestoneLink(){
		echo '<a href="',plugin_page('main'),'">Milestone</a> | ';
	}
	
	function config(){
	}
}
?>
