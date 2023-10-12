<?php

function Sidebar(string $title, array $listNames) {
	$liElements = array_map(function($listName) {
		return <<<HTML
			<li>
				<a href="/home?type={$listName[0]}" class="d-block text-decoration-none py-3 px-2 rounded-2 type-product" id="type-product-{$listName[0]}">
					<span>{$listName[1]}</span>
				</a>
			</li>
			HTML;
	}, $listNames);

	$liString = join('', $liElements);

	echo <<<HTML
		<div class="p-3 me-2 shadow rounded-2 bg-white">
			<h3 class="m-0 fw-bold text-center">{$title}</h3>
				<ul class="list-unstyled m-0 pt-2 mt-2">
					{$liString}
			</ul>
		</div>
		HTML;
}
