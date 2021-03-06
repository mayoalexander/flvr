<!-- Footer -->
<footer class="section-footer bg-inverse" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-5">
        <div class="media">
          <div class="media-left">
            <!-- <img class="media-object display-1" src='http://freelabel.net/images/FREELABELLOGO.gif' style="width:60px;"> -->
            &reg; All Rights Reserved.
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-7">
        <ul class="list-inline m-b-0">
          <li class="active"><a href="http://freelabel.net/users/login/register">About</a></li>
          <li><a href="http://freelabel.net/users/login/register">Register</a></li>
          <!-- <li><a href="http://freelabel.net/upload/?uid=submission" target="_blank">Upload Submission</a></li> -->
          <li><a class="scroll-top" href="#totop">Back to top <span class="icon-caret-up"></span></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Login To Your Account</h4>
      </div>
      <div class="modal-body signin-wrapper">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary-outline m-b-md" data-dismiss="modal"><i class="fa fa-close" ></i></button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-video" role="document">
    <div class="modal-content">
      <!-- 16:9 aspect ratio -->
      <div class="embed-responsive embed-responsive-16by9">
        <iframe id="vimeo-play" src="https://player.vimeo.com/video/98330466?color=6c59b4&amp;byline=0&amp;portrait=0&amp;badge=0&amp;api=1&amp;player_id=vvvvimeoVideo-0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
      </div>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://freelabel.net/jPlayer/dist/jplayer/jquery.jplayer.min.js"></script>
<script src="http://freelabel.net/landio/js/landio.min.js"></script>
<script src="http://freelabel.net/js/jquery-ui.min.js"></script>
<script src="http://freelabel.net/config/globals.js"></script>
<script src="http://freelabel.net/landing/view/nexus/js/classie.js"></script>
<script src="http://freelabel.net/landing/view/nexus/js/gnmenu.js"></script>
<script src="http://freelabel.net/js/radio.js"></script>
<script type="text/javascript" src="http://freelabel.net/js/jquery.jeditable.js"></script>
<script>
  new gnMenu( document.getElementById( 'gn-menu' ) );
</script>
<!-- Tab Scripts -->
<script src="http://freelabel.net/landing/view/tabs/js/cbpFWTabs.js"></script>
<script>
  (function() {

    [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
      new CBPFWTabs( el );
    });

  })();
</script>
<!-- front end scripts  -->
<!-- <script type="text/javascript" src="http://freelabel.net/js/dashboard.js"></script> -->
<script type="text/javascript">
  

<?php 
if (isset($_SESSION['user_name'])) {
  echo 'var userNameSession = "'.Session::get('user_name').'";';
} else {
  echo 'var userNameSession = "submission";';
  // echo 'alert("no users found!")';
} 
?>

$(function(){
  $('.navi-Login').click(function(event){
    event.preventDefault();
    var ok = $(this).text();
    $('#loginModal').modal('show');
    $('.signin-wrapper').html('Please wait..');
    $.get('http://freelabel.net/users/login/signin/',{},function(data){
      $('.signin-wrapper').html(data);
    });
  });
});


</script>


</body>
</html>
