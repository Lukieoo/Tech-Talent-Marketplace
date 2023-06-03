<!DOCTYPE html>
<html>
<?php
include('base/head.php')
?>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
</head>
<body>
<?php
include('base/slider.php')
?>
<div class="wrapper">
    <div class="main">
        <?php include('base/nav.php') ?>
        <div class="profile">
            <form method="POST" action="edit">
                <div class="profile-info">
                    <div class="info-item">
                        <div class="info-label">Name:</div>
                        <input type="text" name="name" value="<?= $expert->getName(); ?>">
                    </div>
                    <div class="info-item">
                        <div class="info-label">Profession:</div>
                        <input type="text" name="profession" value="<?= $expert->getProfession(); ?>">
                    </div>
                    <div class="info-item">
                        <div class="info-label">Description:</div>
                        <textarea  name="description" rows="3"><?= $expert->getDescription(); ?></textarea>
                    </div>
                    <button type="submit">Save</button>
                </div>
            </form>
            <div class="profile-image">
                <img src="public/uploads/<?= $expert->getPhoto(); ?>" alt="User Image">
            </div>
        </div>

    </div>
    <?php
    include('base/footer.php')
    ?>
</body>
</html>