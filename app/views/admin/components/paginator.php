<nav aria-label="Page navigation" class="mt-4">
	<ul class="pagination justify-content-center">
		<?php if(isset($_SESSION['filter-pagination'])): ?>
			<?php 
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
			?>
			<li class="page-item <?php echo $_SESSION['filter-pagination']['prevPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/product/filter?<?php echo $queryUrl . 'page=' . $_SESSION['filter-pagination']['prevPage'] ?>&limit=<?= $_SESSION['filter-pagination']['limit'] ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php foreach($_SESSION['filter-pagination']['pages'] as $page): ?> 
				<li class="page-item">
					<a class="page-link px-4 py-3 <?php echo ($_SESSION['filter-pagination']['currPage'] === $page) ? 'active-status' : '' ?> " href="/admin/product/filter?<?php echo $queryUrl . 'page=' . $page ?>&limit=<?= $_SESSION['filter-pagination']['limit'] ?>">
						<?= $page ?>
					</a>
				</li>
			<?php endforeach ?>

			<li class="page-item <?php echo $_SESSION['filter-pagination']['nextPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/product/filter?<?php echo $queryUrl . 'page=' . $_SESSION['filter-pagination']['nextPage'] ?>&limit=<?= $_SESSION['filter-pagination']['limit'] ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>

		<?php elseif(isset($_SESSION['search-pagination'])): ?>
			<?php 
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
			?>
			<li class="page-item <?php echo $_SESSION['search-pagination']['prevPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/product/search?<?php echo (strlen($queryUrl) > 0) ? $queryUrl : '' ?><?= '&page=' . $_SESSION['search-pagination']['prevPage'] ?>&limit=<?= $_SESSION['search-pagination']['limit'] ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php foreach($_SESSION['search-pagination']['pages'] as $page): ?> 
				<li class="page-item">
					<a class="page-link px-4 py-3 <?php echo ($_SESSION['search-pagination']['currPage'] === $page) ? 'active-status' : '' ?> " href="/admin/product/search?<?php echo (strlen($queryUrl) > 0) ? $queryUrl : '' ?><?= '&page=' . $page ?>&limit=<?= $_SESSION['search-pagination']['limit'] ?>">
						<?= $page ?>
					</a>
				</li>
			<?php endforeach ?>

			<li class="page-item <?php echo $_SESSION['search-pagination']['nextPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/product/search?<?php echo (strlen($queryUrl) > 0) ? $queryUrl : '' ?><?= '&page=' . $_SESSION['search-pagination']['nextPage'] ?>&limit=<?= $_SESSION['search-pagination']['limit'] ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>

		<?php elseif(isset($_SESSION['invoices-pagination'])): ?>
			<li class="page-item <?php echo $_SESSION['invoices-pagination']['prevPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/invoice?page=<?php echo $_SESSION['invoices-pagination']['prevPage'] ?>&limit=<?= $_SESSION['invoices-pagination']['limit'] ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php foreach($_SESSION['invoices-pagination']['pages'] as $page): ?> 
				<li class="page-item">
					<a class="page-link px-4 py-3 <?php echo ($_SESSION['invoices-pagination']['currPage'] === $page) ? 'active-status' : '' ?> " href="/admin/invoice?page=<?= $page ?>&limit=<?= $_SESSION['invoices-pagination']['limit'] ?>">
						<?= $page ?>
					</a>
				</li>
			<?php endforeach ?>

			<li class="page-item <?php echo $_SESSION['invoices-pagination']['nextPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/invoice?page=<?php echo $_SESSION['invoices-pagination']['nextPage'] ?>&limit=<?= $_SESSION['invoices-pagination']['limit'] ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		<?php elseif(isset($_SESSION['filter-invoices-pagination'])): ?>
			<?php 
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
			?>
			<li class="page-item <?php echo $_SESSION['filter-invoices-pagination']['prevPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/invoice/filter?<?php echo $queryUrl . 'page=' . $_SESSION['filter-invoices-pagination']['prevPage'] ?>&limit=<?= $_SESSION['filter-invoices-pagination']['limit'] ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php foreach($_SESSION['filter-invoices-pagination']['pages'] as $page): ?> 
				<li class="page-item">
					<a class="page-link px-4 py-3 <?php echo ($_SESSION['filter-invoices-pagination']['currPage'] === $page) ? 'active-status' : '' ?> " href="/admin/invoice/filter?<?php echo $queryUrl . 'page=' . $page ?>&limit=<?= $_SESSION['filter-invoices-pagination']['limit'] ?>">
						<?= $page ?>
					</a>
				</li>
			<?php endforeach ?>

			<li class="page-item <?php echo $_SESSION['filter-invoices-pagination']['nextPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/invoice/filter?<?php echo $queryUrl . 'page=' . $_SESSION['filter-invoices-pagination']['nextPage'] ?>&limit=<?= $_SESSION['filter-invoices-pagination']['limit'] ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>

		<?php else: ?>
			<li class="page-item <?php echo $_SESSION['pagination']['prevPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/product?page=<?php echo $_SESSION['pagination']['prevPage'] ?>&limit=<?= $_SESSION['pagination']['limit'] ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php foreach($_SESSION['pagination']['pages'] as $page): ?> 
				<li class="page-item">
					<a class="page-link px-4 py-3 <?php echo ($_SESSION['pagination']['currPage'] === $page) ? 'active-status' : '' ?> " href="/admin/product?page=<?= $page ?>&limit=<?= $_SESSION['pagination']['limit'] ?>">
						<?= $page ?>
					</a>
				</li>
			<?php endforeach ?>

			<li class="page-item <?php echo $_SESSION['pagination']['nextPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/product?page=<?php echo $_SESSION['pagination']['nextPage'] ?>&limit=<?= $_SESSION['pagination']['limit'] ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>

		<?php endif ?>

	</ul>
</nav>
