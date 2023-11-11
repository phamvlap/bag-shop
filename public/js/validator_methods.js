$(document).ready(function() {

	$.validator.addMethod('checkPhoneNumber', function(value, element) {
		return this.optional(element) || /([\+84|84|0]+(3|5|7|8|9|1[2|6|8|9]))+([0-9]{8})\b/.test(value);
	}, 'Số điện thoại không hợp lệ');

	// Password contains least one lower digit, least one upper digit, least one number digit and the min length is 8 characters
	$.validator.addMethod('checkPassword', function(value, element) {
		return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/.test(value);
	}, 'Mật khẩu không hợp lệ');
	
})