const renderItems = (items = []) => {
	if(items.length === 0) {
		return `
		<div class="bg-white mt-4 p-4 rounded-2 cart-empty">
			<div class="text-center">
				<i class="fa-solid fa-cart-shopping"></i>
			</div>
			<h3 class="text-center mt-4">Không có sản phẩm trong giỏ hàng</h3>
			<div class="text-center mt-4">
				<a href="/home" class="btn btn-fill-primary">Trở về trang chủ</a>
			</div>
		</div>`;
	}

	let cartItemsHtml = items.map(item => {
		let imgs = [];
		if(item.images) {
			imgs = item.images.split(';');
		}
		
		return `
			<div class="row bg-white mt-4 mx-0 p-3 cart-item" id="cart-item-${item.id_product}">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-2 text-center d-flex justify-content-center">
							<input type="checkbox">
						</div>
						<div class="col-md-10 text-center">
							<div class="row">
								<div class="col-md-2">
									<img src="../resources/assets/images/products/${imgs[0] ? imgs[0] :'1-1.jpg'}" width="100%" alt="">
								</div>
								<div class="col-md-10 d-flex my-auto">
									<h4 class="m-0 cart-item-title fw-bolder text-start">${item.name}</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 my-auto">
					<div>
						<div class="row">
							<div class="col-md-3 text-center fw-bolder cart-item-price">${item.price}</div>
							<div class="col-md-3 text-center">
								<div>
									<div class="d-inline-flex align-items-center quantity-btns">
										<button class="btn btn-secondary py-0 border-0 decrease-btn" ${item.count <= 1 ? 'disabled' : ''}>-</button>
										<input class="mx-2 border-1 text-center rounded-1 current-quantity"  width="100px" type="text" name="" value=${item.count}>
										<button class="btn btn-secondary py-0 border-0 increase-btn">+</button>
									</div>
								</div>
							</div>
							<div class="col-md-3 text-center">
								<div class="d-inline-block">
									<strong class="tmp-price">${item.price * item.count}</strong>
									<span>đ</span>
								</div>
							</div>
							<div class="col-md-3 text-center">
								<i class="fa-regular fa-trash-can p-2 trash-can-btn delete-btn"></i>
							</div>
						</div>
					</div>
				</div>
			</div>`;
	});
	return cartItemsHtml;
}

const renderCart = async () => {
	const items = await cart.getItems();
	const cartItemsHtml = renderItems(items);
	$('#detail-cart').empty();
	$('#detail-cart').html(cartItemsHtml);
}

const getItemData = async (id_product) => {
	const respone = await fetch(`../api/product/get.php?id=${id_product}`);

	if(respone) {
		const item = await respone.json();
		return item;
	}

	return null;
}

const setCartIconCount = () => {
	const cartIcon = $('#cart .cart-count');
	cartIcon.text(cart.count);
}

let cart = {
	count: 0,
	listItems: new Map(),

	async init() {
		const cartData = JSON.parse(window.localStorage.getItem('cart_user'));
		this.count = cartData.count;

		await this.getItems();
		setCartIconCount();
	},

	async getItems() {
		const cartData = JSON.parse(window.localStorage.getItem('cart_user'));
		const items = cartData.items;

		if(items) {
			for(const item of items) {
				const detailItem = await getItemData(item.id_product);
				this.listItems.set(item.id_product, {
					...item,
					...detailItem
				});
			}
		}
		return Array.from(this.listItems.values());
	},

	setItems() {
		let data = [];
		this.listItems.forEach(item => {
			data.push({
				id_product: item.id_product,
				count: item.count
			});
		})
		const cartData = {
			count: this.count,
			items: data
		};
		window.localStorage.setItem('cart_user', JSON.stringify(cartData));
	},

	clearItems() {
		this.count = 0;
		this.total = 0;
		this.listItems.clear()
		setCartIconCount();
		window.localStorage.removeItem('cart_user');
	},

	addItems(item) {
		if(!this.listItems.has(item.id_product)){
			this.listItems.set(item.id_product, {
				...item,
			});
			++this.count;
		}
		else {
			let _item = this.listItems.get(item.id_product);
			_item.count += item.count;
			this.listItems.set(item.id_product, {
				..._item,
			});
		}
		console.log(cart.count);

		setCartIconCount();

		this.setItems();
	},

	async deleteItem(keyItem) {
		if(this.listItems.has(keyItem)) {
			this.listItems.delete(keyItem);
			--this.count;
			this.setItems();
			setCartIconCount();
			window.location.href = 'http://goodstore.localhost/cart';
		}
	},

	changeQuantityItem() {
		const increaseBtns = $('.increase-btn');
		const decreaseBtns = $('.decrease-btn');

		const handlePrice = (currentBtn, quantity) => {
			const price = parseInt((currentBtn.parents('[id^=cart-item-]')).find('.cart-item-price').text());
			const tmpPriceElement = (currentBtn.parents('[id^=cart-item-]')).find('.tmp-price');
			tmpPriceElement.text(parseInt(price * quantity));
		}

		increaseBtns.each((index, incBtn) => {
			$(incBtn).on('click', () => {
				const _this = $(incBtn);
				const inputElement = _this.parents('.quantity-btns').children('input');
				const decBtn = _this.parents('.quantity-btns').children('.decrease-btn');
				let quantity = parseInt(inputElement.val());

				++quantity;
				inputElement.prop('value', quantity);
				handlePrice(_this, quantity);
				if(quantity >= 2) {
					decBtn.prop('disabled', false);
				}

				let item = {
					id_product: parseInt((_this.parents('[id^=cart-item-]')).prop('id').replace('cart-item-', '')),
					count: 0
				};
				++item.count;
				cart.addItems(item);
			})
		})

		decreaseBtns.each((index, decBtn) => {
			$(decBtn).on('click', () => {
				const _this = $(decBtn);
				const inputElement = _this.parents('.quantity-btns').children('input');
				let quantity = parseInt(inputElement.val());

				--quantity;
				inputElement.prop('value', quantity);
				handlePrice(_this, quantity);
				if(quantity <= 1) {
					_this.prop('disabled', true);
				}

				let item = {
					id_product: parseInt((_this.parents('[id^=cart-item-]')).prop('id').replace('cart-item-', '')),
					count: 0
				};
				--item.count;
				cart.addItems(item);
			})
		})
	},

	handleDeleteItem() {
		const deleteBtns = $('.delete-btn');
		deleteBtns.each((index, deleteBtn) => {
			$(deleteBtn).on('click', () => {
				const _this = $(deleteBtn);
				const idItem = parseInt((_this.parents('[id^=cart-item-]')).prop('id').replace('cart-item-', ''));
				this.deleteItem(idItem);
				console.log(idItem);
			})
		})
	},

	async showCart() {
		await renderCart();
	}
}
