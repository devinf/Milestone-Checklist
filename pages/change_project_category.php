<?php 
//fix later
echo form_security_field( 'plugin_Milestone_config_update' );

//form action when category is changed
if(isset($_POST['change_project_category'])){
	$new_category_id = $_POST['change_project_category'];
	
	//delete category from procatconn table 	
	delete_data_projectid('mantis_plugin_MilestoneChecklist_procatconn_table', $current_project);
	
	//delete milestines from promileconn table
	delete_data_projectid('mantis_plugin_MilestoneChecklist_promileconn_table', $current_project);
	
	//insert new category into procatconn table
	$insert_new_category = ARRAY($current_project, $new_category_id);
	insert_into_project_category_connection($insert_new_category);
	
	//insert all milestones into promileconn
	$new_category_milestones = get_data_categoryid('mantis_plugin_MilestoneChecklist_catmileconn_table' , $new_category_id); 
	$size = sizeof($new_category_milestones);
	for($i = 0; $i < $size; $i++){
		$insert_new_milestone = ARRAY($current_project, $new_category_milestones[$i]['milestone_id'], 0);
		insert_into_project_milestone_connection('mantis_plugin_MilestoneChecklist_promileconn_table', $insert_new_milestone);	
	}	
}

//get current category of the project
$current_category = get_data_projectid('mantis_plugin_MilestoneChecklist_procatconn_table', $current_project);

//get current milestones of the project
$all_project_milestone = get_data_projectid('mantis_plugin_MilestoneChecklist_promileconn_table', $current_project);

//if current category doesn't exist table doesn't get printed
if(sizeof($current_category) != 0){
	$current_category_info = get_data_categoryid('mantis_plugin_MilestoneChecklist_category_table', $current_category[0]['category_id']);
	$current_milestones = get_data_categoryid('mantis_plugin_MilestoneChecklist_catmileconn_table', $current_category[0]['category_id']);
	$size = sizeof($current_milestones);	
	$output = '<tr class="row-1">';
		$output.= '<td>';
			$output.= $current_category_info[0]['category_name'];
		$output.= '</td>';
		$output.= '<td>';
			for($i=0; $i<$size; $i++){
				$current_milestone = get_data_milestoneid($current_milestones[$i]['milestone_id']);
				$output.= $current_milestone[0]['milestone_name'];
				$output.= '<br>';
			}
		$output.= '</td>';
		$output.= '<td>';
		$output.= '</td>';
	$output.= '</tr>';
}

//get all categories data
$all_category = get_all_data('mantis_plugin_MilestoneChecklist_category_table');
$size = sizeof($all_category);
include('tables/change_project_category_table.php');
?>
