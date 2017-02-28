/* 
 *
 CORE FUNCTIONS 
 *
 */
function triggerDownload(options) {
    //console.log(options);
    window.location = options.urlOfDownloadContent;
}

function startDownload(options) {
    setTimeout(function() {
        triggerDownload(options);
    }, options.howLongToWait * 1000);
}

function disableDownload(options) {
    document.querySelector("#title").innerHTML = options.disabled.title;
    document.querySelector("#subtitle").innerHTML = options.disabled.subtitle;

}

function checkIfCompetitor(competitorEmails, email) {
    var isCompetitor = false;
    $.each(competitorEmails, function(index, competitor) {
        if (email.indexOf("@" + competitor) != -1) {
            isCompetitor = true;
        } else {
            // do nothing, let be false
        }
    });
    return isCompetitor;
}



function disableCompetitorDownloads(options) {
    /* INITIALIZE */
    if (checkIfCompetitor(options.competitorEmails, options.email)) {
        disableDownload(options);
    } else {
        startDownload(options);
    }
}
