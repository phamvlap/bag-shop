$(document).ready(function() {
	// Password contains least one lower digit, least one upper digit, least one number digit and the min length is 8 characters
	$.validator.addMethod('checkPassword', function(value, element) {
		return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/.test(value);
	}, 'Mật khẩu không hợp lệ');

	$('#form-signin').validate({
		rules: {
			username: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				checkPassword: true
			}
		},
		messages: {
			username: {
				required: "Bạn chưa nhập vào tên đăng nhập của bạn",
				minlength: "Tên đăng nhập phải có ít nhất 2 ký tự"
			},
			password: {
				required: "Bạn chưa nhập mật khẩu",
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