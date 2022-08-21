<?php
require '../classes/AdminLogin.php';
$login_session = new AdminLogin();

if (isset($_POST['username'])) {
    $uesrname = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);

    $loginCheck = $login_session->adminLogin($uesrname, $password);
}
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
    <div class="container">
        <section id="content">
            <form method="post">
                <h1>Admin Login</h1>
                <span style="color:red">
                    <?php
                    if (isset($loginCheck)) {
                        echo $loginCheck;
                    }
                    ?>

                </span>
                <br>
                <div>
                    <input type="text" placeholder="Username" name="username" />
                </div>
                <div>
                    <input type="password" placeholder="Password" name="password" />
                </div>
                <div>
                    <input type="submit" value="Log in" />
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="#">Training with live project</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>

</html>