<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
html_page_top('Milestone');
require_once('core.php');
require_once('project_api.php');
require_once('helper_api.php');
require_once('database_api.php');
require_once('milestone_db_api.php');
if(helper_get_current_project() != 0){
$all_project = project_get_all_rows();
$current_project = helper_get_current_project();
}
?>


<br/>
<form action="" method="post">
<?php echo form_security_field( 'plugin_Example_config_update' ) ?>
	<table class="width60" align="center">
		<tr>
			<td>
				<h2><?php echo $all_project[$current_project]['name']?></h2>
			</td>    		
		</tr>
		<?php
		if(helper_get_current_project() != 0){	
		$milestone = get_project_milestones($all_project[$current_project]['id']);
		if(sizeof($milestone) !=0){
		$category = get_category($milestone[0]['mile_cat_id']);
		$all_cat_milestones = get_categories_milestones($category[0]['id']);
		$size = sizeof($all_cat_milestones);
		for($i=0; $i<$size; $i++){
		$current = get_milestone($all_cat_milestones[$i]['milestone_id']);
		echo ($i%2) ? '<tr class="row-2">' : '<tr class="row-1">';	
			echo '<td>';
				echo '<input type = "checkbox">'.$current[0]['name'].'</input>';		
			echo '</td>';
		echo '</tr>';
		}
		}
		}
		?>
		<tr>
    			<td class="center" rowspan="2"><input type="submit"/></td>
		</tr>
	</table>
</form>

<?php
html_page_bottom();
