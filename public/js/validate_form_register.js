$(document).ready(function() {
	$.validator.addMethod('checkPhoneNumber', function(value, element) {
		return this.optional(element) || /([\+84|84|0]+(3|5|7|8|9|1[2|6|8|9]))+([0-9]{8})\b/.test(value);
	}, 'Số điện thoại không hợp lệ');
	// Password contains least one lower digit, least one upper digit, least one number digit and the min length is 8 characters
	$.validator.addMethod('checkPassword', function(value, element) {
		return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/.test(value);
	}, 'Mật khẩu không hợp lệ');

	$('#form-signup').validate({
		rules: {
			name: {
				required: true,
				minlength: 2
			},
			username: {
				required: true,
				minlength: 2
			},
			phone_number: {
				required: true,
				checkPhoneNumber: true
			},
			password: {
				required: true,
				checkPassword: true
			},
			confirm_pwd: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			agree: "required"
		},
		messages: {
			name: {
				required: "Bạn chưa nhập vào họ tên của bạn",
				minlength: "Tên phải có ít nhất 2 ký tự"
			},
			username: {
				required: "Bạn chưa nhập vào tên đăng nhập của bạn",
				minlength: "Tên đăng nhập phải có ít nhất 2 ký tự"
			},
			phone_number: {
				required: "Bạn chưa nhập vào số điện thoại của bạn",
			},
			password: {
				required: "Bạn chưa nhập mật khẩu",
			},
			confirm_pwd: {
				required: "Bạn chưa nhập lại mật khẩu",
				minlength: "Mật khẩu nhập lại phải có ít nhất 5 ký tự",
				equalTo: "Mật khẩu nhập lại không khớp với mật khẩu đã nhập"
			},
			agree: {
				required: "Bạn phải đồng ý với các quy định của chúng tôi"
			}
		},
		errorElement: "div",
		errorPlacement: function(error, element) {
			error.addClass('invalid-feedback');
			if(element.prop('type') === 'checkbox') {
				error.insertAfter(element.next())
			}
			else {
				error.insertAfter(element);
			}
		},
		highlight: function(element) {
			if($(element).prop('type') !== 'checkbox'){
				$(element).addClass('is-invalid').removeClass('is-valid');
			}
		}, 
		unhighlight: function(element) {
			if($(element).prop('type') !== 'checkbox'){
				$(element).removeClass('is-invalid').addClass('is-valid');
			}
		}
	})
})