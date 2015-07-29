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
				milestone_id I NOTNULL UNSIGNED AUTOINCREMENT PRIMARY,
				milestone_name C(128) NOTNULL,
				milestone_description Text NOTNULL
				")),
			array('CreateTableSQL', array( plugin_table( 'category' ), "
				category_id I NOTNULL UNSIGNED AUTOINCREMENT PRIMARY,
				category_name C(128) NOTNULL
				")),
			array('CreateTableSQL', array( plugin_table( 'catmileconn' ), "
				category_id I NOTNULL,
				milestone_id I NOTNULL,
				category_milestone_connection_id I NOTNULL UNSIGNED AUTOINCREMENT PRIMARY
				")),
			array('CreateTableSQL', array( plugin_table( 'procatconn' ), "
				project_id I NOTNULL,
				project_category_id I NOTNULL,
				project_category_id I NOTNULL,
				category_id I NOTNULL,
				project_category_connection_id I NOTNULL UNSIGNED AUTOINCREMENT PRIMARY
				")),
			array('CreateTableSQL', array(plugin_table('promileconn'), "
				project_id I NOTNULL,
				project_category_id I NOTNULL,
				milestone_id I NOTNULL,
				complete I NOTNULL,
				project_milestone_connection_id I NOTNULL UNSIGNED AUTOINCREMENT PRIMARY
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
