<form method="POST" action="">
<table class="width60" align="center">
	<tr>
		<td>
			<h2><?php echo $all_project[$current_project]['name']?></h2>
		</td>
	</tr>
	<?php echo $output; ?>
	<tr>
		<td class="center" rowspan="2">
			<input type="submit" name="submit" value="update">
		</td>			
	</tr>
</table>
</form>
