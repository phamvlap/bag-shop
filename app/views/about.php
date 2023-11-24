<?php require_once __DIR__ . '/components/head.php'; ?>

<div class="container p-0">
	<!-- header -->
	<div class="container fixed-top">
		<?php require_once __DIR__ . '/components/header.php'; ?>
	</div>

	<div class="container content">
		<div class="row">
			<div id="about" class="bg-white rounded-2 p-4">
				<div class="row">
					<div class="col col-md-6 p-4">
						<h2 class="text-center m-0 p-3">Giới thiệu về <strong class="color-heading"><?= APP_NAME ?></strong></h2>
						<p class="m-0 p-3" style="text-align: justify;">
							<span class="color-heading"><?= APP_NAME ?></span>
							 là địa chỉ mua sắm lý tưởng cho những người đang tìm kiếm ba lô chất lượng và thời trang. Chúng tôi cung cấp một loạt các sản phẩm từ các thương hiệu nổi tiếng, bao gồm túi du lịch, ba lô thời trang nam nữ, túi chống sốc cho laptop và ba lô laptop.
							 <br>Chúng tôi luôn mang đến cho khách hàng sự đa dạng trong lựa chọn, giá cả hợp lý và là địa điểm dễ tiếp cận đối với người tiêu dùng.
						</p>
					</div>
					<div class="col col-md-6 p-4">
						<img src="/images/store/about.jpg"  class="rounded-2" alt="">
					</div>
				</div>

				<div class="row">
					<div class="col col-md-6 p-4">
						<div class="aim">
							<h3 class="text-center m-0 p-3">Mục tiêu của chúng tôi</h3>
							<div class="row shadow-lg rounded-2 p-4 m-0">
								<p class="col-md-4 m-0 py-2 px-4">
									Kết nối cộng đồng người mua và người bán thông qua việc cung cấp một nền tảng thương mại điện tử.
								</p>
								<p class="col-md-4 m-0 py-2 px-4">
									Good Store mang đến trải nghiệm mua sắm trực tuyến tích hợp với vô số sản phẩm đa dạng chủng loại.
								</p>
								<p class="col-md-4 m-0 py-2 px-4">
									Chúng tôi mong muốn mang đến sự nhanh chóng và tiện lợi tối đa khi mua sắm đến cho khách hàng.
								</p>
							</div>
						</div>
					</div>
					<div class="col col-md-6 p-4">
						<h3 class="text-center m-0 p-3 color-heading" style="font-size: 2.2rem;">Bản đồ</h3>
		                <p class="mt-4">
		                    <a href="#">
		                    	<iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d643.5108042100779!2d105.769639814902!3d10.03101156038366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0883d2192b0f1%3A0x4c90a391d232ccce!2zVHLGsOG7nW5nIEPDtG5nIE5naOG7hyBUaMO0bmcgVGluIHbDoCBUcnV54buBbiBUaMO0bmcgKENUVSk!5e0!3m2!1svi!2s!4v1697130015193!5m2!1svi!2s" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		                    </a>
		                    <p class="text-end p-0">
		                    	<a class="text-decoration-none" href="https://maps.app.goo.gl/JHyXpLB58TwbkVSA6" target="_blank">Xem bản đồ</a>
		                    </p>
		                </p>
					</div>
				</div>
			</div>

			<!-- footer -->
			<div id="footer" class="container mt-3 bg-white rounded-top-2">
				<?php require_once __DIR__ . '/components/footer.php'; ?>
			</div>
		</div>
	</div>
	
	
</div>

<?php require_once __DIR__ . '/components/foot.php'; ?>
