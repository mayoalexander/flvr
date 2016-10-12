	function audioPlayer(elem) {
			currentState = elem.html();
			playButtonElem = '<i class="fa fa-play"></i>';
			pauseButtonElem = '<i class="fa fa-pause"></i>';
			var globalAudioPlayer = $('#global_audio_player');
			var globalVideoPlayer = $('#global_video_player');
			var audioPlayerText = $('#audio_player_text');
			var audioPlayerToolbar = $('.audio-player-toolbar');
			var activeMp3 = elem.attr('data-mp3');
			var activeMp3Type = elem.attr('data-type');
			var activeMp3Text = elem.attr('data-twitter') + ' - ' + elem.attr('data-title');
			
			/* PLAY VIDEO */
			if (activeMp3Type=='video') {
				// preloadMetaData()
				$('.play_button').html(playButtonElem); //reset all buttons
				elem.html(pauseButtonElem);
				// alert($('.play_button'));
				audioPlayerText.text(activeMp3Text);
				globalVideoPlayer.attr('src', activeMp3);
				globalAudioPlayer[0].pause();


				// displayAudioPlayer()
				audioPlayerToolbar.fadeIn('slow');

				// openModal()
				$('#postModal').modal('show');
				$('#postWrapper').html('<video autoplay=1 loop=1 src="' + activeMp3 + '"/ class="video_player" id="global_video_player" controls>');

			/* PLAY AUDIO */
			} else if (activeMp3Type=='audio') { 

				// preloadMetaData()
				audioPlayerText.text(activeMp3Text);
				globalAudioPlayer.attr('src', activeMp3);
				if (globalVideoPlayer[0]) {
					globalVideoPlayer[0].pause()
				}

				// displayAudioPlayer()
				audioPlayerToolbar.fadeIn('slow');

				// updateButton()
				if (currentState==playButtonElem) { // play audio
					$('.play_button').html(playButtonElem); //reset all buttons
					elem.html(pauseButtonElem);
					globalAudioPlayer[0].play();
				} else if (currentState==pauseButtonElem) { // pause audio
					elem.html(playButtonElem);
					globalAudioPlayer[0].pause();
				}

			}
	}

	$('.view-post-trigger').click(function(e){
		e.preventDefault();
		window.open($(this).parent().parent().parent().parent().attr('href'));
	});

	// $('.tracklist-panel a').click(function(e){
	$('.edit-post-trigger').click(function(e){
		e.preventDefault();
		$('#postModal').modal('show');
		// $.get('views/widgets/view_post.php', {
		$.get('views/widgets/edit_post.php', {
			post_id: $(this).attr('data-id')
		}, function(result){
			$('#postWrapper').html(result);
		});
	});
	

	$('.delete-post-trigger').click(function(e){
		e.preventDefault();
		var data = $(this);
		var post_id = $(this).attr('data-id');
		// hide wrap
		wrap = $(this).parent().parent().parent().parent().parent();
		wrap.hide('fast');
		$.post('config/update.php', {
			action: 'delete',
			post_id: post_id
		}, function(result){
			// alert(result);
		});
		// alert();
	});

	$('.tracklist-panel a').click(function(e){
		e.preventDefault();
		// var data = $(this).find('.play_button');
		// audioPlayer(data);
	});

	$(".play_button").click(function(e) {
		e.preventDefault();
		audioPlayer($(this));
	});	

	$('.controls a').click(function(e){
		// e.preventDefault();
		var elem = $(this);
		var ctrl = elem.attr('data-ctrl')
		if (ctrl=='expand') {
			$('#postModal').modal('show');
		} else if (ctrl=='play') {
			// var currentState = elem.html();
			// playButtonElem = '<i class="fa fa-play"></i>';
			// pauseButtonElem = '<i class="fa fa-pause"></i>';
			// var globalAudioPlayer = $('#global_audio_player');
			// var globalVideoPlayer = $('#global_video_player');
			// var audioPlayerText = $('#audio_player_text');
			// var audioPlayerToolbar = $('.audio-player-toolbar');

			// // updateButton()
			// if (currentState==playButtonElem) { // play audio
			// 	$('.play_button').html(playButtonElem); //reset all buttons
			// 	elem.html(pauseButtonElem);
			// 	globalAudioPlayer[0].play();
			// } else if (currentState==pauseButtonElem) { // pause audio
			// 	$('.play_button').html(playButtonElem); //reset all buttons
			// 	elem.html(playButtonElem);
			// 	globalAudioPlayer[0].pause();
			// }
		}
		
	});




	$('.share-post-trigger').click(function(e){
		e.preventDefault();
		var data = $(this);
		var post_id = $(this).attr('data-id');
		var post_title = $(this).attr('data-title');
		var post_twitter = $(this).attr('data-twitter');
		// var post_url = 'http://freelabel.net/lvtr/views/public.php?post_id=' + post_id;
		var post_url = 'http://freelabel.net/' + post_twitter + '/id/' + post_id;
		var short_url = post_url.replace('http://', '');
		var msg = '[FLMAG] ' + post_twitter + ': \n\n' + post_title + '\n\n' + short_url;
		var twitter_url = 'https://twitter.com/intent/tweet?text=' + encodeURI(msg);
		var facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' + post_url;
		var method = data.attr('data-method');
		if (method == 'twitter') {
			window.open(twitter_url);
		} else if (method == 'facebook') {
			window.open(facebook_url);
		} else {
			alert('Yeah something went wrong here');
		}
	});




	$('.like-post-trigger').click(function(e){
		e.preventDefault();
		var data = $(this);
		var post_id = $(this).attr('data-id');
		var user_name = $(this).attr('data-user');
		var url = 'http://freelabel.net/lvtr/config/like.php';
		$.post(url, {post_id:post_id, user_name:user_name} , function(result) {
			console.log(result);
			alert(result);
		});
	});







	$('.load_more_button').click(function(){
		wrap = $(this).parent();
		wrap.html('loading');
		elem = $(this);
		nextPage = elem.attr('data-next');
		user_name = elem.attr('data-user');
		url = 'http://freelabel.net/lvtr/views/feed.php';
		$.post(url, {page:nextPage, user_name:user_name}, function(result){
			wrap.html(result);
		});
	});