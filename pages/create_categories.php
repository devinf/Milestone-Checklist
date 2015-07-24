<?php
//fix later
echo form_security_field( 'plugin_Milestone_config_update' );

//execute insert function if add category is called
if($_POST['submit'] == 'add_category'  && isset($_POST['category_name'])){
	$new_category_info = ARRAY($_POST['category_name']);
	insert_into_category($new_category_info);
}

//execute delete function if delete category is called or edit 
if($_POST['submit'] == 'delete' && isset($_POST['category_id'])){
	$category_id = $_POST['category_id'];
	//get all project assoicated with the category and delete the milestone
	$all_project = get_data_categoryid('mantis_plugin_MilestoneChecklist_procatconn_table', $category_id);
	$size = sizeof($all_project);
	for($i = 0; $i < $size; $i++){	
		delete_data_projectid('mantis_plugin_MilestoneChecklist_promileconn_table', $all_project[$i]['project_id']);
	}
	//delete all category in the database
	delete_data_categoryid('mantis_plugin_MilestoneChecklist_category_table', $category_id);
	delete_data_categoryid('mantis_plugin_MilestoneChecklist_catmileconn_table', $category_id);
	delete_data_categoryid('mantis_plugin_MilestoneChecklist_procatconn_table', $category_id);
}

//output all the categories in the database
$all_categories = get_all_data('mantis_plugin_MilestoneChecklist_category_table');
$size = sizeof($all_categories);
for($i = 0; $i < $size; $i++){
	$output .= ($i % 2) ? '<tr class="row-1">' : '<tr class="row-2">';
		$output.= '<td>';
			$output .= $all_categories[$i]['category_name'];
		$output.= '</td>';
		$output.= '<td>';
			$output.= '<center>';
			$output.= '<form method="POST" action="">';
			$output.= '<input type="hidden" name="category_id" value="'.$all_categories[$i]['category_id'].'"></input>';
			$output.= '<input type="hidden" name="category_name" value="'.$all_categories[$i]['category_name'].'"></input>';
			$output.= '<input type="submit" name="submit" value="edit" class="button"></input>';
			$output.= '&nbsp';
			$output.= '<input type="submit" name="submit" value="delete" class="button"></input>';
			$output.= '</form>';
			$outpyt.= '</center>';
		$output .= '</td>';
	$output.='</tr>';
}

include('tables/create_category_table.php');
?>
