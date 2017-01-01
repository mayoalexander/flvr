
function checkIfPlaying(status) {
	// console.log(status);
	if (status===true) {
		// alert('playing next song!!!');
	} else {
		// console.log(status);
	}
}

function toHHMMSS(time) {
    var sec_num = parseInt(time, 10); // don't forget the second param
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    // if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return minutes+':'+seconds;
}


function updateViewCallback(wrap, result) {
	wrap.prepend('<div class="alert alert-success" style="position:absolute;"><strong>Success!</strong> ' + result + '</div>');
	setTimeout(function() {
		wrap.hide('fast');
	},3000);
	
}

function updateButtonCallback(wrap, button, result) {

	button.text(result);
	wrap.hide('fast');
	
	// setTimeout(function(){
	// 	wrap.hide('fast');
	// },500);
	// elem.prepend(result);
	
}


function showNotification(result) {
	console.log(result);	
}


function likePost(post_id,user_name) {
	var url = 'http://freelabel.net/lvtr/config/like.php';
	$.post(url, {post_id:post_id, user_name:user_name} , function(result) {
		showNotification(result);
	});
}

function logSom(query_number) {
	var url = 'http://freelabel.net/lvtr/config/update.php';
	var data = {  };
	$.post(url,{query_number:query_number, action:'log_som'}, function(result){
		console.log(result);
	});
}


function savePlay(post_id,user_name) {
	var url = 'http://freelabel.net/lvtr/config/update.php';
	$.post(url, {post_id:post_id, user_name:user_name, action:'save_play'} , function(result) {
		showNotification(result);
	});
}


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
	var tracks = [];
	$.each($('.play_button'),function(index,value){
		tracks[index] =  {
			title: value.getAttribute('data-twitter') + ' - ' + value.getAttribute('data-title'),
			file: value.getAttribute('data-mp3')
		}
	});

	var FLPlayer = {};
	FLPlayer.started = true;
	FLPlayer.current = {
		filetype : activeMp3Type,
		title : activeMp3Text
	}
	FLPlayer.playlist = tracks;



	/* PLAY VIDEO */
	if (FLPlayer.current.filetype=='video') {
		FLPlayer.playerType = FLPlayer.current.filetype;

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
			} else if (FLPlayer.current.filetype=='audio') { 
				FLPlayer.playerType = FLPlayer.current.filetype;

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

			$('.play-progress-bar').html('')

			setInterval(function(){
				if (FLPlayer.playerType=='video') {
					checkIfPlaying(globalVideoPlayer[0].paused)
				} else if (FLPlayer.playerType=='audio') {
					checkIfPlaying(globalAudioPlayer[0].paused);
				}
				var currentTime = globalAudioPlayer[0].currentTime;
				var totalTime = globalAudioPlayer[0].duration;
				var percentComplete =  (currentTime / totalTime * 100) + '%';
				$('.currentTime').html(toHHMMSS(currentTime))
				$('.play-progress-bar').css('width', percentComplete)
				// console.log(percentComplete);

			}, 1000);
			// console.log(FLPlayer);
		}




		$('.play-radio').click(function(){
			var globalAudioPlayer = $('#global_audio_player');
			var globalVideoPlayer = $('#global_video_player');
			var audioPlayerText = $('#audio_player_text');

			audioPlayerText.html('<script src="https://public.radio.co/embed/s95fa8cba2/song.js"></script>');
			globalAudioPlayer[0].setAttribute('src','http://streaming.radio.co/s95fa8cba2/listen');
			globalAudioPlayer[0].play();
		});
















		$('.view-post-trigger').click(function(e){
			e.preventDefault();
			var url = $(this).parent().parent().parent().parent().find('a').attr('href');
			window.open(url);
		});

	// $('.tracklist-panel a').click(function(e){
		$('.edit-post-trigger').click(function(e){
			e.preventDefault();
			$('#postModal').modal('show');
		// $.get('views/widgets/view_post.php', {
			$.get('http://freelabel.net/lvtr/views/widgets/edit_post.php', {
				post_id: $(this).attr('data-id')
			}, function(result){
				$('#postWrapper').html(result);
			});
		});



	// $('.tracklist-panel a').click(function(e){
		$('.add-post-trigger ').click(function(e){
			e.preventDefault();
			$('#postModal').modal('show');
		// $.get('views/widgets/view_post.php', {
			$.get('http://freelabel.net/lvtr/views/widgets/add_to_categories.php', {
				post_id: $(this).attr('data-id'),
				user_name: $(this).attr('data-user')
			}, function(result){
				$('#postWrapper').html(result);
			});
		});



		$('.delete-post-trigger').click(function(e){
			e.preventDefault();
			var data = $(this);
			var post_id = $(this).attr('data-id');
		// hide wrap
		wrap = $(this).parent().parent().parent().parent();
		wrap.hide('fast');
		$.post('http://freelabel.net/lvtr/config/update.php', {
			action: 'delete',
			post_id: post_id
		}, function(result){
			// alert(result);
		});
		// alert();
	});



		$('.delete-categories-trigger').click(function(e){
			e.preventDefault();
			var data = $(this);
			var category_id = $(this).attr('data-id');
			wrap = $(this).parent();
			$.post('http://freelabel.net/lvtr/config/update.php', {
				action: 'delete_category',
				category_id: category_id
			}, function(result){
				updateViewCallback(wrap, result);
			});
		});


		$('.tracklist-panel a').click(function(e){
			e.preventDefault();
		// var data = $(this).find('.play_button');
		// audioPlayer(data);
	});

		$(".play_button").click(function(e) {
			e.preventDefault();
			var post_id = $(this).attr('data-id');
			var user_name = 'admin';
			savePlay(post_id, user_name);
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
			var msg = '[FL] ' + post_twitter + ': \n\n' + post_title + '\n\n' + short_url;
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


		$('.share-page-trigger').click(function(e){
			e.preventDefault();
			var data = $(this);
			var post_id = $(this).attr('data-id');
			var post_title = $(this).attr('data-title');
			var post_twitter = $(this).attr('data-twitter');
			// var post_url = 'http://freelabel.net/lvtr/views/public.php?post_id=' + post_id;
			console.log(window.location);
			var post_url = window.location.origin + window.location.pathname;
			console.log(post_url);
			var short_url = post_url.replace('http://', '');
			var msg = '[FL] ' + post_twitter + ': \n\n' + post_title + '\n\n' + short_url;
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

		$('.share-mag-trigger').click(function(e){
			e.preventDefault();
			var data = $(this);
			var post_id = $(this).attr('data-id');
			var post_title = $(this).attr('data-title');
			var post_twitter = $(this).attr('data-twitter');
			// var post_url = 'http://freelabel.net/lvtr/views/public.php?post_id=' + post_id;
			console.log(window.location);
			var post_url = window.location.origin + window.location.pathname;
			console.log(post_url);
			var short_url = post_url.replace('http://', '');
			var msg = '[FL] ' + post_title + '\n\n' + short_url;
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
			likePost(post_id, user_name);
		});




		$('.view-details').click(function(e){
			var elem = $(this);
			var data = { user_name: elem.attr('data-user') }
			var modal = $('#postModal').modal('show');
			var url = 'http://freelabel.net/lvtr/views/admin/manage-user.php';
			var wrap = $('#postModal .modal-body');
			$.get(url,data,function(result){
				wrap.html(result);
			});
		});





		$('.manage-user-trigger').click(function(e){
			var elem = $(this);
			var data = elem.text();
			alert(data);;
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





		$('.add-to-category-form').submit(function(e){
			var url = 'http://freelabel.net/lvtr/config/update.php';

			e.preventDefault();
			var form = $(this);
			var data = form.serialize();

			form.hide();
			$.post(url, data ,function(result){
				alert(result);
			})
		});


		$('.pricing_button').click(function() {
			var type = $(this).attr('data-type');
			$('#user_type')[0].value = type;
			console.log($('#user_type')[0].value);
			console.log('set to : ' + type + ' and its ' + $('#user_type')[0].value);
		});
		$('#user_name').keyup(function(e){
			if(e.keyCode == 32){
				str = $(this)[0].value.replace(/\s+/g, '');
				$(this)[0].value = str;
			}
		});
		$('.form-signin').submit(function(e) {
			e.preventDefault();
			var elem = $(this);
			registerUser('http://freelabel.net/lvtr/', $(this));
		});



		$('.add-to-category-form').submit(function(e){
			var url = 'http://freelabel.net/lvtr/config/update.php';

			e.preventDefault();
			var form = $(this);
			var data = form.serialize();
			alert(data);

			form.hide();
			$.post(url, data ,function(result){
				alert(result);
			})
		});



		$('.add-new-post').click(function() {
			var modal = $('#postModal');
			var body = $('#postModal .modal-body');
			modal.modal('show');
			var url = 'http://freelabel.net/lvtr/views/widgets/add_new_post.php';
			$.get(url, function(result){
				body.html(result);
			});
		});



		$('.add-to-leads-button').click(function(e) {
			e.preventDefault();
			var lead_username = $(this).attr('data-user');
			var wrap = $(this).parent().parent().parent();
			var button = $(this);
			var lead_name = $(this).parent().parent().parent().find('blockquote').text();
			var data = {
				lead_twitter:lead_username,
				lead_name:lead_name,
				action:'add_to_leads'
			}
			var url = 'http://freelabel.net/lvtr/config/update.php';
			$.post(url, data, function(result){
				updateButtonCallback(wrap, button, result)
			});
		});

		$('.som-button').click(function(e){
			e.preventDefault();
			$(this).removeClass('som-button');
			$(this).removeClass('btn-primary');
			$(this).addClass('btn-success');
			$(this).addClass('active');
			logSom($(this).text());
			var path = $(this).attr('href');
			$.get(path,function(results){
				$('.som-results-container').html(results);
			});
		});



		$('.email-client').click(function(e){
			e.preventDefault();
			alert('emaling clients');
		});



		$('.call-us-button').click(function(e) {
			e.preventDefault();
			var lead_username = $(this).attr('data-user');
			var url = encodeURI('http://freelabel.net/som/index.php?post=1&text=d @' + lead_username + ' call us asap 347-994-0267');
			window.open(url);
		});



		// /* WIDGET NAV */
		// $('.widget-navigation a').click(function(e){
		//     $('.widget-navigation a').parent().removeClass('active');
		//     $(this).parent().addClass('active');
		//     e.preventDefault();
		//     openWidget($(this), 'http://freelabel.net/lvtr/');
		// });



		$('.account-type-panel').click(function(){
			$('.account-type-panel .panel').removeClass('active');
			var packageWrap = $(this).find('.panel');
			var url = "http://freelabel.net/confirm/" + packageWrap.attr('data-package');
			var payPalButton = $('.pay-with-paypal');
			console.log(payPalButton);
			packageWrap.addClass('active');
			payPalButton.removeClass('disabled');
			payPalButton.attr('href', url);
			$('#user_type').val(packageWrap.attr('data-package'));
		});


		$('.pay-with-paypal').click(function(e){
			e.preventDefault();
			// save profile via ajax
			var form = $(this).parent().parent().parent();
			var data = form.serialize();
			var action = $(this).parent().parent().attr('action');
			registerUser('http://freelabel.net/lvtr/', form);
			// console.log(form);
			// console.log(data);

			// $.post(url , data, function(result){
			// 	results.addClass('label');
			// 	results.addClass('label-warning');
			// 	results.html(result);
			// 	// alert(result);
			// });

			// return;
			// window.location.assign($(this).attr('href'));

		});
		// $('.registration-form-ajax input').keyup(function(){
		// 	$(this).addClass('form-validation-success');
		// 	console.log('input has changed!');
		// });



