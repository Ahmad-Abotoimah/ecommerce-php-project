<?php
if (!isset($_SESSION["type"]) || $_SESSION["type"] == 0) {
  header('location:../index.php');
}
?>
<?php include "./includes/header.php";
// select all comments
$sql = "SELECT comments.*, products.product_name, users.user_name, users.user_image FROM comments INNER JOIN products ON products.product_id = comments.comment_product_id INNER JOIN users ON users.user_id = comments.comment_user_id";
$result = mysqli_query($conn, $sql);
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET["do"])) {
  $do = $_GET["do"];
  $id = $_GET["id"];
  // delete
  if ($do == "delete") {
    $sql = "DELETE FROM comments WHERE comment_id = '$id'";
    $result = mysqli_query($conn, $sql);
  }
  // edit
  // if ($do == "edit") {
  //   $sql = "UPDATE comments SET column1=value, column2=value2,...
  //   WHERE some_column=some_value  = '$id'";
  //   $result = mysqli_query($conn, $sql);
  // }
  //   add
  // if ($do == "edit") {
  //   $sql = "DELETE FROM comments WHERE comment_id = '$id'";
  //   $result = mysqli_query($conn, $sql);
  // }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  } ?>
  <!-- start form -->
  <div class="col-md-6 col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Horizontal Form with Icons</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <form class="form form-horizontal" method="POST" enctype="multipart/form-data">
            <div class="form-body">
              <div class="row">
                <div class="col-md-4">
                  <label>Comment</label>
                </div>
                <div class="col-md-8">
                  <div class="form-group has-icon-left">
                    <div class="position-relative row justify-content-center align-items-center d-flex">
                      <input name="comment" type="text" class="form-control col-9 mb-2" placeholder="Name" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                      <div class="form-control-icon col-3 ">
                        <i class="bi bi-person" style="position: absolute; top:-10px; left: -20px;"></i>
                      </div>
                      <span class="text-danger mb-2"><?php echo isset($commentError) ? $commentError : ""; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Image</label>
                </div>
                <div class="col-md-8">
                  <div class="form-group has-icon-left">
                    <div class="position-relative row justify-content-center align-items-center d-flex">
                      <input name="image" type="file" class="form-control col-9 mb-2" style="border: 1px solid #dce7f1 !important;" id="first-name-icon">
                      <div class="form-control-icon col-3">
                        <i class="bi bi-envelope" style="position: absolute; top:-10px; left: -20px;"></i>
                      </div>
                      <span class="text-danger"><?php echo isset($imageError) ? $imageError : ""; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary me-1 mb-1"><?php echo $_GET["do"] == "edit" ? "Save" : "Add"; ?></button>
                  <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- end form -->
<?php  } ?>

<!-- start table -->
<div class="row">
  <div class="offset-2 col-lg-9">
    <div class="users-table table-wrapper">
      <table class="table table-striped" style="border: 2px solid #dce7f1 ;" id="table1">
        <thead>
          <tr class="users-table-info">
            <th>User</th>
            <th>Comment</th>
            <th>image</th>
            <th>date created</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($comments as $key => $value) { ?>
            <tr>
              <td>
                <img src="<?php echo "../" . $value["user_image"] ?>" alt=""> <?php echo $value["user_name"] ?>
              </td>
              <td>
                <?php echo $value["comment"] ?>
              </td>
              <td>
                <?php if ($value["comment_image"] != NULL) { ?>
                  <img src="<?php echo $value["comment_image"] ?>">
                <?php } else {
                  echo "No image";
                } ?>
              </td>
              <td><?php echo $value["comment_date"] ?></td>
              <td>
                <span class="p-relative">
                  <button class="dropdown-btn transparent-btn" type="button" title="More info">
                    <div class="sr-only">More info</div>
                    <i data-feather="more-horizontal" aria-hidden="true"></i>
                  </button>
                  <ul class="users-item-dropdown dropdown">
                    <li><a href="?do=delete&id=<?php echo $value["comment_id"] ?>">Trash</a></li>
                  </ul>
                </span>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- end table -->
<?php include "./includes/footer.php"; ?>