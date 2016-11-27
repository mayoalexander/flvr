    // get current tab

    

    console.log(window.location.pathname);

    if (window.location.pathname=='/lvtr/') {

        siteUrl = 'http://freelabel.net/lvtr/';

    } else if (window.location.pathname=='/dev/') {

        siteUrl = 'http://freelabel.net/dev/';

    } else {

        siteUrl = 'nah';

    }

    console.log('site url: ' + siteUrl);

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

        var url = '../lvtr/views/' + tabName + '.php' ;

        $.get(url, function(data){

            $(elem).html(data);

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

      // if (src.includes("api.soundcloud")) {

        // var url = 'http://anything2mp3.com?url=' + encodeURI(src);

      // } else 

      if (src.includes('w.soundcloud.com/player') || src.includes('soundcloud.com')) {

        newsrc = src.replace('https://w.soundcloud.com/player/?visual=true&url=', '');

        newsrc = src.replace('https://w.soundcloud.com/player/?url=', '');

        var url = 'http://anything2mp3.com?url=' + decodeURI(newsrc);

      } else {

        var url = 'http://keepvid.com?url=' + encodeURI(src);

      }

      window.open(url);

    }















      var confirmOnPageExit = function (e) 

      {

          // If we haven't been passed the event get the window.event

          e = e || window.event;



          var message = 'Any text will block the navigation and display a prompt';



          // For IE6-8 and Firefox prior to version 4

          if (e) 

          {

              e.returnValue = message;

          }



          // For Chrome, Safari, IE8+ and Opera 12+

          return message;

      };







	/* --------------- END OF FUNCTIONS --------------- */