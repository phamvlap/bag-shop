$(document).ready(function() {
	const showDetailItem = (id) => {
		let imgs = [];

		fetch(`../api/product/get.php?id=${id}`)
			.then((respone) => respone.json())
			.then((item) => {
				imgs = item.images.split(';');

				const html = `
				<div class="row">
					<div class="col-md-6">
						<div id="imagesDetailItem" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
								    <img src="../resources/assets/images/products/${imgs[0]}" class="d-block w-100" alt="...">
								</div>
								<div class="carousel-item">
								    <img src="../resources/assets/images/products/${imgs[1]}" class="d-block w-100" alt="...">
								</div>
								<div class="carousel-item">
									<img src="../resources/assets/images/products/${imgs[2]}" class="d-block w-100" alt="...">
								</div>
							</div>
							<button class="carousel-control-prev" type="button" data-bs-target="#imagesDetailItem" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#imagesDetailItem" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
						</div>
					</div>
					<div class="col-md-6 p-0">
						<div class="p-4 bg-white rounded-2 detail-item">
							<h3 class="m-0">${item.name}</h3>
							<div class="mt-4">
								<strong class="price-per-item">${item.price}</strong>
								<span>đ</span>
							</div>
							<div class="mt-4 quantity-btns">
								<span>Số lượng:</span>
								<div class="d-inline-flex align-items-center">
									<button class="btn btn-secondary py-0 border-0" id="decrease-btn">-</button>
									<input class="mx-2 border-1 text-center rounded-1" id="quantity" width="100px" type="text" name="" value="1">
									<button class="btn btn-secondary py-0 border-0" id="increase-btn">+</button>
								</div>
							</div>
							<div class="mt-4">
								<span>Tổng tạm thời:</span>
								<div class="d-inline-block">
									<strong class="tmp-price"></strong>
									<span>đ</span>
								</div>
							</div>
							<div class="row mt-5">
								<div class="col-md-6 text-center">
									<button class="btn btn-outline-primary">Thêm vào giỏ</button>
								</div>
								<div class="col-md-6 text-center">
									<button class="btn btn-fill-primary">Đặt hàng</button>
								</div>
							</div>
						</div>
						<div class="p-4 mt-3 bg-white describe">
							<h3 class="fw-bold">Mô tả sản phẩm</h3>
							<p class="p-0">${item.describes}</p>
						</div>
					</div>
				</div>`;

				const detailElement = $('#detail-item');
				detailElement.append(html);
			});
	}

	const url = window.location.href;
	
	if(url.indexOf("detail?id=") !== -1) {
		const id = url.split('/detail?id=')[1];
		showDetailItem(id);
	}
})	