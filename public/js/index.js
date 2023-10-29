$(document).ready(async function() {
	// Highlight options in my account
	const userAccountOptions = $('#profile-user li > a');

	userAccountOptions.each((index, element) => {
		if($(element).prop('href') === window.location.href) {
			$(element).addClass('highlight-option');
		}
	});

	// handle cart
	await cart.run();

	// checkout view
	const preorderBtn = $('#preorder-btn');

	if(preorderBtn) {
		preorderBtn.on('click', (event) => {
			event.preventDefault();

			const isExistUser = $('[name="is-exist-user"]').val();
			console.log(isExistUser);
			if(isExistUser === 'not-found') {
				const requestLoginBtn = $('[data-bs-target="#request-login"]');
				requestLoginBtn.trigger('click');
			}
			else {
				const detailOrder = cart.getCartOrder();

				fetch('http://goodstore.localhost/checkout/view', {
					method: 'POST',
					dataType: 'json',
					body: JSON.stringify(detailOrder),	
					headers: {
						'Content-Type': 'application/json'
					}	
				})
				// .then(respone => respone.json())
				// .then(data => console.log(data));

				window.location.href = 'http://goodstore.localhost/checkout/view';
			}
		})
	}

	// checkout handle
	const checkoutBtn = $('#checkout-btn');

	if(checkoutBtn) {
		checkoutBtn.on('click', (event) => {
			event.preventDefault();

			const detailOrder = cart.getCartOrder();

			fetch('http://goodstore.localhost/checkout/order', {
				method: 'POST',
				dataType: 'json',
				body: JSON.stringify(detailOrder),	
				headers: {
					'Content-Type': 'application/json'
				}	
			})
			// .then(respone => respone.json())
			// .then(data => console.log(data));
		})
	}

	// register success account 
	const successRegister = $('#success-register');
	if(successRegister.val() === 'success') {
		console.log('check');
		await setTimeout(() => {
			window.location.href = 'http://goodstore.localhost/user/signin';
		}, 600);
	}

	// check user is exist
	const isExistUser = $('[name="is-exist-user"]').val();
	if(isExistUser === 'not-found') {
		const preorderBtn = $('#preorder-btn');
		preorderBtn.on('click', () => {
			const requestLoginBtn = $('[data-bs-target="#request-login"]');
			requestLoginBtn.trigger('click');
		})
	}

	// close alert button when update profile user
	const closeAlertBtn = $('.alert .btn-close');
	if(closeAlertBtn.length > 0) {
		setTimeout(() => {
			closeAlertBtn.trigger('click');
		}, 1000);
	}

	// insert image upon upload image files
	const inputFilesElement = $('input[type="file"]');
	const demoImgsElement = $('input[type="file"] + .demo-imgs');

	inputFilesElement.on('change', event => {
		const fileObject = event.target.files;

		let imgs = '';
		const files = Object.keys(fileObject).map(key => fileObject[key]);

		files.forEach(file => {
			let fileUrl = URL.createObjectURL(file);
			imgs += `
					<div class="col col-md-2 mt-2">
						<img src="${fileUrl}" width="100%" alt="">
					</div>`;
		})

		demoImgsElement.html(imgs);
	})

	// show modal confirm delete product
	const inputConfirmDelete = $('#confirm-delete');
	const idDelete = parseInt(inputConfirmDelete.val());
	if(idDelete) {
		const confirmDeleteBtn = $('[data-bs-target="#delete-item"]');
		confirmDeleteBtn.trigger('click');
	}
})