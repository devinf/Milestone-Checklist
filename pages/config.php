<?php
//main config page to add/remove milestones in a project, create milestones, and create categories

html_page_top('Milestone Config');
require_once('core.php');
require_once('project_api.php');
require_once('helper_api.php');
require_once('database_api.php');

//get all projects in the database
$all_project = project_get_all_rows();

//get the current project
$current_project = helper_get_current_project();

//navigate to different links
?>
<br>
<br>
<center>
	[
	<a href="plugin.php?page=MilestoneChecklist/config">Add/Remove Milestone</a>
	] [ 
	<a href="plugin.php?page=MilestoneChecklist/config&config=milestone">Create Milestones</a>
	] [
	<a href="plugin.php?page=MilestoneChecklist/config&config=categories">Create Categories</a>
	]
</center>
<br>

<?php
//determine what page is view in config
if($_GET['config'] == 'categories'){
	require('create_categories');
}else if($_GET['config'] == 'milestone'){
	require('create_milestone.php');
}else{
	require('add_remove_milestone.php');
}

html_page_bottom();
?> 

