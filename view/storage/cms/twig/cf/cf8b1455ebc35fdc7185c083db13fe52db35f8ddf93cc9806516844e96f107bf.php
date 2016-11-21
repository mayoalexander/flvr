<?php

/* /home/freelabelnet/public_html/dev/themes/demo/layouts/flmain.htm */
class __TwigTemplate_21e23cfd191d6ac69eab30792af50e2857c3fc7b92890645c41285ba8838c7a7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\">
\t<title>FREELABEL</title>
\t<meta name=\"description\" content='FREELABEL // TV | RADIO | MAG '/>
\t<meta name='twitter:card' content='summary_large_image' />
\t<meta name='twitter:player' content='' />
\t<meta name='twitter:player:width' content='300' />
\t<meta name='twitter:player:height' content='300' />
\t<meta name='twitter:image' content='' />
\t<meta name='twitter:site' content='' />
\t<meta name='twitter:creator' content='@freelabelnet' />
\t<meta name='twitter:title' content='FREELABEL | FREELABEL RADIO + MAGAZINE + STUDIOS' />
\t<meta name='twitter:text:description' content='FREELABEL // TV | RADIO | MAG' />
\t<meta property='og:url' content='http://freelabel.net//'>
\t<meta property='og:title' content='FREELABEL | FREELABEL RADIO + MAGAZINE + STUDIOS'>
\t<meta property='og:description' content='FREELABEL // TV | RADIO | MAG | Login at FREELABEL.net'>
\t<meta property='og:image' content=''>
\t<meta property='og:image:type' content='image/png'>
\t<meta property='og:image:width' content='1024'>
\t<meta property='og:image:height' content='1024'>
\t<link rel='icon' type='image/png' href='http://freelabel.net/lvtr/img/fllogo.png'>
\t<link rel='apple-touch-icon' sizes='180x180' type='image/png' href='http://freelabel.net/lvtr/img/favicons/apple-touch-icon.png'>
\t<link rel='icon' type='image/png' href='http://freelabel.net/lvtr/img/favicons/favicon-32x32.png' sizes='32x32'>
\t<link rel='icon' type='image/png' href='http://freelabel.net/lvtr/img/favicons/favicon-16x16.png' sizes='16x16'>
\t<link rel='manifest' href='http://freelabel.net/lvtr/img/favicons/manifest.json'>
\t<link rel='mask-icon' href='http://freelabel.net/lvtr/img/favicons/safari-pinned-tab.svg' color='#5bbad5'>
\t<meta name='theme-color' content='#ffffff'>
\t\t<link rel=\"stylesheet\" href=\"http://freelabel.net/lvtr/css/bootstrap.css\" >
\t<link type=\"text/css\" href=\"http://freelabel.net/lvtr/css/normalize.css\">
\t<link type=\"text/css\" href=\"http://freelabel.net/lvtr/css/css/output.css\">
\t<link type=\"text/css\" href=\"http://freelabel.net/lvtr/vendor/sorich87/bootstrap-tour/build/css/bootstrap-tour.min.css\">
\t<link rel=\"stylesheet\" href=\"http://freelabel.net/lvtr/css/font-awesome.css\">
    <script type=\"text/javascript\" src=\"http://freelabel.net/lvtr/js/jquery.min.js\"></script>
\t<script src=\"http://freelabel.net/lvtr/js/bootstrap.min.js\"></script>
\t<script type=\"text/javascript\" href=\"http://freelabel.net/lvtr/js/isMobile.min.js\"></script>
    ";
        // line 38
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('CMS')->partialFunction("styles"        , $context['__cms_partial_params']        );
        unset($context['__cms_partial_params']);
        // line 39
        echo "</head>
<body>

<!-- \t<header class=\"toolbar navbar navbar-default navbar-fixed-top gradient-bg\">
\t\t<a href=\"http://freelabel.net/lvtr/\"><img src=\"http://freelabel.net/lvtr/img/fllogo.png\" class=\"site_logo\"></a>
\t\t<h1>FREELABEL</h1>
\t\t<p>TV | RADIO | MAG</p>
\t\t<div class=\"navigation user-navi pull-right\">
\t\t</div>
\t</header> -->


<nav class=\"toolbar navbar navbar-default navbar-fixed-top gradient-bg\">
  <div class=\"container-fluid\">
    <!-- Logo -->
    <div class=\"navbar-header\">
      <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
        <span class=\"sr-only\">Toggle navigation</span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
      </button>
\t  <a class=\"navbar-brand\" href=\"http://freelabel.net/lvtr/\"><img src=\"http://freelabel.net/lvtr/img/fllogo.png\" class=\"site_logo\"></a>
    </div>

    <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
      <ul class=\"nav navbar-nav\">
      </ul>

      <!-- Search Input -->
      <form action=\"http://freelabel.net/lvtr/views/search.php\" method=\"GET\" class=\"global-search-bar navbar-form navbar-right\">
        <div class=\"form-group input-group\">
          <input name='q' type=\"text\" class=\" form-control\" placeholder=\"Search for anything..\">
          <div class=\"input-group-btn\"><button type=\"submit\" class=\"btn btn-default\"><i class=\"fa fa-search\"></i></button></div>
        </div>
      </form>

      <!-- navigation links -->
      <ul class=\"nav navbar-nav navbar-left\">
\t\t<li class=\"navi_button\"><a href=\"#\">Dashboard</a></li><li class=\"navi_button\"><a href=\"#\">Explore</a></li><li class=\"navi_button\"><a href=\"#\">Likes</a></li><li class=\"navi_button\"><a href=\"#\">Profile</a></li><li class=\"navi_button\"><a href=\"#\">Upload</a></li><li class=\"navi_button\"><a href=\"#\">Help</a></li><li class=\"navi_button\"><a href=\"#\">Logout</a></li><li class=\"navi_button\"><a href=\"#\">Admin</a></li>        <!-- <li class=\"dropdown\">
          <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Dropdown <span class=\"caret\"></span></a>
          <ul class=\"dropdown-menu\">
            <li><a href=\"#\">Action</a></li>
            <li><a href=\"#\">Another action</a></li>
            <li><a href=\"#\">Something else here</a></li>
            <li role=\"separator\" class=\"divider\"></li>
            <li><a href=\"#\">Separated link</a></li>
          </ul>
        </li> -->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>









<!-- AUDIO PLAYER BAR -->
<nav style=\"display:none;\" class=\"toolbar audio-player-toolbar navbar navbar-default navbar-fixed-bottom gradient-bg\">
<audio id=\"global_audio_player\" src=\"\"></audio>
  <div class=\"container-fluid\">
    <!-- Logo -->
    <div class=\"navbar-header\">
      <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-2\" aria-expanded=\"false\">
        <span class=\"sr-only\">Toggle navigation</span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
      </button>
\t  <a class=\"navbar-brand\" href=\"#\"><span href=\"#\" id=\"audio_player_text\"></span></a>
    </div>

    <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-2\">
      <ul class=\"nav navbar-nav\">
        
      </ul>


      <!-- navigation links -->
      <ul class=\"controls nav navbar-nav navbar-right\">
        <li><a href=\"#\" data-ctrl=\"expand\" class=\"btn btn-link\"><i class=\"fa fa-desktop\"></i></a></li>
        <!-- <li><a href=\"#\"><i class=\"fa fa-fast-backward\"></i></a></li> -->
        <li><a href=\"#\" data-ctrl=\"play\" class=\"btn btn-link\"><i class=\"fa fa-pause\"></i></a></li>
        <!-- <li><a href=\"#\"><i class=\"fa fa-fast-forward\"></i></a></li> -->
      </ul>
      <!-- navigation links -->
<!--       <ul class=\"nav navbar-nav navbar-right\">
      </ul> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


\t
\t";
        // line 138
        echo $this->env->getExtension('CMS')->pageFunction();
        // line 139
        echo "\t

<!-- Post Modal -->
<div class=\"modal fade\" id=\"postModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
  <div class=\"modal-dialog modal-lg\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-body\" id=\"postWrapper\">
      \t<div>loading..</div>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary-outline m-b-md\" data-dismiss=\"modal\"><i class=\"fa fa-close\" ></i></button>
      </div>
    </div>
  </div>
</div>

<script type=\"text/javascript\" src=\"http://freelabel.net/lvtr/js/nicescroll.min.js\"></script>
<!-- <script type=\"text/javascript\" src=\"http://freelabel.net/lvtr/js/jscroll.min.js\"></script> -->
<script type=\"text/javascript\" src=\"http://freelabel.net/lvtr/js/application.js\"></script>
<script type=\"text/javascript\" src=\"http://freelabel.net/lvtr/vendor/sorich87/bootstrap-tour/build/js/bootstrap-tour.min.js\"></script>
<script type=\"text/javascript\" src=\"http://freelabel.net/lvtr/js/site-tour-config.js\"></script>
<!-- <script type=\"text/javascript\" href=\"http://freelabel.net/lvtr/js/mobile-detect.min.js\"></script> -->

<script type=\"text/javascript\">
\t\$(function(){

\t\$('.nofity-profile-incomplete').click(function(){
\t\tvar data = \$(this).attr('data-user');
\t\tvar msg = '<i class=\"fa fa-check\"></i> Sent message to @' + data + '!';
\t\t\$(this).html(msg);
\t\t\$(this).removeClass('btn-primary');
\t\t\$(this).addClass('btn-success');
\t});
\t\$('.navi_button').click(function(e){
\t\t\$('#bs-example-navbar-collapse-1').removeClass('in');
\t\te.preventDefault();
\t\t// alert('hello');
\t\topenPage(\$(this),window.location.pathname, 'http://freelabel.net/lvtr/');
\t});

\t/* search bar */
\t\$('.global-search-bar').submit(function(e){
\t\tvar val = \$(this)[0].elements[0].value;
\t\tvar min = 4;
\t\tif (val.length<min) {
\t\t\te.preventDefault();
\t\t\talert('Please enter more than ' + min + ' characters for a search.')
\t\t} else {
        // do nothing
    }
});

});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40470023-1', 'auto');
  ga('send', 'pageview');
</script>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "/home/freelabelnet/public_html/dev/themes/demo/layouts/flmain.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 139,  163 => 138,  62 => 39,  58 => 38,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/* 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">*/
/* 	<title>FREELABEL</title>*/
/* 	<meta name="description" content='FREELABEL // TV | RADIO | MAG '/>*/
/* 	<meta name='twitter:card' content='summary_large_image' />*/
/* 	<meta name='twitter:player' content='' />*/
/* 	<meta name='twitter:player:width' content='300' />*/
/* 	<meta name='twitter:player:height' content='300' />*/
/* 	<meta name='twitter:image' content='' />*/
/* 	<meta name='twitter:site' content='' />*/
/* 	<meta name='twitter:creator' content='@freelabelnet' />*/
/* 	<meta name='twitter:title' content='FREELABEL | FREELABEL RADIO + MAGAZINE + STUDIOS' />*/
/* 	<meta name='twitter:text:description' content='FREELABEL // TV | RADIO | MAG' />*/
/* 	<meta property='og:url' content='http://freelabel.net//'>*/
/* 	<meta property='og:title' content='FREELABEL | FREELABEL RADIO + MAGAZINE + STUDIOS'>*/
/* 	<meta property='og:description' content='FREELABEL // TV | RADIO | MAG | Login at FREELABEL.net'>*/
/* 	<meta property='og:image' content=''>*/
/* 	<meta property='og:image:type' content='image/png'>*/
/* 	<meta property='og:image:width' content='1024'>*/
/* 	<meta property='og:image:height' content='1024'>*/
/* 	<link rel='icon' type='image/png' href='http://freelabel.net/lvtr/img/fllogo.png'>*/
/* 	<link rel='apple-touch-icon' sizes='180x180' type='image/png' href='http://freelabel.net/lvtr/img/favicons/apple-touch-icon.png'>*/
/* 	<link rel='icon' type='image/png' href='http://freelabel.net/lvtr/img/favicons/favicon-32x32.png' sizes='32x32'>*/
/* 	<link rel='icon' type='image/png' href='http://freelabel.net/lvtr/img/favicons/favicon-16x16.png' sizes='16x16'>*/
/* 	<link rel='manifest' href='http://freelabel.net/lvtr/img/favicons/manifest.json'>*/
/* 	<link rel='mask-icon' href='http://freelabel.net/lvtr/img/favicons/safari-pinned-tab.svg' color='#5bbad5'>*/
/* 	<meta name='theme-color' content='#ffffff'>*/
/* 		<link rel="stylesheet" href="http://freelabel.net/lvtr/css/bootstrap.css" >*/
/* 	<link type="text/css" href="http://freelabel.net/lvtr/css/normalize.css">*/
/* 	<link type="text/css" href="http://freelabel.net/lvtr/css/css/output.css">*/
/* 	<link type="text/css" href="http://freelabel.net/lvtr/vendor/sorich87/bootstrap-tour/build/css/bootstrap-tour.min.css">*/
/* 	<link rel="stylesheet" href="http://freelabel.net/lvtr/css/font-awesome.css">*/
/*     <script type="text/javascript" src="http://freelabel.net/lvtr/js/jquery.min.js"></script>*/
/* 	<script src="http://freelabel.net/lvtr/js/bootstrap.min.js"></script>*/
/* 	<script type="text/javascript" href="http://freelabel.net/lvtr/js/isMobile.min.js"></script>*/
/*     {% partial "styles" %}*/
/* </head>*/
/* <body>*/
/* */
/* <!-- 	<header class="toolbar navbar navbar-default navbar-fixed-top gradient-bg">*/
/* 		<a href="http://freelabel.net/lvtr/"><img src="http://freelabel.net/lvtr/img/fllogo.png" class="site_logo"></a>*/
/* 		<h1>FREELABEL</h1>*/
/* 		<p>TV | RADIO | MAG</p>*/
/* 		<div class="navigation user-navi pull-right">*/
/* 		</div>*/
/* 	</header> -->*/
/* */
/* */
/* <nav class="toolbar navbar navbar-default navbar-fixed-top gradient-bg">*/
/*   <div class="container-fluid">*/
/*     <!-- Logo -->*/
/*     <div class="navbar-header">*/
/*       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">*/
/*         <span class="sr-only">Toggle navigation</span>*/
/*         <span class="icon-bar"></span>*/
/*         <span class="icon-bar"></span>*/
/*         <span class="icon-bar"></span>*/
/*       </button>*/
/* 	  <a class="navbar-brand" href="http://freelabel.net/lvtr/"><img src="http://freelabel.net/lvtr/img/fllogo.png" class="site_logo"></a>*/
/*     </div>*/
/* */
/*     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">*/
/*       <ul class="nav navbar-nav">*/
/*       </ul>*/
/* */
/*       <!-- Search Input -->*/
/*       <form action="http://freelabel.net/lvtr/views/search.php" method="GET" class="global-search-bar navbar-form navbar-right">*/
/*         <div class="form-group input-group">*/
/*           <input name='q' type="text" class=" form-control" placeholder="Search for anything..">*/
/*           <div class="input-group-btn"><button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button></div>*/
/*         </div>*/
/*       </form>*/
/* */
/*       <!-- navigation links -->*/
/*       <ul class="nav navbar-nav navbar-left">*/
/* 		<li class="navi_button"><a href="#">Dashboard</a></li><li class="navi_button"><a href="#">Explore</a></li><li class="navi_button"><a href="#">Likes</a></li><li class="navi_button"><a href="#">Profile</a></li><li class="navi_button"><a href="#">Upload</a></li><li class="navi_button"><a href="#">Help</a></li><li class="navi_button"><a href="#">Logout</a></li><li class="navi_button"><a href="#">Admin</a></li>        <!-- <li class="dropdown">*/
/*           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>*/
/*           <ul class="dropdown-menu">*/
/*             <li><a href="#">Action</a></li>*/
/*             <li><a href="#">Another action</a></li>*/
/*             <li><a href="#">Something else here</a></li>*/
/*             <li role="separator" class="divider"></li>*/
/*             <li><a href="#">Separated link</a></li>*/
/*           </ul>*/
/*         </li> -->*/
/*       </ul>*/
/*     </div><!-- /.navbar-collapse -->*/
/*   </div><!-- /.container-fluid -->*/
/* </nav>*/
/* */
/* */
/* */
/* */
/* */
/* */
/* */
/* */
/* */
/* <!-- AUDIO PLAYER BAR -->*/
/* <nav style="display:none;" class="toolbar audio-player-toolbar navbar navbar-default navbar-fixed-bottom gradient-bg">*/
/* <audio id="global_audio_player" src=""></audio>*/
/*   <div class="container-fluid">*/
/*     <!-- Logo -->*/
/*     <div class="navbar-header">*/
/*       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">*/
/*         <span class="sr-only">Toggle navigation</span>*/
/*         <span class="icon-bar"></span>*/
/*         <span class="icon-bar"></span>*/
/*         <span class="icon-bar"></span>*/
/*       </button>*/
/* 	  <a class="navbar-brand" href="#"><span href="#" id="audio_player_text"></span></a>*/
/*     </div>*/
/* */
/*     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">*/
/*       <ul class="nav navbar-nav">*/
/*         */
/*       </ul>*/
/* */
/* */
/*       <!-- navigation links -->*/
/*       <ul class="controls nav navbar-nav navbar-right">*/
/*         <li><a href="#" data-ctrl="expand" class="btn btn-link"><i class="fa fa-desktop"></i></a></li>*/
/*         <!-- <li><a href="#"><i class="fa fa-fast-backward"></i></a></li> -->*/
/*         <li><a href="#" data-ctrl="play" class="btn btn-link"><i class="fa fa-pause"></i></a></li>*/
/*         <!-- <li><a href="#"><i class="fa fa-fast-forward"></i></a></li> -->*/
/*       </ul>*/
/*       <!-- navigation links -->*/
/* <!--       <ul class="nav navbar-nav navbar-right">*/
/*       </ul> -->*/
/*     </div><!-- /.navbar-collapse -->*/
/*   </div><!-- /.container-fluid -->*/
/* </nav>*/
/* */
/* */
/* 	*/
/* 	{% page %}*/
/* 	*/
/* */
/* <!-- Post Modal -->*/
/* <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">*/
/*   <div class="modal-dialog modal-lg" role="document">*/
/*     <div class="modal-content">*/
/*       <div class="modal-body" id="postWrapper">*/
/*       	<div>loading..</div>*/
/*       </div>*/
/*       <div class="modal-footer">*/
/*         <button type="button" class="btn btn-secondary-outline m-b-md" data-dismiss="modal"><i class="fa fa-close" ></i></button>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* </div>*/
/* */
/* <script type="text/javascript" src="http://freelabel.net/lvtr/js/nicescroll.min.js"></script>*/
/* <!-- <script type="text/javascript" src="http://freelabel.net/lvtr/js/jscroll.min.js"></script> -->*/
/* <script type="text/javascript" src="http://freelabel.net/lvtr/js/application.js"></script>*/
/* <script type="text/javascript" src="http://freelabel.net/lvtr/vendor/sorich87/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>*/
/* <script type="text/javascript" src="http://freelabel.net/lvtr/js/site-tour-config.js"></script>*/
/* <!-- <script type="text/javascript" href="http://freelabel.net/lvtr/js/mobile-detect.min.js"></script> -->*/
/* */
/* <script type="text/javascript">*/
/* 	$(function(){*/
/* */
/* 	$('.nofity-profile-incomplete').click(function(){*/
/* 		var data = $(this).attr('data-user');*/
/* 		var msg = '<i class="fa fa-check"></i> Sent message to @' + data + '!';*/
/* 		$(this).html(msg);*/
/* 		$(this).removeClass('btn-primary');*/
/* 		$(this).addClass('btn-success');*/
/* 	});*/
/* 	$('.navi_button').click(function(e){*/
/* 		$('#bs-example-navbar-collapse-1').removeClass('in');*/
/* 		e.preventDefault();*/
/* 		// alert('hello');*/
/* 		openPage($(this),window.location.pathname, 'http://freelabel.net/lvtr/');*/
/* 	});*/
/* */
/* 	/* search bar *//* */
/* 	$('.global-search-bar').submit(function(e){*/
/* 		var val = $(this)[0].elements[0].value;*/
/* 		var min = 4;*/
/* 		if (val.length<min) {*/
/* 			e.preventDefault();*/
/* 			alert('Please enter more than ' + min + ' characters for a search.')*/
/* 		} else {*/
/*         // do nothing*/
/*     }*/
/* });*/
/* */
/* });*/
/* </script>*/
/* <script>*/
/*   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){*/
/*   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),*/
/*   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)*/
/*   })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');*/
/* */
/*   ga('create', 'UA-40470023-1', 'auto');*/
/*   ga('send', 'pageview');*/
/* </script>*/
/* </body>*/
/* </html>*/
