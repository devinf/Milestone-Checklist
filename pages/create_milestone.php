<?php echo form_security_field( 'plugin_Milestone_config_update' );?>
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
</table>
<br>
<table class="width60" align="center">
	<tr>
		<td class="form-title" width="30%">
			Create Milestones
		</td>
	</tr>
	<form>
	<tr class="row-1">
		<td class="category">	
			Name:
		</td>
		<td>
			<input type="text" size="100"></input>
		</td>
	</tr>
	<tr class="row-2">
		<td class="category">
			Description:
		</td>
		<td>
			<textarea rows="10" cols="72" style="resize:none;"></textarea>
		</td>
	</tr>
	<tr>
		<td class="center" colspan="3">
			<input type="submit" class="button" value="add milestone"></input>
		</td>
	</tr>
	</form>
</table>
