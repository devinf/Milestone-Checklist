<?php

//form action to insert new milestone into milestone table
if($_POST['submit']== 'add_milestone' && isset($_POST['milestone_name'])){
	$new_milestone_info = ARRAY($_POST['milestone_name'], $_POST['milestone_description']);
	insert_into_milestone($new_milestone_info);
}

//form action to delete milestone from database
if($_POST['submit'] == 'delete_milestone' && isset($_POST['delete_milestone_id'])){
	$delete_milestone_id = $_POST['delete_milestone_id'];
	delete_data_milestoneid('mantis_plugin_MilestoneChecklist_milestone_table', $delete_milestone_id);
	delete_data_milestoneid('mantis_plugin_MilestoneChecklist_catmileconn_table', $delete_milestone_id);
	delete_data_milestoneid('mantis_plugin_MilestoneChecklist_promileconn_table', $delete_milestone_id);
}

//output all the milestone in the database
$all_milestones = get_all_data('mantis_plugin_MilestoneChecklist_milestone_table');
$size = sizeof($all_milestones);
for($i = 0; $i < $size; $i++){
	$output .= ($i % 2) ? '<tr class="row-1">' : '<tr class="row-2">';
		$output.= '<form method="POST" action="">';
		$output.= '<td>';
			$output.= $all_milestones[$i]['milestone_name'];
		$output.= '</td>';
		$output.= '<td>';
			$output.= $all_milestones[$i]['milestone_description'];
		$output.= '</td>';
		$output.= '<td class="center">';
			$output.= '<input type="hidden" name="delete_milestone_id" value="'.$all_milestones[$i]['milestone_id'].'"></input>';
			$output.= '<input type="submit" name="submit" value="delete_milestone" class="button"></input>';
		$output.= '</td>';
		$output.= '</form>';
	$output.= '</tr>';
}

include('tables/create_milestone_table.php');
echo '<br>';
include('tables/create_milestone_add_table.php');
?>
