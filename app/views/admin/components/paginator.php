<nav aria-label="Page navigation" class="mt-4">
	<ul class="pagination justify-content-center">
		<?php if(isset($_SESSION['filter-status']) && $_SESSION['filter-status']): ?>
			<li class="page-item <?php echo $_SESSION['filter-pagination']['prevPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/product/filter?page=<?php echo $_SESSION['filter-pagination']['prevPage'] ?>&limit=5" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php foreach($_SESSION['filter-pagination']['pages'] as $page): ?> 
				<li class="page-item <?php echo ($_SESSION['filter-pagination']['currPage'] === $page) ? 'active' : '' ?> ">
					<a class="page-link px-4 py-3" href="/admin/product/filter?page=<?= $page ?>&limit=5">
						<?= $page ?>
					</a>
				</li>
			<?php endforeach ?>

			<li class="page-item <?php echo $_SESSION['filter-pagination']['nextPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin/product/filter?page=<?php echo $_SESSION['filter-pagination']['nextPage'] ?>&limit=5" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>

		<?php else: ?>
			<li class="page-item <?php echo $_SESSION['pagination']['prevPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin?page=<?php echo $_SESSION['pagination']['prevPage'] ?>&limit=5" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>

			<?php foreach($_SESSION['pagination']['pages'] as $page): ?> 
				<li class="page-item <?php echo ($_SESSION['pagination']['currPage'] === $page) ? 'active' : '' ?> ">
					<a class="page-link px-4 py-3" href="/admin?page=<?= $page ?>&limit=5">
						<?= $page ?>
					</a>
				</li>
			<?php endforeach ?>

			<li class="page-item <?php echo $_SESSION['pagination']['nextPage'] ? '' : 'disabled' ?>">
				<a class="page-link px-4 py-3" href="/admin?page=<?php echo $_SESSION['pagination']['nextPage'] ?>&limit=5" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>

		<?php endif ?>

	</ul>
</nav>
