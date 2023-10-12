<?php

function SlideBanner(array $images) {
	$imgElements = [];
	for($i = 0; $i < count($images); ++$i) {
		$image = $images[$i];
		$className = "carousel-item";
		if($i === 0) {
			$className .= " active";
		}
		$img = <<<HTML
		<div class="{$className}">
			<img class="w-100 rounded-2"src="../resources/assets/images/{$image[0]}" class="d-block w-100" alt="{$image[1]}" />
		</div>
		HTML;
		array_push($imgElements, $img);
	}

	$imgString = join('', $imgElements);

	echo <<<HTML
		<div id="carouselExampleIndicators" class="carousel slide rounded-2 overflow-hidden" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">{$imgString}</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	HTML;
}
