<?php
include_once('../config.php');
$site = new Config();
$ads = $site->get_user_categories($_SESSION['user_name']); // '0' pulling the 1st page results

?>


<div class="container">
	<div class="subnav clearfix">
		<h1 class="page-header">Your Categories
		<button class="btn btn-primary pull-right add-new-category"><i class="fa fa-plus"></i> Add New Category</button>
		</h1>
	</div>
	
	<section class="row">
		<div class="col-md-4"><?php $site->display_categories_list($ads); ?></div>
		<div class="col-md-8 category-container"></div>
	</section>
</div>


<script type="text/javascript" class="http://freelabel.net/lvtr/js/dashboard.js"></script>
<script type="text/javascript">
	
	$(function() {
		$('.add-new-category').click(function(){
			var modal = $('#postModal').modal('show');
			var data = { 
				user_name: '<?php echo $_SESSION['user_name']; ?>'
			}
			var path = "http://freelabel.net/lvtr/views/widgets/add_new_category.php";
			$.get(path, data, function(result){
				$('.modal-body').html(result);
			});
		});


	$('.edit-category').click(function(){
		var modal = $('#postModal');
		var body = $('#postModal .modal-body');
		var category_id = $(this).attr('data-id');
		var data = { category_id: category_id };
		modal.modal('show');
		var url = 'http://freelabel.net/lvtr/views/widgets/edit_category.php';
		$.get(url, data, function(result){
			body.html(result);
		});
	});


	$('.categorieslist-item b').click(function(){
		var wrapper = $('.category-container');
		wrapper.html('Loading...');
		var category_id = $(this).parent().attr('data-id');
		var user_name = $(this).parent().attr('data-user');
		var data = { category_id: category_id, user_name:user_name };
		console.log(data);
		var url = 'http://freelabel.net/lvtr/views/widgets/view_category.php';
		$.get(url, data, function(result){
			// console.log(wrapper);
			wrapper.html(result);
		});
	
		// modal.modal('show');
		// var url = 'http://freelabel.net/lvtr/views/widgets/edit_category.php';
		// $.get(url, data, function(result){
		// 	body.html(result);
		// });
	});

	});
</script>