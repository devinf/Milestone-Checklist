<?php 
//add or remove milestones/categories from projects
echo form_security_field( 'plugin_Milestone_config_update' );
?>

<table class="width60" align="center" style="padding:0px 0px 20px 0px;">
	<tr>
		<td>
			<b>PROJECT NAME: <?php echo $all_project[$current_project]['name']?></b>
		</td>
		<td>
		</td>
		<td>
			<?php include('change_project_form.php'); //form to change the current project ?>
		</td>
	</tr>
	<tr>
		<td>	
		<br>
			All Milestones
		</td>
		<td>
		<br>
		</td>
		<td>
		<br>
			Current Milestones
		</td>
	</tr>
	<tr>
		<td>
			<?php //include('');?>
			<form action="">
				<select name="" multiple style="width:400px; height:300px;">
					<option value="1">tsete</option>
					<option value="2">test</option>
				</select>
			</form>
		</td>
		<td>
			<center>
			<input type="submit" value="Add" style="width:100px;"></input>
			<input type="submit" value="Remove" style="width:100px;"></input>
			</center>
		</td>
		<td>
			<form action="" style="float:right;">
				<select name="" multiple style="width:400px; height:300px;">
					<option value="1">tstse</option>
					<option value="2">testse</option>
				</select>
			</form>
		</td>
	</tr>
</table>