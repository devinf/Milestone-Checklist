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

if(isset($_POST['complete']) && $_POST['submit'] == 'completed'){
	$all_checked = $_POST['complete'];
	$size = sizeof($all_checked);
	for($i = 0; $i < $size; $i++){
		update_complete_milestone($all_checked[$i]);
	}
}

if(helper_get_current_project() != 0){
	$all_project = project_get_all_rows();
	$current_project = helper_get_current_project();
}

if(helper_get_current_project() != 0){	
	$milestone = get_data_projectid('mantis_plugin_MilestoneChecklist_promileconn_table', $all_project[$current_project]['id']);
	$size = sizeof($milestone);
	for($i=0; $i<$size; $i++){
		$current = get_data_milestoneid('mantis_plugin_MilestoneChecklist_milestone_table', $milestone[$i]['milestone_id']);
		if($milestone[$i]['complete'] != 1){
			$output.= ($i%2) ? '<tr class="row-2">' : '<tr class="row-1">';	
		}else{
			$output.= '<tr bgcolor="#c2dfff">';
		}	
			$output.= '<td>';
				$complete = ($milestone[$i]['complete'] == 1) ? 'checked' : '';
				$output.= '<input type="checkbox" name="complete[]" value="'.$milestone[$i]['project_milestone_connection_id'].'"'.$complete.'>'.$current[0]['milestone_name'].'</input>';		
			$output.= '</td>';
		$output.= '</tr>';
	}
	echo '<br>';
	include('tables/main_table.php');
	echo '<br>';
}

html_page_bottom();
?>
