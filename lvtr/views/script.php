<?php

require('../config.php');
$site = new Config();	

$site->debug($_SERVER,1);
$script = $site->get_script();		
?>

<a name='updated'></a>
<div class='container'>
	<a name="script">
	<h2 id="sub_label">THE SCRIPT</h2>
		<form name="theScript" class='the-script' method="POST" action="http://freelabel.net/x/update_script.php" >
<a name-'dms'></a>
				<?php

					foreach ($script[0] as $key => $value) {
				  		// echo '<div class="lead script-item list-group-item" ><data class="edit" id="lead-script-'.$key.'-'.$row['id'].'" >'.$value.'</data></div>';
				  		// echo '<input type="text" name="'.$key.'" value="'.$value.'" class="form-control">';
				  		echo '<p id="script-'.$key.'-'.$script[0]['id'].'" class="lead edit">'.$value.'</p>';
				  		// echo '<div class="lead script-item list-group-item" ><data class="edit" id="lead-script-'.$key.'-'.$row['id'].'" >'.$value.'</data></div>';
				  		$i++;
				  	}

				?>

<hr>
			<div id="phonescript" class="card card-chart phone-script" >
			<h1>Interview Questions</h1>
				<ul>
					<li>Where are you from? What does your city have to do with your style? What is your city like? What is your local scene consist of?</li>
					<li>Who do you work with? Who are you looking to work with in the future? Who have you worked with in the past?</li>
					<li>Are you working on any new projects right now? Where did you get the idea or concept of this project?</li>
					<li>Do you have an overall message in your art? What is your message as an artists?</li>
					<li>If you could branch into any genre of music, and still have major success, what would it be?</li>
					<li>Whats the most messed up, tragic, or craziest thing that has happened in your music careers so far?</li>
					<li>What advice do you have for other musicians and fans that listen to your music and watch your moves?</li>
				</ul>


				<?php 

// 				$phonescript = "Hi this is YO NAME with FREELABEL Radio & Magazine. Our DJs approved your submissions & wanted me to follow up with you about getting your account created so we can start getting you placed on our radio & magazine interviews, projects, videos, & events this month.<br><br><br>

// <!--
// 				We have a 4,500+ Square Foot Headquarters in Dallas, TX with a 3 Recording Studios, Radio, and Film Room
// 				<br><br>
// 				and a 1,500 Square Foot Radio + Recording Studio in Houston, TX
// 				<hr>

// 				We get over 3.5 Million impressions each month on twitter, we've done booking for artists such as: <br><br>

// 				- Chief Keef, Ab Soul, & Odd Future in Dallas 
// 				<br>- Release Songs & DJ Events Johnny Cinco <br>
// 				- Gucci Mane & BSM 1017 reached out to us directly for hosting mixtapes & debuting exclusives,
// 				<br>
// 				- Miley Cyrus shared our site & got over 10,000 impressions alone in one day<br>
// 				- We Produced the Beat Up The Block by Boosie and Dorrough<br>
// 				- We were the ones who orginally released the OG Maco & OGG Documentary in November.<br>
// 				<hr> 
// -->
// 				if you create an account, for $200 a month, we will provide you with:<br><br>
// 				- A FREELABEL DJ <br>
// 				- Radio + Full Magazine Interviews <br>
// 				- Studio Time: Audio Engineering, Production, Mixing/Mastering<br>
// 				- Video, Single, & Project Releases <br>
// 				- Graphic Design & Instagram Commercials <br>
// 				- 2 Hour Radio Show Broadcasting your full project + Interviews <br>
// <hr>
// 				if you create an account, for $50 a month, we will provide you with:<br><br>
// 				the same but we will not be able to include Royalty Payouts, Event Booking, and Traveling to your location. Instead of doing on-site video interviews, we'll have you call into the studio.
// <hr>

// //////////// (IF INTERESTED)<br><br>

// Are you by a computer, cell phone, or anything that you could use to get on the website you submitted on?<br><br>

// IF YOU CREATE AN ARTIST ACCOUNT WITH US, WE'LL FEATURE AN INTERVIEW OR MUSIC REVIEWS EACH MONTH + WE'LL PROMOTE YOUR VIDEOS, ALBUMS, PROJECTS, OR SINGLES ALL MONTH SUCH AS RADIO SHOWCASES, BLOG REVIEWS OF EACH OF YOUR SINGLES, and WEEKLY INTERVIEWS TO TALK ABOUT YOUR UPCOMING EVENTS AND PROJECTS FOR $35 MONTH<br><br>

// && EXCLUSIVE ACCOUNTS: WE DISTRIBUTE YOUR MUSIC & YOU EARN 100% ROYALTIES. WE HAVE OTHER CLIENTS WHO EARN UP OVER $5,000+ EACH MONT BY HAVING OVER 1000 FANS SUBSCIBED TO THEIR ACCOUNT - $199 MONTH"; 

//echo $phonescript; ?>
			</div>
		
		</form>


<script type="text/javascript" src="http://freelabel.net/lvtr/js/jeditable.js"></script>
<script type="text/javascript">
$(function(){
     $('.edit').editable('http://www.freelabel.net/lvtr/config/edit.php');
});
</script>
