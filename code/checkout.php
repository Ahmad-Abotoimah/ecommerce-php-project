<?php
ob_start();
include "./includes/header.php";
include "admin/includes/functions.php";
if (!isset($_SESSION["type"]) || $_SESSION["type"] != 0) {
  header('location:sign_in.php');
}
if (!isset($_SESSION['cart'])) {
  header('location:shop.php?page=1');
}

if (isset($_SESSION['user_id'])) {
  $id = $_SESSION['user_id'];
}
$sql = "SELECT * FROM users WHERE user_id =$id";
$result = mysqli_query($conn, $sql);
$users  = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['pay'])) {
  $check = 1;
  $name = ($_POST["name"]);
  $email = strtolower($_POST["email"]);
  $location = ($_POST["location"]);
  $mobile   = ($_POST["mobile"]);
  if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
    $nameError = "Only letters and white space allowed";
    $check = 0;
  }
  // email validation 
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailError = ("email is not a valid email address");
    $check = 0;
  }
  if ($name == "") {
    $check = 0;
    $nameError = "The name shouldn't be empty!";
  }
  if ($email == "") {
    $check = 0;
    $emailError = "The email shouldn't be empty!";
  }
  if ($check == 1) {
    foreach ($_SESSION['cart'] as $key => $val) {
      $total += (int)$value['product_price'] * (int)$value['quantity'];
      $cartStr = "," . $val['product_name'] . "," . $val['product_price'] . "," . $val['product_id'] . "," . $val['product_size'] . "," . $val['product_quantity'];
      $cart = $cart . $cartStr;
    }
    if ($total != 0) {
      $sql = "INSERT INTO orders (`order_details`,`order_location`,`order_mobile`,`order_user_id`,`order_user_name`,`order_total`) VALUES ('$cart','$location',$mobile,$id,'$name','$total')";
      $result = mysqli_query($conn, $sql);
      redirect("order.php?order");
      $conn->close();
    }
  }
}

?>
<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85" method="POST">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
        <div class="m-l-25 m-r--38 m-lr-0-xl">
          <form class="needs-validation" novalidate>
            <div class="form-row">
              <div class="col-md-6 mb-4">
                <label for="validationCustom01">Full Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $users[0]['user_name'] ?>" required>
                <div class="valid-feedback">

                </div>
              </div>
              <div class="col-md-6 mb-4">
                <label for="validationCustom01">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $users[0]['user_email']; ?>" required>
                <div class="valid-feedback">

                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-4">
                <label for="validationCustom03">Mobile</label>
                <input type="number" name="mobile" class="form-control" placeholder="Mobile" value="<?php echo $users[0]['user_mobile']; ?>" required>
                <div class="invalid-feedback">

                </div>
              </div>
              <div class="col-md-6 mb-4">
                <label for="validationCustom04">Location</label>
                <input type="text" name="location" class="form-control" placeholder="Write Your Location in Deatails" value="<?php echo $users[0]['user_location']; ?>" required>
                <div class="invalid-feedback">
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <label for="validationCustom04"></label>
                <input type="hidden" name="order" value="order">
                <div class="invalid-feedback">
                </div>
              </div>
            </div>
        </div>
</form>
</div>
</div>

<div class="col-sm-10 col-lg-10 col-xl-5 m-lr-auto m-b-50">
  <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm" style="margin: bottom 20px;">
    <h4 class="mtext-109 cl2 p-b-30">
      Cart Totals
    </h4>
    <ul class="header-cart-wrapitem w-full">
      <?php if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) { ?>
          <li class="header-cart-item flex-w flex-t m-b-12">
            <div class="header-cart-item-img">
              <img src="<?php echo "admin/" . $value['product_image']; ?>" alt="IMG">
            </div>

            <div class="header-cart-item-txt p-t-8">
              <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                <?php echo $value['product_name'] . " " . $value['size']; ?>
              </a>

              <span class="header-cart-item-info">
                <?php echo $value['quantity'] . " x $" . $value['product_price'];
                $_SESSION['total']; ?>
              </span>
            </div>
          </li>
      <?php }
      } ?>
    </ul>
    <hr>
    <div class="flex-w flex-t  p-b-33">
      <div class="size-208">
        <span class="mtext-101 cl2">
          Total: <?php echo "$" . @$_SESSION['total'];
                  $_SESSION['total'] = 0;
                  ?>
        </span>
      </div>
    </div>
    <button type="submit" name="pay" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
      Checkout
    </button>
    <?php
    if (isset($_POST['checkout']) && $total == 0) {
      echo  '<div class="text-center h5 mt-5">you must add to cart!</div>';
    } elseif (isset($_POST['checkout']) && $total != 0) {
      header("location:checkout.php");
    }
    ?>
  </div>
</div>
</div>
</div>
</form>


<?php include "./includes/footer.php";
ob_end_flush(); ?>