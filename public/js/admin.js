// get search result
const searchResult = async (value) => {
	let result = [];

	await fetch('/search/get-hint', {
		method: 'POST',
		dataType: 'json',
		body: JSON.stringify({searchValue: value}),
		headers: {
			'Content-Type': 'application/json'
		}	
	})
	.then(respone => respone.json())
	.then(data => {
		if(data.length > 0) {
			result = data;
		}
	});

	return result;
}

// create result html from items
const searchResultHtml = (items) => {
	let resultHtml = '';

	items.forEach((item, index) => {
		if(index <= 4) {
			const images = item.images.split(';');
			let typeName = '';
			switch(item.type) {
				case 1: 
					typeName = 'Túi du lịch';
					break;
				case 2: 
					typeName = 'Balo thời trang nam, nữ';
					break;
				case 3: 
					typeName = 'Túi chống sốc laptop';
					break;
				case 4: 
					typeName = 'Balo Laptop';
					break;
			};

			resultHtml += `
			<tr>
				<td scope="col" class="text-center">${index + 1}</td>
				<td scope="col" class="text-center">
					<img src="/uploads/${images[0]}" width="120px" alt="">
				</td>
				<td scope="col">${item.name}</td>
				<td scope="col" class="text-center">${typeName}</td>
				<td scope="col" class="text-center">${item.price}</td>
				<td scope="col" class="text-center vertical-center">
					<div class="p-2">
						<a href="/admin/product/view/${item.id_product}" class="btn btn-info">
							<i class="fa-solid fa-circle-info"></i>
							<span>Xem chi tiết</span>
						</a>
					</div>
					<div class="p-2">
						<a href="/admin/product/edit/${item.id_product}" class="btn btn-warning">
							<i class="fa-solid fa-pen"></i>
							<span>Sửa</span>
						</a>
						<a href="/admin/product/delete/${item.id_product}" class="btn btn-danger ms-2">
							<i class="fa-regular fa-trash-can"></i>
							<span>Xóa</span>
						</a>
					</div>
				</td>
			</tr>`;
		}
	})

	return resultHtml;
}

$(document).ready(function() {
	
	// active navbar link
	const navbarLinkElement = $('#admin-home .navbar-nav .nav-link');

	navbarLinkElement.each((index, element) => {
		if(window.location.href.includes($(element).prop('href'))) {
			$(element).addClass('active-navbar-status');
		}
	});

	// show modal confirm delete product
	const inputConfirmDelete = $('#confirm-delete');
	const idDelete = parseInt(inputConfirmDelete.val());
	if(idDelete) {
		const confirmDeleteBtn = $('[data-bs-target="#delete-item"]');
		confirmDeleteBtn.trigger('click');
	}

	// customize filter filter products url
	const filterProductsFormSubmitBtn = $('#filter-products-form button');

	filterProductsFormSubmitBtn.on('click', (event) => {
		event.preventDefault();

		const selectElements = $('#filter-products-form select[name]');
		let arrQueryUrl = [];

		selectElements.each((index, selectElement) => {
			const selectedOptionElement = $(selectElement).children('option:selected');

			if(selectedOptionElement.val() !== 'none') {
				arrQueryUrl.push(`${$(selectElement).prop('name')}=${selectedOptionElement.val()}`);
			}
		});

		if(arrQueryUrl.length > 0) {
			const queryUrl = arrQueryUrl.join('&');
			const currentPathname = window.location.pathname;

			if(currentPathname.includes('/admin/product/search')) {
				const currentUrl = window.location.href;
				const urlObj = new URL(currentUrl);
				const searchKey = urlObj.searchParams.get('key');

				const navigateUrl = `/admin/product/search?key=${searchKey}&${queryUrl}`;
				window.location.assign(navigateUrl);
			}
			else {
				const navigateUrl = `/admin/product/filter?${queryUrl}`;
				window.location.assign(navigateUrl);
			}
		}
	})

	// customize filter filter invoices url
	const filterInvoicesFormSubmitBtn = $('#filter-invoices-form button');

	filterInvoicesFormSubmitBtn.on('click', (event) => {
		event.preventDefault();

		const selectElements = $('#filter-invoices-form select[name]');
		let arrQueryUrl = [];

		selectElements.each((index, selectElement) => {
			const selectedOptionElement = $(selectElement).children('option:selected');

			if(selectedOptionElement.val() !== 'none') {
				arrQueryUrl.push(`${$(selectElement).prop('name')}=${selectedOptionElement.val()}`);
			}
		});

		if(arrQueryUrl.length > 0) {
			const queryUrl = arrQueryUrl.join('&');

			const filterUrl = `/admin/invoice/filter?${queryUrl}`;
			window.location.href = filterUrl;
		}
	})

	// handle search appropriate items while admin key  up into search bar
	const adminSearchForm = $('#admin-search-form');
	const adminSearchFormBtn = adminSearchForm.children('button[type]');
	const adminSearchFormInput = adminSearchForm.children('input[type]');

	adminSearchFormInput.on('keyup', async (event) => {
		const searchValue = event.target.value;

		if(searchValue.length > 0) {
			const searchedItems = await searchResult(searchValue);

			let html = searchResultHtml(searchedItems);
			const tableProductsBody = $('.table-product > tbody');

			tableProductsBody.html(html);
		}
	})

	// handle form's behavior when admin press enter
	adminSearchForm.on('keypress', (event) => {		
		if(event.keyCode === 13) {
			if(adminSearchFormInput.val().length > 0) {
				adminSearchForm.submit();
			}
			else {
				event.preventDefault();
			}
		}
	})

	// handle form's behavior when admin click submit button
	adminSearchFormBtn.on('click', (event) => {
		event.preventDefault();

		if(adminSearchFormInput.val().length > 0) {
			adminSearchForm.submit();
		}
	})
})