<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Comment;

class CommentsController extends Controller {

	public function store() {
		$sendedData = json_decode(file_get_contents('php://input'));

		$keys = ['comment_name', 'comment_phone_number', 'comment_content'];
		$data = $this->filterData(keys: $keys, data: [
			'comment_name' => $sendedData->comment_name, 
			'comment_phone_number' => $sendedData->comment_phone_number,
			'comment_content' => $sendedData->comment_content
		]);

		$comment = new Comment();

		$fillableData = [
			'name' => $data['comment_name'],
			'phone_number' => $data['comment_phone_number'],
			'content' => $data['comment_content'],
			'id_product' => $_SESSION['item']['id_product']
		];	

		$comment->fill($fillableData);
		$result = $comment->add();

		echo json_encode($result);
	}
}