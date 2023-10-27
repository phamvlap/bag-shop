<?php 

namespace App\Controllers;

class Controller {

	public function saveFormValues(array $data, array $except = []) {
		$form = [];
		foreach($data as $key => $value) {
			if(!in_array($key, $except)){
				$form[$key] = $value;
			}
		}
		$_SESSION['form'] = $form;
	}

	public function getSavedFormValues() {
		return getOnceSession('form');
	}

	public function saveInfoUser(array $data, array $except = []) {
		foreach($data as $key => $value) {
			if(isset($data[$key]) && !in_array($key, $except)){
				$_SESSION['user'][$key] = $data[$key];
			}
		}
	}

	public function filterData(array $keys, array $data): array {
		$result = [];

		foreach($keys as $key) {
			if(isset($data[$key])) {
				$result[$key] = $data[$key];
			}
		}

		return $result;
	}
}