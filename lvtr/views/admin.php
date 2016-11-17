<?php
include_once('../config.php');
$site = new Config();
?>


<section class="container">
	<h1>Admin</h1>
	<hr>
	<div class="widget-navigation user-navi">
    <label>RSS</label>
    <label>Clients</label>
    <label>Twitter</label>
    <label>Emailer</label>
    <label>Test</label>
		<label>widgets/submissions</label>
    <label>Automation</label>
    <label>Script</label>
    <label>SOM</label>
    <label>Leads</label>
    <label>Analytics</label>
    <label>October</label>
	</div>
	<hr>
</section>



<section class="widget-container container"></section>


<script type="text/javascript">
	$('.widget-navigation label').click(function(e){
		e.preventDefault();
		openWidget($(this), '<?php echo $site->url; ?>');
	});


	$('.sc_url').submit(function(e){
		e.preventDefault();
    openDownloadApi($(this).find('#url').val());
	});
</script>





<nav class="navbar navbar-default navbar-fixed-bottom">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <form class="navbar-form navbar-left sc_url">
        <div class="form-group">
          <input type="url" class="form-control" placeholder="Enter SC URL.."  id="url" >
        </div>
        <button type="submit" class="btn btn-default">Go</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>