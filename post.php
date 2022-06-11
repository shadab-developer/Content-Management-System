<?php include 'include/header.php'; ?>

<body>
    <!-- Navigation Start-->
    <?php include 'include/nav.php'; ?>
    <!-- Navigation End-->

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php
            $post_id = $_GET['p_id'];

            $query = "SELECT * from posts where post_id = $post_id";

            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_attachment = $row['post_attachment'];
                $post_content = $row['post_content'];
            }


            ?>
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="./images/<?php echo $post_attachment; ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $post_content; ?></p>

                <hr>

                <!-- Blog Comments -->
                <?php

                if (isset($_POST['submit_comment'])) {
                    submitComment();
                }
                ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="POST" role="form">
                        <div class="form-group">
                            <label for="author_name">Name</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="author_email">Email</label>
                            <input type="email" name="comment_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment_content">Comments</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Comment -->

                <?php

                $query_comment = "SELECT * from comments where comment_post_id = $post_id ";


                $result_comment = mysqli_query($conn, $query_comment);

                while ($row_comment = mysqli_fetch_assoc($result_comment)) {
                    $comment_post_id = $row_comment['comment_post_id'];
                    $comment_author = $row_comment['comment_author'];
                    $comment_email = $row_comment['comment_email'];
                    $comment_status = $row_comment['comment_status'];
                    $comment_content = $row_comment['comment_content'];
                    $comment_date = $row_comment['comment_date'];

                    if ($comment_status !== 'Approved') {
                        echo "<h3>No more comments</h3>";
                    } else {




                        echo "
                            <div class='media' style='margin-bottom : 20px'>

                    <a class='pull-left' href='#'>
                        <img class='media-object' src='https://source.unsplash.com/64x64' alt=''>
                    </a>
                    <div class=' media-body'>
                        <h4 class='media-heading'>$comment_author
                            <small>$comment_date at 9:30 PM</small>
                        </h4>
                        $comment_content

                    </div>
                </div>
                ";
                    }
                }

                ?>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'include/sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php include 'include/footer.php'; ?>