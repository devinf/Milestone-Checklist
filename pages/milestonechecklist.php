<?php
html_page_top('milestone');
?>

<br/>
<form action="" method="post">
<?php echo form_security_field( 'plugin_Example_config_update' ) ?>
	<table class="width60" align="center">
		<tr>
			<td>
				<h1> Milestone </h1>
			</td>    		
		</tr>
		<tr <?php echo helper_alternate_class() ?>>
			<td>
				<input type = "checkbox"> Check all Links </input>
			</td>
		</tr>
		<tr <?php echo helper_alternate_class() ?>>
    			<td>
				<input type = "checkbox"> Check Alt text </input>
			</td>
		</tr>
		<tr <?php echo helper_alternate_class() ?>>
			<td>
				<input type = "checkbox"> Check images </input>
			</td>
		</tr>
		<tr>
    			<td class="center" rowspan="2"><input type="submit"/></td>
		</tr>
	</table>
</form>

<?php

html_page_bottom();
