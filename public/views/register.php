<!DOCTYPE html>
<html>
<?php
include('base/head.php')
?>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/register.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <script src="public/js/validation.js"></script>
    <script type="module" src="public/js/picker.js"></script>
</head>
<body>
<?php
include('base/slider.php')
?>
<div class="wrapper">
    <div class="main">
        <?php include('base/nav.php') ?>
        <div class="container center-content">
            <div class="register-container">
                <form class="register" action="register" method="POST" ENCTYPE="multipart/form-data">
                    <p id="title">Start Your IT Journey<br> Sign Up Today!</p>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="profession">Profession</label>
                        <input id="profession" name="profession" type="text" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="3"></textarea>
                    </div>
                    <div id="map" style="width:550px;height:200px;"></div>
                    <div id="auth" style="display: flex; flex-direction: row;">
                        <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input type="text" id="lat" name="lat" placeholder="Latitude" readonly>
                        </div>
                        <div class="form-group">
                            <label for="lng">Longitude</label>
                            <input type="text" id="lng" name="lng" placeholder="Longitude" readonly>
                        </div>
                    </div>
                    <div id="auth" style="display: flex; flex-direction: row;">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="text" placeholder="">
                        </div>
                        <div class="form-group" style="margin-left: 10px;">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" placeholder="">
                        </div>
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

                    <div id="register-image">
                        <input type="file" name="file"/>
                    </div>
                    <div class="form-group">
                        <button type="submit">Register</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCTZ9K839uJxdnOKG-GmUfL0vK1HyLC5s&callback=initMap&v=weekly"
        defer
    ></script>
    <?php
    include('base/footer.php')
    ?>
</body>
</html>