<div class="row p-3">
	<p class=" text-center copyright">&copy; Copyright 2023 Bản quyền thuộc về 
		<?php
			$uri = $_SERVER['REQUEST_URI'];
			if(strpos($uri, '/admin') !== false) {
				echo '<a href="/admin"><strong>' . $htmlspecialchars(MANAGEMENT_SYSTEM_NAME) . '</strong></a>';
			}
			else {
				echo '<a href="/"><strong>' . $htmlspecialchars(APP_NAME) . '</strong></a>';
			}
		?>
	</p>
</div>