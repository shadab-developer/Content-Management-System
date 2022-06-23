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
    $user_role = $row['user_role'];
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
                            Welcome to <?php echo $user_role; ?>
                            <small><?php echo $user_username ?></small>
                        </h1>


                        <!-- /.row -->


                        <?php
                        $query = "SELECT * from posts";

                        $result = mysqli_query($conn, $query);

                        $post_count = mysqli_num_rows($result);


                        $query1 = "SELECT * from comments";

                        $result1 = mysqli_query($conn, $query1);

                        $comment_count = mysqli_num_rows($result1);

                        $query2 = "SELECT * from users";

                        $result2 = mysqli_query($conn, $query2);

                        $users_count = mysqli_num_rows($result2);

                        $query3 = "SELECT * from categories";

                        $result3 = mysqli_query($conn, $query3);

                        $categories_count = mysqli_num_rows($result3);
                        ?>

                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-file-text fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class='huge'><?php echo $post_count ?></div>
                                                <div>Posts</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="posts.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-comments fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class='huge'><?php echo $comment_count; ?></div>
                                                <div>Comments</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="comments.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class='huge'><?php echo $users_count; ?></div>
                                                <div> Users</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="users.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-list fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class='huge'><?php echo $categories_count; ?></div>
                                                <div>Categories</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="categories.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <?php
                        $query = "SELECT * from posts where post_status = 'draft'";

                        $draftPost = mysqli_query($conn, $query);

                        $draftpost_count = mysqli_num_rows($draftPost);

                        $query1 = "SELECT * from comments where comment_status = 'UnApproved'";

                        $draftComment = mysqli_query($conn, $query1);

                        $draftcomment_count = mysqli_num_rows($draftComment);
                        ?>

                        <div class="row">
                            <script type="text/javascript">
                                google.charts.load('current', {
                                    'packages': ['bar']
                                });
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Data', 'Count'],

                                        <?php
                                        $element_text = ['Active Post', 'Draft Post', 'Users ', 'Comments', 'Draft Comment', 'Categories'];
                                        $element_count = [$post_count, $draftpost_count, $users_count, $comment_count, $draftcomment_count, $categories_count];

                                        for ($i = 0; $i < 6; $i++) {
                                            echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                        }
                                        ?>
                                    ]);

                                    var options = {
                                        chart: {
                                            title: '',
                                            subtitle: '',
                                        }
                                    };

                                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                    chart.draw(data, google.charts.Bar.convertOptions(options));
                                }
                            </script>

                            <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>

                        </div>

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