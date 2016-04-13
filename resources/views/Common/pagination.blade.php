<?php
	if ($paginator->lastPage() > 0) {
		$current_page = $paginator->currentPage();
		if (isset($_GET['hien_thi']) || isset($_GET['per_page'])) {
			if (isset($_GET['per_page'])) {
				$item_per_page = $_GET['per_page'];
			} else {
				$item_per_page = $_GET['hien_thi'];
			}
		} else {
			$item_per_page = 16;
		}

		$total = ceil($paginator->total() / $item_per_page);
		$direction = '';
	}

	// input $current_page, $total

	$url = $_SERVER["REQUEST_URI"];
	$width = 2;

	if ($total > 1) {
		echo '<ul class="site-pager">';
		if ($current_page > 1) {
			if ($current_page == 2) {
				$link = str_replace(['?page=1', '&page=1'], '', $paginator->url($current_page - 1));
			} else {
				$link = $paginator->url($current_page - 1);
			}

			if (strpos($link, 'quantri') !== false) {
				$link = str_replace('quantri', 'quan-tri', $link);
			}

			echo '<li><a href="' . $link . '"><i class="fa fa-chevron-left"></i>' . '</a></li>';
		}

		if ($current_page - $width > 3) {
			for ($i = 1; $i < 3; $i++) {
				$link = $paginator->url($i);

				if (strpos($link, 'quantri') !== false) {
					$link = str_replace('quantri', 'quan-tri', $link);
				}

				if ($i == $current_page) {
					if ($current_page == 1) {
						echo '<li class="active"><a href="' . str_replace(['?page=1', '&page=1'], '', $link) . '">' . $i . '</a></li>';
					} else {
						echo '<li class="active"><a href="' . $link . '">' . $i . '</a></li>';
					}
				} elseif ($i == 1) {
					echo '<li><a href="' . str_replace(['?page=1', '&page=1'], '', $link) . '">' . $i . '</a></li>';
				} else {
					echo '<li><a href="' . $link . '">' . $i . '</a></li>';
				}
			}

			echo '<li>...</li>';
		} else {
			$tt0 = ($current_page - $width <= 1) ? 1 : $current_page - $width - 1;
			for ($i = 1; $i <= $tt0; $i++) {
				$link = $paginator->url($i);

				if (strpos($link, 'quantri') !== false) {
					$link = str_replace('quantri', 'quan-tri', $link);
				}

				if ($i == $current_page) {
					if ($current_page == 1) {
						echo '<li class="active"><a href="' . str_replace(['?page=1', '&page=1'], '', $link) . '">' . $i . '</a></li>';
					} else {
						echo '<li class="active"><a href="' . $link . '">' . $i . '</a></li>';
					}
				} elseif ($i == 1) {
					echo '<li><a href="' . str_replace(['?page=1', '&page=1'], '', $link) . '">' . $i . '</a></li>';
				} else {
					echo '<li><a href="' . $link . '">' . $i . '</a></li>';
				}
			}
		}

		$tt1 = ($current_page - $width > 2) ? $current_page - $width : 2;
		$tt2 = ($current_page + $width > $total) ? $total : $current_page + $width;
		for ($i = $tt1; $i <= $tt2; $i++) {
			$link = $paginator->url($i);

			if (strpos($link, 'quantri') !== false) {
				$link = str_replace('quantri', 'quan-tri', $link);
			}

			if ($i == $current_page) {
				echo '<li class="active"><a href="' . $link . '">' . $i . '</a></li>';
			} else {
				echo '<li><a href="' . $link . '">' . $i . '</a></li>';
			}
		}

		if ($current_page + $width < $total - 2) {
			echo '<li>...</li>';
			for ($i = $total - 1; $i <= $total; $i++) {
				$link = $paginator->url($i);

				if (strpos($link, 'quantri') !== false) {
					$link = str_replace('quantri', 'quan-tri', $link);
				}

				if ($i == $current_page) {
					echo '<li class="active"><a href="' . $link . '">' . $i . '</a></li>';
				} else {
					echo '<li class="hidden-xs"><a href="' . $link . '">' . $i . '</a></li>';
				}
			}
		} else {
			for ($i = $current_page + $width + 1; $i <= $total; $i++) {
				$link = $paginator->url($i);

				if (strpos($link, 'quantri') !== false) {
					$link = str_replace('quantri', 'quan-tri', $link);
				}

				if ($i == $current_page) {
					echo '<li class="active"><a href="' . $link . '">' . $i . '</a></li>';
				} else {
					echo '<li class="hidden-xs"><a href="' . $link . '">' . $i . '</a></li>';
				}
			}
		}

		if ($current_page < $total) {
			$link = $paginator->url($current_page + 1);
			if (strpos($link, 'quantri') !== false) {
				$link = str_replace('quantri', 'quan-tri', $link);
			}
			
			echo '<li class="hidden-xs"><a href="' . $link . '">' . '<i class="fa fa-chevron-right"></i>' . '</a></li>';
		}

		echo '</ul>';
	}
?>