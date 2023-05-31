<nav>
    <div class="menu-left">
        <span class="logo">Tech Talent Marketplace</span>
    </div>
    <div class="menu-center">
        <a href="home">Home</a>
        <a href="#">Find an Expert</a>
    </div>
    <?php
    session_start();
    if (isset($_SESSION['userEmail'])) {
        echo '<div class="menu-right">
            <a href="logout" class="login-button">Log Out</a>
        </div>';
    } else {
        echo '<div class="menu-right">
            <a href="login" class="login-button">Log In</a>
        </div>';
    }
    ?>
</nav>