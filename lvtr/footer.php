<!-- Post Modal -->
<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body" id="postWrapper">
      	<div>loading..</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary-outline m-b-md" data-dismiss="modal"><i class="fa fa-close" ></i></button>
      </div>
    </div>
  </div>
</div>

<!-- <script type="text/javascript" src="<?php echo $site->url; ?>js/jscroll.min.js"></script> -->
<script type="text/javascript" src="<?php echo $site->url; ?>js/application.js"></script>
<!-- <script type="text/javascript" href="<?php echo $site->url; ?>js/mobile-detect.min.js"></script> -->

<script type="text/javascript">
	$(function(){

	$('.nofity-profile-incomplete').click(function(){
		var data = $(this).attr('data-user');
		var msg = '<i class="fa fa-check"></i> Sent message to @' + data + '!';
		$(this).html(msg);
		$(this).removeClass('btn-primary');
		$(this).addClass('btn-success');
	});
	// $('.navi_button').click(function(e){
	// 	$('#bs-example-navbar-collapse-1').removeClass('in');
	// 	e.preventDefault();
	// 	// alert('hello');
	// 	openPage($(this),window.location.pathname, '<?php echo $site->url ?>');
	// });

	/* search bar */
	$('.global-search-bar').submit(function(e){
		var val = $(this)[0].elements[0].value;
		var min = 4;
		if (val.length<min) {
			e.preventDefault();
			alert('Please enter more than ' + min + ' characters for a search.')
		} else {
        // do nothing
    }
});

});
</script>
    <!-- jQuery -->
    <!-- <script src="https://blackrockdigital.github.io/startbootstrap-modern-business/js/jquery.js"></script> -->
    

    <!-- Bootstrap Core JavaScript -->
    <script src="https://blackrockdigital.github.io/startbootstrap-modern-business/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    
    
    
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=450514531818920";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-40470023-1', 'auto');
      ga('send', 'pageview');
    </script>

</body>
</html>
