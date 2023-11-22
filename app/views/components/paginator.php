<nav aria-label="Page navigation" class="mt-4">
	<ul class="pagination justify-content-center">
		<?php 
			$uri = $_SERVER['REQUEST_URI'];

			if(strpos($uri, '/search') !== false) {
				$key = isset($_GET['key']) ? $_GET['key'] : '';
				$orderPrice = isset($_GET['price']) ? $_GET['price'] : false;

				if($orderPrice) {
					$prevHref = "/search?key={$key}&price={$orderPrice}&page={$_SESSION['pagination']['prevPage']}&limit=12";
					$preHref = "/search?key={$key}&price={$orderPrice}&";
					$nextHref = "/search?key={$key}&price={$orderPrice}&page={$_SESSION['pagination']['nextPage']}&limit=12";
				}
				else {
					$prevHref = "/search?key={$key}&page={$_SESSION['pagination']['prevPage']}&limit=12";
					$preHref = "/search?key={$key}&";
					$nextHref = "/search?key={$key}&page={$_SESSION['pagination']['nextPage']}&limit=12";
				}
			}
			elseif(strpos($uri, '/home') !== false && isset($_GET['type'])) {
				$type = (int)$_GET['type'];

				if(isset($_GET['price']) && $_GET['price'] !== '') {
					if($_SESSION['price'] === 'asc') {
						$orderPrice = 'up';
					}
					elseif($_SESSION['price'] === 'desc') {
						$orderPrice = 'down';
					}
					$prevHref =  "/home?type={$type}&price={$orderPrice}&page={$_SESSION['pagination']['prevPage']}&limit=12";
					$preHref =  "/home?type={$type}&price={$orderPrice}&";
					$nextHref =  "/home?type={$type}&price={$orderPrice}&page={$_SESSION['pagination']['nextPage']}&limit=12";
				}
				else {
					$prevHref =  "/home?type={$type}&page={$_SESSION['pagination']['prevPage']}&limit=12";
					$preHref =  "/home?type={$type}";
					$nextHref =  "/home?type={$type}&page={$_SESSION['pagination']['nextPage']}&limit=12";
				}
			}
			else {
				$prevHref =  "/home?page={$_SESSION['pagination']['prevPage']}&limit=12";
				$preHref =  "/home?";
				$nextHref =  "/home?page={$_SESSION['pagination']['nextPage']}&limit=12";
			}
		?>

		<li class="page-item <?php echo $_SESSION['pagination']['prevPage'] ? '' : 'disabled' ?>">
			<a 
				class="page-link px-4 py-3" 
				href="<?php echo $prevHref ?>" 
				aria-label="Previous"
			>
				<span aria-hidden="true">&laquo;</span>
			</a>
		</li>

		<?php foreach($_SESSION['pagination']['pages'] as $page): ?> 
			<li class="page-item">
				<a 
					class="page-link px-4 py-3 <?php echo ($_SESSION['pagination']['currPage'] === $page) ? 'active-status' : '' ?> " 
					href="<?php echo "{$preHref}page={$page}&limit=12" ?> "
				>
					<?php echo $page ?>
				</a>
			</li>
		<?php endforeach ?>

		<li class="page-item <?php echo $_SESSION['pagination']['nextPage'] ? '' : 'disabled' ?>">
			<a 
				class="page-link px-4 py-3" 
				href="<?php echo $nextHref ?>" 
				aria-label="Next"
			>
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>

	</ul>
</nav>
