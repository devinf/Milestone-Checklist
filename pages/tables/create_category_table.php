<table class="width60" align="center">
	<tr>
		<td class="form-title" colspan="2">
			Category
		</td>
	</tr>
	<tr>
		<td class="category" width="75%">
			Name
		</td>
		<td class="category" width="25%">
			Action
		</td>
	</tr>
	<?php echo $output; //print out table with category name ?>	
	<tr>
		<form method="POST" action="">
		<td colspan="3">		
			<input type="text" name="category_name" size="23"></input>
			<input type="submit" name="submit" value="add_category" class="button"></input>
		</td>
		</form>
	</tr>
</table>
