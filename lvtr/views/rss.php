<?php
// $feeds[] = 'http://www.elevatormag.com/feed/';
$feeds = array(/*'http://freelabelmagazine.wordpress.com/rss',
	'https://freelabelcontent.wordpress.com/feed/', */
  //'http://freelabelnet.tumblr.com/rss' ,
  // 'http://assets.complex.com/feeds/channels/all.xml?_ga=1.103967424.130544531.1429827317',
	'http://www.elevatormag.com/feed/',
  // 'http://freelabelnet.tumblr.com/rss',
	// 'http://www.dirty-glove.com/feed/',
 //    // 'http://freelabelnet.tumblr.com/rss',
 //    // 'http://tooheavyx.tumblr.com/rss',
	// 'http://trapsntrunks.com/feed/',
	// 'http://www.saycheesetv.com/feed/',
 //    // 'http://www.gullysteez.com/rss',
	// 'http://www.trapnstuff.com/feed/',
	// 'http://www.dancingastronaut.com/feed/',
	// 'http://www.hiphopsmission.com/feed/',
	// 'http://feeds.feedburner.com/256up?format=xml',
	// 'http://hiphopsince1987.com/feed/',
	// 'http://www.viewhiphop.com/category/new-music/feed/',
	// 'http://www.highsnobiety.com/feed/',
	// 'http://feeds.feedblitz.com/Gizmag',
	// 'http://www.vibe.com/feed/',
	'http://thedailyloud.com/feed/'
);
foreach ($feeds as $feed) {
	$rss = simplexml_load_file($feed);
	$build .= '<h3>'. $rss->channel->title . '</h3>';
	foreach ($rss->channel->item as $item) {
	    $build .= '<section>';
	    $build .= '<h4><a href="http://twitter.com/search?='. urlencode($item->title).'" target="_blank">'.$item->title."</a></h4>";
		$content = $item->children("content", true);
		$content = str_replace("'", "\"", $content);
		if ($content == '') {
			$content = $item->description;
		}
	   // $build .= '<textarea class="rss-content form-control" rows="4">'.$content.'</textarea>';
	   $build .= '<div class="rss-content form-control" style="display:none;" rows="4">'.$content.'</div>';
	   $build .= '<button class="get-mp3-trigger btn btn-primary btn-xs">Get MP3</button>';
	   $build .= '<button class="search-rss-trigger btn btn-primary btn-xs" data-title="'.$item->title.'">Search</button>';
	   // $build .= '<!-- Rounded switch -->
				// <label class="switch">
				//   <input class="get-mp3-dltype-switch" type="checkbox">
				//   <div class="slider round"></div>
				// </label>';
	   $build .= '</section>';
	}
}
?>
<div class="rss-container container" id="tabs" style="width:600px;">      
	<h2>RSS</h2>         
	<a target="_blank" href="<?php $site->url; ?>?ctrl=upload" class="btn btn-primary pull-right">Open Uploader</a>
	<div id="tabs-1">
 	<?php echo $build; ?>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$('.get-mp3-trigger').click(function(){
			var val = $(this).siblings()[1];
			var data = val.querySelector("iframe");
		    openDownloadApi(data.getAttribute('src'));
		});
		$('.get-mp3-dltype-switch').change(function(e){
			console.log($(this).get(0).checked);
		});
		$('.search-rss-trigger').click(function(){
			$(this).parent().css('border-bottom','green solid 3px');
			var title = $(this).attr('data-title');
			var url = 'https://twitter.com/search?q=' + encodeURI(title)  + '&vertical=default&f=images';
			window.open(url);
		});
	});
</script>