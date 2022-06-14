<!-- Head Start Here -->
<?php include 'include/header.php' ?>
<!-- Head End Here -->
<?php
$user_id = $_SESSION['user_id'];

$query = "SELECT * from users where user_id = $user_id ";

$result = mysqli_query($conn, $query);


if (!$result) {
    echo mysqli_error($conn);
}

while ($row = mysqli_fetch_assoc($result)) {
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_image = $row['user_image'];
    $user_email = $row['user_email'];
    $user_username = $row['user_username'];
    $user_password = $row['user_password'];
}
?>

<body>

    <div id="wrapper">

        <!-- Navigation Start Here -->
        <?php include 'include/nav.php'; ?>
        <!-- Navigation End Here -->


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $user_username ?></small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- Footer Start Here -->
    <?php include 'include/footer.php'; ?>
    <!-- Footer End Here -->