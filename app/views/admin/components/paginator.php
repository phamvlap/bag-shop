<nav aria-label="Page navigation" class="mt-4">
	<ul class="pagination justify-content-center">
		<?php 
			$uri = $_SERVER['REQUEST_URI'];

			if(strpos($uri, '/admin/product/filter') !== false) {
				$filters = [];

				$filters['filter-type'] = isset($_GET['filter-type']) ? $_GET['filter-type'] : false;
				$filters['filter-price'] = isset($_GET['filter-price']) ? $_GET['filter-price'] : false;
				$filters['filter-date'] = isset($_GET['filter-date']) ? $_GET['filter-date'] : false;

				$queryUrl = '';
				foreach($filters as $key => $value) {
					if($filters[$key] !== false) {
						$queryUrl .= "{$key}=$value&";
					}
				}

				$prevHref = "/admin/product/filter?{$queryUrl}page={$_SESSION['pagination']['prevPage']}&limit={$_SESSION['pagination']['limit']}";
				$preHref = "/admin/product/filter?{$queryUrl}";
				$nextHref = "/admin/product/filter?{$queryUrl}page={$_SESSION['pagination']['nextPage']}&limit={$_SESSION['pagination']['limit']}";
			}
			elseif(strpos($uri, '/admin/product/search') !== false) {
				$key = isset($_GET['key']) ? $_GET['key'] : '';
				$filters = [];

				$filters['filter-type'] = isset($_GET['filter-type']) ? $_GET['filter-type'] : false;
				$filters['filter-price'] = isset($_GET['filter-price']) ? $_GET['filter-price'] : false;
				$filters['filter-date'] = isset($_GET['filter-date']) ? $_GET['filter-date'] : false;

				$queryUrl = '';
				if(strlen($key) > 0) {
					$queryUrl .= "key=$key";
				}
				foreach($filters as $key => $value) {
					if($filters[$key] !== false) {
						$queryUrl .= "&{$key}=$value";
					}
				}
				if(strlen($queryUrl) > 0) {
					$prevHref = "/admin/product/search?{$queryUrl}&page={$_SESSION['pagination']['prevPage']}&limit={$_SESSION['pagination']['limit']}";
					$preHref = "/admin/product/search?{$queryUrl}&";
					$nextHref = "/admin/product/search?{$queryUrl}&page={$_SESSION['pagination']['nextPage']}&limit={$_SESSION['pagination']['limit']}";
				}
				else {
					$prevHref = "/admin/product/search?page={$_SESSION['pagination']['prevPage']}&limit={$_SESSION['pagination']['limit']}";
					$preHref = "/admin/product/search?";
					$nextHref = "/admin/product/search?page={$_SESSION['pagination']['nextPage']}&limit={$_SESSION['pagination']['limit']}";
				}
			}
			elseif(strpos($uri, '/admin/invoice/filter') !== false) {
				$filters = [];

				$filters['filter-invoice-date'] = isset($_GET['filter-invoice-date']) ? $_GET['filter-invoice-date'] : false;
				$filters['filter-invoice-total'] = isset($_GET['filter-invoice-total']) ? $_GET['filter-invoice-total'] : false;
				$filters['filter-invoice-status'] = isset($_GET['filter-invoice-status']) ? $_GET['filter-invoice-status'] : false;

				$queryUrl = '';
				foreach($filters as $key => $value) {
					if($filters[$key] !== false) {
						$queryUrl .= "{$key}=$value&";
					}
				}

				$prevHref = "/admin/invoice/filter?{$queryUrl}page={$_SESSION['pagination']['prevPage']}&limit={$_SESSION['pagination']['limit']}";
				$preHref = "/admin/invoice/filter?{$queryUrl}";
				$nextHref = "/admin/invoice/filter?{$queryUrl}page={$_SESSION['pagination']['nextPage']}&limit={$_SESSION['pagination']['limit']}";
			}
			elseif(strpos($uri, '/admin/invoice') !== false) {
				$prevHref = "/admin/invoice?page={$_SESSION['pagination']['prevPage']}&limit={$_SESSION['pagination']['limit']}";
				$preHref = "/admin/invoice?";
				$nextHref = "/admin/invoice?page={$_SESSION['pagination']['nextPage']}&limit={$_SESSION['pagination']['limit']}";
			}
			else {
				$prevHref = "/admin/product?page={$_SESSION['pagination']['prevPage']}&limit={$_SESSION['pagination']['limit']}";
				$preHref = "/admin/product?";
				$nextHref = "/admin/product?page={$_SESSION['pagination']['nextPage']}&limit={$_SESSION['pagination']['limit']}";
			}
		?>

		<li class="page-item <?php echo $_SESSION['pagination']['prevPage'] ? '' : 'disabled' ?>">
			<a class="page-link px-4 py-3" href="<?= $prevHref ?>" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			</a>
		</li>

		<?php foreach($_SESSION['pagination']['pages'] as $page): ?> 
			<li class="page-item">
				<a class="page-link px-4 py-3 <?php echo ($_SESSION['pagination']['currPage'] === $page) ? 'active-status' : '' ?> " href="<?php echo $preHref . "page={$page}&limit={$_SESSION['pagination']['limit']}" ?>">
					<?= $page ?>
				</a>
			</li>
		<?php endforeach ?>

		<li class="page-item <?php echo $_SESSION['pagination']['nextPage'] ? '' : 'disabled' ?>">
			<a class="page-link px-4 py-3" href="<?= $nextHref ?>" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>

	</ul>
</nav>
