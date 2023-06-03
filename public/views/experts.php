<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/experts.css">
</head>
<?php
include('base/head.php')
?>
<body>
<?php
include('base/slider.php')
?>
<div class="wrapper">
    <div class="main">
        <?php
        include('base/nav.php');
        ?>

        <form method="GET" action="experts">
            <div class="search-container">
                <label id="title" for="search-input">Find your specialist by entering the technology that interests
                    you.</label>
                <br><br>
                <input type="text" name="search" id="search-input" placeholder="Find your expert...">
                <button type="submit" type="button">Find</button>
            </div>
        </form>

        <section class="experts">
            <?php foreach ($experts as $expert): ?>
                <div class="expert" id="expert-1">
                    <a href="profile?id=<?= $expert->getId() ?>">
                        <img src="public/uploads/<?= $expert->getPhoto(); ?>">
                        <div>
                            <h2><?= $expert->getName(); ?></h2>
                            <p><?= $expert->getProfession(); ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </section>
        <?php if ($totalPages > 1): ?>
            <div class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="experts?search=<?= $search ?>&page=<?= $i ?>"
                       class="<?= ($currentPage == $i) ? 'active' : '' ?>"><?= $i ?></a>
                <?php endfor; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
    include('base/footer.php')
    ?>
</div>
</body>
</html>
