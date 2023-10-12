const product = {
	createItemElement: function(item) {
		const idItem = item.id_product;
		let imgs = [];

		if(item.images) {
			imgs = item.images.split(";");
		}

		return `<div class="col-md-3 mt-3 px-2">
				<div class="card w-100" style="width: 18rem;" id="product_${idItem}">
					<a href="/detail?id=${idItem}">
						<img src="../resources/assets/images/products/${imgs.length > 0 ? imgs[0] : '1-1.jpg'}" class="card-img-top" alt="...">
					</a>
					<div class="card-body p-3">
						<a href="/detail?id=${idItem}">
							<h4 class="card-title m-0 item-title">${item.name}</h4>
							<div class="d-flex justify-content-between mt-3 mb-2 item-text">
								<strong>
									${item.price}
									<span><u>đ</u></span>
								</strong>
								<p class="m-0">Đã bán 100</p>
							</div>
						</a>
						<div class="text-center">
							<button class="btn btn-fill-primary">Thêm vào giỏ</button>
						</div>
					</div>
				</div>
			</div>`;
	},

	createListProductsHtml: async function() {
		const respone = await fetch('../api/product/get_all.php');

		const data = await respone.json();

		let listProductElement = '';

		data.forEach((item) => {
			listProductElement += this.createItemElement(item);
		})

		return listProductElement;
	}
}
