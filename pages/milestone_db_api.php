<?php
//functions returning milestone information

//convert ADORecordSet into array
function to_array($query){
	$container = db_query_bound($query);
	while($row = db_fetch_array($container)){
		$result[] = $row;
	}
	
	return $result;
}

//get all milestones in the database
function get_all_milestone(){
	$query = 'SELECT * FROM mantis_plugin_MilestoneChecklist_milestone_table';
	return to_array($query);
}

//get all milestones associate with a project id
function get_project_milestones($id){
	$query = 'SELECT * FROM mantis_plugin_MilestoneChecklist_milestones_table WHERE project_id ='.$id; 
	return to_array($query);	
}

//
function insert_into_database($table, $array[]){
	
}
?>
