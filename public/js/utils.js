// convert string to number 
const convertToNumber = (strInput, exceptChars = []) => {
	let strResult = '';

	for(let i = 0; i < strInput.length; ++i) {
		if(!exceptChars.includes(strInput[i])) {
			strResult += strInput[i];
		}
	}

	return parseInt(strResult);
}

// format string money 
const formatMoney = (money) => {
	const strMoney = money.toString();
	const moneyUnits = [];

	for(i = strMoney.length - 1; i >= 0; i -= 3) {
		let moneyUnit = '';
		for(j = Math.max(0, i - 2); j <= i; ++j) {
			moneyUnit += strMoney[j];
		}
		moneyUnits.unshift(moneyUnit);
	}

	return moneyUnits.join('.');
}
