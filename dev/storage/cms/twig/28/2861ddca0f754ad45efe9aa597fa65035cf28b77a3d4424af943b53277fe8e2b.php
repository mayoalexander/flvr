<?php

/* /home/freelabelnet/public_html/dev/themes/demo/partials/styles.htm */
class __TwigTemplate_96a0b826f673a5f25ab5da22f88d00eabaf39604def1ffc373f34e0b4b665de0 extends Twig_Template
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
        echo "<style type=\"text/css\">
\tbody, html {
\t\tbackground-color: #101010;
\t\tcolor: #e3e3e3;
\t\tfont-family:  sans-serif;
\t}
\tbody, html {
\t\tmargin:0;
\t}
\tbody {
\t\tmargin-top: 50px;
\t\tmargin-bottom: 100px;
\t}
\ta {
\t\tcolor:#FE3F44;
\t}
\ta:hover {
\t\tcolor:#e3e3e3;
\t\ttext-decoration: none;
\t}
\ta:visited, a:active, a:focus {
\t\tcolor:#e3e3e3;
\t\ttext-decoration: none;
\t}
\t*:focus, textarea:focus, input:focus, .form-control:focus {
\t\toutline: none;
\t\tbox-shadow: none;
\t}
\thr {
\t\tborder-top: 1px solid #303030;
\t}
\t.toolbar {
\t\tbackground-color: #303030;
\t\tborder:none;
\t}
\t.user-navi {
\t\tposition: relative;
\t\ttop: 8px;
\t}
\t.user-navi label {
\t\tfont-weight: 300;
\t\tmargin-right:2em;
\t}
\tlabel:hover, .notifications {
\t\tcolor:#FE3F44;
\t\tcursor: pointer;
\t}
\t.site_logo {
\t\tmax-width: 40px;
\t\tposition: relative;
\t\tbottom:10px;
\t}
\t.nothing-found {
\t\twidth: 100%;
\t\tdisplay: block;
\t\tpadding: 1em;
\t\tfont-size: 1em;
\t\tcolor: #f0ad4e;
\t\tbackground-color: transparent;
\t\ttext-align:center;
\t}

\t.notifications p, .toolbar {
\t\t/*padding:1em;*/
\t\tcolor:#e3e3e3;
\t}

\t.notifications p {
\t\tbackground-color: #00b3ff;
\t\ttext-align: center;
\t}

\t.dashboard {
\t\tmax-width: 1200px;
\t\tmargin:auto;
\t\tmargin-top:2em;
\t}
\t.dashboard div {
\t\tmargin-bottom:1em;
\t}
\t.dashboard panel {
\t\tdisplay: block;
\t\tbackground-color: transparent;
\t\tpadding: 1em;
\t\tborder-top: red solid 1px;
\t}

\t.form-control {
\t\tbackground-color: transparent;
\t\tborder:none;
\t\toutline: none;
\t\tbox-shadow: none;
\t}
\t.container .form-control {
\t\tfont-size: 1.5em;
\t\tpadding: 1em;
\t}
\t.light-text {
\t\tcolor:#e3e3e3 ;
\t}

\t.form-signin, .login-results {
\t\tmax-width: 400px;
\t\tmargin:auto;
\t}
\t.form-signin , .form-signin input {
\t\ttext-align: center;
\t}
\t.btn, .form-control {
\t\tborder-radius: 1px;
\t}
\t.user_profile_img {
\t\twidth:100px;
\t\tborder-radius: 5px;
\t\tdisplay:inline-block;
\t\tpadding:0;
\t}
\t.profile h4, {
\t\tvertical-align: top;
\t\tdisplay: inline-block;
\t\tfont-size:2em;
\t\ttext-transform: uppercase;
\t}
\t.profile .pull-right {
\t\ttext-align: right;
\t}
\t.profile .pull-right h4 {
\t\tmargin-top:0;
\t}
\t.profile_builder_form h4 {
\t\tfont-size:1.2em;
\t\tfont-weight: bolder;
\t}
\t.profile_builder_form div {
\t\tpadding:2em;
\t}
\t.upload-trigger {
\t\tcursor: pointer;
\t\ttext-align: center;
\t\tdisplay:block;
\t\tmargin:auto;
\t}
\t.list-group-item {
\t\tbackground:transparent;
\t}
\t.tracklist-item img, .userlist-item img {
\t\twidth:36px;
\t}
\t.tracklist-panel {
\t\tpadding:2em;
\t\tcolor:#e3e3e3;
\t}
\t.profile .tracklist-panel button {
\t\tborder:none;
\t}
\t.tracklist-panel img {
\t\twidth: 100%;
\t\tdisplay:block;
\t}
\t.tracklist-panel b {
\t\tdisplay: block;
\t\tpadding: .5em;
\t\tpadding-left:0;
\t\tfont-size: 1.3em
\t}
\t.tracklist-panel .dropdown-menu {
\t\ttext-align: center;
\t\twidth: 100%;
\t\tborder-bottom:red 2px solid;
\t}
\t.tracklist-panel .dropdown {
\t\tposition: relative;
\t\tbottom: 34px;
\t}
\t.tracklist-panel .btn-link {
\t\tcolor:#e3e3e3;
\t}
\t.button-tint {
\t\tbackground-color: rgba(0,0,0,0.3);
\t\ttransition: background-color 0.5s;
\t}
\t.button-tint:hover {
\t\tbackground-color: rgba(0,0,0,0.8);
\t}
\t.upload-trigger i {
\t\tfont-size:6em;
\t}
\t.file_input, .upload-profile-photo-area .profile_photo {
\t\tposition: absolute;
\t\ttop:56px;
\t\tright: 0;
\t\tmargin: 0;
\t\topacity: 0;
\t\t-ms-filter: 'alpha(opacity=0)';
\t\tfont-size: 410px;
\t\tdirection: ltr;
\t\tcursor: pointer;
\t\tz-index: 100000;
\t}
\t.upload-profile-photo-area .profile_photo {
\t\ttop:20px;
\t\theight:340px;
\t}

\t.file-upload-results {
\t\ttext-align: center;
\t\tmargin:auto;
\t\tmax-width: 800px;
\t\t/*min-height: 400px;*/
\t}
\t.file-upload-results .btn {
\t\tmargin-bottom: 1em;
\t}
\t.file-upload-results .form-control {
\t\tmargin-bottom: 2em;
\t\tfont-size:1.3em;
\t}
\t.profile_audio_img {
\t\twidth: 100%;
\t}
\t#postWrapper {
\t\tpadding:0px;
\t}
\t.rss-container section {
\t\tmargin-bottom: 5em;
\t\ttext-align: center;
\t\tborder-bottom: solid #e3e3e3 3px;
\t\tpadding-bottom: 4.5em;
\t}
\t.cover .row div {
\t\tborder-top:red solid 1px;
\t\tpadding-top:2em;
\t}
\t.cover .row div .dropdown {
\t\tpadding-top: 2em;
\t\tmargin-top: 1.5em;
\t}
\t.header_banner {
\t\tbackground-color: #303030;
\t\theight: 100vh;
\t\tpadding-top: 25vh;
\t\ttext-align: center;
\t\tbackground-position: center center;
\t\tbackground-size: auto 120vh ;
\t\tbackground-image: url(\"http://freelabel.net/dev/storage/app/media/pexels-photo-87351.jpeg\");
\t}
\t.header_banner, .header_banner h1{
\t\tfont-size: 2em;
\t}
\t.gradient-bg {
\t\t/*background: rgba(0,0,0,0.5);*/
\t\t    background-color: #27272f;
\t\t    background-image: url(images/linear_bg_1.png);
\t\t    background-repeat: repeat-y;
\t\t    background: -webkit-gradient(linear, left top, right top, from(#27272f), to(#2F2727));
\t\t    background: -webkit-linear-gradient(left, #2F2727, #27272f);
\t\t    background: -moz-linear-gradient(left, #2F2727, #27272f);
\t\t    background: -ms-linear-gradient(left, #2F2727, #27272f);
\t\t    background: -o-linear-gradient(left, #2F2727, #27272f);
\t\t}
\t\t.btn-primary, .btn-success, .btn-default, .btn-danger, .btn-warning {
\t\t\tbackground-color:transparent;
\t\t\tcolor:#e3e3e3;
\t\t}
\t\t.navbar-default .navbar-toggle, .navbar button, .modal-header, .modal-footer {
\t\t\tborder:none;
\t\t}
\t\t.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
\t\t\tcolor:#FE3F44;
\t\t}
\t\t.modal-content, .dropdown-menu {
\t\t\tbackground-color:#101010;
\t\t}
\t\t.navbar-default .navbar-collapse, .navbar-default .navbar-form {
\t\t\tborder:none;
\t\t\tbox-shadow: none;
\t\t}
\t.upload-profile-photo-area {
\t\tborder: dashed 4px #303030;
\t}
\t.upload-profile-photo-area:hover {
\t\tborder: dashed 4px #616161;
\t}
\t.upload-profile-photo-area img {
\t\twidth: 100%;
\t\tdisplay: block;
\t}
/*\t.upload-profile-photo-area .profile_photo {
\t\tvisibility: hidden;
\t\theight: inherit;
\t}
*/




\t\t.video_player {
\t\t\tdisplay:block;
\t\t\twidth:100%;
\t\t\tmargin: auto;
\t\t\tmax-height: 80vh;
\t\t}

\t\tinput:checked + .slider {
\t\t\tbackground-color: #2196F3;
\t\t}

\t\tinput:focus + .slider {
\t\t\tbox-shadow: 0 0 1px #2196F3;
\t\t}

\t\tinput:checked + .slider:before {
\t\t\t-webkit-transform: translateX(26px);
\t\t\t-ms-transform: translateX(26px);
\t\t\ttransform: translateX(26px);
\t\t}

\t\t/* Rounded sliders */
\t\t.slider.round {
\t\t\tborder-radius: 34px;
\t\t}

\t\t.slider.round:before {
\t\t\tborder-radius: 50%;
\t\t}


@media(max-width: 600px) {
\t.header_banner {
\t\tpadding:1em;
\t\tpadding-top:17.5vh;
\t}
\t.header_banner, .header_banner h1{
\t\tfont-size: 2em;
\t\tletter-spacing: -2px;
\t}
\t.tracklist-panel b {
\t\tfont-size:1.5em;
\t}
\t.file-upload-results {
\t\tmax-width: 400px;
\t}
\t.navbar-brand {
\t\tfont-size:0.8em;
\t}
}


@media (max-width:960px) {
\t.slideshow figure {
\t\tpadding-top:11vh;
\t}

}



\t\t@import url(https://fonts.googleapis.com/css?family=PT+Sans);
\t\t* {
\t\t\ttext-rendering: optimizeLegibility;
\t\t\t-webkit-font-smoothing: antialiased;
\t\t\t-moz-osx-font-smoothing: grayscale;
\t\t\tfont-family: 'PT Sans', sans-serif; }
\t\t\th1, h2, h3, h4, h5, h6 {
\t\t\t\tfont-weight: bold; }
/*  body, html, h1, h2, h3, h4, h5, h6, label, button {
  \tfont-family:'Avenir Next', Avenir, 'Helvetica Neue', 'Lato', 'Segoe UI', Helvetica, Arial, sans-serif;
  }
  */
  p, h1, h2, h3, h4, h5, h6, i, .navbar-default .navbar-nav > li > a{
  \tcolor: #e3e3e3; }

  \t.cover {
  \t\ttext-align: center; }
  \t\t.marketing_feature i {
  \t\t\tfont-size: 5em; }
  \t\t\t.cover div, .cover p, .cover button {
  \t\t\t\tfont-size:1.1em;
  \t\t\t\t/*margin-bottom: 10em; */
  \t\t\t}
  \t\t\t.toolbar h1, .toolbar p {
  \t\t\t\tcolor: #e3e3e3; 
  \t\t\t}
  \t\t\t.login-results {
  \t\t\t\ttext-align: center;
  \t\t\t\tpadding: 1em; 
  \t\t\t}

  \t\t\t/*# sourceMappingURL=output.css.map */









  \t\t\t</style>";
    }

    public function getTemplateName()
    {
        return "/home/freelabelnet/public_html/dev/themes/demo/partials/styles.htm";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* <style type="text/css">*/
/* 	body, html {*/
/* 		background-color: #101010;*/
/* 		color: #e3e3e3;*/
/* 		font-family:  sans-serif;*/
/* 	}*/
/* 	body, html {*/
/* 		margin:0;*/
/* 	}*/
/* 	body {*/
/* 		margin-top: 50px;*/
/* 		margin-bottom: 100px;*/
/* 	}*/
/* 	a {*/
/* 		color:#FE3F44;*/
/* 	}*/
/* 	a:hover {*/
/* 		color:#e3e3e3;*/
/* 		text-decoration: none;*/
/* 	}*/
/* 	a:visited, a:active, a:focus {*/
/* 		color:#e3e3e3;*/
/* 		text-decoration: none;*/
/* 	}*/
/* 	*:focus, textarea:focus, input:focus, .form-control:focus {*/
/* 		outline: none;*/
/* 		box-shadow: none;*/
/* 	}*/
/* 	hr {*/
/* 		border-top: 1px solid #303030;*/
/* 	}*/
/* 	.toolbar {*/
/* 		background-color: #303030;*/
/* 		border:none;*/
/* 	}*/
/* 	.user-navi {*/
/* 		position: relative;*/
/* 		top: 8px;*/
/* 	}*/
/* 	.user-navi label {*/
/* 		font-weight: 300;*/
/* 		margin-right:2em;*/
/* 	}*/
/* 	label:hover, .notifications {*/
/* 		color:#FE3F44;*/
/* 		cursor: pointer;*/
/* 	}*/
/* 	.site_logo {*/
/* 		max-width: 40px;*/
/* 		position: relative;*/
/* 		bottom:10px;*/
/* 	}*/
/* 	.nothing-found {*/
/* 		width: 100%;*/
/* 		display: block;*/
/* 		padding: 1em;*/
/* 		font-size: 1em;*/
/* 		color: #f0ad4e;*/
/* 		background-color: transparent;*/
/* 		text-align:center;*/
/* 	}*/
/* */
/* 	.notifications p, .toolbar {*/
/* 		/*padding:1em;*//* */
/* 		color:#e3e3e3;*/
/* 	}*/
/* */
/* 	.notifications p {*/
/* 		background-color: #00b3ff;*/
/* 		text-align: center;*/
/* 	}*/
/* */
/* 	.dashboard {*/
/* 		max-width: 1200px;*/
/* 		margin:auto;*/
/* 		margin-top:2em;*/
/* 	}*/
/* 	.dashboard div {*/
/* 		margin-bottom:1em;*/
/* 	}*/
/* 	.dashboard panel {*/
/* 		display: block;*/
/* 		background-color: transparent;*/
/* 		padding: 1em;*/
/* 		border-top: red solid 1px;*/
/* 	}*/
/* */
/* 	.form-control {*/
/* 		background-color: transparent;*/
/* 		border:none;*/
/* 		outline: none;*/
/* 		box-shadow: none;*/
/* 	}*/
/* 	.container .form-control {*/
/* 		font-size: 1.5em;*/
/* 		padding: 1em;*/
/* 	}*/
/* 	.light-text {*/
/* 		color:#e3e3e3 ;*/
/* 	}*/
/* */
/* 	.form-signin, .login-results {*/
/* 		max-width: 400px;*/
/* 		margin:auto;*/
/* 	}*/
/* 	.form-signin , .form-signin input {*/
/* 		text-align: center;*/
/* 	}*/
/* 	.btn, .form-control {*/
/* 		border-radius: 1px;*/
/* 	}*/
/* 	.user_profile_img {*/
/* 		width:100px;*/
/* 		border-radius: 5px;*/
/* 		display:inline-block;*/
/* 		padding:0;*/
/* 	}*/
/* 	.profile h4, {*/
/* 		vertical-align: top;*/
/* 		display: inline-block;*/
/* 		font-size:2em;*/
/* 		text-transform: uppercase;*/
/* 	}*/
/* 	.profile .pull-right {*/
/* 		text-align: right;*/
/* 	}*/
/* 	.profile .pull-right h4 {*/
/* 		margin-top:0;*/
/* 	}*/
/* 	.profile_builder_form h4 {*/
/* 		font-size:1.2em;*/
/* 		font-weight: bolder;*/
/* 	}*/
/* 	.profile_builder_form div {*/
/* 		padding:2em;*/
/* 	}*/
/* 	.upload-trigger {*/
/* 		cursor: pointer;*/
/* 		text-align: center;*/
/* 		display:block;*/
/* 		margin:auto;*/
/* 	}*/
/* 	.list-group-item {*/
/* 		background:transparent;*/
/* 	}*/
/* 	.tracklist-item img, .userlist-item img {*/
/* 		width:36px;*/
/* 	}*/
/* 	.tracklist-panel {*/
/* 		padding:2em;*/
/* 		color:#e3e3e3;*/
/* 	}*/
/* 	.profile .tracklist-panel button {*/
/* 		border:none;*/
/* 	}*/
/* 	.tracklist-panel img {*/
/* 		width: 100%;*/
/* 		display:block;*/
/* 	}*/
/* 	.tracklist-panel b {*/
/* 		display: block;*/
/* 		padding: .5em;*/
/* 		padding-left:0;*/
/* 		font-size: 1.3em*/
/* 	}*/
/* 	.tracklist-panel .dropdown-menu {*/
/* 		text-align: center;*/
/* 		width: 100%;*/
/* 		border-bottom:red 2px solid;*/
/* 	}*/
/* 	.tracklist-panel .dropdown {*/
/* 		position: relative;*/
/* 		bottom: 34px;*/
/* 	}*/
/* 	.tracklist-panel .btn-link {*/
/* 		color:#e3e3e3;*/
/* 	}*/
/* 	.button-tint {*/
/* 		background-color: rgba(0,0,0,0.3);*/
/* 		transition: background-color 0.5s;*/
/* 	}*/
/* 	.button-tint:hover {*/
/* 		background-color: rgba(0,0,0,0.8);*/
/* 	}*/
/* 	.upload-trigger i {*/
/* 		font-size:6em;*/
/* 	}*/
/* 	.file_input, .upload-profile-photo-area .profile_photo {*/
/* 		position: absolute;*/
/* 		top:56px;*/
/* 		right: 0;*/
/* 		margin: 0;*/
/* 		opacity: 0;*/
/* 		-ms-filter: 'alpha(opacity=0)';*/
/* 		font-size: 410px;*/
/* 		direction: ltr;*/
/* 		cursor: pointer;*/
/* 		z-index: 100000;*/
/* 	}*/
/* 	.upload-profile-photo-area .profile_photo {*/
/* 		top:20px;*/
/* 		height:340px;*/
/* 	}*/
/* */
/* 	.file-upload-results {*/
/* 		text-align: center;*/
/* 		margin:auto;*/
/* 		max-width: 800px;*/
/* 		/*min-height: 400px;*//* */
/* 	}*/
/* 	.file-upload-results .btn {*/
/* 		margin-bottom: 1em;*/
/* 	}*/
/* 	.file-upload-results .form-control {*/
/* 		margin-bottom: 2em;*/
/* 		font-size:1.3em;*/
/* 	}*/
/* 	.profile_audio_img {*/
/* 		width: 100%;*/
/* 	}*/
/* 	#postWrapper {*/
/* 		padding:0px;*/
/* 	}*/
/* 	.rss-container section {*/
/* 		margin-bottom: 5em;*/
/* 		text-align: center;*/
/* 		border-bottom: solid #e3e3e3 3px;*/
/* 		padding-bottom: 4.5em;*/
/* 	}*/
/* 	.cover .row div {*/
/* 		border-top:red solid 1px;*/
/* 		padding-top:2em;*/
/* 	}*/
/* 	.cover .row div .dropdown {*/
/* 		padding-top: 2em;*/
/* 		margin-top: 1.5em;*/
/* 	}*/
/* 	.header_banner {*/
/* 		background-color: #303030;*/
/* 		height: 100vh;*/
/* 		padding-top: 25vh;*/
/* 		text-align: center;*/
/* 		background-position: center center;*/
/* 		background-size: auto 120vh ;*/
/* 		background-image: url("http://freelabel.net/dev/storage/app/media/pexels-photo-87351.jpeg");*/
/* 	}*/
/* 	.header_banner, .header_banner h1{*/
/* 		font-size: 2em;*/
/* 	}*/
/* 	.gradient-bg {*/
/* 		/*background: rgba(0,0,0,0.5);*//* */
/* 		    background-color: #27272f;*/
/* 		    background-image: url(images/linear_bg_1.png);*/
/* 		    background-repeat: repeat-y;*/
/* 		    background: -webkit-gradient(linear, left top, right top, from(#27272f), to(#2F2727));*/
/* 		    background: -webkit-linear-gradient(left, #2F2727, #27272f);*/
/* 		    background: -moz-linear-gradient(left, #2F2727, #27272f);*/
/* 		    background: -ms-linear-gradient(left, #2F2727, #27272f);*/
/* 		    background: -o-linear-gradient(left, #2F2727, #27272f);*/
/* 		}*/
/* 		.btn-primary, .btn-success, .btn-default, .btn-danger, .btn-warning {*/
/* 			background-color:transparent;*/
/* 			color:#e3e3e3;*/
/* 		}*/
/* 		.navbar-default .navbar-toggle, .navbar button, .modal-header, .modal-footer {*/
/* 			border:none;*/
/* 		}*/
/* 		.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {*/
/* 			color:#FE3F44;*/
/* 		}*/
/* 		.modal-content, .dropdown-menu {*/
/* 			background-color:#101010;*/
/* 		}*/
/* 		.navbar-default .navbar-collapse, .navbar-default .navbar-form {*/
/* 			border:none;*/
/* 			box-shadow: none;*/
/* 		}*/
/* 	.upload-profile-photo-area {*/
/* 		border: dashed 4px #303030;*/
/* 	}*/
/* 	.upload-profile-photo-area:hover {*/
/* 		border: dashed 4px #616161;*/
/* 	}*/
/* 	.upload-profile-photo-area img {*/
/* 		width: 100%;*/
/* 		display: block;*/
/* 	}*/
/* /*	.upload-profile-photo-area .profile_photo {*/
/* 		visibility: hidden;*/
/* 		height: inherit;*/
/* 	}*/
/* *//* */
/* */
/* */
/* */
/* */
/* 		.video_player {*/
/* 			display:block;*/
/* 			width:100%;*/
/* 			margin: auto;*/
/* 			max-height: 80vh;*/
/* 		}*/
/* */
/* 		input:checked + .slider {*/
/* 			background-color: #2196F3;*/
/* 		}*/
/* */
/* 		input:focus + .slider {*/
/* 			box-shadow: 0 0 1px #2196F3;*/
/* 		}*/
/* */
/* 		input:checked + .slider:before {*/
/* 			-webkit-transform: translateX(26px);*/
/* 			-ms-transform: translateX(26px);*/
/* 			transform: translateX(26px);*/
/* 		}*/
/* */
/* 		/* Rounded sliders *//* */
/* 		.slider.round {*/
/* 			border-radius: 34px;*/
/* 		}*/
/* */
/* 		.slider.round:before {*/
/* 			border-radius: 50%;*/
/* 		}*/
/* */
/* */
/* @media(max-width: 600px) {*/
/* 	.header_banner {*/
/* 		padding:1em;*/
/* 		padding-top:17.5vh;*/
/* 	}*/
/* 	.header_banner, .header_banner h1{*/
/* 		font-size: 2em;*/
/* 		letter-spacing: -2px;*/
/* 	}*/
/* 	.tracklist-panel b {*/
/* 		font-size:1.5em;*/
/* 	}*/
/* 	.file-upload-results {*/
/* 		max-width: 400px;*/
/* 	}*/
/* 	.navbar-brand {*/
/* 		font-size:0.8em;*/
/* 	}*/
/* }*/
/* */
/* */
/* @media (max-width:960px) {*/
/* 	.slideshow figure {*/
/* 		padding-top:11vh;*/
/* 	}*/
/* */
/* }*/
/* */
/* */
/* */
/* 		@import url(https://fonts.googleapis.com/css?family=PT+Sans);*/
/* 		* {*/
/* 			text-rendering: optimizeLegibility;*/
/* 			-webkit-font-smoothing: antialiased;*/
/* 			-moz-osx-font-smoothing: grayscale;*/
/* 			font-family: 'PT Sans', sans-serif; }*/
/* 			h1, h2, h3, h4, h5, h6 {*/
/* 				font-weight: bold; }*/
/* /*  body, html, h1, h2, h3, h4, h5, h6, label, button {*/
/*   	font-family:'Avenir Next', Avenir, 'Helvetica Neue', 'Lato', 'Segoe UI', Helvetica, Arial, sans-serif;*/
/*   }*/
/*   *//* */
/*   p, h1, h2, h3, h4, h5, h6, i, .navbar-default .navbar-nav > li > a{*/
/*   	color: #e3e3e3; }*/
/* */
/*   	.cover {*/
/*   		text-align: center; }*/
/*   		.marketing_feature i {*/
/*   			font-size: 5em; }*/
/*   			.cover div, .cover p, .cover button {*/
/*   				font-size:1.1em;*/
/*   				/*margin-bottom: 10em; *//* */
/*   			}*/
/*   			.toolbar h1, .toolbar p {*/
/*   				color: #e3e3e3; */
/*   			}*/
/*   			.login-results {*/
/*   				text-align: center;*/
/*   				padding: 1em; */
/*   			}*/
/* */
/*   			/*# sourceMappingURL=output.css.map *//* */
/* */
/* */
/* */
/* */
/* */
/* */
/* */
/* */
/* */
/*   			</style>*/
