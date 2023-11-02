$(document).ready(async function() {
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