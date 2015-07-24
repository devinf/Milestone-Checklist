<?php
//main config page to add/remove milestones in a project, create milestones, and create categories

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

html_page_top('Milestone Config');
require_once('core.php');
require_once('project_api.php');
require_once('helper_api.php');
require_once('database_api.php');
require_once('db_api.php');

//get all projects in the database
$all_project = project_get_all_rows();

//get the current project
$current_project = helper_get_current_project();

//config navigation menu
?>
<br>
<br>
<center>
	[
	<a href="plugin.php?page=MilestoneChecklist/config">Change Category</a>
	] [ 
	<a href="plugin.php?page=MilestoneChecklist/config&config=milestone">Create Milestones</a>
	] [
	<a href="plugin.php?page=MilestoneChecklist/config&config=categories">Create Categories</a>
	]
</center>
<br>

<?php
//determine what page is view in config
if($_GET['config'] == 'categories' && $_POST['submit'] == 'edit'){
	require('edit_categories.php');
}else if($_GET['config'] == 'categories'){
	require('create_categories.php');
}else if($_GET['config'] == 'milestone'){
	require('create_milestone.php');
}else{
	require('change_project_category.php');
}

html_page_bottom();
?> 

