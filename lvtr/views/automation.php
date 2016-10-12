<?php
include('../config.php');
$site = new Config();
// $action = str_replace('dashboard/auto/', '', $_GET['url']);
// echo '<pre>';
//   print_r($action);
// echo '</pre>';
// exit;

$action = 'all';
$_GET['recent'] = true;
$_GET['mins'] = 4;
$_GET['stayopen'] = 1;
$_GET['som']=1;
$range = 30;

 if($_GET['recent']){
	 $todays_date = date('Y-m');
	 /* `user_name` NOT LIKE '%submission%'
           AND `user_name` NOT LIKE '%admin%'
           AND `type` LIKE '%single%'
           /*`user_name` NOT LIKE '%submission%'
           AND `user_name` LIKE '%admin%'
           AND `type` LIKE '%single%'
           AND `twitpic` LIKE '%pic.twit%'
           OR  */ 
          include("../config/connection.php");

if ($action=='mainstream') {
    $query = "SELECT * 
FROM  `feed` 
WHERE `user_name` NOT LIKE '%admin%'
LIMIT 0 , 0";
} elseif($action=='all') {
  $query = "SELECT * FROM  `feed` WHERE `user_name` LIKE '%admin%' ORDER BY `id` DESC LIMIT 0 , $range";
} elseif($action=='clients') {
  $query = "SELECT * FROM  `feed` WHERE `user_name` NOT LIKE '%admin%' ORDER BY `id` DESC LIMIT 0 , $range";
} else {
  $query = "SELECT * FROM  `feed` WHERE `user_name`  NOT LIKE '%admin%' ORDER BY `id` OR `user_name` LIKE '%admin%' LIMIT 0 , 60";
}

    // echo '<h1>'.$query.'</h1>';
    echo '<a class="btn btn-primary" target="_blank" href="#">Open In New Tab</a>';
           $result = mysqli_query($con,$query);
           $i=1;
           while($row = mysqli_fetch_array($result))
           {
             $twitter = $row['twitter'];
             $title = $row['blogtitle'];
             $title_explode = explode(' ', $title);
             
             
 
             if ($row['type']=='single') {
               $title = $row['blogtitle'];
               //$title = explode(' ', $title);
               $twitter_explode = explode(' ', $twitter);
             } else {
				 $post_title_array = explode(' ', $title);
         //print_r($blogtitle);
			 }
 
             if ($title_explode[0] == '[VIDEO]'
                 OR $title_explode[0] == '[SINGLE]'
                 OR $title_explode[0] == '[ALBUM'
                 OR $title_explode[0] == '[INTERVIEW]'
                 OR $title_explode[0] == '[EXCLUSIVE]'
                 ) {
                 if ($title_explode[0] == '[ALBUM') {
                   $post_title_short = $title_explode[2];
                 }else{
                   $post_title_short = $title_explode[1];
                 }
               } else {
                 $post_title_short = $title_explode[0];
               }
			   
			   
			   
               $link_to_post = $page_url = 'FREELABEL.NET/'.$twitter.'/'.$post_title_short;
 
 $posts_to_tweet[$i] = "#FLMAG | ".$twitter."
 
 " .$title."
 
 " .$link_to_post;
             $i++;
           }
 }

if ($_POST['organic'] || $_GET['organic'] || $action=='organic') {

          include_once(ROOT.'inc/huge.php');
          $user_id = $huge->getUserID('admin');
          $query = "SELECT * FROM notes WHERE user_id = $user_id ORDER BY `note_id` DESC LIMIT 60";
          $result = mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result))
          {
            $text = $row['note_text'];
            $post_id = $row['id'];
            $posts_to_tweet[] = $text;
          }


} // end of organic


if ($_POST['promos'] || $_GET['promos'] || $action=='promos') {

          INCLUDE("../inc/connection.php");
          // $todays_date = date('Y'); // WHERE date_created LIKE '$todays_date%'
          $query = "SELECT * FROM images WHERE `user_name`='admin' AND `desc` LIKE '%current-promo%' ORDER BY `id` DESC LIMIT $range";
          $result = mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result))
          {
            //print_r($row);
            $post_id = $row['id'];
            $text = $row['title'] . ' 

http://freelabel.net/users/index/image/'.$post_id;
            $posts_to_tweet[] = $text;
          }

} // end of organic




if ($_POST['live'] || $_GET['live'] || $action=='live') {

          INCLUDE("../inc/connection.php");
          // $todays_date = date('Y'); // WHERE date_created LIKE '$todays_date%'
          $query = "SELECT * FROM images WHERE `user_name`='admin' AND `desc` LIKE '%live-promo%' ORDER BY `id` DESC LIMIT 30";
          $result = mysqli_query($con,$query);
          while($row = mysqli_fetch_array($result))
          {
            //print_r($row);
            $post_id = $row['id'];
            $text = $row['title'] . ' 

http://freelabel.net/users/index/image/'.$post_id;
            $posts_to_tweet[] = $text;
          }

} // end of organic

        // for ($i=0; $i < 29; $i++) { 
        //   $premade_tweets[] = "#".$text." : tune in LIVE on air! radio.freealbel.net/<br>";
        // }


	

        shuffle($posts_to_tweet);

        $already_tweeted = array("0");
        $i=1;

        echo "<h1 style='text-transform:uppercase;'>".$action." tweets</h1>";
        echo '
        <div class="row clearfix">
          <div class="col-md-2"><i class="fa fa-clock-o"></i> <span id="time">'.$_GET['mins'].'</span> min</div>
          <div class="col-md-2"><i class="fa fa-clock-o"></i> '.$_GET['recent'].'</div>
          <div class="col-md-2"><i class="fa fa-folder-o"></i> '.$action.'</div>
          <div class="col-md-2"><i class="fa fa-clock-o"></i> '.$_GET['som'].'</div>
          <div class="col-md-2"><i class="fa fa-heartbeat"></i> '.$_GET['stayopen'].'</div>
          <div class="col-md-2"><i class="fa fa-sliders"></i> '.$range.'</div>
        </div>';
        echo '<ul class="list-group" style="">';
        // echo '<script>alert("okay okay");</script>';
        foreach ($posts_to_tweet as $tweet) {
            $som_url    = $site->create_som_url($user_twitter_name,$tweet);
                // $twitter_user_data = $connectionRequest->users[$i]->screen_name;
                // $user_twitter_name = $twitter_user_data->user->screen_name;
                  echo '
                        <li class="list-group-item som-item">
                          <a href="'.$som_url.'" class="text-muted">'.$i.')</a>
                          '.$tweet.'
                        </li>
                      ';
                  //echo $i.' ["'.$tweet.'"]<hr>';
                  if ($_GET['som']==1) { // RUN MASS SENDOUT
                    if (in_array($tweet, $already_tweeted)) {
                      // // Don't Tweet Out!
                    } else {
                      $already_tweeted[$i] = $tweet;
                      
                      $timeOutTime = (60000 * $_GET['mins'] * $i); 
                      if ($_GET['stayopen']==1) {
                        // SLOW - POST TWEET EVERY 2 MINUTES (30 Tweets/Hour)
                        //$timeOutTime = ((60000 * 2) * $i);
                        if(isset($_GET['mins'])==false) {$mins=1;} else {$mins=$_GET['mins'];}
                        $timeOutTime = ((60000 * $mins) * $i);
                      }
                      echo '<script>console.log('.$timeOutTime.');</script>';
                      echo '
                      <script>
                      function execAutoPromote(linkToTweet) {
                        window.open(linkToTweet);
                        console.log(linkToTweet);
                        // alert(linkToTweet);
                      }
                      setTimeout( function () { execAutoPromote("'.$som_url.'"); }  , '.$timeOutTime.');
                      </script>';
                    }
                  }
                  // ------ END SEND SOM ---- //
                  //echo '<script>sendDirectMessage('.$twitter_id_num.' , "'.$sendDirectMessage.'");</script>';
                  $i++;
                } 
                echo '</ul>';
                echo '<hr><label class="label label-warning">'.($i-1).' total tweets found!</label><hr><span id="status_text"></span>';
/*
if ($i===30 && $_GET['stayopen']==1) {
    $content_SOM .= '<script>';
    $content_SOM .= '$("#status_text").html("'.($i-1).' Posts " + "distributed over " + '.($timeOutTime / 60000).' + " minutes. Finish by: '.date('h:i:s A',strtotime('+ '.($timeOutTime / 60000).' minutes')).'");';
    $content_SOM .= 'setTimeout(function() { sendEmail("notifications@freelabel.net", "Admin Clocked OUT for ['.date('l, F j, Y').']!", "We are now clocking OUT @ '.date('l F j Y @ h:i:s A').'", "#main_content" , "admin" , ""); }, '.($timeOutTime - 60000).');';
    $content_SOM .= '</script>';
}
*/
?>


<script type="text/javascript">

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

$(function() {
    var mins = 60 * <?php echo $_GET['mins']; ?>,
        display = $('#time');
    startTimer(mins, display);
});


  var contact = {
    runIt: function printFullName() {
      var firstName = "Andrew";
      var lastName = "Chalkley";
      console.log(firstName + " " + lastName);
    }
  }

  // alert(contact.runIt());
</script>