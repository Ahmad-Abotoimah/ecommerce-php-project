<?php
session_start();
require_once("includes/header.php")
?>

<?php
if (isset($_GET['order'])) {
    if (isset($_SESSION['cart'])) {
?>
        <div class="container">
            <article class="card">
                <header class="card-header"> My Orders / Tracking </header>
                <div class="card-body">
                    <article class="card">
                        <div class="card-body row">
                            <div class="col"> <strong>Estimated Delivery time:</strong> <br>1 to 3 days </div>
                            <div class="col"> <strong>Shipping BY:</strong> <br> Coz Store, | <i class="fa fa-phone"></i> 00962792851914 </div>
                            <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                        </div>
                    </article>
                    <div class="track">
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
                    </div>
                    <hr>
                    <ul class="row">
                        <?php
                        foreach ($_SESSION['cart'] as $key => $value) { ?>
                            <li class="col-md-4">
                                <section class="itemside mb-3">
                                    <div class="aside"><img src="<?php echo 'admin/' . $value['product_image']; ?>" style="width: 158px;height: 216px;"></div>
                                    <figcaption class="info align-self-center">
                                        <p class="title"><?php echo $value['product_name'] .  " " . $value['size']; ?></p> <span class="text-muted">$ <?php echo $value['product_price']; ?></span>
                                    </figcaption>
                                </section>
                            </li>
                        <?php
                        } ?>
                    </ul>
                    <hr> <a href="shop.php?page=1" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i>Return To Shop</a>
                    <a href="shop.php?distroy_seesion" class="btn btn-warning" data-abc="true" style="margin-left: 768px;"> My Order Arrived<i class="fa fa-chevron-right"></i></a>
                </div>
            <?php
        }
        echo '</article>
            </div>
            <?php require_once("includes/footer.php") ?>';
    } else if (isset($_SESSION['cart']) == "") { ?>
            <div style="text-align: center;font-size: 50px;line-height: 12;color: #03a9f4;font-weight: bold;margin-bottom: 393px;">No Current Orders</div>
        <?php }  ?>
        <?php require_once("includes/footer.php") ?>