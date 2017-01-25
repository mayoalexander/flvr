// After the API loads, call a function to enable the search box.
function handleAPILoaded() {
  $('#search-button').attr('disabled', false);
}

$('.youtube-search-form').submit(function(e){
        e.preventDefault();
        search();
});



// Search for a specified string.
function search() {
  var q = $('#query').val();
  var request = gapi.client.youtube.search.list({
    q: q,
    part: 'snippet'
  });

  request.execute(function(response) {
    var str = JSON.stringify(response.result);
    // $('#search-container').html('<pre>' + str + '</pre>');
    
    
    var videos = JSON.parse(str);
    var wrapper = $('#search-container');
    
    $.each(videos.items,function(index, video){
        console.log(video.id.videoId)
        var path = "http://freelabel.net/lvtr/views/youtube.php?q=" + video.id.videoId;
        // var path = "http://freelabel.net/view/tv/youtube/" + video.id.videoId + '?t=' + video.snippet.title;
        wrapper.append("<div class='col-md-4'><a href='"+ path + "'><img src='" + video.snippet.thumbnails.medium.url + "' class='img-responsive'></a><p>" + video.snippet.title + "<p></div>");
            // console.log(video.snippet.title)
    });
    
  });
}