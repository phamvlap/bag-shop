$(document).ready(function() {
	const user = {
		name: 'pham van lap',
		city: 'can tho'
	}

	fetch('http://goodstore.localhost/ajax/test.php', {
		method: 'POST',
		body: JSON.stringify(user),
		dataType: 'json',
		headers: {
			'Content-Type': 'application/json'
		}
	})
	.then(respone => respone.text())
	.then(data => console.log(data));

})