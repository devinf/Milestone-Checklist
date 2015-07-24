<?
//form to change the current project.
?>

<form method="post" name="change_project_form" action="set_project.php" style="float:right;">
	<select name="project_id" class="small" onchange="document.forms.change_project_form.submit();">
		<?php
			echo '<option value="0"> Select a Project </option>';
			$n = sizeof($all_project);
			for($i = 1; $i <= $n; $i++){
				if($i == $current_project){
					echo '<option value="'.$i.'" selected="selected">'.$all_project[$i]['name'].'</option>';
				}else{
					echo '<option value="'.$i.'">'.$all_project[$i]['name'].'</option>';
				}
			}
		?>
	</select>
	<input type="submit" class"button-small" value="Switch">
</form>
