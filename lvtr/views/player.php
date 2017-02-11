<?php
include_once('../config.php');
$site = new Config();
// include_once('../header.php');

$posts = $site->get_explore_posts($_SESSION['user_name'], $_POST['page']);

?>
    <script src="http://kolber.github.io/audiojs/demos/jquery.js"></script>
    <script src="http://kolber.github.io/audiojs/audiojs/audio.js"></script>
    <script>
      $(function() { 
        // Setup the player to autoplay the next track
        var a = audiojs.createAll({
          trackEnded: function() {
            var next = $('.audioplayer-list .tracklist-panel.playing').next();
            if (!next.length) next = $('.audioplayer-list .tracklist-panel').first();
            next.addClass('playing').siblings().removeClass('playing');
            audio.load($('a', next).attr('data-src'));
            audio.play();
          }
        });
        
        // Load in the first track
        var audio = a[0];
            first = $('.audioplayer-list a').attr('data-src');
        $('.audioplayer-list .tracklist-panel').first().addClass('playing');
        audio.load(first);

        // Load in a track on click
        $('.audioplayer-list .tracklist-panel').click(function(e) {
          e.preventDefault();
          $(this).addClass('playing').siblings().removeClass('playing');
          audio.load($('a', this).attr('data-src'));
          audio.play();
        });
        // Keyboard shortcuts
        $(document).keydown(function(e) {
          var unicode = e.charCode ? e.charCode : e.keyCode;
             // right arrow
          if (unicode == 39) {
            var next = $('.tracklist-panel.playing').next();
            if (!next.length) next = $('.audioplayer-list .tracklist-panel').first();
            next.click();
            // back arrow
          } else if (unicode == 37) {
            var prev = $('.tracklist-panel.playing').prev();
            if (!prev.length) prev = $('.audioplayer-list .tracklist-panel').last();
            prev.click();
            // spacebar
          } else if (unicode == 32) {
            audio.playPause();
          }
        })
      });
    </script>
    <div class="container tracklist-container">
      <!-- <audio preload></audio> -->

      <ol class="audioplayer-list">
		<?php $site->display_media_list($posts, $_SESSION['user_name'], $_POST['page']); ?>
      </ol>
    </div>
<?php

// include_once('../footer.php');
?>
