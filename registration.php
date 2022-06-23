<?php include "include/header.php"; ?>


<!-- Navigation -->

<?php include "include/nav.php"; ?>

<?php
if (isset($_POST['submit'])) {
    $user_username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_password = mysqli_real_escape_string($conn, $_POST['password']);
    $user_email = mysqli_real_escape_string($conn, $_POST['email']);

    if (!empty($user_username) && !empty($user_password) && !empty($user_email)) {
        $query = "INSERT INTO users (username, password, email) VALUES ('$user_username', '$user_password', '$user_email')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "User created successfully";
        } else {
            echo "Error creating user" . mysqli_error($conn);
        }
    } else {
        echo "All fields are required";
    }
}
?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "include/footer.php"; ?>