$(document).ready(function() {
	const increaseBtnElement = $('#increase-btn');
	const decreaseBtnElement = $('#decrease-btn');
	const quantityInput = $('#quantity');
	const pricePerItemElement = $('.price-per-item');
	const tmpPriceValueElement = $('.tmp-price');

	let quantity = parseInt(quantityInput.val());

	console.log(increaseBtnElement, decreaseBtnElement, quantityInput, pricePerItemElement, tmpPriceValueElement);// check 

	if(quantity <= 1) {
		decreaseBtnElement.prop("disabled", true);
	}

	tmpPriceValueElement.text(parseInt(pricePerItemElement.text()) * quantity);

	increaseBtnElement.on('click', () => {
		++quantity;
		quantityInput.prop('value', quantity);
		tmpPriceValueElement.text(parseInt(pricePerItemElement.text()) * quantity);
		if(quantity >= 2) {
			decreaseBtnElement.prop("disabled", false);
		}
	})

	decreaseBtnElement.on('click', () => {
		--quantity;
		quantityInput.prop('value', quantity);
		tmpPriceValueElement.text(parseInt(pricePerItemElement.text()) * quantity);
		if(quantity <= 1) {
			decreaseBtnElement.prop("disabled", true);
		}
	})

	quantityInput.on('keyup', (event) => {
		if(event.keyCode === 13) {
			quantityInput.prop('value', quantity);
			tmpPriceValueElement.text(parseInt(pricePerItemElement.text()) * quantity);
			if(quantity <= 1) {
				decreaseBtnElement.prop("disabled", true);
			}
			else {
				decreaseBtnElement.prop("disabled", false);
			}
		}
		else {
			const inputValue = parseInt(event.target.value);
			if(inputValue) {
				if(inputValue < 0)
					quantity = 1;
				else
					quantity = inputValue;
			}
			else {
				quantity = 1;
			}	
		}
	})

	quantityInput.on('blur', () => {
		quantityInput.prop('value', quantity);
		tmpPriceValueElement.text(parseInt(pricePerItemElement.text()) * quantity);
		if(quantity <= 1) {
			decreaseBtnElement.prop("disabled", true);
		}
		else {
			decreaseBtnElement.prop("disabled", false);
		}
	})
})