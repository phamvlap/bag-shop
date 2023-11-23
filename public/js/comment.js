// create format Date
const createDate = (strDate) => {
	const value = [
		...strDate.split(' ')[0].split('-'),
		...strDate.split(' ')[1].split(':')
	];

	const date = new Date(value[0], value[1], value[2], value[3], value[4]);

	const res = `${(date.getHours() < 10) ? `0${date.getHours()}` : date.getHours()}:${(date.getMinutes() < 10) ? `0${date.getMinutes()}` : date.getMinutes()} ${(date.getDate() < 10) ? `0${date.getDate()}` : date.getDate()}/${(date.getMonth() < 10) ? `0${date.getMonth()}` : date.getMonth()}/${date.getFullYear()}`;

	return res;
}

// create comment form
const createCommentForm = (currentUser) => {
	const html = `<form id="comment-form" class="p-3 pb-4" method="post">
					<div class="row">
						${currentUser ? `
							<div class="col">
								<input type="text" name="comment_name" class="form-control" placeholder="Họ và tên của bạn" value="${currentUser.name}" hidden>
							</div>
							<div class="col">
								<input type="text" name="comment_phone_number" class="form-control" placeholder="Số điện thoại của bạn" value="${currentUser.phone_number}" hidden>
							</div>` : `
							<div class="col">
								<input type="text" name="comment_name" class="form-control" placeholder="Họ và tên của bạn">
							</div>
							<div class="col">
								<input type="text" name="comment_phone_number" class="form-control" placeholder="Số điện thoại của bạn">
							</div>`
						}
					</div>
					<div class="row mt-3">
						<div class="col">
							<textarea name="comment_content" class="form-control" rows="4" placeholder="Nội dung bình luận"></textarea>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col text-center">
							<button class="btn btn-fill-primary">Gửi</button>
						</div>
					</div>
				</form>`;
	return $(html);
}

// handle like comments 
const handleLikeComment = () => {
	const likeCommentBtns = $('.like-comment-btn');

	likeCommentBtns.each((index, likeCommentBtn) => {
		$(likeCommentBtn).on('click', () => {
			const iconLike = $(likeCommentBtn).children('i');
			
			if(!iconLike.prop('class').includes('liked')) {
				iconLike.removeClass('fa-regular');
				iconLike.addClass('fa-solid liked');

				const likedCountElement = $(likeCommentBtn).children('.liked-count');
				const currentLikedCount = parseInt(likedCountElement.text());

				likedCountElement.text(currentLikedCount + 1);

				const idComment = parseInt($(likeCommentBtn).closest('.comment').children('input').val());

				fetch(`/comment/like`, {
					method: 'POST',
					dataType: 'json',
					body: JSON.stringify({idComment: idComment}),
					headers: {
						'Content-Type': 'application/json'
					}
				})
				// .then((respone) => respone.json())
				// .then(data => console.log(data)); 
			}
		})
	})
}

$(document).ready(function() {
	// validate comment form
	$('#comment-form').validate({
		rules: {
			'comment_name': {
				required: true,
				minlength: 2
			},
			'comment_phone_number': {
				required: true,
				checkPhoneNumber: true
			},
			'comment_content': {
				required: true,
				minlength: 10
			}
		},
		messages: {
			'comment_name': {
				required: "Bạn chưa nhập vào họ tên của bạn",
				minlength: "Tên phải có ít nhất 2 ký tự"
			},
			'comment_phone_number': {
				required: "Bạn chưa nhập vào số điện thoại của bạn",
			},
			password: {
				required: "Bạn chưa nhập mật khẩu",
			},
			'comment_content': {
				required: "Bạn chưa nhập vào nội dung bình luận của bạn",
				minlength: "Nội dung bình luận quá ngắn. Vui lòng mô tả chi tiết!"
			},
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
		},
		submitHandler: function() {
			const inputNameElement = $('input[name="comment_name"]');
			const inputPhoneNumberElement = $('input[name="comment_phone_number"]');
			const inputContentElement = $('textarea[name="comment_content"]');

			const sendedData = {
				'comment_name': inputNameElement.val(),
				'comment_phone_number': inputPhoneNumberElement.val(),
				'comment_content': inputContentElement.val()
			}

			fetch('/comment/add', {
				method: 'POST',
				dataType: 'json',
				body: JSON.stringify(sendedData),
				headers: {
					'Content-Type': 'application/json'
				}
			})
			.then(respone => respone.json())
			.then(comment => {
				if(comment) {
					const html = `
								<div class="row p-3 comment border-top">
									<input type="text" value="${comment.id_comment}" hidden>
									<div class="col col-md-1 text-center">
										<i class="fa-regular fa-circle-user"></i>
									</div>
									<div class="col col-md-11">
										<h4 class="m-0"><strong>${comment.user_name}</strong></h4>
										<p class="m-0 py-2">${createDate(comment.created_at)}</p>
										<p class="m-0 mt-3">${comment.content}</p>
										<p class="m-0 mt-3">
											<span class="like-comment-btn">
												<i class="fa-regular fa-thumbs-up"></i>
												<span>Thích</span>
												<span>(</span>
												<span class="liked-count">0</span>
												<span>)</span>
											</span>
										</p>
									</div>
								</div>`;
					const commentElement = $(html);
					const lastCommentElement = $('.comment:last');
					const commentFormContainer = $('#comment-form').parent();

					commentElement.insertAfter(commentFormContainer);

					commentFormContainer.empty();
					
					const idCurrentUser = $('[name="current-user"]');
					
					fetch(`/user/get/${parseInt(idCurrentUser.val())}`, {
						method: 'POST',
						dataType: 'json',
						headers: {
							'Content-Type': 'application/json'
						}
					})
					.then((respone) => respone.json())
					.then(currentUser => {
						commentFormContainer.append(createCommentForm(currentUser));
					}); 
					handleLikeComment();
				}
			});
		}
	})

	const moreCommentsBtn = $('.more-comments');
	const lessCommentBtn = $('.less-comments');
	
	// expand more comments
	moreCommentsBtn.on('click', () => {
		const hiddenCommentElements = $('.extra-comment[hidden]');

		hiddenCommentElements.prop('hidden', false);

		lessCommentBtn.prop('hidden', false);

		moreCommentsBtn.prop('hidden', true);
	})

	// narrow less comments
	lessCommentBtn.on('click', () => {
		const extraCommentElements = $('.extra-comment');

		extraCommentElements.prop('hidden', true);

		lessCommentBtn.prop('hidden', true);

		moreCommentsBtn.prop('hidden', false);
	})

	handleLikeComment();
})