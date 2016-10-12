function startTour(currentPage) {
	var steps = getSteps(currentPage);

	var tour = new Tour({
		storage:false,
		steps: steps
	});
	console.log(tour);

	// Initialize the tour
	tour.init();

	// Start the tour
	tour.start();
}


function getSteps(currentPage) {
	var dashboardUrl = 'http://freelabel.net/lvtr/?ctrl=dashboard';
	var uploadUrl = 'http://freelabel.net/lvtr/?ctrl=upload';
	if (currentPage == dashboardUrl) {
		var steps = [
			{
				backdrop: true,
				backdropContainer: '.data-container',
			    orphan:true,
			    title: "Title of my step",
			    content: "Content of my step"
			},
			{
				element: ".toolbar",
				placement: 'bottom',
				backdrop: true,
				backdropContainer: '.data-container',
				title: "Title of my step",
				content: "Content of my step"
			},
			{
				element: ".profile",
				placement: 'bottom',
				backdrop: true,
				backdropContainer: '.data-container',
				title: "Title of my step",
				content: "Content of my step"
			},
			{
				element: ".edit_profile_img_trigger",
				placement: 'bottom',
				backdrop: true,
				backdropContainer: '.data-container',
				title: "Title of my step",
				content: "Content of my step"
			},
			{
				element: ".tracklist",
				placement: 'bottom',
				backdrop: true,
				backdropContainer: '.data-container',
				title: "Title of my step",
				content: "Content of my step"
			},
			{
				element: "#search",
				placement: 'bottom',
				backdrop: true,
				backdropContainer: '.data-container',
				title: "Title of my step",
				content: "Content of my step"
			},
			{
				path:uploadUrl
			}

		]
	} else if (currentPage == uploadUrl) {
		var steps = [
			{
				element: ".toolbar",
				placement: 'bottom',
				backdrop: true,
				backdropContainer: '.data-container',
				title: "Title of my step",
				content: "Content of my step"
			},
			{
				element: ".upload-panel",
				placement: 'top',
				title: "Title of my step",
				content: "Content of my step"
			},
			{
				element: ".upload-trigger",
				placement: 'top',
				title: "Title of my step",
				content: "Content of my step"
			}

		]
	} else {
		console.log('Tour is not configured for this page: ' + currentPage);
		return;
	}
	return steps;
}


function offerTour(currentPage) {
	console.log(currentPage);
	startTour(currentPage);
}