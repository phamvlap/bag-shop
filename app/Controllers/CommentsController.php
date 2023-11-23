<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Comment;

class CommentsController extends Controller {

	# store comments
	public function store() {
		$receivedData = json_decode(file_get_contents('php://input'));

		$keys = ['comment_name', 'comment_phone_number', 'comment_content'];
		$data = $this->filterData(keys: $keys, data: [
			'comment_name' => $receivedData->comment_name, 
			'comment_phone_number' => $receivedData->comment_phone_number,
			'comment_content' => $receivedData->comment_content
		]);

		$comment = new Comment();

		$fillableData = [
			'user_name' => $data['comment_name'],
			'user_phone_number' => $data['comment_phone_number'],
			'content' => $data['comment_content'],
			'id_product' => $_SESSION['item']['id_product']
		];	

		$comment->fill($fillableData);
		$result = $comment->add();

		echo json_encode($result);
	}

	# like comment
	public function likeComment() {
		$receivedData = json_decode(file_get_contents('php://input'));

		$idComment = $receivedData->idComment;
		
		$commentModel = new Comment();
		$commentModel->likeComment(id_comment: $idComment);
	}
}