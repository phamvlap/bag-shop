$(document).ready(async function() {
	// Highlight type of product
	const typeProductElements = $('[id^=type-product-]');
	
	typeProductElements.each((index, element) => {
		if($(element).prop('href') === window.location.href) {
			$(element).addClass('highlight-option');
		}
	});

	// Highlight options in my account
	const userAccountOptions = $('#profile-user li > a');

	userAccountOptions.each((index, element) => {
		if($(element).prop('href') === window.location.href) {
			$(element).addClass('highlight-option');
		}
	});

	// show all products
	const productContainer = $('#products');
	productContainer.append(await product.createListProductsHtml());

	// handle cart
	await cart.run();

	// Status update info user
	const updatedUserStatus = $('#is-updated').val();

	if(updatedUserStatus) {
		let msg;
		if(updatedUserStatus === 'success') {
			msg = 'Cập nhật thông tin thành công!';
		}
		else {
			msg = 'Cập nhật thông tin thất bại! Vui lòng thử lại!';
		}

		const modalBody =  $('#informEditUser .modal-body');
		modalBody.text(msg);

		const btnInformUpdateUser = $('[data-bs-target="#informEditUser"]');
		
		btnInformUpdateUser.trigger('click');
	}


	const sendData = () => {
		const user = {
			name: 'pham van lap',
			age: 20
		};

		fetch('handler/order.php', {
			method: 'POST',
			body: JSON.stringify(user),
			headers: {
				'Content-Type': 'application/json'
			}
		})
		.then(respone => respone.text())
		.then(data => console.log(data));
	}

	// Hanle order
	const orderBtns = $('.order-btn');

	// console.log(orderBtns);

	orderBtns.each((index, orderBtn) => {
		$(orderBtn).on('click', () => {
			window.location.href = '/history-purchase';
		});	
	});

})