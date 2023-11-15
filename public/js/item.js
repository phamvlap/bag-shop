// reset image on mouse enter
const resetImage = (image) => {
	const imgHtml = `<img src="/uploads/${image}" class="d-block w-100 rounded-2" alt="..." style="height: 420px">`;
	const imageElement = $(imgHtml);
	const showingImageElement = $('.images-item .showing-image');


	const activeImage = $('img[class~="active-image-item"]');
	const currentImage = $('.list-images-item > div').children(`img[src*="${image}"]`);

	activeImage.removeClass('active-image-item');
	currentImage.addClass('active-image-item');

	showingImageElement.html(imageElement);
}

// handle on mouse enter
const handleOnMouseEnterImages = () => {
	const listImagesElement = $('.list-images-item img');

	listImagesElement.on('mouseenter', (event) => {
		const image = $(event.target).prop('src').slice($(event.target).prop('src').lastIndexOf('/') + 1);

		resetImage(image);
	})
}

$(document).ready(async function() {
	const currentURL = window.location.href;

	if(currentURL.includes('/view/item/')) {
		const priceItem = $('.detail-item .price');
		const inputQuantityElement = $('.quantity-item input');
		const tmpPriceElement = $('.detail-item .tmp-price-item');
		const price = parseInt(priceItem.text());

		// change tmp price when changing quantity
		inputQuantityElement.on('change', () => {
			let quantity = parseInt(inputQuantityElement.val());

			tmpPriceElement.text(price * quantity);
		})

		// add product from detail item page
		const addItemBtn = $('.detail-item .add-item-btn');
		addItemBtn.on('click', async () => {
			const currentURL = window.location.href;
			const idItem = parseInt(currentURL.slice(currentURL.lastIndexOf('/') + 1));
			const item = await getItemData(idItem);
			item.count = parseInt(inputQuantityElement.val());

			cart.addItems(item);
		})

		const idItem = parseInt(currentURL.slice(currentURL.lastIndexOf('/') + 1));
		const currentItem = await getItemData(idItem);

		handleOnMouseEnterImages();

		// change scroll images on sidebar

		const chevronUpBtn = $('i[class*="chevron-up"]');
		const chevronDownBtn = $('i[class*="chevron-down"]');
		const imagesContainer = $('.list-images-item > div:first');

		const imagesList = {
			images: currentItem.images.split(';'),
			currentImage: 0
		}

		// on click down button
		chevronDownBtn.on('click', () => {
			++imagesList.currentImage;
			let imageHtml = '';
			imagesContainer.empty();

			for(i = imagesList.currentImage; i < imagesList.currentImage + 4; ++i) {
				const image = imagesList.images[i];
				
				imageHtml += `<img src="/uploads/${image}" class="d-block w-100 rounded-2 mb-2 <?= $activeClass ?>" alt="..." height="100px">`;
			}
			imagesContainer.html(imageHtml);

			if(imagesList.currentImage > 0) {
				chevronUpBtn.parent().prop('hidden', false);
			}

			if(imagesList.currentImage + 4 === imagesList.images.length) {
				chevronDownBtn.parent().prop('hidden', true);
			}
			handleOnMouseEnterImages();
		})

		// on click up button
		chevronUpBtn.on('click', () => {
			--imagesList.currentImage;
			let imageHtml = '';
			imagesContainer.empty();

			for(i = imagesList.currentImage; i < imagesList.currentImage + 4; ++i) {
				const image = imagesList.images[i];
				
				imageHtml += `<img src="/uploads/${image}" class="d-block w-100 rounded-2 mb-2 <?= $activeClass ?>" alt="..." height="100px">`;
			}
			imagesContainer.html(imageHtml);

			if(imagesList.currentImage === 0) {
				chevronUpBtn.parent().prop('hidden', true);
			}

			if(imagesList.currentImage + 4 < imagesList.images.length) {
				chevronDownBtn.parent().prop('hidden', false);
			}
			handleOnMouseEnterImages();
		})
	}
})