$(document).ready(function() {
	
	// active navbar link
	const navbarLinkElement = $('#admin-home .navbar-nav .nav-link');

	navbarLinkElement.each((index, element) => {
		if(window.location.href.includes($(element).prop('href'))) {
			$(element).addClass('active-status');
		}
	});

	// show modal confirm delete product
	const inputConfirmDelete = $('#confirm-delete');
	const idDelete = parseInt(inputConfirmDelete.val());
	if(idDelete) {
		const confirmDeleteBtn = $('[data-bs-target="#delete-item"]');
		confirmDeleteBtn.trigger('click');
	}
})