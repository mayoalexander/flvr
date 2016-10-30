<?php
include_once('../config.php');
$site = new Config();
$ads = $site->get_user_categories($_SESSION['user_name']); // '0' pulling the 1st page results

?>


<div class="container">
	<div class="subnav clearfix">
		<button class="btn btn-primary pull-right add-new-category"><i class="fa fa-plus"></i> Add New Category</button>
	</div>
	<?php
		$site->display_categories_list($ads);
	?>
</div>


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
	});
</script>