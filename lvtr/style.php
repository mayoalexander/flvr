	<style type="text/css">
	a {
		color:<?php echo $site->primary_color; ?>;
	}
	a:hover {
		color:<?php echo $site->body_text_light; ?>;
		text-decoration: none;
	}
	a:visited, a:active, a:focus {
		color:<?php echo $site->body_text_light; ?>;
		text-decoration: none;
	}
	*:focus, textarea:focus, input:focus, .form-control:focus {
		outline: none;
		box-shadow: none;
	}
	hr {
		border-top: 1px solid #303030;
	}
	.toolbar {
		background-color: <?php echo $site->toolbar_color; ?>;
		border:none;
	}
	.user-navi {
		position: relative;
		top: 8px;
	}
	.user-navi label {
		font-weight: 300;
		margin-right:2em;
	}


	.data-container {
		padding-bottom: 5vh;
	}

	label:hover, .notifications {
		color:<?php echo $site->primary_color; ?>;
		cursor: pointer;
	}
	.site_logo {
		max-width: 40px;
		position: relative;
		bottom:10px;
	}
	.nothing-found {
		width: 100%;
		display: block;
		padding: 1em;
		font-size: 1em;
		color: #f0ad4e;
		background-color: transparent;
		text-align:center;
	}

	.notifications p, .toolbar {
		/*padding:1em;*/
		color:<?php echo $site->toolbar_text_color; ?>;
	}

	.notifications p {
		background-color: <?php echo $site->notifications_color; ?>;
		text-align: center;
	}

	.dashboard {
		max-width: 1200px;
		margin:auto;
		margin-top:2em;
	}
	.dashboard div {
		margin-bottom:1em;
	}
	.dashboard panel {
		display: block;
		background-color: <?php echo $site->panel_color; ?>;
		padding: 1em;
		border-top: red solid 1px;
	}

	.form-control {
		background-color: transparent;
		border:none;
		outline: none;
		box-shadow: none;
		border-left: 2px transparent solid;
		transition: all 1s;
	}


	.form-control:focus {
		border-left: 2px <?php echo $site->primary_color; ?> solid;
		color: <?php echo $site->body_text_light; ?>;
	}
	.container .form-control {
		font-size: 1.5em;
		padding: 1em;
	}
	.light-text {
		color:#e3e3e3 ;
	}

	.form-signin, .login-results {
		max-width: 400px;
		margin:auto;
	}
	.form-signin , .form-signin input {
		text-align: center;
	}
	.btn, .form-control {
		border-radius: 1px;
	}
	.user_profile_img {
		width:100px;
		border-radius: 5px;
		display:inline-block;
		padding:0;
	}
	.profile h4, {
		vertical-align: top;
		display: inline-block;
		font-size:2em;
		text-transform: uppercase;
	}
	.profile {
		margin-bottom: 80px;
	}
	.profile .pull-right {
		text-align: right;
	}
	.profile .pull-right h4 {
		margin-top:0;
	}
	.profile_builder_form h4 {
		font-size:1.2em;
		font-weight: bolder;
	}
	.profile_builder_form div {
		padding:2em;
	}
	.upload-trigger {
		cursor: pointer;
		text-align: center;
		display:block;
		margin:auto;
	}
	.upgrade-button {
		background-color:limegreen;
		padding: 0.5em;
		border-radius: 6px;
	}
	.upgrade-button:hover {
		color:#e3e3e3;
		background-color:green;
	}
	.list-group-item {
		background:transparent;
	}
	.message-item {
		/*border-top:3px solid <?php echo $site->primary_color; ?>;*/
	}
	.category-container h1 {
		margin-top:0;
	}
	.category-nav li {
		list-style-type: none;
	}
	.category-nav .btn-link {
		color:#e3e3e3;
	}
	.edit-category:hover, .categorieslist-item:hover  {
		cursor: pointer;
		color: <?php echo $site->primary_color; ?>;
	}
	.tracklist-item img, .userlist-item img {
		width:36px;
	}
	.tracklist-panel {
		padding:2em;
		color:<?php echo $site->body_text_light; ?>;
	}
	.profile .tracklist-panel button {
		border:none;
	}
	.tracklist-panel .btn-link:focus {
	    outline: none;
	    color:red;
	}
	.tracklist-panel .btn-link:hover {
		text-decoration: none;
	    color:red;
	}

	.tracklist-panel img {
		width: 100%;
		display:block;
		transition: all 0.5s;
		transition-timing-function: ease;
	}
	.tracklist-panel img:hover {
		border:solid <?php echo $site->primary_color; ?> 10px;
	}
	.tracklist-panel b {
		display: block;
		padding: .5em;
		padding-left:0;
		font-size: 1.3em
	}
	.tracklist-panel .dropdown-menu {
		text-align: center;
		width: 100%;
		border-bottom:red 2px solid;
	}
	.tracklist-panel .dropdown {
		position: relative;
		bottom: 34px;
	}
	.tracklist-panel .btn-link {
		color:<?php echo $site->body_text_light; ?>;
	}
	.button-tint {
		background-color: rgba(0,0,0,0.3);
		transition: background-color 0.5s;
	}
	.button-tint:hover {
		background-color: rgba(0,0,0,0.8);
	}
	.upload-trigger i {
		font-size:6em;
	}
	.file_input, .upload-profile-photo-area .profile_photo {
		position: absolute;
		top:56px;
		right: 0;
		margin: 0;
		opacity: 0;
		-ms-filter: 'alpha(opacity=0)';
		font-size: 410px;
		direction: ltr;
		cursor: pointer;
		z-index: 100000;
	}
	.upload-profile-photo-area .profile_photo {
		top:20px;
		height:340px;
	}

	.progress {
		text-align: center;
		margin: auto;
		max-width: 400px;
	}
	.play-progress-wrap .progress {
		height: 40px;
	    width: 40vw;
	    margin-top: 5px;
		background-color: transparent;
	}
	.play-progress-wrap .progress .play-progress-bar {
		background-color: #FE3F44;
	}
	.file-upload-results {
		text-align: center;
		margin:auto;
		max-width: 800px;
	}
	.btn-link:hover, .btn-link:focus {
		text-decoration: none;
		color:<?php echo $site->primary_color; ?>;
	}
	.file-upload-results hr {
		border:0;
	}
	.file-upload-results .btn-link {
		margin-bottom: 1em;
	}
	.file-upload-results .btn-link {
		color:#e3e3e3;
	}
	.file-upload-results .btn-success,.file-upload-results .btn-primary, {
		color:#303030;
	}
	.file-upload-results .form-control {
		margin-bottom: 2em;
		font-size:1.3em;
	}
	.profile_audio_img {
		width: 100%;
	}

	.manage_user_options li {
		list-style-type: none;
	}
	#postWrapper {
		/*padding:0px;*/
	}
	#postWrapper .form-control {
		font-size:2em;
		height: auto;
	}
	.rss-container section {
		margin-bottom: 5em;
		text-align: center;
		border-bottom: solid #e3e3e3 3px;
		padding-bottom: 4.5em;
	}
	.cover .row div {
		border-top:red solid 1px;
		padding-top:2em;
	}
	.cover .row div .dropdown {
		padding-top: 2em;
		margin-top: 1.5em;
	}

	.header_banner .btn , .buttons-wrapper a  {
		background-color: rgba(0,0,0,0.5);
	}

	.hero-01 {
		background-image: url("http://freelabel.net/dev/storage/app/media/pexels-photo-87351.jpeg");
	}
	.header_banner, .header_banner h1{
		font-size: 2em;
	}
	.gradient-bg {
		/*background: rgba(0,0,0,0.5);*/
		    background-color: #27272f;
		    background-image: url(images/linear_bg_1.png);
		    background-repeat: repeat-y;
		    background: -webkit-gradient(linear, left top, right top, from(#27272f), to(#2F2727));
		    background: -webkit-linear-gradient(left, #2F2727, #27272f);
		    background: -moz-linear-gradient(left, #2F2727, #27272f);
		    background: -ms-linear-gradient(left, #2F2727, #27272f);
		    background: -o-linear-gradient(left, #2F2727, #27272f);
		}
		.btn-primary, .btn-success, .btn-default, .btn-danger, .btn-warning {
			background-color:transparent;
			color:<?php echo $site->body_text_light; ?>;
		}
		.navbar-default .navbar-toggle, .navbar button, .modal-header, .modal-footer {
			border:none;
		}
		.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
			color:<?php echo $site->primary_color; ?>;
		}

		#postModal .form-control {
			font-size: 3em;
		}
		#postModal {
		    z-index: 1000000;
		}
		.modal-footer .btn {
			background-color: transparent;
		}
		.modal-dialog {
			margin-top: 30vh;
		}

		.modal-content, .dropdown-menu {
			background-color:#101010;
		}
		.navbar-default .navbar-collapse, .navbar-default .navbar-form {
			border:none;
			box-shadow: none;
		}
		.modal-backdrop {
			transition: all 1s;
		    opacity:0.85 !important;
		}



	.toolbar .navbar-brand {
	    /*position: absolute;*/
	    z-index: 1000;
	}

	.upload-profile-photo-area {
		border: dashed 4px #303030;
	}
	.upload-profile-photo-area:hover {
		border: dashed 4px #616161;
	}
	.upload-profile-photo-area img {
		width: 100%;
		display: block;
	}

	.lead-message {
		border-left: solid 3px <?php echo $site->primary_color; ?>;
	    display: block;
	    margin-bottom: 15px;
	    padding-left: 10px;
	}
	.leadlist-item .priority {
		font-size:5em;
		background-color: <?php echo $site->primary_color; ?>
		font-weight:bolder;
		color:#fff;
		display: inline-block;
	}



	.view-details-user:hover {
		cursor: pointer;
	}
/*	.upload-profile-photo-area .profile_photo {
		visibility: hidden;
		height: inherit;
	}
*/




		.video_player {
			display:block;
			width:100%;
			margin: auto;
			max-height: 80vh;
		}

		.play_button {
			background-color: #FE3F44;
			border-radius: 50%;
			position: relative;
			top: 10px;
		    right: 10px;
		}
		.play_button i {
			position: relative;
		    left: 1px;
		    top: 1px;
		}
		.profile-header-banner .play_button .fa-play, .profile-header-banner .play_button .fa-pause {
			padding:1vh;
			position: relative;
			font-size:5vh;
		    left: 6px;
		    top: 6px;
		}
		.profile-header-banner .play_button {
			width: 100px;
		    height: 100px;
		}
		.profile-header-banner .play_button .fa-pause {
			    left: 1px;	
		}
		

		input:checked + .slider {
			background-color: #2196F3;
		}

		input:focus + .slider {
			box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .slider:before {
			-webkit-transform: translateX(26px);
			-ms-transform: translateX(26px);
			transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round {
			border-radius: 34px;
		}

		.slider.round:before {
			border-radius: 50%;
		}


@media(max-width: 600px) {
	.header_banner .background-tint {
		padding: 2em;
		padding-top: 30vh;
		height: inherit;
	}
	.header_banner, .header_banner h1{
		font-size: 2em;
		letter-spacing: -2px;
	}
	.tracklist-panel b {
		font-size:1.5em;
	}
	.file-upload-results {
		max-width: 400px;
	}
	.navbar-brand {
		font-size:0.8em;
	}
}


@media (max-width:960px) {
	.slideshow figure {
		padding-top:11vh;
	}

}



		@import url(https://fonts.googleapis.com/css?family=PT+Sans);
		* {
			text-rendering: optimizeLegibility;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			font-family: 'PT Sans', sans-serif; }
			h1, h2, h3, h4, h5, h6 {
				font-weight: bold; }
/*  body, html, h1, h2, h3, h4, h5, h6, label, button {
  	font-family:'Avenir Next', Avenir, 'Helvetica Neue', 'Lato', 'Segoe UI', Helvetica, Arial, sans-serif;
  }
  */
  p, h1, h2, h3, h4, h5, h6, i, .navbar-default .navbar-nav > li > a{
  	color: <?php echo $site->body_text_light; ?>; }

  	.cover {
  		text-align: center; }
  		.marketing_feature i {
  			font-size: 5em; }
  			.cover div, .cover p, .cover button {
  				font-size:1.1em;
  				/*margin-bottom: 10em; */
  			}
  			.toolbar h1, .toolbar p {
  				color: #e3e3e3; 
  			}
  			.login-results {
  				text-align: center;
  				padding: 1em; 
  			}

  			/*# sourceMappingURL=output.css.map */









  			</style>