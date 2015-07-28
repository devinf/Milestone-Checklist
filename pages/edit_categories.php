<?php

$category_id = $_POST['category_id'];
$category_name = $_POST['category_name'];

//assocaite milestone with category
if(isset($_POST['milestone_name']) && $_POST['submit'] == "add_milestone"){
	$checkedMilestone = $_POST['milestone_name'];
	$size_of_added = sizeof($checkedMilestone);
	for($i=0; $i < $size_of_added; $i++){
		$arr = ARRAY($category_id, $checkedMilestone[$i]);
		insert_into_category_milestone_connection($arr);
	}
	$all_project_with_category = get_data_categoryid('mantis_plugin_MilestoneChecklist_procatconn_table', $category_id);
	$size = sizeof($all_project_with_category);
	for($i=0; $i < $size; $i++){
		for($j=0; $j < $size_of_added; $j++){
			$arr = ARRAY($all_project_with_category[$i]['project_id'], $checkedMilestone[$j], 0);
			insert_into_project_milestone_connection($arr);
		}
	}
}

if($_POST['submit'] == "delete_milestone"){
	delete_data_milestoneid('mantis_plugin_MilestoneChecklist_catmileconn_table', $_POST['milestone_id']);		
	delete_data_milestoneid('mantis_plugin_MilestoneChecklist_promileconn_table', $_POST['milestone_id']);	
}

//get all milestone in the category	
$milestone_base_category = get_data_categoryid('mantis_plugin_MilestoneChecklist_catmileconn_table',$category_id);
$size = sizeof($milestone_base_category);

//milestones that's already been selected for category
for($i = 0; $i < $size; $i++){
	$current = get_data_milestoneid('mantis_plugin_MilestoneChecklist_milestone_table', $milestone_base_category[$i]['milestone_id']);
	$output.= ($i % 2) ? '<tr class="row-1">' : '<tr class="row-2">';
		$output.= '<td>';
			$output.= $current[0]['milestone_name'];
		$output.= '</td>';
		$output.= '<td>';
			$output.= $current[0]['milestone_description'];
		$output.= '</td>';	
		$output.= '<td class="center">';
			$output.= '<form method="POST" action="">';
			$output.= '<input type="hidden" name="milestone_id" value="'.$current[0]['milestone_id'].'"></input>';
			$output.= '<input type="hidden" name="category_id" value="'.$category_id.'"></input>';
			$output.= '<input type="hidden" name="category_name" value="'.$category_name.'"></input>';
			$output.= '<input type="submit" name="submit" class="button" value="delete_milestone"></input>';
			$output.= '</form>';
		$output.= '</td>';
	$output.= '</tr>';
}

//get all milestone
$all_milestones = get_all_data('mantis_plugin_MilestoneChecklist_milestone_table');
$size = sizeof($all_milestones);

//print out all the milestones to be selected for category
for($i = 0; $i < $size; $i+=3){
	$output2.= ($i % 2) ? '<tr class="row-1">' : '<tr class="row-2">';	
		$output2.= '<td width="33%">';
			$output2.= '<input type="checkbox" name="milestone_name[]" value="'.$all_milestones[$i]['milestone_id'].'">'.$all_milestones[$i]['milestone_name'].'</input>';	
		$output2.= '</td>';
		$output2.= '<td width="33%">';
			if($all_milestones[$i+1]['milestone_name'] != null){
			$output2.= '<input type="checkbox" name="milestone_name[]" value="'.$all_milestones[$i+1]['milestone_id'].'">'.$all_milestones[$i+1]['milestone_name'].'</input>';
			}
		$output2.= '</td>';
		$output2.= '<td width="33%">';
			if($all_milestones[$i+2]['milestone_name'] != null){
			$output2.= '<input type="checkbox" name="milestone_name[]" value="'.$all_milestones[$i+2]['milestone_id'].'">'.$all_milestones[$i+2]['milestone_name'].'</input>';
			}
		$output2.= '</td>';
	$output2.= '</tr>';		
}

include('tables/edit_category_table.php');
echo '<br>';
include('tables/milestone_into_category_table.php');
?>
