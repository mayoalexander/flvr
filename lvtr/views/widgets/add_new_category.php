<?php
include_once('/home/freelabelnet/public_html/lvtr/config.php');
$config = new Config();
// $post = $config->get_post_by_id($_GET['post_id']);

// $categories = $config->get_user_categories($_GET['user_name']);
// $dropdown = $config->create_select_dropdown($categories, 'name');
// // foreach ($categories as $key => $category) {
// // 	echo $category['name'].'<br>';
// // }

// var_dump($categories);
?>

<form class="add-to-category-form row" style="padding:3em;">
	<h2>Add New Category</h2>
	<div class="col-md-7 col-sm-7"><input class="form-control" type="text" name="name" placeholder="Enter title.." required></div>
	<div class="col-md-5 col-sm-5"><button class="btn btn-primary btn-block pull-right">Add</button></div>
	<input type="hidden" name="user_name" value="<?php echo $_GET['user_name'] ?>">
	<input type="hidden" name="action" value="add_new_category">
</form>



<!-- <script type="text/javascript" src="<?php echo $site->url; ?>js/dashboard.js"></script> -->
<script type="text/javascript">
	



	$('.add-to-category-form').submit(function(e){
		var url = 'http://freelabel.net/lvtr/config/update.php';

		e.preventDefault();
		var form = $(this);
		var data = form.serialize();

		form.hide();
		$.post(url, data ,function(result){
			alert(result);
			$('#postModal').modal('hide');
			window.location.reload();
		})
	});

	
</script>