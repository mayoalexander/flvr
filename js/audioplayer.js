
$(function() { 
  // Setup the player to autoplay the next track
  var a = audiojs.createAll({
    trackEnded: function() {
      var next = $('.audioplayer-list .tracklist-list-item.playing').next();
      if (!next.length) next = $('.audioplayer-list .tracklist-list-item').first();
      next.addClass('playing').siblings().removeClass('playing');
      audio.load($('a', next).attr('data-src'));
      audio.play();
    }
  });
  
  // Load in the first track
  var audio = a[0];
      first = $('.audioplayer-list a').attr('data-src');
  $('.audioplayer-list .tracklist-list-item').first().addClass('playing');
  audio.load(first);

  // Load in a track on click
  $('.audioplayer-list .tracklist-list-item').click(function(e) {
    e.preventDefault();
    $(this).addClass('playing').siblings().removeClass('playing');
    audio.load($('a', this).attr('data-src'));
    audio.play();
    $('.audio-player-toolbar').show('fast');
  });
  // Keyboard shortcuts
  $(document).keydown(function(e) {
    var unicode = e.charCode ? e.charCode : e.keyCode;
       // right arrow
    if (unicode == 39) {
      var next = $('.tracklist-list-item.playing').next();
      if (!next.length) next = $('.audioplayer-list .tracklist-list-item').first();
      next.click();
      // back arrow
    } else if (unicode == 37) {
      var prev = $('.tracklist-list-item.playing').prev();
      if (!prev.length) prev = $('.audioplayer-list .tracklist-list-item').last();
      prev.click();
      // spacebar
    } else if (unicode == 32) {
      audio.playPause();
    }
  })
});
