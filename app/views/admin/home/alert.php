<div class="col col-md-6 offset-md-3">
	<!-- success -->
	<?php if(isset($_SESSION['message-success'])): ?>
	    <div class="alert alert-success alert-dismissible fade show mt-2 text-center" role="alert">
	    	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
			<strong><?php echo getOnceSession('message-success') ?></strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif ?>

	<!-- failed -->
	<?php if(isset($_SESSION['message-failed'])): ?>
	    <div class="alert alert-danger alert-dismissible fade show mt-2 text-center" role="alert">
	    	<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
			<strong><?php echo getOnceSession('message-failed') ?></strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif ?>
</div>