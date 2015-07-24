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

/********* FUNCTIONS TO RETRIEVE DATA *********/

//get all data in the database
function get_all_data($table){
	$query = 'SELECT * FROM '.$table;
	return to_array($query);
}

//get data in database associate with project id
function get_data_projectid($table, $id){
	$query = 'SELECT * FROM '.$table.' WHERE project_id = '.$id;
	return to_array($query);
}

//get data in database assocaite with category id
function get_data_categoryid($table, $id){
	$query = 'SELECT * FROM '.$table.' WHERE category_id ='.$id;
	return to_array($query);
}

//get data in database assocaite with milestone id
function get_data_milestoneid($table, $id){
	$query = 'SELECT * FROM '.$table.' WHERE milestone_id ='.$id;
	return to_array($query);
}



/********** FUNCTIONS TO ADD DATA **********/

//INSERT into milestone table
function insert_into_milestone($array){
	$query = 'INSERT INTO mantis_plugin_MilestoneChecklist_milestone_table (milestone_name, milestone_description) VALUES ('.db_param().','.db_param().')';
	db_query_bound($query, $array);
}
//insert into category table
function insert_into_category($array){
	$query = 'INSERT INTO mantis_plugin_MilestoneChecklist_category_table (category_name) VALUES ('.db_param().')';
	db_query_bound($query, $array);
}

//insert into project category connection table
function insert_into_project_milestone_connection($array){
	$query = 'INSERT INTO mantis_plugin_MilestoneChecklist_promileconn_table (project_id, milestone_id, complete) VALUES ('.db_param().','.db_param().','.db_param().')';
	db_query_bound($query, $array);
}
//insert into project category connection table
function insert_into_project_category_connection($array){
	$query = 'INSERT INTO mantis_plugin_MilestoneChecklist_procatconn_table (project_id, category_id) VALUES ('.db_param().','.db_param().')';
	db_query_bound($query, $array);
}



/********* FUNCTIONS TO DELETE DATA *********/

//delete all column in a table assocaite with project id
function delete_data_projectid($table, $id){
	$query = 'DELETE FROM '.$table.' WHERE project_id = '.$id;
	db_query_bound($query);
}

//delete all column in a table assocaite with milestone id 
function delete_data_milestoneid($table, $id){
	$query = 'DELETE FROM '.$table.' WHERE milestone_id = '.$id;
	db_query_bound($query);
}

//delete all column in a table associate with category id
function delete_data_categoryid($table, $id){
	$query = 'DELETE FROM '.$table.' WHERE category_id = '.$id;
	db_query_bound($query);
}

?>
