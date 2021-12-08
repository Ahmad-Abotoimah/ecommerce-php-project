<?php
require_once("includes/header.php");
$sql = "SELECT * FROM orders INNER JOIN users ON orders.order_user_id = users.user_id ";
$result = mysqli_query($conn, $sql);
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
if (isset($_GET['do'])) {
    if ($_GET['do'] == "arrived") {
        $id = $_GET['id'];
        $sql = "UPDATE `orders` SET `order_status`='arrived' WHERE `order_id`=$id ";
        unset($_SESSION['cart']);
    }
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="users-table table-wrapper">
            <table class="table table-striped" id="table1">

                <button class="btn btn-primary" style="float: right;margin:10px 50px 0px 10px;">
                    <a href="manage_users.php?do=add">Add user </a>
                </button>
                <thead>
                    <tr class="users-table-info">
                        <th>
                            <label class="users-table__checkbox ms-20">
                                <input type="checkbox" class="check-all">User Image
                            </label>
                        </th>
                        <th>Order ID</th>
                        <th>Order User</th>
                        <th>Order User Gender</th>
                        <th>Order Detailes</th>
                        <th>Order Location</th>
                        <th>Order Mobile</th>
                        <th>Order date</th>
                        <th>Order total Amount</th>
                        <th>status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $key => $order) { ?>
                        <tr>
                            <td><?php echo isset($order['order_id']) ? $order['order_id'] : ''; ?></td>
                            <td><?php echo isset($order['order_user_name']) ? $order['order_user_name'] : ''; ?></td>
                            <td><?php echo isset($order['user_gender']) ? $order['user_gender'] : ''; ?></td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 flex justify-center items-center">
                                    <?php echo $order["order_detailes"]; ?>
                                </div>
                            </td>
                            <td><?php echo isset($order['order_location']) ? $order['order_location'] : ''; ?></td>
                            <td><?php echo isset($order['order_mobile']) ? $order['order_mobile'] : ''; ?></td>
                            <td><?php echo isset($order['order_date']) ? $order['order_date'] : ''; ?></td>
                            <td><?php echo isset($order['order_total']) ? $order['order_total'] : ''; ?></td>
                            <td><?php echo isset($order['order_status']) ? $order['order_status'] : ''; ?></td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="btn btn-success" title="edit">
                                        <a href="manage_orders.php?do=arrived&id=<?php echo $user['order_id'] ?>"> arrived </a>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>