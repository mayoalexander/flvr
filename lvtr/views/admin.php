<?php
include_once('../config.php');
$site = new Config();
?>


<section class="container">
	<h1>Admin</h1>
	<hr>

  <nav class="navbar navbar-inverse widget-navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">ADMIN</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">

          <!-- CONTENT -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Content <span class="caret"></span></a>
            <ul class="dropdown-menu ">
              <li><a href="#" data-page="RSS">RSS</a></li>
              <li><a href="#" data-page="widgets/submissions">Submissions</a></li>
              <li><a href="#" data-page="Automation">Automation</a></li>
              <li><a href="#" data-page="Analytics">Analytics</a></li>
              <li><a href="#" data-page="Promos">Promos</a></li>
            </ul>
          </li>
          
          <!-- CONTENT -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clients <span class="caret"></span></a>
            <ul class="dropdown-menu ">
              <li><a href="#" data-page="Clients">Clients</a></li>
              <li><a href="#" data-page="Twitter">Twitter</a></li>
              <li><a href="#" data-page="Emailer">Emailer</a></li>
              <li><a href="#" data-page="Script">Script</a></li>
              <li><a href="#" data-page="SOM">SOM</a></li>
              <li><a href="#" data-page="Leads">Leads</a></li>
              <li><a href="#" data-page="Analytics">Analytics</a></li>
              <li><a href="#" data-page="October">October</a></li>
              <li><a href="#" data-page="Promos">Promos</a></li>
            </ul>
          </li>

        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>


<!--   <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapsex" data-target=".admin-nav">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">ADMIN</a>
      </div>
      <div class="admin-nav collapsex">
        <ul class="nav navbar-nav widget-navigation">
          <li class="dropdown"><span href="#" data-page="RSS">Content</a></span>
          <li><a href="#" data-page="RSS">RSS</a></li>
          <li><a href="#" data-page="Clients">Clients</a></li>
          <li><a href="#" data-page="Twitter">Twitter</a></li>
          <li><a href="#" data-page="Emailer">Emailer</a></li>
          <li><a href="#" data-page="widgets/submissions">Submissions</a></li>
          <li><a href="#" data-page="Automation">Automation</a></li>
          <li><a href="#" data-page="Script">Script</a></li>
          <li><a href="#" data-page="SOM">SOM</a></li>
          <li><a href="#" data-page="Leads">Leads</a></li>
          <li><a href="#" data-page="Analytics">Analytics</a></li>
          <li><a href="#" data-page="October">October</a></li>
          <li><a href="#" data-page="Promos">Promos</a></li>
        </ul>
      </div>
    </div>
  </nav> -->
  <hr>
</section>



<section class="widget-container container"></section>



<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<script type="text/javascript" src="http://freelabel.net/lvtr/js/application.js"></script>
<script type="text/javascript">


$(function(){
  $('.widget-navigation a').click(function(e){
    $('.widget-navigation a').parent().removeClass('active');
    $(this).parent().addClass('active');
    e.preventDefault();
    openWidget($(this), '<?php echo $site->url; ?>');
  });


  $('.sc_url').submit(function(e){
    e.preventDefault();
    openDownloadApi($(this).find('#url').val());
  });


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