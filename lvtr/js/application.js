    // get current tab
    var urlVars = getUrlVars();
    var currentTab = urlVars.ctrl;
    var currentInx = getInx(currentTab);
    var loadData = getPageData(currentTab);

    addtionalDetails = '<textarea name="description" type="text" class="form-control" rows="3" placeholder="Enter Description.."></textarea>\
    <textarea name="description" type="text" class="form-control" rows="3" placeholder="Enter Description.."></textarea>';

    function getUrlVars() {
      var vars = {};
      var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
      vars[key] = value;
      });
      return vars;
    }

    function loginUser(siteUrl, elem) {
      elem.find('button').addClass('disabled')
      results = $('.login-results');
      var data = elem.serialize();
      var url = siteUrl + 'config/login.php';
      $.post(url , data, function(result){
        results.addClass('label');
        results.addClass('label-warning');
        results.html(result);
      });
    }

    function registerUser(siteUrl, elem) {
      elem.find('button').addClass('disabled')
      results = $('.login-results');
      var data = elem.serialize();
      var url = siteUrl + 'config/register.php';
      console.log(data);
      $.post(url , data, function(result){
        results.addClass('label');
        results.addClass('label-warning');
        results.html(result);
        // alert(result);
      });
    }

    function getInx(currentTab){
        switch (currentTab) {
          case 'feed':
              currentInx = 0;
              break;
          case 'analytics':
              currentInx = 1;
              break;
          case 'promos':
              currentInx = 2;
              break;
          case 'audio':
              currentInx = 3;
              break;
          case 'events':
              currentInx = 4;
              break;
          default:
              currentInx = null;
              break;

      }
      return currentInx;
    }

    function loadPage(tabName) {
      var elem = $('.data-container');
      // loading
        elem.html('Loading..');
        // $('title').html(capitalizeFirstLetter(tabName));
        console.log("Loading " + tabName);
        var url = 'http://freelabel.net/lvtr/views/' + tabName + '.php' ;
        
        var stateObj = { foo: "bar" };
        history.pushState(stateObj, "page 2", '?ctrl='+tabName.toLowerCase());

        $.get(url, function(data){
            $(elem).html(data);
            addTracking('.play_button');
          });
    }

    function capitalizeFirstLetter(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    }

     function getPageData(tabName) {
      if (tabName==undefined || tabName=='session') {
        loadPage('home');
        return;
      }
      loadPage(tabName);
    }
    function openPage(elem, currentPage, siteUrl){
      var d = elem.text();
      var url = siteUrl + 'views/' + d.toLowerCase() + '.php';
      if (currentPage === "/lvtr/") {
        // console.log('success');
        $('title').html(capitalizeFirstLetter(d));
      } else {
        // console.log('its not going to work :(');
        window.location.assign(siteUrl + '?ctrl='+d.toLowerCase());
        return;
      }


      var wrapper = $('.data-container');
      // please wait
      wrapper.html('Loading..');
      // sets the history
      var stateObj = { foo: "bar" };
      history.pushState(stateObj, "page 2", '?ctrl='+d.toLowerCase());

      $.post(url, function(result) {
        wrapper.html(result);
      });
      // alert(url);
    }


    function openWidget(elem, siteURL){
      var d = elem.text();
      var url = siteURL + 'views/' + d.toLowerCase() + '.php';
      var wrapper = $('.widget-container');
      // please wait
      wrapper.html('Loading..');
      // sets the history
        var stateObj = { foo: "bar" };
      history.pushState(stateObj, "page 2", '?ctrl='+d.toLowerCase());
      // load and insert page
      $.post(url, function(result){
        wrapper.html(result);
      });
    }


    function openDownloadApi(src) {
      if (src.includes('w.soundcloud.com/player') || src.includes('soundcloud.com')) {
        newsrc = src.replace('https://w.soundcloud.com/player/?visual=true&url=', '');
        newsrc = src.replace('https://w.soundcloud.com/player/?url=', '');
        var url = 'http://anything2mp3.com?url=' + decodeURI(newsrc);
      } else if (src.includes('youtu')) {
        var url = 'http://keepvid.com?url=' + encodeURI(src);
      } else {
        alert('this is not a valid url!: ' + src );
        return;
      }
      window.open(url);
    }


    function addTracking(elem) {
      var links = $(elem);
      console.log(links);
      $.each(links,function(index, value){
        value.setAttribute('onclick','trackOutboundLink("' + value.innerHTML.replace(/"/g, '&quot;') + '")');
      });
    }

    var trackOutboundLink = function (url) {
        ga('send', 'event', 'outbound', 'click', url, {
            'transport': 'beacon',
            'hitCallback': function () { console.log('Google Analytics Tracking: ' + url) }
        });
    }



	/* --------------- END OF FUNCTIONS --------------- */