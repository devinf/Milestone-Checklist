<?php
//tseting
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

html_page_top('Milestone');
require_once('core.php');
require_once('project_api.php');
require_once('helper_api.php');
require_once('database_api.php');
require_once('db_api.php');

//get the current project
if(helper_get_current_project() !=0){
	$all_project = project_get_all_rows();
	$current_project = helper_get_current_project();
	$current_project_category = category_get_all_rows($current_project);
	$project_category_size = sizeof($current_project_category);
}

//update the milestone if its completed or not
if($_POST['submit'] == 'update'){
	reset_complete_to_zero($current_project);
	$all_checked = $_POST['complete'];
	$size = sizeof($all_checked);
	for($i = 0; $i < $size; $i++){
		update_complete_milestone($all_checked[$i]);
	}
}


if(helper_get_current_project() != 0){	
for($j = 0; $j < $project_category_size; $j++){
	$milestone = get_data_projectcategoryid('mantis_plugin_MilestoneChecklist_promileconn_table', $current_project, $current_project_category[$j]['id']);
	$size = sizeof($milestone);
	$output.= '<tr>';
		$output.= '<td class="category">';
			$output.= 'Project Category: '.$current_project_category[$j]['name'];
		$output.= '</td>';
	$output.= '</tr>';
	for($i=0; $i<$size; $i++){
		$current = get_data_milestoneid('mantis_plugin_MilestoneChecklist_milestone_table', $milestone[$i]['milestone_id']);
		if($milestone[$i]['complete'] != 1){
			$output.= ($i%2) ? '<tr class="row-2">' : '<tr class="row-1">';	
		}else{
			$output.= ($i%2) ? '<tr bgcolor="#c2dfff">' : '<tr bgcolor="#aed5ff">';
		}	
			$output.= '<td>';
				$complete = ($milestone[$i]['complete'] == 1) ? 'checked' : '';
				$output.= '<input type="checkbox" name="complete[]" value="'.$milestone[$i]['project_milestone_connection_id'].'"'.$complete.'>'.$current[0]['milestone_name'].'</input>';		
			$output.= '</td>';
		$output.= '</tr>';

	}
	$output.= '<tr>';
		$output.= '<td>';
			$output.= '<br>';
		$output.= '</td>';
	$output.= '</tr>';
}
	echo '<br>';
	include('tables/main_table.php');
	echo '<br>';
}

html_page_bottom();
?>
