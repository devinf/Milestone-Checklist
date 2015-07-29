<table class="width60" align="center">
	<tr>
		<td class="form-title" colspan="3">
			PROJECT NAME: <?php if(helper_get_current_project() != 0){echo $all_project[$current_project]['name'];}?>
			<?php include('change_project_form.php'); //form to change the current project ?>
		</td>
	</tr>
	<tr>
		<td class="category" width="33%">
			Project Category
		</td>
		<td class="category" width="33%">
			Current Milestones
		</td>
		<td class="category" width="33%">
			Current Category
		</td>
	</tr>
	<?php echo $output; //print out table with category name and milestone name ?>
</table>
