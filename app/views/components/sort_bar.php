<div class="d-flex bg-white p-3 rounded-2 mt-2 sort-bar">
	<h3 class="m-0 d-flex align-items-center">Sắp xếp theo</h3>
	<div class="m-0 ms-4 px-3 py-2 d-flex align-items-center justify-content-between position-relative rounded-2 select-sort">
		<span>
			<?php 
				$uri = $_SERVER['REQUEST_URI'];
				if(strpos($uri, '&price=') !== false) {
					$orderPrice = $_GET['price'];
					if($orderPrice === 'up') {
						echo 'Giá thấp đến cao';
					}
					else {
						echo 'Giá cao đến thấp';
					}	
				}
				else {
					echo 'Giá';
				}
			?>
		</span>
		<i class="fa-solid fa-angle-down"></i>
		<ul class="position-absolute start-0 end-0 top-100 rounded-2 list-unstyled select-list">
            <li>
            	<?php
            		$href = '';

            		if(strpos($uri, '/home') !== false) {
            			$type = (isset($_GET['type']) && is_numeric($_GET['type'])) ? (int)$_GET['type'] : false;
            			if(isset($type) && $type !== false) {
            				$href = "/home?type={$type}&price=";
            			}
            		}
            		elseif(strpos($uri, '/search') !== false) {
            			$key = (isset($_GET['key'])) ? $_GET['key'] : false;
            			if(isset($key) && $key !== false) {
            				$href = "/search?key={$key}&price=";
            			}
            		}
            	?>
                <a href="<?= $href ?>up" class="d-block text-decoration-none py-2">Giá thấp đến cao</a>
            </li>
            <li>
                <a href="<?= $href ?>down" class="d-block text-decoration-none py-2">Giá cao đến thấp</a>
            </li>
        </ul>
	</div>
</div>