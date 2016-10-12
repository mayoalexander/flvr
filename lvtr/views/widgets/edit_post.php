<?php
include_once('/kunden/homepages/0/d643120834/htdocs/lvtr/config.php');
$config = new Config();
$post = $config->get_post_by_id($_GET['post_id']);
?>
<form method="post" id='edit-promo-form'>
<?php 
function textInput($key , $value, $class=null) {

	if (isset($class) && $class===true) {
		$class = 'promo-date-picker';
		$value = date('Y-m-d', strtotime($value));
	} else {
		$class = '';
	}

	echo '<label>'.ucfirst($key).'</label><input type="text" name="'.$key.'" class="form-control '.$class.'" value="'.$value.'">';
}

function textArea($key , $value) {
	echo "<label>".ucfirst($key)."</label><textarea class='form-control' name='description' >".$value."</textarea>";
}

function hiddenInput($key , $value) {
	echo "<input type='hidden' class='form-control' name='".$key."' value='".$value."' >";
}
/* LOAD CONFIGURATION APP */
foreach ($post as $key => $value) {
	switch ($key) {
		case 'description':
			textArea($key, $value);
			break;
		case 'blogtitle':
			textInput($key , $value);
			break;
		case 'twitter':
			textInput($key , $value);
			break;
		case 'start_date':
			textInput($key , $value,true);
			break;
		case 'desc':
			textInput($key , $value);
			break;
		// case 'date':
		// 	textInput($key , $value, true);
		// 	break;
		case 'id':
			hiddenInput($key , $value);
			break;
	}
}
?>
<input type="hidden" name="action" value="edit"></input>
<button type="submit" class="btn btn-warning btn-block m-b-md"><i class="fa fa-save"></i> Save Changes</button>

</form>



<script type="text/javascript">
	$(function(){

		// // init datepicker 
		// $( ".promo-date-picker" ).datepicker({ 
		// 	dateFormat: 'yy-mm-dd' 
		// });

		$('#edit-promo-form').submit(function(event){
			event.preventDefault();
			var data = $(this).serializeArray();
			element = $(this).parent().parent().parent().parent();
			console.log(element);
			element.modal('hide');
			$.post('config/update.php', data, function(data){
				alert(data);
			})	
		});

	});
</script>