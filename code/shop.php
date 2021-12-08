<?php include("includes/header.php");
include "./admin/includes/functions.php";
include "./admin/includes/connect.php";
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
$tags = mysqli_fetch_all($result, MYSQLI_ASSOC);
$tagsArray = [];
foreach ($tags as $key => $value) {
	array_push($tagsArray, $value['product_tag']);
}
$tags_unique = array_unique($tagsArray);
// define how many results you want per page
$results_per_page = 12;
?>
<!-- Product -->
<div class="bg0 p-b-140">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-52">
			<div class=" panel-filter w-full p-t-10">
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
					<div class="filter-col2 p-r-15 p-b-27">
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
					<div class="filter-col3 p-b-27">
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
					<div class="filter-col4 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Tags
						</div>

						<div class="flex-w p-t-4 m-r--5">
							<?php foreach ($tags_unique as $key => $value) { ?>
								<a href="?sort=tag&name=<?php echo $value; ?>" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									<?php echo $value; ?>
								</a>
							<?php }
							?>
						</div>
					</div>
				</div>
			</div>
			<!-- Filter -->
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
			if ($_GET["sort"] == "tag") {
				$name = $_GET["name"];
				$sql = "SELECT * FROM products WHERE product_tag ='{$name}'";
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
			$sql = "SELECT * FROM products WHERE product_tag LIKE '%{$search}%' OR product_name LIKE '%{$search}%'";
			$result = mysqli_query($conn, $sql);
			$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
			if (count($product) == 0) {
				$searchError = "No items found";
			}
		} else {
			$sql = "SELECT * FROM products";
			$result = mysqli_query($conn, $sql);

			$number_of_results = mysqli_num_rows($result);
			//determine number of total pages available
			$number_of_pages = ceil($number_of_results / $results_per_page);
			// determine which page number visitor is currently on
			if (!isset($_GET['page'])) {
				$page = 1;
			} else {
				$page = $_GET['page'];
			}
			// determine the sql LIMIT starting number for the results on the displaying page
			$this_page_first_result = ($page - 1) * $results_per_page;
			$sql = 'SELECT * FROM products LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
			$result = mysqli_query($conn, $sql);
			$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
		}
		?>

		<div class="row isotope-grid">
			<?php echo isset($searchError) ? '<h1 style="margin: auto;">' . $searchError . "</h1>" : "";
			foreach ($product as $val) { ?>

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php
																																		if ($val["product_tag"] == "bag") {
																																			echo "bag";
																																		}
																																		if ($val["product_tag"] == "women") {
																																			echo "women";
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
							<?php if ($val["product_tag"] == "new") { ?>
								<div class="block2-pic hov-img0 label-new" data-label="New">
								<?php } else { ?>
									<div class="block2-pic hov-img0">
									<?php } ?>
									<?php if ($val["product_tag"] == "sales") { ?>
										<div style="width:15%;height:5vh;border-radius:50px;background-color:red;text-align:center;position:absolute ;padding-top:10px;color:white;font-weight:bold"> 50% </div>
									<?php } ?>
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
	</div>
</div>
<style>
	p,
	li,
	a {
		font-size: 14px;
	}

	/* GRID */

	.twelve {
		width: 100%;
	}

	.eleven {
		width: 91.53%;
	}

	.ten {
		width: 83.06%;
	}

	.nine {
		width: 74.6%;
	}

	.eight {
		width: 66.13%;
	}

	.seven {
		width: 57.66%;
	}

	.six {
		width: 49.2%;
	}

	.five {
		width: 40.73%;
	}

	.four {
		width: 32.26%;
	}

	.three {
		width: 23.8%;
	}

	.two {
		width: 15.33%;
	}

	.one {
		width: 6.866%;
	}

	/* COLUMNS */

	.col {
		display: block;
		float: left;
		margin: 1% 0 1% 1.6%;
	}

	.col:first-of-type {
		margin-left: 0;
	}

	/* CLEARFIX */

	.cf:before,
	.cf:after {
		content: " ";
		display: table;
	}

	.cf:after {
		clear: both;
	}

	.cf {
		*zoom: 1;
	}

	/* GENERAL STYLES */

	.pagination {
		padding: 30px 0;
	}

	.pagination ul {
		margin: 0;
		padding: 0;
		list-style-type: none;
	}

	.pagination a {
		display: inline-block;
		padding: 10px 18px;
		color: #222;
	}

	.p9 a {
		width: 30px;
		height: 30px;
		line-height: 25px;
		padding: 0;
		text-align: center;
		margin: auto 5px;
	}

	.p9 a.is-active {
		border: 3px solid #717fe0;
		border-radius: 100%;
	}
</style>
<div style="display: flex; justify-content:center;">
	<div class="pagination p9">
		<ul>
			<?php
			if (isset($_GET['page'])) {
				for ($page = 1; $page <= $number_of_pages; $page++) { ?>
					<a <?php echo $_GET['page'] == $page ? 'class="is-active"' : ""; ?>href="?page=<?php echo $page ?>">
						<li><?php echo $page ?></li>
					</a>
			<?php }
			} ?>
		</ul>
	</div>


</div>

</body>

</html>
<?php include("includes/footer.php");
?>