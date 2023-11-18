$(document).ready(async function() {
	// Highlight options in my account
	const userAccountOptions = $('.history-order-sidebar li > a');

	userAccountOptions.each((index, element) => {
		if(window.location.href.includes($(element).prop('href'))) {
			$(element).addClass('highlight-option');
		}
	});

	// handle cart
	await cart.run();

	// checkout view
	const preorderBtn = $('#preorder-btn');

	if(preorderBtn) {
		preorderBtn.on('click', async (event) => {
			event.preventDefault();

			const detailOrder = cart.getCartOrder();

			if(detailOrder.items.length > 0) {
				const isExistUser = $('[name="is-exist-user"]').val();
			
				if(isExistUser === 'not-found') {
					const requestLoginBtn = $('[data-bs-target="#request-login"]');
					requestLoginBtn.trigger('click');
				}
				else {
					fetch('/checkout/view', {
						method: 'POST',
						dataType: 'json',
						body: JSON.stringify(detailOrder),	
						headers: {
							'Content-Type': 'application/json'
						}	
					})

					window.location.href = '/checkout/view';
				}
			}
			else {
				const cartHeadingElement = $('.cart > .cart-heading');
				const alertHtml = `<div class="row">
				<div class="alert alert-danger d-flex align-items-center mt-3 mb-0 col col-md-4 offset-md-4 justify-content-center" role="alert">
				        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
				        <div>Bạn chưa chọn sản phẩm nào!</div>
				    </div>
				</div>`;

				const alertElement = $('<div></div>');
				alertElement.html(alertHtml);

				alertElement.insertAfter(cartHeadingElement);

				await setTimeout(() => {
					alertElement.prop('hidden', true)
				}, 1400);
			}
			
		})
	}

	// checkout handler
	const checkoutBtn = $('#checkout-btn');

	if(checkoutBtn) {
		checkoutBtn.on('click', (event) => {
			event.preventDefault();

			const detailOrder = cart.getCartOrder();
			const methodPaymentOpt = $('input[name="method-payment"]:checked');
			const lastPaymentOpt = $('input[name="method-payment"]:last');
			const divLastPaymentOpt = lastPaymentOpt.closest('div');
			const addressUserElement = $('.cart-info-user > div:last');
			const addressUser = addressUserElement.children('strong').text();
			
			if(methodPaymentOpt.length > 0 && addressUser !== '') {
				fetch('/checkout/order', {
					method: 'POST',
					dataType: 'json',
					body: JSON.stringify({
						listItems: detailOrder,
						methodPayment: methodPaymentOpt.val()
					}),	
					headers: {
						'Content-Type': 'application/json'
					}	
				})
				// .then(respone => respone.json())
				// .then(data => console.log(data));

				window.location.href = '/checkout/view';
			}
			else {
				divLastPaymentOpt.next().remove();
				addressUserElement.children('strong').next().remove();

				if(methodPaymentOpt.length === 0) {
					const errorElement = $('<div class="error text-start px-3">Bạn chưa chọn hình thức thanh toán</div>');
					
					errorElement.insertAfter(divLastPaymentOpt);
				}
				if(addressUser === '') {
					const errorElement = $('<div class="col col-md-10 offset-md-2 error text-start px-3">Vui lòng cập nhật thông tin địa chỉ của mình tại mục tài khoản của tôi</div>');

					errorElement.insertAfter(addressUserElement.children('strong'));
				}
			}
		})
	}

	// order handler
	const statusOrderInputElement = $('input[name="status-order"]');

	const statusOrder = statusOrderInputElement.val();

	if(statusOrder === 'success') {
		cart.deleteSelectedItems();

		const alertOrderBtn = $('[data-bs-target="#alert-order"]');

		if(alertOrderBtn) {
			alertOrderBtn.trigger('click');
		}	
	}
	else if(statusOrder === 'failed') {
		const alertOrderBtn = $('[data-bs-target="#alert-order"]');

		if(alertOrderBtn) {
			alertOrderBtn.trigger('click');
		}	
	}

	// register success account 
	const successRegister = $('#success-register');
	if(successRegister.val() === 'success') {
		console.log('check');
		await setTimeout(() => {
			window.location.href = '/user/signin';
		}, 600);
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

	// highlight type of product
	const typeProductElements = $('a[href^="/home?type="]');
	
	typeProductElements.each((index, element) => {
		if(window.location.href.includes($(element).prop('href'))) {
			$(element).addClass('highlight-option');
		}
	});

	// destroy order
	const destroyOrderBtn = $('.section > .destroy-order');

	destroyOrderBtn.on('click', () => {
		const destroyOrderBtn = $('button[data-bs-target="#confirm-destroy-order"]');
		destroyOrderBtn.trigger('click');
	})
})