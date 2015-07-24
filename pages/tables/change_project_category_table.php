<table class="width60" align="center">
	<tr>
		<td class="form-title" colspan="3">
			PROJECT NAME: <?php if(helper_get_current_project() != 0){echo $all_project[$current_project]['name'];}?>
			<?php include('change_project_form.php'); //form to change the current project ?>
		</td>
	</tr>
	<tr>
		<td class="category" width="20%">
			Current Category
		</td>
		<td class="category" width="55%">
			Current Milestones
		</td>
		<td class="category" width="25%">
		</td>
	</tr>
	<?php echo $output; //print out table with category name and milestone name
	
	if($current_project != 0){	
	//if the current_project doesn't not exist this section isn't executed
	?>	
	<tr>
		<td colspan="3">
			<form method="POST" name="change_category" action="">
				<select name="change_project_category" onchange="document.forms.change_category.submit();">
					<option value="0"> Select a Category</option>
					
					<?php for($i = 0; $i < $size; $i++){ 
					echo '<option value="'.$all_category[$i]['category_id'].'" >'.$all_category[$i]['category_name'].'</option>';
					} ?>
				</select>
			</form>
		</td>
	</tr>
	<?php } ?>
</table>
