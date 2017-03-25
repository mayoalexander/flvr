<?php
// $feeds[] = 'http://www.elevatormag.com/feed/';
$feeds = array(/*'http://freelabelmagazine.wordpress.com/rss',
	'https://freelabelcontent.wordpress.com/feed/', */
  //'http://freelabelnet.tumblr.com/rss' ,
  // 'http://assets.complex.com/feeds/channels/all.xml?_ga=1.103967424.130544531.1429827317',
	// 'http://www.elevatormag.com/feed/',
  // 'http://freelabelnet.tumblr.com/rss',
	// 'http://www.dirty-glove.com/feed/',
 //    // 'http://freelabelnet.tumblr.com/rss',
 //    // 'http://tooheavyx.tumblr.com/rss',
	'http://feeds.soundcloud.com/users/soundcloud:users:6169895/sounds.rss',
	'http://www.saycheesetv.com/feed/',
	'http://feeds.feedburner.com/ughhblog?format=xml',
    'http://www.passionweiss.com/feed/',
    'http://risenpine.com/feed/',
	// 'http://www.trapnstuff.com/feed/',
	// 'http://www.dancingastronaut.com/feed/',
	// 'http://www.hiphopsmission.com/feed/',
	// 'http://feeds.feedburner.com/256up?format=xml',
	'http://www.viewhiphop.com/category/new-music/feed/',
	'http://www.highsnobiety.com/feed/',
	'http://feeds.feedblitz.com/Gizmag',
	// 'http://www.vibe.com/feed/',
	'http://thedailyloud.com/feed/'
);





function displaySiteFeed($feed) {
			$rss = simplexml_load_file($feed);
			$build .= '<h3>'. $rss->channel->title . '</h3>';
			foreach ($rss->channel->item as $item) {
			    $build .= '<section class="well">';
			    $build .= '<h4><a href="http://twitter.com/search?='. urlencode($item->title).'" target="_blank">'.$item->title."</a></h4>";
				$content = $item->children("content", true);
				$content = str_replace("'", "\"", $content);
				if ($content == '') {
					$content = $item->description;
				}
			   $build .= '<div class="rss-content form-control" style="display:none;" rows="4">'.$content.'</div>';
			   $build .= '<button class="get-mp3-trigger btn btn-success btn-xs">Download File</button>';
			   $build .= '<button class="search-rss-trigger btn btn-primary btn-xs" data-title="'.$item->title.'">Search</button>';
			   $build .= '<button class="btn btn-primary preview-post btn-xs">Preview</button>';
			   $build .= '<textarea class="form-control" rows="4">'.$content.'</textarea>';

			   // $build .= '<!-- Rounded switch -->
						// <label class="switch">
						//   <input class="get-mp3-dltype-switch" type="checkbox">
						//   <div class="slider round"></div>
						// </label>';
			   $build .= '</section>';
			}
		echo $build;
}

function displaySites($feeds) {
		$res = '';
		foreach ($feeds as $key => $value) {
			$res .= '<p><a class="rss-feed-site" data-site="'.$value.'">'.$value.'</a></p>';
		}
		echo $res;	
}







?>
<div class="rss-container container container-padded-large" id="tabs" style="width:600px;">      
	<h2>RSS</h2>         
	<a target="_blank" href="http://freelabel.net/view/dashboard/upload" class="btn btn-primary pull-right">Open Uploader</a>
	<a target="_blank" href="http://freelabel.net/view/backend/rainlab/blog/posts/create" class="btn btn-primary pull-right">Open Magazine Editor</a>
	<div id="tabs-1">
 	<?php //echo $build;
	 	if (!isset($_GET['site'])) {
			displaySites($feeds);
			echo 'show only pages?';
		} else {
			displaySiteFeed($_GET['site']);
			echo 'display sites feeds?';
		}
 	?>
	</div>
</div>

<script type="text/javascript">
	$(function() {



		$('.preview-post').click(function(){
			var data = $(this).parent().find('.rss-content')
			console.log(data);
			data.toggle();
		});

		/* DOWNLOAD FILE CONTENTS */
		$('.get-mp3-trigger').click(function(){
			var val = $(this).siblings()[1];
			var data = val.querySelector("iframe");
			// $('#postModal').modal('show');
			// $('#postModal .modal-body').html('<textarea class="form-control" rows="20">' + val.innerHTML + '</textarea>');
		    openDownloadApi(data.getAttribute('src'));
		});

		/* CHANGE DL TYPE */
		$('.get-mp3-dltype-switch').change(function(e){
			console.log($(this).get(0).checked);
		});

		/* SEARCH POST */
		$('.search-rss-trigger').click(function(){
			$(this).parent().css('border-bottom','green solid 3px');
			var title = $(this).attr('data-title');
			var url = 'https://twitter.com/search?q=' + encodeURI(title)  + '&vertical=default&f=images';
			window.open(url);
		});


		/* OPEN SITE */
		$('.rss-feed-site').click(function(e){
			e.preventDefault();
			var site = $(this).attr('data-site');
			var wrap = $('.widget-container');
			wrap.html('please wait..');
			$.get('http://freelabel.net/lvtr/views/rss.php', {site:site}, function(results){
				wrap.html(results);
			});
		});

	});
</script>