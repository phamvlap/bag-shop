$(document).ready(function() {
	// check phone number 
	$.validator.addMethod(
		'checkPhoneNumber', 
		function(value, element) {
			return this.optional(element) || /([\+84|84|0]+(3|5|7|8|9|1[2|6|8|9]))+([0-9]{8})\b/.test(value);
		}, 
		"Số điện thoại không hợp lệ"
	);

	$('#contact-form').validate({
		rules: {
			contact_name: {
				required: true,
				minlength: 2
			},
			contact_phone: {
				required: true,
				checkPhoneNumber: true
			},
			contact_content: {	
				required: true,
				minlength: 10
			}
		},
		messages: {
			contact_name: {
				required: 'Bạn chưa nhập vào tên của bạn',
				minlength: 'Tên của bạn phải có ít nhất 2 ký tự'
			},
			contact_phone_: {
				required: 'Bạn chưa nhập vào số điện thoại của bạn'
			},
			contact_content: {	
				required: 'Bạn chưa nhập vào nội dung thắc mắc',
				minlength: 'Nội dung mô tả của bạn quá ngắn'
			}
		},
		errorElement: 'div',
		errorPlacement: function(error, element) {
			error.addClass('invalid-feedback');
			error.insertAfter(element);
		},
		highlight: function(element) {
			$(element).addClass('is-invalid').removeClass('is-valid');
		}, 
		unhighlight: function(element) {
			$(element).removeClass('is-invalid').addClass('is-valid');
		},
		submitHandler: function() {
			$('[data-bs-target="#submittedContact"]').trigger('click');
		}
	})
})