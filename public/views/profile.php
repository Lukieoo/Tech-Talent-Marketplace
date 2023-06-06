<!DOCTYPE html>
<html>
<?php
include('base/head.php')
?>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <script type="module" src="public/js/picker.js"></script>
</head>
<body>
<?php
include('base/slider.php')
?>
<div class="wrapper">
    <div class="main">
        <?php include('base/nav.php') ?>
        <div class="profile">
            <?php ?>
            <div class="profile-info">
                <div class="info-item">
                    <div class="info-label">Name:</div>
                    <div class="info-value"><?= $expert->getName(); ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Profession:</div>
                    <div class="info-value"><?= $expert->getProfession(); ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Description:</div>
                    <div class="info-value"><?= $expert->getDescription(); ?>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-label">Email:</div>
                    <div class="info-value"><?= $expert->getEmail(); ?></div>
                </div>

                <?php if ($isProfile): ?>
                    <a href="edit"><button type="submit">Edit</button></a>
                <?php endif; ?>
            </div>
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