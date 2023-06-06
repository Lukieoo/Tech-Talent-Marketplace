<nav>
    <div class="menu-left">
        <span class="logo">Tech Talent Marketplace</span>
    </div>
    <div class="menu-center">
        <a href="home">Home</a>
        <a href="experts">Find an Expert</a>
        <a href="map">Expert Map</a>
        <a href="news">News</a>
    </div>
    <?php
    session_start();
    if (isset($_SESSION['userEmail'])) {
        echo '<div class="menu-right">
            <a href="logout" class="login-button">Log Out</a>
             <a href="profile"><img  src="public/img/avatar.png" alt="Log In"></a> 
        </div>';
    } else {
        echo '<div class="menu-right">
            <a href="login" class="login-button">Log In</a>
        </div>';
    }
    ?>
</nav>