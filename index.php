<?php include 'include/header.php'; ?>

<body>
    <!-- Navigation Start-->
    <?php include 'include/nav.php'; ?>
    <!-- Navigation End-->


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Blogs
                    <small>Latest blog post</small>
                </h1>

                <!-- POST Content START -->
                <?php include 'include/post.php'; ?>
                <!-- POST Content END -->

                <!-- Pager -->
                <ul class="pager">
                    <!-- <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li> -->
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'include/sidebar.php'; ?>

        </div>
        <!-- /.row -->
        <hr>

        <ul class="pager">
            <?php

            for ($i = 1; $i <= $count; $i++) {
                if ($i == $page) {
                    echo "<li ><a class='active-link' href='index.php?page=$i'>$i</a></li>";
                } else {
                    echo "<li><a href='index.php?page=$i'>$i</a></li>";
                }
            }
            ?>
        </ul>


        <?php include 'include/footer.php'; ?>