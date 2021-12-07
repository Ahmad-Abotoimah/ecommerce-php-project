<?php include("includes/header.php");
include "./admin/includes/functions.php";
include "./admin/includes/connect.php";
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!-- Product -->
<div class="bg0 p-b-140">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
					All Products
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
					Women
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
					Men
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
					Bag
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
					Shoes
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
					Watches
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".sales">
					Sales
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".new">
					New
				</button>
			</div>

			<div class="flex-w flex-c-m m-tb-10">
				<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
					<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
					<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Filter
				</div>
			</div>

			<!-- Filter -->
			<div class="dis-none panel-filter w-full p-t-10">
				<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
					<div class="filter-col1 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Sort By
						</div>
						<ul>
							<li class="p-b-6">
								<a href="?sort=rating" class="filter-link stext-106 trans-04">
									Rating
								</a>
							</li>
							<li class="p-b-6">
								<a href="?sort=newness" class="filter-link stext-106 trans-04 filter-link-active">
									Newness
								</a>
							</li>
							<li class="p-b-6">
								<a href="?sort=low" class="filter-link stext-106 trans-04">
									Price: Low to High
								</a>
							</li>
							<li class="p-b-6">
								<a href="?sort=high" class="filter-link stext-106 trans-04">
									Price: High to Low
								</a>
							</li>
						</ul>
					</div>
					<div class="filter-col1 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Price
						</div>
						<ul>
							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
									All
								</a>
							</li>
							<li class="p-b-6">
								<a href="?sort=50" class="filter-link stext-106 trans-04">
									$0.00 - $50.00
								</a>
							</li>
							<li class="p-b-6">
								<a href="?sort=100" class="filter-link stext-106 trans-04">
									$50.00 - $100.00
								</a>
							</li>
							<li class="p-b-6">
								<a href="?sort=150" class="filter-link stext-106 trans-04">
									$100.00 - $150.00
								</a>
							</li>
							<li class="p-b-6">
								<a href="?sort=200" class="filter-link stext-106 trans-04">
									$150.00 - $200.00
								</a>
							</li>
							<li class="p-b-6">
								<a href="?sort=200+" class="filter-link stext-106 trans-04">
									$200.00+
								</a>
							</li>
						</ul>
					</div>
					<div class="filter-col2 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Categories
						</div>

						<div class="flex-w p-t-4 m-r--5">
							<?php foreach ($categories as $key => $value) { ?>
								<a href="?sort=category&id=<?php echo $value['category_id']; ?>" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									<?php echo $value['category_name']; ?>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- end of filter  -->

		<?php
		// getAllFrom($field, $table, $where = NULL, $and = NULL, $orderfield, $ordering = "DESC")
		// $getAll = ("SELECT $field FROM $table $where $and ORDER BY $orderfield $ordering");
		if (isset($_GET["sort"])) {
			if ($_GET["sort"] == "high") {
				$sql = "SELECT * FROM products ORDER BY product_price DESC";
				$result = mysqli_query($conn, $sql);
				$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
			} //=================================================
			if ($_GET["sort"] == "category") {
				$id = (int)$_GET["id"];
				$sql = "SELECT * FROM products WHERE product_categorie_id=$id";
				$result = mysqli_query($conn, $sql);
				$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			if ($_GET["sort"] == "low") {
				$sql = "SELECT * FROM products ORDER BY product_price";
				$result = mysqli_query($conn, $sql);
				$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			if ($_GET["sort"] == "rating") {
				$sql = "SELECT * FROM products ORDER BY product_rate DESC";
				$result = mysqli_query($conn, $sql);
				$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			if ($_GET["sort"] == "newness") {
				$sql = "SELECT * FROM products ORDER BY product_date DESC";
				$result = mysqli_query($conn, $sql);
				$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			if ($_GET["sort"] == 50) {
				$sql = "SELECT * FROM products WHERE product_price BETWEEN 0 AND 50";
				$result = mysqli_query($conn, $sql);
				$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			if ($_GET["sort"] == 100) {
				$sql = "SELECT * FROM products WHERE product_price BETWEEN 50 AND 100";
				$result = mysqli_query($conn, $sql);
				$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			if ($_GET["sort"] == 150) {
				$sql = "SELECT * FROM products WHERE product_price BETWEEN 100 AND 150";
				$result = mysqli_query($conn, $sql);
				$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			if ($_GET["sort"] == 200) {
				$sql = "SELECT * FROM products WHERE product_price BETWEEN 150 AND 200";
				$result = mysqli_query($conn, $sql);
				$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			if ($_GET["sort"] == "200+") {
				$sql = "SELECT * FROM products WHERE product_price>50";
				$result = mysqli_query($conn, $sql);
				$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
		} else if (isset($_GET["search"])) {
			$search = $_GET["search"];
			$sql = "SELECT * FROM products WHERE product_tag LIKE '%{$search}%'";
			$result = mysqli_query($conn, $sql);
			$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
		} else {
			$sql = "SELECT * FROM (
				SELECT *
				FROM `products`
				ORDER BY `product_id` DESC
				LIMIT 12
			) AS `products` ORDER by product_id ASC";
			$result = mysqli_query($conn, $sql);
			$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
		}
		if (isset($_GET["load_more"])) {
			$sql = "SELECT * FROM products";
			$result = mysqli_query($conn, $sql);
			$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
		}
		?>

		<div class="row isotope-grid">
			<?php


			foreach ($product as $val) {
			?>

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php
																																		if ($val["product_tag"] == "women") {
																																			echo "women";
																																		}
																																		if ($val["product_tag"] == "watches") {
																																			echo "watches";
																																		}
																																		if ($val["product_tag"] == "shoes") {
																																			echo "shoes";
																																		}
																																		if ($val["product_tag"] == "sales") {
																																			echo "sales";
																																		}
																																		if ($val["product_tag"] == "new") {
																																			echo "new";
																																		}
																																		if ($val["product_tag"] == "men") {
																																			echo "men";
																																		}
																																		?>">
					<!-- Block2 -->
					<div class="block2">
						<a href="product-detail.php?id=<?php echo $val['product_id']; ?>">
							<div class="block2-pic hov-img0">
								<img src="<?php echo 'admin/' . $val['product_main_image']; ?>" alt="IMG-PRODUCT">
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.php?id=<?php echo $val['product_id']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?php echo $val['product_name']; ?>
									</a>

									<span class="stext-105 cl3">
										<?php echo '$' . $val['product_price']; ?>
									</span>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php  }  ?>
		</div>


		<!-- Load more -->
		<?php if (!isset($_GET["load_more"])) { ?>

			<div class="flex-c-m flex-w w-full p-t-45" id="load_more">
				<a href="shop.php?load_more" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04" id="anchor">
					Load More
				</a>
			</div>
		<?php } ?>
	</div>
</div>
</body>

</html>
<?php include("includes/footer.php");
?>