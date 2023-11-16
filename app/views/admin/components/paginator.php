<nav aria-label="Page navigation" class="mt-4">
	<ul class="pagination justify-content-center">
		<?php if(isset($_SESSION['filter-status']) && $_SESSION['filter-status']): ?>
			<li class="page-item <?php echo $_SESSION['filter-pagination']['prevPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/product/filter?page=<?php echo $_SESSION['filter-pagination']['prevPage'] ?>&limit=5" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php foreach($_SESSION['filter-pagination']['pages'] as $page): ?> 
				<li class="page-item">
					<a class="page-link px-4 py-3 <?php echo ($_SESSION['filter-pagination']['currPage'] === $page) ? 'active-status' : '' ?> " href="/admin/product/filter?page=<?= $page ?>&limit=5">
						<?= $page ?>
					</a>
				</li>
			<?php endforeach ?>

			<li class="page-item <?php echo $_SESSION['filter-pagination']['nextPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/product/filter?page=<?php echo $_SESSION['filter-pagination']['nextPage'] ?>&limit=5" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>

		<?php elseif(isset($_SESSION['invoices-pagination'])): ?>
			<li class="page-item <?php echo $_SESSION['invoices-pagination']['prevPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/invoice?page=<?php echo $_SESSION['invoices-pagination']['prevPage'] ?>&limit=10" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php foreach($_SESSION['invoices-pagination']['pages'] as $page): ?> 
				<li class="page-item">
					<a class="page-link px-4 py-3 <?php echo ($_SESSION['invoices-pagination']['currPage'] === $page) ? 'active-status' : '' ?> " href="/admin/invoice?page=<?= $page ?>&limit=10">
						<?= $page ?>
					</a>
				</li>
			<?php endforeach ?>

			<li class="page-item <?php echo $_SESSION['invoices-pagination']['nextPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/invoice?page=<?php echo $_SESSION['invoices-pagination']['nextPage'] ?>&limit=10" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		<?php elseif(isset($_SESSION['filter-invoices-pagination'])): ?>
			<?php 
				$strRequestOrder = '';				
				foreach($_SESSION['request-filters'] as $key => $value) {
					$strRequestOrder .= "{$key}={$value}&";
				}
			?>
			<li class="page-item <?php echo $_SESSION['filter-invoices-pagination']['prevPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/invoice/filter?<?= $strRequestOrder ?>page=<?php echo $_SESSION['filter-invoices-pagination']['prevPage'] ?>&limit=10" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php foreach($_SESSION['filter-invoices-pagination']['pages'] as $page): ?> 
				<li class="page-item">
					<a class="page-link px-4 py-3 <?php echo ($_SESSION['filter-invoices-pagination']['currPage'] === $page) ? 'active-status' : '' ?> " href="/admin/invoice/filter?<?= $strRequestOrder ?>page=<?= $page ?>&limit=10">
						<?= $page ?>
					</a>
				</li>
			<?php endforeach ?>

			<li class="page-item <?php echo $_SESSION['filter-invoices-pagination']['nextPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/invoice/filter?<?= $strRequestOrder ?>page=<?php echo $_SESSION['filter-invoices-pagination']['nextPage'] ?>&limit=10" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>

		<?php else: ?>
			<li class="page-item <?php echo $_SESSION['pagination']['prevPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/product?page=<?php echo $_SESSION['pagination']['prevPage'] ?>&limit=5" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php foreach($_SESSION['pagination']['pages'] as $page): ?> 
				<li class="page-item">
					<a class="page-link px-4 py-3 <?php echo ($_SESSION['pagination']['currPage'] === $page) ? 'active-status' : '' ?> " href="/admin/product?page=<?= $page ?>&limit=5">
						<?= $page ?>
					</a>
				</li>
			<?php endforeach ?>

			<li class="page-item <?php echo $_SESSION['pagination']['nextPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/product?page=<?php echo $_SESSION['pagination']['nextPage'] ?>&limit=5" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>

		<?php endif ?>

	</ul>
</nav>
