const hintItemsHtml = async (value) => {
	let listItemsHtml = '';

	await fetch('/search/get-hint', {
		method: 'POST',
		dataType: 'json',
		body: JSON.stringify({searchValue: value}),
		headers: {
			'Content-Type': 'application/json'
		}	
	})
	.then(respone => respone.json())
	.then(items => {
		if(items.length > 0) {
			items.forEach((item, index) => {
				if(index < 5) {
					const imgs = item.images.split(';');

					listItemsHtml += `
						<li class="py-2 border-bottom">
							<a href="/view/item/${item.id_product}">
								<div class="row">
									<div class="col col-md-2 text-center">
										<img src="/uploads/${imgs[0]}" alt="" width="60%" class="rounded-3">
									</div>
									<div class="col col-md-10">
										<h5 class="m-0 title">${item.name}</h5>
										<p class="m-0 price mt-1"><strong>${item.price}</strong></p>
									</div>
								</div>
							</a>
						</li>`;
				}
			})
		}
	});

	return listItemsHtml;
}

$(document).ready(function() {
	const searchInput = $('#search-input');
	const searchHintElement = $('.search-hint');
	const listHintElement = $('.search-hint > ul');

	// search upon change content input
	searchInput.on('keyup', async event => {
		const searchValue = event.target.value;

		if(searchValue.length > 0) {
			const html = await hintItemsHtml(searchValue);

			if(html.length > 0) {
				searchHintElement.prop('hidden', false);

				listHintElement.html(html);
			}
		}
		else {
			searchHintElement.prop('hidden', true);
		}
	})

	// focus input element
	searchInput.on('focus', async (event) => {
		const searchValue = event.target.value;

		if(searchValue.length > 0) {
			const html = await hintItemsHtml(searchValue);

			if(html.length > 0) {
				searchHintElement.prop('hidden', false);

				listHintElement.html(html);
			}
		}
		else {
			searchHintElement.prop('hidden', true);
		}
	})

	const htmlElement = $('html');

	// hidden list hint items when click html element
	htmlElement.on('click', () => {
		searchHintElement.prop('hidden', true);
	})

	const searchFormElement = searchInput.closest('form');

	// set exception for search form
	searchFormElement.on('click', (event) => {
		event.stopPropagation();
	})

	// prevent default submit form when input value length less than or equal 1 (enter)
	searchInput.on('keydown', (event) => {
		if(event.keyCode === 13 && searchInput.val().length <= 1) {
			event.preventDefault();
		}
	})

	// prevent default submit form when input value length less than or equal 1 (click)
	searchFormElement.on('submit', () => {
		if(searchInput.val().length <= 1) {
			event.preventDefault();
		}
	})
})