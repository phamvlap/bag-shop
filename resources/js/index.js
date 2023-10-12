$(document).ready(async function() {
	const typeProductElements = $('[id^=type-product-]');
	
	typeProductElements.each((index, element) => {
		if($(element).prop('href') === window.location.href) {
			$(element).addClass('current-type-product');
		}
	});

	// show all products
	const productContainer = $('#products');
	productContainer.append(await product.createListProductsHtml());

	// handle cart
	await cart.init();
	const itemButtons = $('[id^=product_] .btn');
	itemButtons.on('click', async (event) => {
		const itemBtn = event.target;
		const itemContainer = $(itemBtn).parents('[id^=product_]');
		
		const itemID = (itemContainer.prop('id').split('_'))[1];
		const item = await getItemData(itemID);
		if(item) {
			item.count = 1;
			cart.addItems(item);
		};
	})
	await cart.showCart();
	cart.changeQuantityItem();
	cart.handleDeleteItem();


	// handle change quantity of item
})