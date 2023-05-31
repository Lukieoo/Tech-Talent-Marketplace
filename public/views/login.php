<!DOCTYPE html>
<html>
<?php
include('base/head.php')
?>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <script src="public/js/validationLogin.js"></script>
</head>
<body>
<?php
include('base/slider.php')
?>
<div class="wrapper">
    <div class="main">
        <?php include('base/nav.php') ?>
        <div class="container center-content">
            <div class="login-container">
                <div class="login-image">
                    <img src="public/img/login.jpg" alt="Log In">
                </div>
                <form class="login" action="login" method="POST">
                    <div class="form-group">
                        <label id="title">Log In</label>
                        <p></p>
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" placeholder="">
                    </div>
                    <div class="messages">
                        <?php
                        if (isset($messages)) {
                            foreach ($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                        <span id="message"></span>
                    </div>
                    <div class="form-group">
                        <button type="submit">Log In</button>
                    </div>
                </form>
                <div class="signup-link">
                    <p>I am new user... <a href="register">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('base/footer.php')
    ?>
</body>
</html>