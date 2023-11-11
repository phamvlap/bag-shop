$(document).ready(function() {

	$('.personal-sector form').validate({
		rules: {
			name: {
				required: true,
				minlength: 2
			},
			username: {
				required: true,
				minlength: 2
			}
		},
		messages: {
			name: {
				required: "Bạn chưa nhập vào họ tên của bạn",
				minlength: "Tên phải có ít nhất 2 ký tự"
			},
			username: {
				required: "Bạn chưa nhập vào tên đăng nhập của bạn",
				minlength: "Tên đăng nhập phải có ít nhất 2 ký tự"
			}
		},
		errorElement: "div",
		errorPlacement: function(error, element) {
			error.addClass('invalid-feedback');
			error.insertAfter(element);
		},
		highlight: function(element) {
			$(element).addClass('is-invalid').removeClass('is-valid');
		}, 
		unhighlight: function(element) {
			$(element).removeClass('is-invalid').addClass('is-valid');
		}
	});

	$('.password-sector form').validate({
		rules: {
			'current-password': {
				required: true,
				checkPassword: true
			},
			'new-password': {
				required: true,
				checkPassword: true
			},
			'repeat-password': {
				required: true,
				checkPassword: true,
				equalTo: '#new-password'
			},
		},
		messages: {
			'current-password': {
				required: "Bạn chưa nhập mật khẩu hiện tại",
			},
			'new-password': {
				required: "Bạn chưa nhập mật khẩu mới",
			},
			'repeat-password': {
				required: "Bạn chưa nhập lại mật khẩu mới",
				equalTo: 'Nhập lại mật khẩu mới không chính xác'
			},
		},
		errorElement: "div",
		errorPlacement: function(error, element) {
			error.addClass('invalid-feedback');
			error.insertAfter(element);
		},
		highlight: function(element) {
			$(element).addClass('is-invalid').removeClass('is-valid');
		}, 
		unhighlight: function(element) {
			$(element).removeClass('is-invalid').addClass('is-valid');
		}
	});

	$('.address-sector form').validate({
		rules: {
			phone_number: {
				required: true,
				checkPhoneNumber: true
			},
			email: {
				required: true,
				email: true
			},
			address: {
				required: true,
				minlength: 4
			}
		},
		messages: {
			phone_number: {
				required: "Bạn chưa nhập vào số điện thoại của bạn"
			},
			email: {
				required: "Bạn chưa nhập vào email của bạn",
				email: "Email của bạn không hợp lệ"
			},
			address: {
				required: "Bạn chưa nhập vào địa chỉ của bạn",
				minlength: "Địa chỉ của bạn quá ngắn, vui lòng nhập chi tiết"
			}
		},
		errorElement: "div",
		errorPlacement: function(error, element) {
			error.addClass('invalid-feedback');
			error.insertAfter(element);
		},
		highlight: function(element) {
			$(element).addClass('is-invalid').removeClass('is-valid');
		}, 
		unhighlight: function(element) {
			$(element).removeClass('is-invalid').addClass('is-valid');
		}
	});
})