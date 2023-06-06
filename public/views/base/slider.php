<div class="slide">
    <a id="hamburger" href="#" onclick="openSlideMenu()">
        <i class="fas fa-bars"></i>
    </a>
</div>
<div id="menu" class="nav">
    <a href="#" class="close" onclick="closeSlideMenu()">
        <i class="fas fa-times"></i>
    </a>
    <a href="home" onclick="closeSlideMenu()">Home</a>
    <a href="map" onclick="closeSlideMenu()">Experts Map</a>
    <a href="news" onclick="closeSlideMenu()">News</a>
    <a href="experts" onclick="closeSlideMenu()">Find an Expert</a>
    <?php
    session_start();
    if (isset($_SESSION['userEmail'])) {
        echo '<a id="logIn" href="logout" onclick="closeSlideMenu()">Log Out</a>';
    } else {
        echo '<a id="logIn" href="login" onclick="closeSlideMenu()">LogIn</a>';
    }
    ?>
</div>