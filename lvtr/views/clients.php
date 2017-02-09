<?php
include_once('../config.php');
$site = new Config();

$users = $site->get_all_users('users');
// $users = $site->get_all_clients('users');
// $site->debug($users);
?>

<section id="clients"  class="container">
	<h1 class="page-header">Clients</h1>
	<!-- CONTROLS -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		  <div id="navbar" class="navbar-collapse collapse">
		    <ul class="nav navbar-nav">
		      <li class="active"><a href="/view/dashboard/admin">Back to Admin</a></li>
		    </ul>
			<form class="navbar-form navbar-left">
				<div class="form-group">
				  <input type="text" class="form-control search" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sort by <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><button class="sort btn btn-link btn-block" data-sort="user_name">
		            Username
		          </button></li>
		          <li><button class="sort btn btn-link btn-block" data-sort="date_created">
		            Date Created
		          </button></li>
		          <li><button class="sort btn btn-link btn-block" data-sort="media_uploaded">
		            Media Uploaded
		          </button></li>
		          <li><button class="sort btn btn-link btn-block" data-sort="location">
		            Location
		          </button></li>
		        </ul>
		      </li>
		    </ul>
		  </div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</nav>

    <!-- LIST -->
	<div class="clients list-group list">
		<?php $site->display_users_list($users); ?>
	</div>
</section>


<script type="text/javascript" src="<?php echo $site->url; ?>/js/dashboard.js"></script>






<script type="text/javascript">
  $(function(){


      // var options = {
      //   valueNames: [ 'name', 'born' ]
      // };

      // var userList = new List('users', options);

      var options = {
        valueNames: [ 'user_name', 'date_created', 'media_uploaded', 'location' ],
        page: 20,
  		pagination: true
      };

      var userList = new List('clients', options);

  });
</script>


