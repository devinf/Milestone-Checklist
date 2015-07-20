<?php
if(isset($_POST['milestone_name'])){
	$arr = ARRAY($_POST['milestone_name'], $_POST['milestone_description']);
	insert_into_milestone($arr);
}
if(isset($_POST['delete_milestone'])){
	$id = $_POST['delete_milestone'];
	delete_row('mantis_plugin_MilestoneChecklist_milestone_table', $id);
}
echo form_security_field( 'plugin_Milestone_config_update' );?>
<table class="width60" align="center">
	<tr>
		<td class="form-title">
			Milestones
		</td>
	</tr>
	<tr>
		<td class="category" width="25%">
			Name
		</td>
		<td class="category" width="60%">
			Description
		</td>
		<td class="category" width="15%">
		
		</td>
	</tr>
<?php
//output all the milestone in the database
$all_milestone = get_all_milestone();
$size = sizeof($all_milestone);
for($i = 0; $i < $size; $i++){
	if($i % 2){
	echo'<tr class="row-1">';
	}else{
	echo '<tr class="row-2">';
	}	
		echo'<form method="POST" name="delete_milestone" action="">';
		echo'<td class="">';
			echo $all_milestone[$i]['name'];
		echo'</td>';
		echo'<td class="">';
			echo $all_milestone[$i]['description'];
		echo'</td>';
		echo'<td class="">';
			echo '<input type="hidden" name="delete_milestone" value="'.$all_milestone[$i]['id'].'"></input>';
			echo '<center>';
			echo '<input type="submit" class="button" value="delete"></input>';
			echo '</center>';
		echo'</td>';
		echo'</form>';
	echo'</tr>';
}
?>
</table>
<br>
<table class="width60" align="center">
	<tr>
		<td class="form-title" width="30%">
			Create Milestones
		</td>
	</tr>
	<form method="POST" name="add_milestone" action="">
	<tr class="row-1">
		<td class="category">	
			Name:
		</td>
		<td>
			<input type="text" name="milestone_name" size="100"></input>
		</td>
	</tr>
	<tr class="row-2">
		<td class="category">
			Description:
		</td>
		<td>
			<textarea name="milestone_description" rows="10" cols="72" style="resize:none;"></textarea>
		</td>
	</tr>
	<tr>
		<td class="center" colspan="3">
			<input type="submit" class="button" value="add milestone"></input>
		</td>
	</tr>
	</form>
</table>
