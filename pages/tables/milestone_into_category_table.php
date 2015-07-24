<table class="width60" align="center">
	<tr>
		<td class="form-title" colspan="3">
			Add Milestones
		</td>
	</tr>
	<tr>
		<td class="category" colspan="3">
			Milestones
		</td>
	</tr>
	<form method="POST" action="">
	<tr>
	<?php echo $output2; //print out table with category name ?>	
	<tr>
		<td class="center" colspan="3">
			<input type="hidden" name="category_id" value="<?php echo $category_id ?>"></input>
			<input type="hidden" name="category_name" value="<?php echo $category_name ?>"></input>
			<input type="submit" name="submit" value="add_milestone"></input>
		</td>	
	</tr>
	</form>
</table>
