<?php 

//form action when category is changed
if(isset($_POST['change_project_category']) && isset($_POST['project_category_id'])){
	$new_category_id = $_POST['change_project_category'];
	$project_category = $_POST['project_category_id'];
	//delete category from procatconn table 	
	delete_data_projectcategory_id('mantis_plugin_MilestoneChecklist_procatconn_table', $current_project, $project_category);
	
	//delete milestines from promileconn table
	delete_data_projectcategory_id('mantis_plugin_MilestoneChecklist_promileconn_table', $current_project, $project_category);
	
	//insert new category into procatconn table
	$insert_new_category = ARRAY($current_project, $project_category, $new_category_id);
	insert_into_project_category_connection($insert_new_category);
	
	//insert all milestones into promileconn
	$new_category_milestones = get_data_categoryid('mantis_plugin_MilestoneChecklist_catmileconn_table' , $new_category_id); 
	$size = sizeof($new_category_milestones);
	for($i = 0; $i < $size; $i++){
		$insert_new_milestone = ARRAY($current_project, $project_category, $new_category_milestones[$i]['milestone_id'], 0);
		insert_into_project_milestone_connection($insert_new_milestone);	
	}	
}

//get all project categories
$current_project_category = category_get_all_rows($current_project);
$project_category_size = sizeof($current_project_category);


//remove project category if project has been removed
$project_in_database = get_data_projectid('mantis_plugin_MilestoneChecklist_procatconn_table', $current_project);
$size = sizeof($project_in_database);
if($size != $project_category_size){
	for($i = 0; $i < $size; $i++){
		$categoryexist = false;
		for($j = 0; $j < $size; $j++){
			if($project_in_database[$i]['project_category_id'] == $current_project_category[$j]['id']){
				$categoryexist = true;	
			}
		}
		if(!$categoryexist){
			delete_data_projectcategory_id('mantis_plugin_MilestoneChecklist_procatconn_table', $current_project, $project_in_database[$i]['project_category_id']);
			delete_data_projectcategory_id('mantis_plugin_MilestoneChecklist_promileconn_table', $current_project, $project_in_database[$i]['project_category_id']);
		}
	}
}

for($j = 0; $j < $project_category_size; $j++){
//get current category of the project category
$current_category = get_data_projectcategoryid('mantis_plugin_MilestoneChecklist_procatconn_table', $current_project, $current_project_category[$j]['id']);

//get current milestones of the project
$all_project_milestone = get_data_projectcategoryid('mantis_plugin_MilestoneChecklist_promileconn_table', $current_project, $current_project_category[$j]['id']);

//if current category doesn't exist table doesn't get printed
$output .= '<tr class="row-1">';
	$output.= '<td>';
		$output.= '<b>'.$current_project_category[$j]['name'].'</b>';
	$output.= '</td>';
	$output.= '<td>';
		if(sizeof($current_category) != 0){
			$current_milestones = get_data_categoryid('mantis_plugin_MilestoneChecklist_catmileconn_table', $current_category[0]['category_id']);
			$size = sizeof($current_milestones); 
			for($i=0; $i<$size; $i++){
				$current_milestone = get_data_milestoneid('mantis_plugin_MilestoneChecklist_milestone_table', $current_milestones[$i]['milestone_id']);
				$output.= $current_milestone[0]['milestone_name'];
				$output.= '<br>';
			}
		}
		$output.= '</td>';
		$output.= '<td class="center">';
			$output.= '<form name="change_category'.$current_project_category[$j]['id'].'" method="POST" action="">';
				$output.= '<input type="hidden" name="project_category_id" value="'.$current_project_category[$j]['id'].'"></input>';
				$output.= '<select name="change_project_category" onchange="document.forms.change_category'.$current_project_category[$j]['id'].'.submit();">';
					$output.= '<option value="0"> Select a Category</option>';
					//output all category for selection
					$all_category = get_all_data('mantis_plugin_MilestoneChecklist_category_table');
					$size = sizeof($all_category);
					for($i = 0; $i < $size; $i++){
						if($all_category[$i]['category_id'] == $current_category[0]['category_id']){
							$output.= '<option value="'.$all_category[$i]['category_id'].'" selected>'.$all_category[$i]['category_name'].'</option>';
						}else{
							$output.= '<option value="'.$all_category[$i]['category_id'].'">'.$all_category[$i]['category_name'].'</option>';
						}
					}
				$output.= '</select>'; 
			$output.= '</form>';
		$output.= '</td>';
	$output.= '</tr>';
}
include('tables/change_project_category_table.php');
?>
