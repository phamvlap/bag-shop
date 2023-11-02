$(document).ready(function() {
	
	// active navbar link
	const navbarLinkElement = $('#admin-home .navbar-nav .nav-link');

	navbarLinkElement.each((index, element) => {
		if(window.location.href.includes($(element).prop('href'))) {
			$(element).addClass('active-status');
		}
	});

})